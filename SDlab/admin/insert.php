<html>
	<head>
		<title>inserting new designs</title>
	</head>
	
<body>
<form method="post" action="insert.php" enctype="multipart/form-data">
	
	<table width="600" align="center" border="10" bgcolor="#EDDA74">
		
		<tr>
			<td align="center" bgcolor="#96281B" colspan="6"><h1>Insert New Design Here</h1></td>
		</tr>
		
		<tr>
			<td align="right">Type:</td>
			<td><input type="text" name="type" size="30"></td>
		</tr>
		
		<tr>
			<td align="right">Image:</td>
			<td><input type="file" name="image" size="30"></td>
		</tr>
		
		<tr>
			<td align="right">Price:</td>
			<td><input type="text" name="price" size="30"></td>
		</tr>
		
		<tr>
			<td align="right">Size:</td>
			<td><input type="text" name="size"></td>
		</tr>
		
		<tr>
			<td align="right">Material:</td>
			<td><input type="text" name="material" size="30"></td>
		</tr>
		
		<tr>
			<td align="right">Time:</td>
			<td><input type="text" name="time" size="30"></textarea></td>
		</tr>
		
		<tr>
			<td align="center" colspan="6"><input type="submit" name="submit" value="Publish Now"></td>
		</tr>

	
	</table>
</form>
</body>
</html>
<?php 
include("connection.php"); 
$con=mysqli_connect("localhost","root","","interior");

if(isset($_POST['submit'])){

       $type = $_POST['type'];
	   $image_name= $_FILES['image']['name'];
	   $image_type= $_FILES['image']['type'];
	   $image_size= $_FILES['image']['size'];
	   $image_tmp= $_FILES['image']['tmp_name'];
	   $price = $_POST['price'];
	   $size = $_POST['size'];
	   $material = $_POST['material'];
	   $time = $_POST['time'];
	   
	   if($type=='' or $image_name=='' or $price=='' or $size=='' or  $material=='' or $time==''){
	
	   echo "<script>alert('Any of the fields is empty')</script>";
	   exit();
	   }
	   
	   else {
	
	 move_uploaded_file($image_tmp,"../bed/$image_name");
	
	  $query = "insert into posts (type,image,price,size,material,time) values 
	  ('$type','$image_name','$price','$size','$material','$time')";
	
	if(mysqli_query($con,$query)){
	
	echo "<script>alert('Post has been inserted')</script>";
		
	echo "<script>window.open('index.php?view=view','_self')</script>";
	
	
	}


}
}
?>