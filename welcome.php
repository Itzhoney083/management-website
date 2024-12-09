<?php
session_start();
if(!isset($_SESSION['logedin'])|| $_SESSION['logedin']!=true){
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome  <?php echo$_SESSION['username']?></title>
</head>
<body>
     <div class="container my-5">
    <div class="alert alert-success" role="alert">
  <h4 class="alert-heading text-center">Welcome to Our Website.</h4>
  <p><?php
      $servername="localhost";
      $username="root";
      $password="";
      $database="users";
  $conn = mysqli_connect($servername,$username,$password,$database);
  
  if(!$conn){
      die("<strong>Failed!</strong> Your have enter a wrong information.");
  }
    $id=$_SESSION['username'];
    $sql = "SELECT * FROM user999 WHERE userid ='$id'"; 
    $res = mysqli_query($conn,$sql);
    if(!$res)
    {
        die("could not get data");
    }
    while($row=mysqli_fetch_array($res))
    {
            echo"$row[1]";
            echo("<br><img src='uploads/$row[3]' height='300px' width='300px' border-='1px' border-radius='100px'>");
    }
  ?></p>
  <hr>
  <p class="mb-0 text-center">Whenever you need to, you can logout from where.</p>
  <div class="text-center my-3">
   <a href=";/.php"> <button type="button" class="btn btn-primary">Logout</button></button></a>
</div>
    </div>
</body>
</html>