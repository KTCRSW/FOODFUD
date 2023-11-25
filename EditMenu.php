<?php 

    session_start();
    include './Assets/header.php';
    include './Assets/restaurant-nav.php';
    require './db.php';
    $result = $db->query("SELECT * FROM menu WHERE RestID = '".$_POST['restid']."' AND MenuID = '".$_POST['id']."'");
    if($row = mysqli_fetch_assoc($result)){
?>
<div class="container">
<div class="card card-body mt-3 row">
    <center>
        <form action="App/EditMenu.php" method="post" enctype="multipart/form-data">
    <h5>แก้ไขเมนูอาหาร</h5>
    <img src="./Image/<?=$row['MenuImg']?>" width="128" alt="">
        <input type="text" class="form-select w-50 mt-2" name="name" placeholder="ชื่อเมนู" value="<?=$row['MenuName']?>">
        <input type="text" class="form-select w-50 mt-2" name="price" placeholder="ราคา" value="<?=$row['MenuPrice']?>">
        <input type="text" class="form-select w-50 mt-2" name="id" placeholder="ราคา" value="<?=$row['MenuID']?>" hidden>
        <input type="text" class="form-select" name="restid" value="<?=$_SESSION['RestID']?>" hidden>

        <select name="cate" id="" class="form-select mt-2 mb-2 w-50">
                        <?php 
                        
                        $res = $db->query("SELECT * FROM menu_category WHERE RestID = '".$_POST['restid']."'");
                        while($row = mysqli_fetch_assoc($res)):
                        
                        ?>
                        <option class="form-select" value="<?=$row['MenuCateName']?>"><?=$row['MenuCateName']?></option>
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