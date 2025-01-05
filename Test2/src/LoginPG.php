<?php
session_start();
require_once("../includes/dbconnection.php");
$msg="";
if(isset($_POST["login"]))
{
    $email=$_POST["email"];
    $password=$_POST["password"];
    $autquery="select UserID,Name from userinfo where Eid='$email' and password='$password'";
    $rs=mysqli_query($con,$autquery);
    if(mysqli_num_rows($rs)==1){
        $row=mysqli_fetch_row($rs);
        $_SESSION["UserID"]=$row[0];
		$_SESSION["Name"]=$row[1];
        
		header("location:Main.php");

    }
    else{
        $msg="invalid";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
<link rel="stylesheet" href="Login.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>

<div class="login-box">
    <div class="heading">
    <h2>thaparGPT</h2>
    </div>
    <form method="post" role="form" action="">
    <label for="email">Login</label>
    <input type="email" id="email" name="email" placeholder="Email ID" required>
    
    <label for="password">Password</label>
    <div class="passInput">
        <input type="password" id="id_password" name="password" placeholder="Enter password" required minlength="8">
        <i class="bx bx-show" alt="Toggle Password" id="togglePassword">

        </i> <!-- Use an eye icon for password visibility toggle -->
    </div>
    
    <button type="submit" name="login">Log in</button>
    </form>

    <div class="signup-link">
    Don’t have an account? <a href="RegPG.php">Sign up now</a>
    </div>
</div>
<script src="./PassTog.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</body>
</html>
