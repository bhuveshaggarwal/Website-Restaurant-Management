<?php
error_reporting(~E_NOTICE);
require("common/database.php");
$editid=$_REQUEST['editid'];
$dirname="uploads/";
$sel="select * from cms_table where page_id='$editid'";
$rowsel=mysqli_query($conn,$sel) or die(mysqli_error());
$imageval=mysqli_fetch_array($rowsel,MYSQLI_ASSOC);
if(isset($_POST['submit'])){
unlink($dirname.$imageval['page_image']);
$newimage=$_FILES['nimage']['name'];
$tmp_loc=$_FILES['nimage']['tmp_name'];
$upimage="update cms_table set page_image='$newimage' where page_id='$editid'";
mysqli_query($conn,$upimage) or die(mysqli_error());
move_uploaded_file($tmp_loc,$dirname.$newimage);
header("Location:edit_cms.php?edit=$editid");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title> upt_image </title>
  <link href="css/add-cms.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" >
  <!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>-->
</head>
<body vlink="#DFE2D9">
<div id="box1">
 <h3 class="h3"> <i class="fas fa-home"></i>Admin Panel</h3> <h3 class="h2"> WELCOME! </h3>
 <h3 class="h1"> <a href="index.php" class="lg"><i class="fas fa-sign-out-alt"></i></a> </h3>
</div>
<div id="box3">
<h1 class="link"> <a href="mng_cms.php" class="m">Manage CMS</a> </h1> 
<h1 class="link"> <a href="" class="m">Manage Link 1</a> </h1>
<h1 class="link"> <a href="" class="m">Manage Link 2</a> </h1>
<h1 class="link"> <a href="" class="m">Manage Link 3</a> </h1>
<h1 class="link"> <a href="settings.php" class="m"> <i class="fas fa-wrench"></i> Settings </a> </h1>
</div>
<form method="post" autocomplete="off" enctype="multipart/form-data"> 
<div id="box4"> 
<h3 class="heading1">Change Page Image</h3>
<br>
<div id="description1">
<input type="text" placeholder="Page Name" name="pagename" class="pagename1"  value="<?php echo $imageval['page_name'];?>"> 
<br>
<h3 class="name">Old Image :</h3>
<div class="imageview1"><img src="<?php echo
$dirname.$imageval['page_image']; ?>" width="280" height="80" alt="<?php echo
$imageval['page_name']; ?>" size=30></div>
<br>
<h3 class="name">New Image :</h3>
<div class="nametext" style="margin-top:2px;"><input
type="file" name="nimage" size=29 required></div>
<br>
<input type="submit" value="Update" name="submit" class="submit" >
</div>
</div>
<div id="box2">
<h1 class="rights">All Rights Reserved &copy; 2018</h1>
</div>
<?php
$rowsel="select * from cms_table";
$rowsql=mysqli_query($conn,$rowsel) or die(mysqli_error());
$rec=mysqli_fetch_array($rowsql,MYSQLI_ASSOC);
//print_r($rec);
?>
</form>
</body>
</html>