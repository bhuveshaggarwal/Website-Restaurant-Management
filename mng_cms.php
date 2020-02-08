<?php
error_reporting(~E_NOTICE);
require('common/database.php');
$dirname='uploads/';
$del=$_REQUEST['del'];
if($del!='')
{
	$delete="delete from cms_table where page_id='$del'";
	mysqli_query($conn,$delete) or die(mysqli_error());
	
}
?>
<!DOCTYPE html>
<html>
<head>
<title>mng_cms</title>
<link href="css/mng-cms.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" >
</head>
<body vlink="#DFE2D9">
<div id="box1">
  <h3 class="h3"><i class="fas fa-home"></i> Admin Panel</h3>
  <h3 class="h2"> WELCOME! </h3>
  <h3 class="h1"> <a href="index.php" class="lg"><i class="fas fa-sign-out-alt"></i></a> </h3>
</div>

<div id="box3">
  <h1 class="link"> <a  href="" class="m">Manage CMS</a> </h1>
  <h1 class="link"> <a  href="" class="m">Manage Link 1</a> </h1>
  <h1 class="link"> <a  href="" class="m">Manage Link 2</a> </h1>
  <h1 class="link"> <a  href="" class="m">Manage Link 3</a> </h1>
  <h1 class="link"> <a  href="settings.php" class="m"><i class="fas fa-wrench"></i> Settings </a> </h1>
</div>
<div id="box4">
  <h3 class="add"> Showing list of Pages <a href="add_cms.php"><i class="fa fa-plus-square"></i></a> </h3>
  <div id="tableb">
<!--	<table border="0.5" class="table" cellpadding="0" cellpadding="0">
      
	</table>-->
	<table border="0.9" class="table2">
    <thead>
	<tr class="td">
        <td >S.No</td>
        <td>Name</td>
        <td>Title</td>
		<td>Image</td>
        <td>Action</td>
      </tr>
	  </thead>
	<tbody>
	<?php
$a=1;
$select="select * from cms_table";
$sql=mysqli_query($conn,$select) or die (mysqli_error());
while($row=mysqli_fetch_array($sql, MYSQLI_ASSOC))
{?>
      <tr align="center" class="td">
        <td><?php echo $a;?></td>
        <td><?php echo $row['page_name'];?> </td>
        <td><?php echo $row['page_title'];?> </td>
		<td><img src="<?php echo $dirname.$row['page_image'];?>
		"height="30" width="50" alt="<?php echo $row['page_name'];?>" > </td>
        <td><a href="edit_cms.php?edit=<?php echo $row['page_id'];?>" class="a"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp; <a href="mng_cms.php?del=<?php echo $row['page_id'];?>" class="aa"><i class="fas fa-trash"></i></a> </td>
      </tr>
      <?php $a++;}?>
	  </tbody>
  </table>
  </div>
</div>
<div id="box2">
  <h1 class="rights">All Rights Reserved &copy; 2018</h1>
</div>
</body>
</html>
