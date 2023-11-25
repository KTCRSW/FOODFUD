<?php 


include '../db.php';



$filenames = $_POST['username'].".png";
if(move_uploaded_file($_FILES['upload']['tmp_name'], "../Image/".$filenames)){
    echo "SUCC";
} else {
    echo 'err';
}

$query = $db->query("INSERT INTO users(UserID, UserName, UserPassword, UserRealName, UserAddress, UserPhone, UserRole, UserStatus, UserImg)
VALUE ('', '".$_POST['username']."', '".$_POST['password']."', '".$_POST['realname']."', '".$_POST['address']."', '".$_POST['phone']."', '".$_POST['role']."', 0, '".$filenames."')");
if($query){
    header('location: ../Login.php');
}

?>