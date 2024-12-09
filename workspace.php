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
    <title>welcome <?php echo$_SESSION['username']?></title>
    <link rel="stylesheet" href="port.css">
</head>
<style>
    #img3
{ 
    position:absolute;
    top: 8%;
    border-radius:200px;
    height: 15%;
    left: 20%;
    width: 8%;
    filter: grayscale(60%);
    /* z-index: -1; */
    }
    .link
    {
        text-decoration:none;
        color:black;
        /* margin-left:20px; */
    }
    ul li{
        list-style: square;
    }
    .link:hover
    {
        color: darkslategrey;
    }
    .logout
    {
        position: absolute;
  top: 10%;
  left: 90%;
    }
</style>
<body>

<div class="fade">
    <div id="info">
        <!-- <img src="luffytnx.gif" id="img1"> -->
        
    </div></div><map name="logo">
        <area shape="circle" coords="10px 10px 180px" href="#" >
    </map>
    <?php
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
                // echo"$row[1]";
                echo("<br><img src='uploads/$row[3]' id='img3' class='dp-img' height='300px' width='300px' border-='1px' border-radius='100px' alt='No DP Availablex'>");
        }
    ?>
    <!-- <img src="pc.jpg" id="img2"> -->
    <!-- <img src="logo.png" id="img1" usemap="#logo"> -->
    <div class="header">welcome!<h3><?php echo$_SESSION['username']?></h3></div>
    <div class="logout">   <a href="logout.php"> <button type="button">Logout</button></a>
</div>
    <div class="user-logo"><b>Company Manager   </b></div>
    <div class="info">
      <ul>
       <li><a href="#" class="link"> <h3>Documents to review</h3></a></li><br>
       <li><a href="#" class="link"> <h3>Upcoming Meetings</h3></a></li><br>
       <li><a href="#" class="link"> <h3>Project Deadlines</h3></a></li><br>
       <li><a href="#" class="link"> <h3>Documents to review</h3></a></li><br>
       <li><a href="#" class="link"> <h3>Project's Handler</h3></a></li><br>
      </ul>
    </div>
</body>
</html>