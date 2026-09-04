<?php 
session_start();
ini_set('memory_limit', '-1');
require('../sql.php'); // Includes Login Script

if (!isset($_SESSION['farmer_login_user'])) {
    header("location: flogin.php");
    exit;
}
$userlogin = $_SESSION['farmer_login_user'];

if (isset($_POST['Crop_submit'])) {
    $x = 0.0;
    $y = 0;
    $trade_crop = trim($_POST['crops'] ?? '');
    $quantity = (float)($_POST['trade_farmer_cropquantity'] ?? 0);
    $costperkg = (int)($_POST['trade_farmer_cost'] ?? 0);

    if ($trade_crop !== '' && $quantity > 0) {
        $stmt1 = $conn->prepare("SELECT farmer_id FROM farmerlogin WHERE email = ? LIMIT 1");
        $stmt1->bind_param("s", $userlogin);
        $stmt1->execute();
        $res1 = $stmt1->get_result();
        $row = $res1->fetch_assoc();
        $farmer_pid = (int)($row['farmer_id'] ?? 0);

        if ($farmer_pid > 0) {
            $stmt2 = $conn->prepare("INSERT INTO `farmer_crops_trade` (`farmer_fkid`, `Trade_crop`, `Crop_quantity`, `costperkg`, `msp`) VALUES (?, ?, ?, ?, ?)");
            $initMsp = $costperkg + (int)ceil($costperkg * 0.5);
            $stmt2->bind_param("isdii", $farmer_pid, $trade_crop, $quantity, $costperkg, $initMsp);
            $stmt2->execute();

            $stmtCost = $conn->prepare("SELECT costperkg FROM farmer_crops_trade WHERE Trade_crop = ?");
            $stmtCost->bind_param("s", $trade_crop);
            $stmtCost->execute();
            $result = $stmtCost->get_result();
            while ($rowCost = $result->fetch_assoc()) {
                $x += (float)$rowCost["costperkg"];
                $y++;
            }

            if ($y > 0) {
                $avg = ceil($x / $y);
                $finalMsp = $avg + ceil($avg * 0.5);
                $stmtMsp = $conn->prepare("UPDATE farmer_crops_trade SET msp = ? WHERE Trade_crop = ?");
                $stmtMsp->bind_param("is", $finalMsp, $trade_crop);
                $stmtMsp->execute();
            }

            $stmtProd = $conn->prepare("UPDATE production_approx SET quantity = quantity + ? WHERE crop = ?");
            $stmtProd->bind_param("ds", $quantity, $trade_crop);
            $stmtProd->execute();

            echo "<script type='text/javascript'>alert('Crop Details Added Successfully'); window.location='ftradecrops.php';</script>";
            exit;
        }
    }
    echo "<script type='text/javascript'>alert('Invalid submission'); window.location='ftradecrops.php';</script>";
    exit;
}
?>