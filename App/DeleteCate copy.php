<?php 


include '../db.php';


$query = $db->query("DELETE FROM restaurant WHERE RestID = '".$_POST['id']."'");
if($query){
    header('location: ../Restaurant.php');
}

?>