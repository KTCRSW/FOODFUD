<?php 

session_start();
include '../db.php';


$filename = $_POST['name'].".png";
if(move_uploaded_file($_FILES['upload']['tmp_name'], "../Image/".$filename)){
    echo 'scc';
} else {
    echo 'err';
}
$detail = $_POST['address']." / ".$_POST['phone'];
$REG = "INSERT INTO restaurant(RestID, RestName, RestCate, UserID, RestDetail, RestStatus, RestImg) value 
('', '".$_POST['name']."', '".$_POST['cate']."', '".$_SESSION['UserID']."', '$detail', 0, '$filename')";
$query = $db->query($REG);
if($query){
    header('location: ../Restaurant.php');
}

?>