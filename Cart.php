<?php 

session_start();
include './Assets/header.php';
include './Assets/customer-nav.php';
require './db.php';
$totalbill = 0;
error_reporting(0);
?>

<style>
    th {
        font-size: 14px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-body">
                <table class="table">
                    <thead>
                        <th>#</th>
                        <th>ร้าน</th>
                        <th>รายการอาหาร</th>
                        <th>จำนวน / ราคาต่อหน่วย</th>
                        <th>แก้ไข</th>
                    </thead>
                    <tbody>
                        <?php 

                        $resp = $db->query("SELECT * FROM cart");
                        while($row = mysqli_fetch_assoc($resp)):
                        ?>
                        <tr>
                            <td><?=$row['CartID']?></td>
                            <td>
                                <?php 

                                $resps = $db->query("SELECT * FROM Restaurant WHERE RestID = '".$row['RestID']."'");
                                if($rs = mysqli_fetch_assoc($resps)){
                                    echo $rs['RestName'];
                                }
                                ?>
                            </td>
                            <td>
                                <?php 

                                $resps = $db->query("SELECT * FROM menu WHERE MenuID = '".$row['MenuID']."'");
                                if($rs = mysqli_fetch_assoc($resps)){
                                    echo $rs['MenuName'];
                                }
                                ?>
                            </td>
                            <td>
                                <?=$row['MenuQty']." / ".$row['MenuPrice']?>
                            </td>
                            <td>
                                <form action="App/UpdateCart.php" method="post">
                                    <input type="number" name="Qty" id="" class="form-control w-100" value="<?=$row['MenuQty']?>">
                                    <input type="text" name="id" value="<?=$row['CartID']?>" hidden>
                                    <button type="submit" class="btn btn-success mt-2 w-100">แก้ไข</button>
                                </form>
                            </td>
                        </tr>
                        <?php 

                        $totalbill += $row['MenuPrice'] * $row['MenuQty'];
                        endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-body mt-3">
                <center>
                    <form action="App/Bill.php" method="post" enctype="multipart/form-data">
                        <img src="./Image/<?=$_SESSION['UserImg']?>" width="128" alt="">
                        <h5>ข้อมูลทั่วไป</h5>
                        <input type="text" class="form-control w-75 mt-2" name="name" placeholder="ชื่อเมนู" value="<?=$_SESSION['UserRealName']?>" disabled>
                        <input type="text" class="form-control w-75 mt-2" name="address" placeholder="ที่อยู่" value="<?=$_SESSION['UserAddress']?>" disabled>
                        <input type="text" class="form-control w-75 mt-2" name="phone" placeholder="เบอร์โทร" value="<?=$_SESSION['UserPhone']?>" disabled>
                        <p>ราคารวม : <?=$totalbill?></p>
                        <input type="text" name="cartid" value="<?=$_SESSION['CartID']?>" hidden>
                        <input type="text" name="restid" value="<?=$_SESSION['Rest']?>" hidden>
                        <input type="text" name="userid" value="<?=$_SESSION['UserID']?>" hidden>
                        <input type="text" name="qty" value="<?=$_SESSION['MenuQty']?>" hidden>
                        <input type="text" name="total" value="<?=$totalbill?>" hidden>
                        <input type="text" name="id" value="<?=$_SESSION['MenuID']?>" hidden>
                        <button type="submit" class="btn btn-warning mt-2 w-75 text-white">ชำระเงิน</button>
                    </form>
                </center>
            </div>
        </div>
    </div>
</div>
