<?php 


include '../db.php';



$filenames = $_POST['name'].".png";
if(move_uploaded_file($_FILES['upload']['tmp_name'], "../Image/".$filenames)){
    echo "SUCC";
} else {
    echo 'err';
}

$query = $db->query("UPDATE restaurant SET RestName = '".$_POST['name']."', RestCate = '".$_POST['cate']."', RestImg = '".$filenames."' WHERE RestID = '".$_POST['restid']."'");
header('location: ../Restaurant.php');


?>