<?php
require('common/database.php');
if(isset($_POST['submit']))
{
$email=mysqli_real_escape_string($conn,$_POST['pagename']);
$password=$_POST['pagetitle'];
$pimage=$_FILES['images']['name'];
$tmp_loc=$_FILES['images']['tmp_name'];
$page_desc=mysqli_real_escape_string($conn,$_POST['pagedesc']);
$dirname="uploads/";
$insert="insert into cms_table set
         page_name='$email',
         page_title='$password', 
		 page_image='$pimage',
		 page_desc='$page_desc'";
$sql=mysqli_query($conn,$insert) or die(mysqli_error());
move_uploaded_file($tmp_loc,$dirname.$pimage);
$load= 'Saving Please Wait..'.' '.'<img src="images/hourglass.svg">';
header("Refresh:5;mng_cms.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title> add_cms </title>
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
<h3 class="heading1">Add CMS</h3>
<div align="center"><?php echo $load;?></div>
<br>
<div id="description">
<input type="text" placeholder="Page Name" name="pagename" class="pagename" required>
<br>
<input type="text" placeholder="Page Title" name="pagetitle" class="pagename" required>
<br>
<input type="file" placeholder="Browse image" name="images" class="images" required>
<br>
<textarea class="textarea" placeholder="Page Descrition" name="pagedesc" id="value" rows="8" cols="10" required></textarea>
<br>
<input type="submit" value="Save" name="submit" class="submit" >
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