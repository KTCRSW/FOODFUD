<?php 

    session_start();
    include './Assets/header.php';
    include './Assets/rider-nav.php';
    require './db.php';



?>
    <div class="container-fluid row col mx-2">

<div class="card card-body mt-3 row">
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

    </thead>
    <tbody>
        <?php 
        
        $res = $db->query("SELECT * FROM pending WHERE RiderID = '".$_SESSION['UserID']."'");
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
                        echo '<p style="color: red;">กำลังเตรียมอาหาร</p>';
                    }
                    if($row['RestStatus'] == 1){
                        echo '<p  style="color: green;">เตรียมอาหารเสร็จสิน</p>';
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
                    if($row['RiderStatus'] = 1){
                        echo '<p class=""  style="color: green;" type="submit">พบไรเดอร์แล้ว</p>';
                    }
                    
                    
                    ?>
                </form>
            </td>
            <td>
            <form action="App/UpdatePendingStatus.php" method="post">
                    <input type="text" name="status" id="" value="<?=$row['PendingStatus']?>" hidden>
                    <input type="text" name="id" id="" value="<?=$row['PendingID']?>" hidden>
                    <?php 
                    
                    if($row['PendingStatus'] == 0){
                        echo '<button class="btn btn-danger" type="submit">ยังไม่ชำระเงิน</button>';
                    }
                    if($row['PendingStatus'] == 1){
                        echo '<button class="btn btn-success" type="submit">ชำระเงินเสร็จสิ้น</button>';
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