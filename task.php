<?php
session_start();
include "connect.php";
$user_id = $_SESSION['sno'];
if(!isset($user_id)){
   header('location:login.php');
}
 ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>

<link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <?php include"header.php"; ?>
  <?php
  if (isset($_POST['submit'])) {
              $task = $_POST['task'];    // removes backslashes
              $venue = $_POST['venue'];
              $date=$_POST['task_date'];
              $time=$_POST['time'];

              $query   = "INSERT into task(task_details,venue,date,time,status,user_id)values('$task','$venue','$date','$time','1','$user_id') ";
              $result = mysqli_query($conn,$query) or die(mysql_error());

              if($result){
                  echo '<script>alert("Task Added Successfully")</script>';
                  echo '<script>location.href="index.php"</script>';
              }else{
                echo '<script>alert("Something went wrong")</script>';
                  echo '<script>location.href="task.php"</script>';
              }
}

   ?>
<!-- partial:index.partial.html -->
<div id="login-form-wrap" style="background-color:#baf0ff;">
  <h2>Add Task</h2>
  <form method="post" class="task">
    <p style="margin:1rem 3rem;">
    <input type="text"  name="task" placeholder="Enter Task details" required>
    </p>
    <p style="margin:0 3rem;">
    <input type="text"  name="venue" placeholder="Enter the venue" required>
    </p>
    <p style="margin:1rem 3rem;">
    <input type="date"  name="task_date"  required>
    </p>
    <p style="margin:0 3rem;">
    <input type="text"  name="time" placeholder="Enter the Time"  required>
    </p>
    <p>
    <input type="submit" value="Submit" name="submit" class="btn-success" >
    </p>
  </form>

</div><!--login-form-wrap-->
<!-- partial -->
<?php include"footer.php"; ?>
</body>
</html>
