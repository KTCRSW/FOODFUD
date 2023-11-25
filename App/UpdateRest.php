<?php 


include '../db.php';

    if($_POST['status'] == 0){
        $query = $db->query("UPDATE restaurant SET RestStatus = 1 WHERE RestID = '".$_POST['id']."'");
        if($query){
            header('location: ../AdminMng.php');
        }
    }

    if($_POST['status'] == 1){
        $query = $db->query("UPDATE restaurant SET RestStatus = 0 WHERE RestID = '".$_POST['id']."'");
        if($query){
            header('location: ../AdminMng.php');
        }
    }


?>