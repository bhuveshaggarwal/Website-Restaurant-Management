<?php
session_start();
require('common/database.php');
if (isset($_SESSION['userSession'])!="") {
header("Location: home.php");
exit;
}
if(isset($_POST['signin']))
{
$email=strip_tags($_POST['emailaddress']);
$password=strip_tags($_POST['password']);

$email = mysqli_real_escape_string($conn,$email);
$password = mysqli_real_escape_string($conn,$password);
$query = mysqli_query($conn,"SELECT id, email, password FROM phpmukul WHERE
email='$email'");
$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
$count = mysqli_num_rows($query); // if email/password are correct returns must be 1 row
if (password_verify($password, $row['password']) && $count==1) {
$_SESSION['userSession'] = $row['id'];
header("Location: home.php");
} else {
$msg = "
Invalid Username or Password !
";
}
}
?>
<!DOCTYPE html>
<html>
  <head> 
      <title> project </title>
   <link href="css/projectstyle.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
  </head>
  <body>
<form method="post" id="login-form" > 
 <div id="container">
 <div id="box"> 
<h3 class="h3"> <font color="#DFE2D9">HELLO!</font> </h3>
<?php
if(isset($msg)){
echo $msg;
}
?>
<br>
<input type="email" placeholder=" Email address" name="emailaddress" class="inputbox" required> <i class="fa fa-envelope" ></i>
<br>
<br>
<input type="password" placeholder=" Password" name="password" class="inputbox"> <i class="fa fa-unlock"></i>
<br>
<br>
<input type="submit" value="Log In" name="signin" class="button">
<br>
<br>
</div>
</div>
</form>
  </body>
</html>