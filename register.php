<?php 


    include './Assets/header.php';
    include './Assets/nav.php';
    require './db.php';


?>


<div class="container">
    <div class="card card-body mt-3 row">
        <center>
        <form id="form" action="App/Register.php" method="POST"enctype="multipart/form-data">

    <h5>สมัครสมาชิก</h5>
        <input type="text" class="form-control w-50 mt-2" name="username" placeholder="ชื่อผู้ใช้">
        <input type="password" class="form-control w-50 mt-2" name="password" placeholder="รหัสผ่าน">
        <input type="text" class="form-control w-50 mt-2" name="realname" placeholder="ชื่อจริง">
        <input type="text" class="form-control w-50 mt-2" name="phone" placeholder="เบอร์มือถือ">
        <input type="text" class="form-control w-50 mt-2" name="address" placeholder="ที่อยู่">
        <select name="role" id="" class="form-select mt-2 mb-2 w-50">
                        <option value="Customer">Customer</option>
                        <option value="Restaurant">Restaurant</option>
                        <option value="Rider">Rider</option>

                    </select>

        
        <input type="file" name="upload" id="" class="form-control w-50 mt-2">
        <button type="submit" class="btn btn-warning mt-2 w-50 text-white">สมัครสมาชิก</button><br>
        <a href="login.php" class=" mt-2 dropdown-item" style="color:blue;">มีบัญชีอยู่แล้ว</a>

    </form>
    </center>

    
    </div>
</div>