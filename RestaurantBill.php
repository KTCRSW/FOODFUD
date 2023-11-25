
<?php 

    session_start();
    include './Assets/header.php';
    include './Assets/restaurant-nav.php';
    require './db.php';

    $data = $db->query("SELECT * FROM restaurant WHERE RestID = '".$_POST['restid']."'");
    if($rows = mysqli_fetch_array($data)){
        $order = $db->query("SELECT * FROM pending WHERE PendingID = '".$_POST['id']."'");
        while($row = mysqli_fetch_assoc($order)){
?>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title text-center"><?=$rows['RestName']?></h1>
        <p class="card-text text-center"><?=$rows['RestDetail']?></p>

        <hr>
        <div class="row">
        <h3 class="card-title">ใบเสร็จชำระเงิน</h3>
        
        <div class="col"><?php 
        
        $res = $db->query("SELECT * FROM menu WHERE MenuID = '".$row['MenuID']."'");
        if($mn = mysqli_fetch_assoc($res)){
            echo $mn['MenuName'];
        }
        ?></div>
          <div class="col text-right"></div>
          <div class="col text-right"></div>
          <div class="col text-right"></div>
          <div class="col text-right"></div>
          <div class="col text-right"><b><?=$row['Qty']." / ".$row['TotalPrice']?> บาท          <div class="col text-right">ราคาทั้งหมด : <?=$row['TotalPrice']?></b> </div>
</div>
        </div>
        <hr>
        <div class="col">
        <h3 class="card-title">ข้อมูลการจัดส่ง</h3>
          <div class="col text-right">ที่อยู่ลูกค้า / เบอร์โทรศัพท์ : <?php
                                                                    $resd = $db->query("SELECT * FROM users WHERE UserID = '" . $row['UserID'] . "'");
                                                                    if ($rd = mysqli_fetch_assoc($resd)) {
                                                                        echo $rd['UserAddress'] . " / " . $rd['UserPhone'];
                                                                    }
                                                                    ?>
                                                                    </div>

        </div>


      </div>
    </div>
    <button class="btn btn-warning text-white w-25 mt-3" align="right" onclick="history.back()">ย้อนกลับ</button>
</div>
<?php }
} ?>