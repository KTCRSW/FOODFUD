<?php 


include '../db.php';


$query = $db->query("DELETE FROM menu WHERE MenuID = '".$_POST['id']."'");
if($query){
    header('location: ../InfoRest.php');
}

?>