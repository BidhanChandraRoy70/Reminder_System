
<nav class="navbar navbar-light bg-light" style="background-color: #08f768 !important;">
<div class="container-fluid">
<a class="navbar-brand" href="index.php" style="font-size:2rem;">REMINDER</a>
<div class="d-flex regis">
  <?php
  if(isset($_SESSION['sno'])){
    $id=$_SESSION["sno"];
    $select_user="select * from user where sno='$id'";
    $result=mysqli_query($conn,$select_user);
    $fetch_user=mysqli_fetch_array($result,MYSQLI_BOTH);
      echo'<button class="btn btn_log" style="padding:10px;background-color:white;font-weight:900;">Welcome! '.$fetch_user['email'].'</button>';
        echo'<a class="btn btn_log" href="logout.php" style="padding:10px;background-color:white;font-weight:900;">Logout</a>';
  }else{
  echo '
    <a href="login.php"  class="btn btn-outline-success btn_log" style="padding:10px;background-color:white;font-weight:900;">Log in</a>';

  }
     ?>

</div>
</div>
</nav>
