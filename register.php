<?php
error_reporting(~E_NOTICE);
session_start();
if (isset($_SESSION['userSession'])!="") {
header("Location: home.php");
}

require('common/database.php');
if(isset($_POST['signin'])) {
$uname = strip_tags($_POST['username']);
$email = strip_tags($_POST['emailaddress']);
$upass = strip_tags($_POST['password']);

$uname = mysqli_real_escape_string($conn,$uname);
$email = mysqli_real_escape_string($conn,$email);
$upass = mysqli_real_escape_string($conn,$upass);
$hashed_password = password_hash($upass, PASSWORD_DEFAULT);
$check_email = mysqli_query($conn,"SELECT email FROM phpmukul WHERE email='$email'");
$count=mysqli_num_rows($check_email);
if ($count==0) {
$query = "INSERT INTO phpmukul(username,email,password)
VALUES('$uname','$email','$hashed_password')";
if (mysqli_query($conn,$query)) {
$msg = "
successfully registered !
";
}else {
$msg = "
error while registering !";
}
} else {
$msg = "
sorry email already taken !
";
}
}
?>
<!DOCTYPE html>
<html>
  <head> 
      <title> register </title>
   <link href="css/projectstyle.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
  </head>
  <body>
<form method="post" id="login-form" > 
 <div id="container">
 <div id="box"> 
<h3 class="h3A"> <font color="#DFE2D9">REGISTER HERE!</font> </h3>
<?php
if (isset($msg)) {
echo $msg;
}
?>
<input type="text" placeholder=" Username" name="username" class="inputbox" required> <i class="fa fa-user"></i>
<br>
<br>
<input type="email" placeholder=" Email address" name="emailaddress" class="inputbox" required> <i class="fa fa-envelope" ></i>
<br>
<br>
<input type="password" placeholder=" Password" name="password" class="inputbox"> <i class="fa fa-unlock"></i>
<br>
<br>
<input type="submit" value="Register" name="signin" class="button">
<br>
<br>
</div>
</div>
</form>
  </body>
</html>