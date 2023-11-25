<?php 

session_start();
include '../db.php';



$filenames = $_POST['name'].".png";
if(move_uploaded_file($_FILES['upload']['tmp_name'], "../Image/".$filenames)){
    echo "SUCC";
} else {
    echo 'err';
}

$query = $db->query("UPDATE menu SET MenuName = '".$_POST['name']."', MenuCate = '".$_POST['cate']."', MenuPrice = '".$_POST['price']."', MenuImg = '".$filenames."' WHERE MenuID = '".$_POST['id']."'");
header('location: ../InfoRest.php');


?>