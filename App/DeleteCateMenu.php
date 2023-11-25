<?php 

session_start();
include '../db.php';


$query = $db->query("DELETE FROM menu_category WHERE MenuCateID = '".$_POST['id']."'");
if($query){
    header('location: ../InfoRest.php');
}

?>