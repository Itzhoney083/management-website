<?php
$login=false;
$error=false;
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="users";
$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("<strong>Failed!</strong> Your have enter a wrong information.");
}
    $userid=$_POST['userid'];
    $password=$_POST['password'];
    $sql="SELECT * from user999 where userid='$userid'";
    $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        if($row['password']==$password)
        {
            $login=true;
            session_start();
            $_SESSION['logedin']=true;
            $_SESSION['username']=$userid;
            header("location:workspace.php");
        }
        else
        {
            echo("login failed");
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="port.css">
</head>
<body>
<div class="fade">
    <div id="info">
        <!-- <img src="luffytnx.gif" id="img1"> -->
        
    </div></div><map name="logo">
        <area shape="circle" coords="10px 10px 180px" href="#" >
    </map>
    <!-- <img src="pc.jpg" id="img2"> -->
    <img src="logo.png" id="img1" usemap="#logo">
    <div class="header">
        <li>Welcome back!</li><br>
    </div>
    <div class="name">
        <h1>Let's do a fresh start</h1>
    </div>
    <div class="info">
    <form action="MemberLogin.php" method="POST"  enctype="multipart/form-data">
      <table id="td" cellspacing="4">
        <caption><h1>Member Login  </h1></caption>
        <tr>
            <th>Name:</th><td><input type="text" name="userid" id="userid"></td>
        </tr>
        <tr>
            <th>Password</th><td><input type="password" name="password" id="password"></td>
        </tr>
        <tr>
            <th><caption><button type="submit"id="btn1">login</button></caption></th>
        </tr>
      </table>
    </form>
    </div>
    <div class="row place">
        <div class="col-3 menu">
            <ul>
           <b> <li><a href="My portfolio.html">Home </a></li>
            <li><a href="Join Up.php">Join Us</a></li>
            <li><a href="MemberLogin.php">Member Login</a></li>
            <li><a href="learn.php">Learn</a></li>
            <li><a href="#">Help</a></li></b>
        </ul>
        </div>
    </div>
</body>
</html>