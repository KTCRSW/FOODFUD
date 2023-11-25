<?php 

    session_start();
    include './Assets/header.php';
    include './Assets/customer-nav.php';
    require './db.php';

?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <form action="SearchMenu.php" method="post" class="input-group mb-3">
                <input type="search" name="search" class="form-control" placeholder="ค้นหาอาหาร">
                <button class="btn btn-outline-secondary" type="submit">ค้นหา</button>
            </form>
        </div>
    </div>

    <div class="row mt-4">
        <?php 
            $resp = $db->query("SELECT * FROM menu WHERE RestID = '".$_POST['id']."'");
            while($row = mysqli_fetch_assoc($resp)):
        ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="./Image/<?=$row['MenuImg']?>" alt="<?=$row['MenuName']?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?=$row['MenuName']?></h5>
                    <p class="card-text">ราคา : <?=$row['MenuPrice']?></p>
                    <form action="App/AddCart.php" method="post">
                        <div class="mb-2">
                            <label for="qty" class="form-label">จำนวน</label>
                            <input type="number" name="qty" id="qty" min="1" value="1" class="form-control">
                        </div>
                        <input type="text" name="menuid" value="<?=$row['MenuID']?>" hidden>
                        <input type="text" name="restid" value="<?=$row['RestID']?>" hidden>
                        <input type="text" name="userid" value="<?=$_SESSION['UserID']?>" hidden>
                        <input type="text" name="price" value="<?=$row['MenuPrice']?>" hidden>
                        <button type="submit" class="btn btn-success w-100">เพิ่มลงในรถเข็น</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
