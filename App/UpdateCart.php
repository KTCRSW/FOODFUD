<?php 


include '../db.php';


        $query = $db->query("UPDATE cart SET MenuQty = '".$_POST['Qty']."' WHERE CartID = '".$_POST['id']."'");
        if($query){
        header('location: ../Cart.php');
        }
        if($_POST['Qty'] == 0){
            $query = $db->query("DELETE FROM cart where CartID = '".$_POST['id']."'");
            if($query){
            header('location: ../Cart.php');
            }
        }


?>