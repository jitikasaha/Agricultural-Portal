<?php
session_start();
require('../sql.php'); // Includes SQL connection script

$userlogin = $_SESSION['customer_login_user'] ?? '';
$custId = 0;
if ($userlogin) {
    $resCust = mysqli_query($conn, "SELECT cust_id FROM custlogin WHERE email = '" . mysqli_real_escape_string($conn, $userlogin) . "'");
    if ($rowC = mysqli_fetch_assoc($resCust)) {
        $custId = (int)$rowC['cust_id'];
    }
}

if (isset($_POST['add_to_cart'])) {
    $crop = trim($_POST['crops'] ?? '');
    $quantity = (int)($_POST['quantity'] ?? 0);
    $tradeID = (int)($_POST['tradeid'] ?? 0);
    $price = (int)($_POST['price'] ?? 0);

    if ($crop !== '' && $quantity > 0) {
        $stmt = $conn->prepare("INSERT INTO `cart` (`cust_id`, `cropname`, `quantity`, `price`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isii", $custId, $crop, $quantity, $price);
        $stmt->execute();
    }

    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($tradeID, $item_array_id)) {
            $item_array = array(
                'item_id' => $tradeID,
                'item_name' => $crop,
                'item_price' => $price,
                'item_quantity' => $quantity
            );
            array_push($_SESSION['shopping_cart'], $item_array);
        } else {
            echo '<script>alert("Item Already Added")</script>';
        }
    } else {
        $item_array = array(
            'item_id' => $tradeID,
            'item_name' => $crop,
            'item_price' => $price,
            'item_quantity' => $quantity
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
    header("Location: cbuy_crops.php?action=add&id=$tradeID");
    exit;
}


		
?>	