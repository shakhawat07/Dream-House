<html>
<body>

<?php
include("index.php");
 include("connection.php"); 
        $con=mysqli_connect("localhost","root","","interior");
		
		$update_id= $_GET['update'];
		
		$query="Select * from posts where id='$update_id'";
		
		$run=mysqli_query($con,$query);
		while($row=mysqli_fetch_array($run)){

		$up_id = $row['id'];
    	$type = $row['type'];
	    $image = $row['image'];
	    $price = $row['price'];
	    $size = $row['size'];
	    $material= $row['material'];
	    $time = $row['time'];
?>
<form method="post" action="update.php?update_form=<?php echo $up_id; ?>" enctype="multipart/form-data">
	
	<table width="600" align="center" border="10" bgcolor="#EDDA74">
		
		<tr>
			<td align="center" bgcolor="#96281B" colspan="6"><h1>Update Design Here</h1></td>
		</tr>
		
		<tr>
			<td align="right">Type:</td>
			<td><input type="text" name="type" size="30" value="<?php echo $type; ?>"></td>
		</tr>
		
		<tr>
			<td align="right">Image:</td>
			<td><input type="file" name="image" size="30" <img src="../bed/<?php echo $image; ?>" 
			width="150" height="100"></td>
		</tr>
		
		<tr>
			<td align="right">Price:</td>
			<td><input type="text" name="price" size="30" value="<?php echo $price; ?>"></td>
		</tr>
		
		<tr>
			<td align="right">Size:</td>
			<td><input type="text" name="size" value="<?php echo $size; ?>"></td>
		</tr>
		
		<tr>
			<td align="right">Material:</td>
			<td><input type="text" name="material" size="30" value="<?php echo $material; ?>"></td>
		</tr>
		
		<tr>
			<td align="right">Time:</td>
			<td><input type="text" name="time" size="30" value="<?php echo $time; ?>"></td>
		</tr>
		
		<tr>
			<td align="center" colspan="6"><input type="submit" name="update" value="Update Now"></td>
		</tr>

<?php } ?>	
	</table>
</form>

</body>
</html>

<?php

if(isset($_POST['update'])){
	
	$update_id1 = $_GET['update_form'];
	
	  $type = $_POST['type'];
	  $image= $_FILES['image']['name'];
	  $image_tmp= $_FILES['image']['tmp_name'];
	  $price = $_POST['price'];
	  $size = $_POST['size'];
	  $material = $_POST['material'];
	  $time = $_POST['time'];
	  
	   if($type=='' or $image=='' or $price=='' or $size=='' or  $material=='' or $time==''){
	
	   echo "<script>alert('Any of the fields is empty')</script>";
	   exit();
	   }
	  
	   else {
	    move_uploaded_file($image_tmp,"../bed/$image");
		
		$update_query = "update posts set type='$type',image='$image',price='$price',
		size='$size',material='$material',time='$time' where id='$update_id1'";
		
		if(mysqli_query($con,$update_query)){
		
		echo "<script>alert('Post has been updated')</script>";
		
		echo "<script>window.open('index.php?view=view','_self')</script>";
		
		}
	   }
	
}




?>
