<?php 

    session_start();
    include './Assets/header.php';
    include './Assets/restaurant-nav.php';
    require './db.php';


?>
<div class="container d-flex  align-items-center justify-content-center">
        <div class=" card">
            <center>
                <form id="form" action="App/CreateRest.php" method="POST" enctype="multipart/form-data">
                    <h1 class="my-3">สร้างร้านอาหาร</h1>
                    <input type="text" placeholder="ชื่อร้าน" class="form-control  w-75  rounded-3 border " name="name"><br>
                    <input type="text" placeholder="ที่อยู่" class=" form-control  w-75 rounded-3 border " name="address"><br>
                    <input type="text" placeholder="โทรศัพท์" class=" form-control  w-75 rounded-3 border " name="phone"><br>

                    
                    <select name="cate" id="" class="form-select mt-2 mb-2 w-75">
                        <?php 
                        
                        $res = $db->query("SELECT * FROM cate_restaurant");
                        while($row = mysqli_fetch_assoc($res)):
                        
                        ?>
                        <option class="form-control" value="<?=$row['CateName']?>"><?=$row['CateName']?></option>
                        <?php endwhile; ?>
                    </select>
                    <input type="file" name="upload" class="form-control w-75"><br>

                    <button class="btn btn-success w-75 mb-2">Confirm</button>
                </form>
            </center>
        </div>
    </div>
</div>
