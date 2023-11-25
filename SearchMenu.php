<?php 

    session_start();
    include './Assets/header.php';
    include './Assets/customer-nav.php';
    require './db.php';


?>
        <div class="col-md-6 mx-auto">
            <form action="SearchMenu.php" method="post" class="input-group mb-3">
                <input type="search" name="search" class="form-control" placeholder="ค้นหาอาหาร">
                <button class="btn btn-outline-secondary" type="submit">ค้นหา</button>
            </form>
        </div>

    <div class="container-fluid row col mx-2" style="margin-top: 80px;">
    <?php 
    
    
    $resp = $db->query("SELECT * FROM menu WHERE MenuName = '".$_POST['search']."'");
    // echo $_POST['id'];
    while($row = mysqli_fetch_assoc($resp)):
    
    ?>
    

        <?php 
    
    
    $resp = $db->query("SELECT * FROM restaurant WHERE RestID = '".$row['RestID']."'");
    // echo $_POST['id'];
    if($nm = mysqli_fetch_assoc($resp)){
    
    ?>

<h4 class="mb-5">ยินดีต้อนรับสู่ร้าน <?=$nm['RestName']?></h4>
            <div class="box border border-gray rounded-3 mx-1" style="width: 475px;">
                <img src="./Image/<?=$row['MenuImg']?>" alt="" style="width:450px; height: 340px;" class="border rounded-3 my-2">
                <div class="content">
                    <p>ชื่อเมนู : <?=$row['MenuName']?></p>
                    <p>ราคา : <?=$row['MenuPrice']?></p>
                    <label for=""> </label>
                    <label for="">จำนวน</label>
                    <form action="App/AddCart.php" method="post">
                        <input type="number" name="qty" id="qty" min="1" value="1" class="form-select">
                        <input type="text" name="menuid" id="" value="<?=$row['MenuID']?>" hidden>
                        <input type="text" name="restid" id="" value="<?=$row['RestID']?>" hidden>
                        <input type="text" name="userid" id="" value="<?=$_SESSION['UserID']?>" hidden>
                        <input type="text" name="price" id="" value="<?=$row['MenuPrice']?>" hidden>
                    <button class="btn btn-success mb-2 mt-2 w-100">Add</button>
                    </form>

            </div>
        </div>
    
    <?php 
    }
    endwhile; ?>
    </div>
</div>