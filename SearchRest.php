
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

    <?php 
    
    
    $resp = $db->query("SELECT * FROM restaurant WHERE RestName = '".$_POST['search']."'");
    while($row = mysqli_fetch_assoc($resp)):
    
    ?>
         
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card mb-3" style="max-width: 100%;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="./Image/<?= $row['RestImg'] ?>" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h2 class="card-title"><b><?= $row['RestName'] ?></b> </h2>
                                        <p class="card-text"><?= $row['RestDetail'] ?></p>
                                        <form action="CustomerMenu.php" method="post" style="margin-top: 20%;">
                                            <input type="text" name="id" id="" value="<?= $row['RestID'] ?>" hidden>
                                            <button class="btn btn-success mb-2 w-100" type="submit">เลือกดูเมนู</button>
                                        </form>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                        </div>


                    </div>
                </div>
        
            </div>
        <?php endwhile; ?>