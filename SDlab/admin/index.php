<?php
session_start();

if(!isset($_SESSION['user_name'])){
	
header("location: login.php");
}
else{

?>


<html>
<head>
    <title>Admin Panel</title>
	<link href='adminstyle.css' rel='stylesheet' >
	
</head>

<body>
     <header>
    	 <h1> Welcome to admin panel of Dream House</h1>
	 </header>
	 <aside>
	    <h2>Manage Content</h2>
		
		<h2><a href="logout.php">Admin Logout</a></h2>
		<h2><a href="index.php?view=view">View posts</a></h2>
		<h2><a href="index.php?insert=insert">Insert new posts</a></h2>
		Welcome <font size="20px" > <?php echo $_SESSION['user_name']; ?> !</font>
	 </aside>
	 
	 <center><h1>You can change your content from here!</h1></center>
	 
<?php

if(isset($_GET['insert'])){
	
include('insert.php');
}


?>	 
	 
<?php if(isset($_GET['view'])){ ?> 

<table width="1000" border="2" align="center" bgcolor="#EDDA74"> 
	<tr>
		<td colspan="10" align="center" bgcolor="#96281B"><h1>View All Posts</h1></td>
	</tr>
	
	<tr bgcolor="orange">
		<th>Id</th>
		<th>Type</th>
		<th>Image</th>
		<th>Price</th>
		<th>Size</th>
		<th>Material</th>
		<th>Time</th>
		<th>Delete</th>
		<th>Update</th>
	</tr>
<?php 
include("connection.php");
$con=mysqli_connect("localhost","root","","interior");

if(isset($_GET['view'])){
$query = "select * from posts order by 1 DESC"; 

$run = mysqli_query($con,$query);
$i=1;
while($row=mysqli_fetch_array($run)){

	$id = $row['id'];
	$type = $row['type'];
	$image = $row['image'];
	$price = $row['price'];
	$size = $row['size'];
	$material= $row['material'];
	$time = $row['time'];
?>
<tr align="center">
		<td><?php echo $i++; ?></td>
		<td><?php echo $type; ?></td>
		<td><img src="../bed/<?php echo $image; ?>" width="150" height="100"></td>
		<td><?php echo $price; ?></td>
		<td><?php echo $size; ?></td>
		<td><?php echo $material; ?></td>
		<td><?php echo $time; ?></td>
		<td><a href="delete.php?del=<?php echo $id; ?>">Delete</a></td>
		<td><a href="update.php?update=<?php echo $id; ?>">Update</a></td>
	</tr>
<?php } } }?>

</table>

 </body>
	 </html>
	 
<?php } ?>