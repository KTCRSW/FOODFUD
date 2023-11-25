<?php 

session_start();
include '../db.php';


$query = $db->query("INSERT INTO menu_category(MenuCateID, MenuCateName, RestID)
VALUE ('', '".$_POST['name']."', '".$_POST['id']."')");
if($query){
    header('location: ../InfoRest.php');
}

?>