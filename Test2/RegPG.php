<?php
if(isset($_POST["SignUp"]))
{
    $conn=mysqli_connect("localhost","root","","gptbot") or die("connection error");
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $insertqry="insert into userinfo(Name,Eid,password) values('$name','$email','$password')";
    mysqli_query($conn,$insertqry);
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
    <label for="name">Name</label>
    <input type="text" id="name" name="name" placeholder="Your Name" required>
    <label for="email">Register</label>
    <input type="email" id="email" name="email" placeholder="Email ID" required>
    
    <label for="password">Password</label>
    <div class="passInput">
        <input type="password" id="id_password" name="password" required placeholder="Enter password" minlength="8">
        <i class="bx bx-show" alt="Toggle Password" id="togglePassword">

        </i> 
    </div>
    
    <button type="submit" name="SignUp">SignUp</button>
    </form>

    <div class="signup-link">
    Already have an account? <a href="LoginPG.php">Log In</a>
    </div>
</div>
<script src="./PassTog.js"></script>

</body>
</html>
