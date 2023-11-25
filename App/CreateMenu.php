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
$REG = "INSERT INTO menu(MenuID, RestID, MenuName, MenuCate, MenuPrice, MenuImg) value 
('', '".$_POST['id']."', '".$_POST['name']."', '".$_POST['cate']."', '".$_POST['price']."', '$filename')";
$query = $db->query($REG);
if($query){
    header('location: ../InfoRest.php');
}

?>