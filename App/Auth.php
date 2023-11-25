<?php 

    session_start();
    require '../db.php';

    $USER = $_POST['username'];
    $PASS = $_POST['password'];

    $Auth = "SELECT * FROM users WHERE UserName = '$USER' AND UserPassword = '$PASS'";
    $query = $db->query($Auth);
    if($row = mysqli_fetch_array($query)){
        $_SESSION['UserID'] = $row['UserID'];
        $_SESSION['UserName'] = $row['UserName'];
        $_SESSION['UserPassword'] = $row['UserPassword'];
        $_SESSION['UserRealName'] = $row['UserRealName'];
        $_SESSION['UserAddress'] = $row['UserAddress'];
        $_SESSION['UserPhone'] = $row['UserPhone'];
        $_SESSION['UserRole'] = $row['UserRole'];
        $_SESSION['UserStatus'] = $row['UserStatus'];
        $_SESSION['UserImg'] = $row['UserImg'];
        if($_SESSION['UserName'] == $USER AND $_SESSION['UserPassword'] == $PASS){
            if($_SESSION['UserRole'] == 'Customer' AND $_SESSION['UserStatus'] == 1){
                header('location: ../Customer.php');
            }
            if($_SESSION['UserRole'] == 'Restaurant' AND $_SESSION['UserStatus'] == 1){
                header('location: ../Restaurant.php');
            }
            if($_SESSION['UserRole'] == 'Rider' AND $_SESSION['UserStatus'] == 1){
                header('location: ../Rider.php');
            }
            if($_SESSION['UserRole'] == 'admin' AND $_SESSION['UserStatus'] == 1){
                header('location: ../Admin.php');
            } else {
                echo "<p style='color: red;'>โปรดติดต่อผู้ดูแล</p>";
                // header('location: fail.php');
            }
        }else {
            echo "<p style='color: red;'>โปรดติดต่อผู้ดูแล</p>";
            header('location: fail.php');
        }
    }else {
        echo "<p style='color: red;'>โปรดติดต่อผู้ดูแล</p>";
        header('location: fail.php');
        
    }

?>