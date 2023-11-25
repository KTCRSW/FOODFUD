<?php

session_start();
include './Assets/header.php';
include './Assets/rider-nav.php';
require './db.php';

?>

<div class="container my-5">
    <div class="row justify-content-center">

        <?php
        $data = $db->query("SELECT * FROM pending");

        while ($order = mysqli_fetch_assoc($data)) {

        ?>
            
            <div class="col-md-4">
                <div class="box mt-2 border border-1 border-gray" style="width: 100%;">

                    <center>
                    <img src="./Image/<?php
                                        $datas = $db->query("SELECT * FROM users WHERE UserID = '" . $order['UserID'] . "'");
                                        if ($img = mysqli_fetch_assoc($datas)) {
                                            echo $img['UserImg'];
                                        }
                                        ?>" alt="" style="width:128px;" class="my-3"><br>
                    </center>
                    <p class="ms-3">ชื่อเมนู : <?php
                                                $resss = $db->query("SELECT * FROM menu WHERE MenuID = '" . $order['MenuID'] . "'");
                                                if ($mn = mysqli_fetch_assoc($resss)) {
                                                    echo $mn['MenuName'];
                                                }
                                                ?></p>
                    <p class="ms-3">ที่อยู่ร้านค้า / เบอร์โทรศัพท์ : <?php
                                                                        $resss = $db->query("SELECT * FROM restaurant WHERE RestID = '" . $order['RestID'] . "'");
                                                                        if ($rd = mysqli_fetch_assoc($resss)) {
                                                                            echo $rd['RestDetail'];
                                                                        }
                                                                        ?></p>
                    <p class="ms-3"></p>
                    <p class="ms-3">จำนวน : <?= $order['Qty'] ?></p>
                    <p class="ms-3">ราคารวม : <?= $order['TotalPrice'] ?></p>
                    <form action="App/UpdatePendingRider.php" method="post">
                        <input type="text" name="status" id="" value="<?= $order['RiderID'] ?>" hidden>
                        <input type="text" name="id" id="" value="<?= $order['PendingID'] ?>" hidden>
                        <?php
                        if ($order['RiderID'] == 0) {
                            echo '<button class="btn btn-success mt-2 mb-2 w-100 p-2" type="submit">รับออเดอร์</button>';
                        }
                        if ($order['RiderID'] != 0) {
                            echo '<button class="btn btn-warning text-white mt-2 mb-2 w-100 p-2" type="submit">ยกเลิก</button>';
                        }
                        ?>
                    </form>
                </div>
            </div>

        <?php } ?>

    </div>
</div>