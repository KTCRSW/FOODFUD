<?php 

session_start();
include '../db.php';



$filenames = $_POST['name'].".png";
if(move_uploaded_file($_FILES['upload']['tmp_name'], "../Image/".$filenames)){
    $query = $db->query("UPDATE users SET  UserImg = '".$filenames."' WHERE UserID = '".$_SESSION['UserID']."'");
} else {
    echo 'err';
}

$query = $db->query("UPDATE users SET UserRealName = '".$_POST['name']."', UserAddress = '".$_POST['address']."', UserPhone = '".$_POST['phone']."' WHERE UserID = '".$_SESSION['UserID']."'");
header('location: ../EditProfile.php');


?>