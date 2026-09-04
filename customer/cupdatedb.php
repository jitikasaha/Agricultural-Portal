<?php
session_start();
date_default_timezone_set("Asia/Calcutta"); 
require_once '../sql.php';

if (!isset($_SESSION['customer_login_user'])) {
    header("location: ../index.php");
    exit;
}

$userlogin = $_SESSION['customer_login_user'];
$date = date('d/m/Y');

$resCust = mysqli_query($conn, "SELECT cust_id FROM custlogin WHERE email = '" . mysqli_real_escape_string($conn, $userlogin) . "'");
$rowC = mysqli_fetch_assoc($resCust);
$custId = $rowC ? (int)$rowC['cust_id'] : 0;

$query1 = "SELECT * FROM `cart` WHERE cust_id = $custId";
$result1 = mysqli_query($conn, $query1);
if (!$result1 || $result1->num_rows === 0) {
    $query1 = "SELECT * FROM `cart`";
    $result1 = mysqli_query($conn, $query1);
}

$purchasedItems = [];

if ($result1 && $result1->num_rows > 0) {
    while ($row1 = $result1->fetch_assoc()) {
        $purchasedItems[] = [
            'cropname' => $row1['cropname'],
            'quantity' => (int)$row1['quantity'],
            'price' => (float)$row1['price'],
        ];

        $cropName = $row1['cropname'];
        $x = (float)$row1['quantity'];

        // Update production approx
        $conn->query("UPDATE production_approx SET quantity = GREATEST(0, quantity - $x) WHERE crop = '" . mysqli_real_escape_string($conn, $cropName) . "'");

        // Deplete from farmer_crops_trade
        while ($x > 0) {
            $query3 = "SELECT * FROM farmer_crops_trade WHERE Trade_crop = '" . mysqli_real_escape_string($conn, $cropName) . "' LIMIT 1";
            $result3 = mysqli_query($conn, $query3);
            if (!$result3 || $result3->num_rows === 0) {
                break;
            }

            $row3 = $result3->fetch_assoc();
            if (!$row3) {
                break;
            }

            $tradeQty = (float)$row3['Crop_quantity'];
            $tradeMsp = (float)$row3['msp'];
            $tradeId = (int)$row3['trade_id'];
            $farmerId = (int)$row3['farmer_fkid'];

            if ($tradeQty <= $x) {
                $soldPrice = $tradeQty * $tradeMsp;
                $stmtHist = $conn->prepare("INSERT INTO `farmer_history` (`farmer_id`, `farmer_crop`, `farmer_quantity`, `farmer_price`, `date`) VALUES (?, ?, ?, ?, ?)");
                $stmtHist->bind_param("isids", $farmerId, $cropName, $tradeQty, $soldPrice, $date);
                $stmtHist->execute();

                $conn->query("DELETE FROM farmer_crops_trade WHERE trade_id = $tradeId");
                $x -= $tradeQty;
            } else {
                $soldPrice = $x * $tradeMsp;
                $stmtHist = $conn->prepare("INSERT INTO `farmer_history` (`farmer_id`, `farmer_crop`, `farmer_quantity`, `farmer_price`, `date`) VALUES (?, ?, ?, ?, ?)");
                $stmtHist->bind_param("isids", $farmerId, $cropName, $x, $soldPrice, $date);
                $stmtHist->execute();

                $conn->query("UPDATE farmer_crops_trade SET Crop_quantity = Crop_quantity - $x WHERE trade_id = $tradeId");
                $x = 0;
                break;
            }
        }

        // Recalculate MSP if trades remain
        $queryCost = "SELECT costperkg FROM farmer_crops_trade WHERE Trade_crop = '" . mysqli_real_escape_string($conn, $cropName) . "'";
        $resCost = mysqli_query($conn, $queryCost);
        $totalCost = 0.0;
        $countCost = 0;
        if ($resCost) {
            while ($rowCost = $resCost->fetch_assoc()) {
                $totalCost += (float)$rowCost['costperkg'];
                $countCost++;
            }
        }

        if ($countCost > 0) {
            $avgCost = ceil($totalCost / $countCost);
            $newMsp = $avgCost + ceil($avgCost * 0.5);
            $conn->query("UPDATE farmer_crops_trade SET msp = $newMsp WHERE Trade_crop = '" . mysqli_real_escape_string($conn, $cropName) . "'");
        }
    }
}

// Save snapshot of order for invoice display and clear user cart
$_SESSION['last_order_items'] = $purchasedItems;
if ($custId > 0) {
    $conn->query("DELETE FROM `cart` WHERE cust_id = $custId");
} else {
    $conn->query("DELETE FROM `cart`");
}
unset($_SESSION['shopping_cart']);

header("location: cmoney_transfered.php");
exit;
?>