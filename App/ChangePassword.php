<?php 

session_start();
include '../db.php';

        $PASS = $_POST['newpassword'];
        $query = $db->query("UPDATE users SET UserPassword = '$PASS' WHERE UserID = '".$_SESSION['UserID']."'");
        if($query){
            header('location: ../Login.php');
        }



?>