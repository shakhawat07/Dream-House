<?php
include("connection.php"); 
        $con=mysqli_connect("localhost","root","","interior");
		
		$delete_id= $_GET['del'];
		
		$query="delete from posts where id='$delete_id'";
		
		if(mysqli_query($con,$query)){
			
		echo "<script>alert('Post has been deleted')</script>";
		
		echo "<script>window.open('index.php?view=view','_self')</script>";
		}