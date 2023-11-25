<?php 

    session_start();
    include './Assets/header.php';
    include './Assets/restaurant-nav.php';
    require './db.php';

?>
<div class="container">
    <div class="card card-body">
        <h5>เพิ่มหมวดหมู่ร้านอาหาร</h5>
        <form action="App/CreateCateMenu.php" method="post">
        <input type="text" class="form-control" name="name">
        <input type="text" class="form-control" name="id" value="<?=$_SESSION['RestID']?>" hidden>
        <button type="submit" class="btn btn-success mt-2 w-100">เพิ่มหมวดหมู่</button>
        </form>
        <table class="
        table
        "
        >
    <thead>
        <th>#</th>
        <th>ชื่อหมวดหมู่</th>
        <th>จัดการ</th>
    </thead>
    <tbody>
        <?php 
        
        $res = $db->query("SELECT * FROM menu_category WHERE RestID = '".$_SESSION['RestID']."'");
        while($row = mysqli_fetch_assoc($res)):
        ?>
        <tr>
            <td><?=$row['MenuCateID']?></td>
            <td><?=$row['MenuCateName']?></td>
            <td>
                <form action="App/DeleteCateMenu.php" method="post">
                    <input type="text" name="id" value="<?=$row['MenuCateID']?>" hidden>
                    <button type="submit" class="btn btn-danger">ลบ</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</div>
<div class="card card-body mt-3 ">
<form action="App/CreateMenu.php" method="post" enctype="multipart/form-data">
        <h5>เพิ่มเมนูอาหาร</h5>
        <input type="text" class="form-control w-50 mt-2" name="name" placeholder="ชื่อเมนู">
        <input type="text" class="form-control w-50 mt-2" name="price"placeholder="ราคา">
        <input type="text" class="form-control" name="id" value="<?=$_SESSION['RestID']?>" hidden>

        <select name="cate" id="" class="form-select mt-2 mb-2 w-50">
                        <?php 
                        
                        $res = $db->query("SELECT * FROM menu_category WHERE RestID = '".$_SESSION['RestID']."'");
                        while($row = mysqli_fetch_assoc($res)):
                        
                        ?>
                        <option class="form-control" value="<?=$row['MenuCateName']?>"><?=$row['MenuCateName']?></option>
                        <?php endwhile; ?>
        </select>
        </select>
        <input type="file" name="upload" id="" class="form-control w-50 mt-2">
        <button type="submit" class="btn btn-success mt-2 w-50">เพิ่มเมนูอาหาร</button>
    </form>
    <table class="
        table
        mt-2
        "
        >
    <thead>
        <th>#</th>
        <th>ชื่อเมนูอาหาร</th>
        <th>ประเภทเมนูอาหาร</th>
        <th>ราคา</th>
        <th>จัดการ</th>
        <th>แก้ไข</th>
        <th>รูป</th>
    </thead>
    <tbody>
        <?php 
        
        $res = $db->query("SELECT * FROM menu WHERE RestID = '".$_SESSION['RestID']."'");
        while($row = mysqli_fetch_assoc($res)):
        ?>
        <tr>
            <td><?=$row['MenuID']?></td>
            <td><?=$row['MenuName']?></td>
            <td><?=$row['MenuCate']?></td>
            <td><?=$row['MenuPrice']?></td>
            <td>
            <form action="App/DeleteMenu.php" method="post">
                    <input type="text" name="id" value="<?=$row['MenuID']?>" hidden>
                    <button type="submit" class="btn btn-danger">ลบ</button>
                </form>
                </form>
                
            </td>
            <td>
            <form action="EditMenu.php" method="post">
                    <input type="text" name="id" value="<?=$row['MenuID']?>" hidden>
                    <input type="text" name="restid" value="<?=$_SESSION['RestID']?>" hidden>
                    <button type="submit" class="btn btn-warning text-white">แก้ไขเมนู</button>
                </form>
            </td>
            <td><img src="./Image/<?=$row['MenuImg']?>" width="64" alt=""></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
        </table>
    </div>
