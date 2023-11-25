<?php 

session_start();
include '../db.php';

    if($_POST['status'] == 0){
        $query = $db->query("UPDATE pending SET PendingStatus = 1 WHERE PendingID = '".$_POST['id']."'");
        if($query){
            header('location: ../RiderPending.php');
        }
    }

    if($_POST['status'] != 0){
        $query = $db->query("UPDATE pending SET PendingStatus = 0 WHERE PendingID = '".$_POST['id']."'");
        if($query){
            header('location: ../RiderPending.php');
        }
    }


?>