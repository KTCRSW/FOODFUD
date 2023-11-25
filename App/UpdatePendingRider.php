<?php 

session_start();
include '../db.php';

    if($_POST['status'] == 0){
        $query = $db->query("UPDATE pending SET RiderID = '".$_SESSION['UserID']."' WHERE PendingID = '".$_POST['id']."'");
        if($query){
            $res = $db->query("UPDATE pending SET RiderStatus = 1 WHERE PendingID = '".$_POST['id']."'");
            header('location: ../Rider.php');
        }
    }

    if($_POST['status'] != 0){
        $query = $db->query("UPDATE pending SET RiderID = 0 WHERE PendingID = '".$_POST['id']."'");
        if($query){
            $res = $db->query("UPDATE pending SET RiderStatus = 0 WHERE PendingID = '".$_POST['id']."'");
            header('location: ../Rider.php');
        }
    }


?>