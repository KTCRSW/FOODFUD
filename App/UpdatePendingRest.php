<?php 

session_start();
include '../db.php';

    if($_POST['status'] == 0){
        $query = $db->query("UPDATE pending SET RestStatus = 1 WHERE PendingID = '".$_POST['id']."'");
        if($query){
            header('location: ../InfoRest.php');
        }
    }

    if($_POST['status'] == 1){
        $query = $db->query("UPDATE pending SET RestStatus = 0 WHERE PendingID = '".$_POST['id']."'");
        if($query){
            header('location: ../InfoRest.php');
        }
    }


?>