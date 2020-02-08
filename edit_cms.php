<?php
error_reporting(~E_NOTICE);
require('common/database.php');
$edit=$_REQUEST['edit'];
$dirname="uploads/";
if(isset($_POST['submit']))
{
	$pname=$_POST['pagename'];
	$ptitle=$_POST['pagetitle'];
	$update="update cms_table set page_name='$pname',page_title='$ptitle'
	where page_id='$edit'";
	mysqli_query($conn,$update) or die(mysqli_error());
	header("Location:mng_cms.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title> edit_cms </title>
  <link href="css/add-cms.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" >
</head>
<body vlink="#DFE2D9">
<div id="box1">
 <h3 class="h3"><i class="fas fa-home"></i>Admin Panel</h3> <h3 class="h2"> WELCOME! </h3>
 <h3 class="h1"> <a href="http://localhost/Project/admin/index.php" class="lg"><i class="fas fa-sign-out-alt"></i></a> </h3>
</div>
<div id="box3">
<h1 class="link"> <a href="http://localhost/Project/admin/mng_cms.php" class="m">Manage CMS</a> </h1> 
<h1 class="link"> <a href="" class="m">Manage Link 1</a> </h1>
<h1 class="link"> <a href="" class="m">Manage Link 2</a> </h1>
<h1 class="link"> <a href="" class="m">Manage Link 3</a> </h1>
<h1 class="link"> <a href="" class="m"><i class="fas fa-wrench"></i>Settings</a> </h1>
</div>
<?php
$rowsel="select * from cms_table where page_id='$edit'";
$rowsql=mysqli_query($conn,$rowsel) or die(mysqli_error());
$rec=mysqli_fetch_array($rowsql,MYSQLI_ASSOC);
//print_r($rec);
?>

<form method="post"> 
<div id="box4"> 
<h3 class="heading1">UPDATE CMS</h3>
<br>
<div id="description">
<input type="text" placeholder="Page Name" name="pagename" value="<?php echo $rec['page_name'];?>" class="pagename">
<br>
<input type="text" placeholder="Page Title" name="pagetitle" value="<?php echo $rec['page_title'];?>" class="pagename">
<br>
<div class="imageview"><img src="<?php echo
$dirname.$rec['page_image']; ?>" width="167" height="70" alt="<?php echo $rec['page_name']; ?>"></div>
<div class="imageright"><a
href="update_img.php?editid=<?php echo $edit ?>"><button type="button" class="changebtn">Change Image</button></a></div>
<br>
<textarea class="textarea" placeholder="Page Descrition" id="value" rows="8" cols="10"></textarea>
<br>
<input type="submit" value="Update" name="submit" class="submit">&nbsp;&nbsp;
<a href="mng_cms.php"><input type="submit" value="Back" name="submit" class="submit"></a>
</div>
</div>
<div id="box2">
<h1 class="rights">All Rights Reserved &copy; 2018</h1>
</div>
</form>
</body>
</html>