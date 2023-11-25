<?php 


include '../db.php';

    if($_POST['status'] == 0){
        $query = $db->query("UPDATE users SET UserStatus = 1 WHERE UserID = '".$_POST['id']."'");
        if($query){
            header('location: ../Admin.php');
        }
    }

    if($_POST['status'] == 1){
        $query = $db->query("UPDATE users SET UserStatus = 0 WHERE UserID = '".$_POST['id']."'");
        if($query){
            header('location: ../Admin.php');
        }
    }


?>