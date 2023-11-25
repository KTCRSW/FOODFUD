
<?php 


include './Assets/header.php';
include './Assets/nav.php';
require './db.php';

header('location: login.php');

?>

<body style="background-color: blanchedalmond;">
<center>

<div class="btn-group">
<img src="./Assets/bg.png" alt="" width="500">

    <form action="SearchRest.php" method="post" class="p-3">
    </form>

    </div>
    <?php 
    
    
    $resp = $db->query("SELECT * FROM restaurant");
    while($row = mysqli_fetch_assoc($resp)):
    
    ?>
    <h4 class="mt-2" style="color:red;">โปรดเข้าสู่ระบบเพื่อดูรายการอาหาร</h4>
    <hr>
    <h5 class="mt-2" style="">ร้านอาหารแนะนำ</h5>
    <div class="container-fluid row col mx-5 mb-3" style="">
            <div class="box border border-gray rounded-3 mx-5" style="width: 475px;">
                <img src="./Image/<?=$row['RestImg']?>" alt="" style="width:450px; height: 340px;" class="border rounded-3 my-2">
                <div class="content">
                    <p>ร้าน : <?=$row['RestName']?></p>
                    <p>ที่อยู่ / เบอร์โทรศัพท์ : <?=$row['RestDetail']?></p>  
                    <input type="text" name="id" id="" value="<?=$row['RestID']?>" hidden>
                    <button class="btn btn-success mb-2 w-100" type="submit"><a href="login.php" style="text-decoration:none;color:#fff;">เลือกดูร้านอาหาร</a></button>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>
</center>