<div class="card card-body mt-3 " style="margin-bottom: 5%;">
    <h5>รายการอาหาร</h5>
    <table class="
        table
        mt-2
        "
        >
    <thead>
        <th>#</th>
        <th>อาหาร</th>
        <th>ผู้รับอาหาร</th>
        <th>ไรเดอร์</th>
        <th>ราคา</th>
        <th>การชำระเงิน</th>
        <th>สถานะร้านอาหาร</th>
        <th>สถานะไรเดอร์</th>
        <th>สถานะการจัดส่ง</th>
        <th></th>

    </thead>
    <tbody>
        <?php 
        
        $res = $db->query("SELECT * FROM pending WHERE RestID = '".$_SESSION['RestID']."'");
        while($row = mysqli_fetch_assoc($res)):
        ?>
        <tr>
            <td><?=$row['PendingID']?></td>
            <td>
            <?php 
        
        $res = $db->query("SELECT * FROM menu WHERE MenuID = '".$row['MenuID']."'");
        if($mn = mysqli_fetch_assoc($res)){
            echo $mn['MenuName'];
        }
        ?>
            </td>
            <td><?php 
        
        $res = $db->query("SELECT * FROM users WHERE UserID = '".$row['UserID']."'");
        if($us = mysqli_fetch_assoc($res)){
            echo $us['UserRealName'];
        }
        ?></td>
            <td><?php 
        
        $res = $db->query("SELECT * FROM users WHERE UserID = '".$row['RiderID']."'");
        if($rd = mysqli_fetch_assoc($res)){
            echo $rd['UserRealName'];
        }
        ?></td>
            <td><?=$row['TotalPrice']?></td>
            <td><?=$row['PendingPayment']?></td>
            <td>
                <form action="App/UpdatePendingRest.php" method="post">
                    <input type="text" name="status" id="" value="<?=$row['RestStatus']?>" hidden>
                    <input type="text" name="id" id="" value="<?=$row['PendingID']?>" hidden>
                    <?php 
                    
                    if($row['RestStatus'] == 0){
                        echo '<button class="btn btn-danger" type="submit">กำลังเตรียมอาหาร</button>';
                    }
                    if($row['RestStatus'] == 1){
                        echo '<button class="btn btn-success" type="submit">เตรียมอาหารเสร็จสิน</button>';
                    }
                    
                    
                    ?>
                </form>
            </td>
            <td>
                <form action="" method="post">
                    <input type="text" name="id" id="" value="<?=$row['PendingID']?>" hidden>
                    <?php 
                    
                    if($row['RiderStatus'] == 0){
                        echo '<p class="" style="color: red;" type="submit">กำลังค้นหาไรเดอร์</p>';
                    }
                    if($row['RiderStatus'] == 1){
                        echo '<p class=""  style="color: green;" type="submit">พบไรเดอร์แล้ว</p>';
                    }
                    
                    
                    ?>
                </form>
            </td>
            <td>
                <form action="" method="post">
                    <input type="text" name="id" id="" value="<?=$row['PendingID']?>" hidden>
                    <?php 
                    
                    if($row['PendingStatus'] == 0){
                        echo '<p class="" style="color: red;" type="submit">กำลังจัดส่ง</p>';
                    }
                    if($row['PendingStatus'] == 1){
                        echo '<p class=""  style="color: green;" type="submit">จัดส่งสำเร็จ</p>';
                    }
                    
                    
                    ?>
                </form>
            </td>
            <td>
                <form action="./RestaurantBill.php" method="post">
                    <input type="text" name="id" id="" value="<?=$row['PendingID']?>" hidden>
                    <input type="text" name="restid" id="" value="<?=$row['RestID']?>" hidden>
                    <button class="btn btn-success">ออกใบเสร็จ</button>
                </form>
            </td>
        
        </tr>
        <?php endwhile; ?>
    </tbody>
        </table>
    </div>
</div>