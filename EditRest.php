<?php 

    session_start();
    include './Assets/header.php';
    include './Assets/restaurant-nav.php';
    require './db.php';
    $result = $db->query("SELECT * FROM restaurant WHERE RestID = '".$_POST['restid']."'");
    if($row = mysqli_fetch_assoc($result)){
?>
<div class="container">
<div class="card card-body mt-3 row">
    <center>
        <form action="App/EditRest.php" method="post" enctype="multipart/form-data">
    <h5>แก้ไขร้านอาหาร</h5>
    <img src="./Image/<?=$row['RestImg']?>" width="128" alt="">
        <input type="text" class="form-select w-50 mt-2" name="name" placeholder="ชื่อเมนู" value="<?=$row['RestName']?>">
        <label for="" class="mt-2">ที่อยู่ / เบอร์โทรศัพท์</label>
        <input type="text" class="form-select w-50 mt-2" name="detail "placeholder="ราคา" value="<?=$row['RestDetail']?>">
        <input type="text" class="form-select w-50 mt-2" name="restid "placeholder="ราคา" value="<?=$_POST['restid']?>" hidden>
        <input type="text" class="form-select" name="restid" value="<?=$_SESSION['RestID']?>" hidden>

        <select name="cate" id="" class="form-select mt-2 mb-2 w-50">
                        <?php 
                        
                        $res = $db->query("SELECT * FROM cate_restaurant");
                        while($row = mysqli_fetch_assoc($res)):
                        
                        ?>
                        <option class="form-select" value="<?=$row['CateName']?>"><?=$row['CateName']?></option>
                        <?php endwhile; ?>
                    </select>
        </select>
        <input type="file" name="upload" id="" class="form-select w-50 mt-2">
        <button type="submit" class="btn btn-warning mt-2 w-50 text-white">แก้ไขข้อมูล</button>
    </form>
    </center>

    
    </div>
</div>
<?php } ?>