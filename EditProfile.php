<?php 

    session_start();
    include './Assets/header.php';
    if($_SESSION['UserRole'] == 'Customer'){    include './Assets/customer-nav.php';}
    if($_SESSION['UserRole'] == 'Restaurant'){    include './Assets/restaurant-nav.php';}
    if($_SESSION['UserRole'] == 'admin'){    include './Assets/admin-nav.php';}
    require './db.php';
    $result = $db->query("SELECT * FROM users WHERE UserID = '".$_SESSION['UserID']."'");
    while($row = mysqli_fetch_assoc($result)){
        ?>
<div class="container">
    <div class="card card-body mt-3 row">
        <center>
            <form action="App/EditProfile.php" method="post" enctype="multipart/form-data">
                <img src="./Image/<?=$row['UserImg']?>" width="128" alt="">
    <h5>แก้ไขข้อมูล</h5>
        <input type="text" class="form-control w-50 mt-2" name="name" placeholder="<?=$_SESSION['UserRealName']?>" value="<?=$row['UserRealName']?>">
        <input type="text" class="form-control w-50 mt-2" name="address" placeholder="<?=$row['UserAddress']?>" value="<?=$row['UserAddress']?>" >
        <input type="text" class="form-control w-50 mt-2" name="phone" placeholder="<?=$row['UserPhone']?>" value="<?=$row['UserPhone']?>" >

        
        <input type="file" name="upload" id="" class="form-control w-50 mt-2">
        <button type="submit" class="btn btn-warning mt-2 w-50 text-white">แก้ไขข้อมูล</button>
    </form>
    </center>

    
    </div>
    <div class="card card-body mt-3 row">
        <center>
            <form action="App/ChangePassword.php" method="post" enctype="multipart/form-data">
    <h5>เปลี่ยนรหัสผ่าน</h5>
        <input type="text" class="form-control w-50 mt-2" name="password" placeholder="รหัสผ่านเก่า" >
        <input type="text" class="form-control w-50 mt-2" name="newpassword" placeholder="รหัสผ่านใหม่" >

        
        <button type="submit" class="btn btn-warning mt-2 w-50 text-white">แก้ไขข้อมูล</button>
    </form>
    </center>

    
    </div>
</div>
<?php } ?>