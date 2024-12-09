<?php 
$right=false;
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
    //include('dbconnect.php');
    $userid=$_POST['userid'];
    $pass=$_POST['password'];
    $cpass=$_POST['cpassword'];
    $img=htmlspecialchars(basename($_FILES["fupload"]["name"]));
    $sql = "SELECT * FROM user999 WHERE userid ='$userid'"; 
    // echo $sql;
     $res = mysqli_query($conn,$sql);
     $rownum = mysqli_num_rows($res);
     if($rownum > 0)
     {
        $error="the username already exist";
     }
     else
     {
        $exists=false;
        if($pass==$cpass)
        {
            $stml= "INSERT INTO user999 (sno,userid, password,immage_url,dt) VALUES ('','$userid', '$pass','$img', CURRENT_TIMESTAMP())";
            // echo $stml;
            $result=mysqli_query($conn,$stml);
            if($result){
                $right=true;
                                $target_dir="uploads/";
                $target_file=$target_dir.basename($_FILES["fupload"]["name"]);
                        $uploadOK=1;
                $filetype=strtolower(PATHINFO($target_file,PATHINFO_EXTENSION));
                if($filetype=="jpg")
                {
                    $uploadOK=1;
                }
                else
                {
                    $uploadOK=0;
                    echo"it's not the type ";
                }
                if($uploadOK==0)
                {
                    echo"sorry your file was not uploaded";
                }
                else
                {
                    if(move_uploaded_file($_FILES["fupload"]["tmp_name"],$target_file))
                    {
                    "the file".htmlspecialchars(basename($_FILES["fupload"]["name"]))."has been uploaded";}
                        else
                        {
                            echo"sorry ,error ocurred";
                        }
                }
          }
        }
    else{
        $error="password do not match";
        }
    }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join us</title>
    <link rel="stylesheet" href="port.css">
</head>
<body>
<div class="fade">
<?php
if($right){
    echo "<b><div class='alert alert-success alert-dismissible  fade show' role='alert'>
        <strong>Success!</strong> Your Account has been Created
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div></b>"; 
    }
    if($error){
    echo "<b><div class='alert alert-danger alert-dismissible  fade show' role='alert'>
        <strong>Failed!</strong> $error
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div></b>";
    }
  ?>
    <div id="info">
        <!-- <img src="luffytnx.gif" id="img1"> -->
        
    </div></div><map name="logo">
        <area shape="circle" coords="10px 10px 180px" href="#" >
    </map>
    <!-- <img src="pc.jpg" id="img2"> -->
    <img src="logo.png" id="img1" usemap="#logo">
    <div class="header">
        <li>Welcome to,</li>
    </div>
    <div class="name">
        <h1>H&C Members</h1>
    </div>
    <div class="info"><div id="diss">
    <form action="Join Up.php" method="POST"  enctype="multipart/form-data">
      <table id="td" cellspacing="4">
        <caption><h1>Sign Up</h1></caption>
        <tr>
            <th>Name:</th><td><input type="text" name="userid" id="userid"></td>
        </tr>
        <tr>
        <th>Password</th><td><input type="password" name="password" id="password"></td>
        </tr>
        <tr>
        <th>Confirm Password</th><td><input type="password" name="cpassword" id="cpassword"></td>
        </tr>
        <tr>
        <th>Upload Profile</th><td> <input type="file" name="fupload" id="fupload"></td>
        </tr>
        <tr><th><caption><button type="submit"id="btn">Submit</button></caption></th></tr>
      </table>
    </form>
    </div></div>
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