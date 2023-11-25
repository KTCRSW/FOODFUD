<?php 


include '../db.php';


$query = $db->query("INSERT INTO cate_restaurant(CateID, CateName)
VALUE ('', '".$_POST['name']."')");
if($query){
    header('location: ../AdminMng.php');
}

?>