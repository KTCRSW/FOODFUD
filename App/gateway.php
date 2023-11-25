<?php 

    session_start();
    $_SESSION['RestID'] = $_POST['restid'];
    header('location: ../InfoRest.php');


?>