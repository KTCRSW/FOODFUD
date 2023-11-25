<?php 

    session_start();
    include './Assets/header.php';
    include './Assets/admin-nav.php';
    require './db.php';


?>
<div class="container">
    <div class="card card-body input">
        <h5>เพิ่มหมวดหมู่ร้านอาหาร</h5>
        <form action="App/CreateCate.php" method="post">
        <input type="text" class="form-control" name="name" placeholder="กรอกชื่อหมวดหมู่">
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
        
        $res = $db->query("SELECT * FROM cate_restaurant");
        while($row = mysqli_fetch_assoc($res)):
        ?>
        <tr>
            <td><?=$row['CateID']?></td>
            <td><?=$row['CateName']?></td>
            <td>
                <form action="App/DeleteCate.php" method="post">
                    <input type="text" name="id" value="<?=$row['CateID']?>" hidden>
                    <button type="submit" class="btn btn-danger">ลบ</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
        </table>
    </div>
    <div class="card card-body mt-3">
    <table class="
        table
        "
        >
    <thead>
        <th>#</th>
        <th>ชื่อร้านอาหาร</th>
        <th>ประเภทร้านอาหาร</th>
        <th>รายละเอียด</th>
        <th>สถานะ</th>
        <th>จัดการ</th>
        <th>รูป</th>
    </thead>
    <tbody>
        <?php 
        
        $res = $db->query("SELECT * FROM restaurant");
        while($row = mysqli_fetch_assoc($res)):
        ?>
        <tr>
            <td><?=$row['RestID']?></td>
            <td><?=$row['RestName']?></td>
            <td><?=$row['RestCate']?></td>
            <td><?=$row['RestDetail']?></td>
            <td>
                <form action="App/UpdateRest.php" method="post">
                <input type="text" name="status" value="<?=$row['RestStatus']?>" hidden>
                    <input type="text" name="id" value="<?=$row['RestID']?>" hidden>
                    <?php 
                    
                    if($row['RestStatus'] == 1){
                        echo '<button type="submit" class="btn btn-success">อนุมัติ</button>';
                    }
                    
                    if($row['RestStatus'] == 0){
                        echo '<button type="submit" class="btn btn-danger">ระงับการใช้งาน</button>';
                    }
                    
                    
                    
                    ?>
                </form>
                
            </td>
            <td><form action="App/DeleteRest.php" method="post">
                <input type="text" name="status" value="<?=$row['RestStatus']?>" hidden>
                    <input type="text" name="id" value="<?=$row['RestID']?>" hidden>
                    <button type="submit" class="btn btn-danger">ลบ</button>
                </form></td>
            <td><img src="./Image/<?=$row['RestImg']?>" alt="" width="64"></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
        </table>
    </div>
</div>