
<?php 


    include './Assets/header.php';
    include './Assets/nav.php';
    require './db.php';


?>


<center>
<div class="container" style="margin-top: 9%;">
    <div class="card card-body mt-5 w-50 ">
        <form id="form" action="App/Auth.php" method="POST"enctype="multipart/form-data">
    <h1><b>เข้าสู่ระบบ</b> </h1>
        <input type="text" class="form-control w-50 mt-2" name="username" placeholder="ชื่อผู้ใช้">
        <input type="password" class="form-control w-50 mt-2" name="password" placeholder="รหัสผ่าน">
        <button type="submit" class="btn btn-warning mt-2 w-50 text-white">เข้าสู่ระบบ</button>
        <a href="register.php" class=" mt-2 dropdown-item" style="color:blue;">ยังไม่มีบัญชี ?</a>

    </form>
    
    
</div>
</div>
</center>