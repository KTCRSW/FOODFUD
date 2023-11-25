<?php 

session_start();
include '../db.php';

$data = "SELECT * FROM cart WHERE MenuID = '".$_POST['menuid']."'";
$query = $db->query($data);
$num = mysqli_num_rows($query);

if($num > 0) {
    $existingCartItem = mysqli_fetch_assoc($query);
    $qty = $existingCartItem['MenuQty'] + $_POST['qty'];
    $updateCart = $db->query("UPDATE cart SET MenuQty = '$qty' WHERE MenuID = '".$_POST['menuid']."'");
    header('location: ../Cart.php');
} else {
    $insertCart = $db->query("INSERT INTO cart(CartID, RestID, UserID, MenuID, MenuPrice, MenuQty) VALUES ('', '".$_POST['restid']."', '".$_POST['userid']."', '".$_POST['menuid']."', '".$_POST['price']."', '".$_POST['qty']."')");
    header('location: ../Cart.php');
}
?>
