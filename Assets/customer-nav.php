


<nav class="navbar navbar-expand-lg bg-light shadow p-3 mb-5 bg-white rounded">
  <div class="container-fluid">
  <a class="navbar-brand" href=""><h2><b>FOOD  <span style="color: orange;">FUD  </b></span></h2></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Customer.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="CustomerPending.php">Pending</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Cart.php">Cart    <?php 
            require_once './db.php';
            $sql = "SELECT * FROM cart where UserID = '".$_SESSION['UserID']."'";
            $query = $db->query($sql);
            $num = mysqli_num_rows($query);
            echo "( ".$num." )";
            ?></a>
        </li>
      </ul>

      <div class="btn-group mx-5 " >
                     <button class="btn btn-success dropdown-toggle mx-5 w-100" data-bs-toggle="dropdown"><?=$_SESSION['UserRealName']?>                      <img src="./Image/<?=$_SESSION['UserImg']?>" width="32" alt=""></button> 

                      <div class="dropdown-menu">
                      <a href="EditProfile.php" class=" dropdown-item">แก้ไขข้อมูล</a>
                         <a href="App/LogOut.php" class=" dropdown-item">ออกจากระบบ</a>
                      </div>
                  </div>
    </div>
  </div>

</nav>