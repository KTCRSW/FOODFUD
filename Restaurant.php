<?php 

    session_start();
    include './Assets/header.php';
    include './Assets/restaurant-nav.php';
    require './db.php';


?>
<div class="container">
    <button class="btn btn-success mt-2 mb-2"><a href="CreateRest.php" style="color:#fff; text-decoration:none;" >
        เพิ่มร้านอาหาร
    </a></button>
    <div class="card card-body">
        <table class="
        table
        "
        >
    <thead>
        <th>#</th>
        <th>ชื่อร้านอาหาร</th>
        <th>ประเภทร้านอาหาร</th>
        <th>รายละเอียด</th>
        <th>จัดการ</th>
        <th></th>
        <th></th>
        <th>รูป</th>
    </thead>
    <tbody>
        <?php 
        
        $resp = $db->query("SELECT * FROM restaurant WHERE UserID = '".$_SESSION['UserID']."'");
        while($row = mysqli_fetch_assoc($resp)):
        ?>
        <tr>
            <td><?=$row['RestID']?></td>
            <td><?=$row['RestName']?></td>
            <td><?=$row['RestCate']?></td>
            <td><?=$row['RestDetail']?></td>
            <td>
                <form action="App/gateway.php" method="post">
                    <input type="text" value="<?=$row['RestID']?>" hidden name="restid">
                    <?php 
                    
                    if($row['RestStatus'] == 1){
                        echo '<button type="submit" class="btn btn-success">จัดการร้านค้า</button>';
                    }
                    
                    if($row['RestStatus'] == 0){
                        echo '<button type="submit" class="btn btn-danger disabled">ยังไม่ได้รับการอนุมัติ</button>';
                    }
                    
                    
                    
                    ?>
                </form>
            </td>
            <td>
                <form action="EditRest.php" method="post">
                    <input type="text" value="<?=$row['RestID']?>" hidden name="restid">
                    <button type="submit" class="btn btn-warning text-white">แก้ไขข้อมูล</button>
                </form>
            </td>
            <td>
                <form action="DeleteRest.php" method="post">
                    <input type="text" value="<?=$row['RestID']?>" hidden name="id">
                    <button type="submit" class="btn btn-danger text-white">ลบร้านอาหาร</button>
                </form>
            </td>
            <td><img src="./Image/<?=$row['RestImg']?>" width="64" alt=""></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
        </table>
    </div>
</div>