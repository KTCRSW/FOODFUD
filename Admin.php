<?php 

    session_start();
    include './Assets/header.php';
    include './Assets/admin-nav.php';
    require './db.php';


?>
<div class="container">
    <div class="card card-body">
        <table class="
        table
        "
        >
    <thead>
        <th>#</th>
        <th>ชื่อผู้ใช้</th>
        <th>ชื่อจริง</th>
        <th>รหัสผ่าน</th>
        <th>ที่อยู่ / เบอร์โทรศัพท์</th>
        <th>ระดับ</th>
        <th>รูป</th>
        <th>สถานะ</th>
    </thead>
    <tbody>
        <?php 
        
        $resp = $db->query("SELECT * FROM users");
        while($row = mysqli_fetch_assoc($resp)):
        ?>
        <tr>
            <td><?=$row['UserID']?></td>
            <td><?=$row['UserName']?></td>
            <td><?=$row['UserRealName']?></td>
            <td><?=$row['UserPassword']?></td>
            <td><?=$row['UserAddress']." / ".$row['UserPhone']?></td>
            <td><?=$row['UserRole']?></td>
            <td><img src="./Image/<?=$row['UserImg']?>" alt="" width="64"></td>
            <td>
                <form action="App/UpdateStatus.php" method="post">
                    <input type="text" name="status" value="<?=$row['UserStatus']?>" hidden>
                    <input type="text" name="id" value="<?=$row['UserID']?>" hidden>
                    <?php 
                    
                    if($row['UserStatus'] == 1){
                        echo '<button type="submit" class="btn btn-success">อนุมัติแล้ว</button>';
                    }
                    
                    if($row['UserStatus'] == 0){
                        echo '<button type="submit" class="btn btn-danger">ระงับการใช้งาน</button>';
                    }
                    
                    
                    
                    ?>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
        </table>
    </div>
</div>