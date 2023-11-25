<?php 


include '../db.php';


$query = $db->query("DELETE FROM cate_restaurant WHERE CateID = '".$_POST['id']."'");
if($query){
    header('location: ../AdminMng.php');
}

?>