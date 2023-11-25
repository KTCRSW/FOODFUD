<?php 

    session_start();

    require_once '../db.php';
    $detail = $_SESSION['UserAddress']."".$_SESSION['UserPhone'];
    $Bill = $db->query("INSERT INTO 
    pending
    (
        PendingID
    , 
    CartID
    , 
    RiderID
    , 
    UserID
    , 
    RestID
    , 
    MenuID
    , 
    Qty
    ,
    PendingDetail
    
    ,
    TotalPrice
    , 
    PendingStatus
    , 
    RestStatus
    , 
    RiderStatus
    , 
    PendingPayment
    ) value ('', '".$_POST['cartid']."', '0', '".$_POST['userid']."'
    , '".$_POST['restid']."', '".$_POST['id']."', '".$_POST['qty']."', '".$detail."', '".$_POST['total']."', '0', '0', '0', 'ชำระเงินปลายทาง')");

    if($Bill){
        $result = $db->query("DELETE FROM cart WHERE CartID = '".$_POST['cartid']."'");
        header('location: ../CustomerPending.php');
    }
?>