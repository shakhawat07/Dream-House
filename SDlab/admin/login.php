<?php
session_start();

?>



<html>
	<head>
		<title>Admin Login</title>
		<link href='login.css' rel='stylesheet' >
	</head>

<body>
	
	<form method="post" action="login.php">
	
		<table width="400" border="5" align="center" bgcolor="#EDDA74" >
			
			<tr>
				<td bgcolor="#96281B" colspan="4" align="center" ><h1>Admin Login form</h1></td>
			</tr>
		
			<tr>
				<td align="right">User Name:</td>
				<td><input type="text" name="user_name"></td>
			</tr>
			
			<tr>
				<td align="right">User Password:</td>
				<td><input type="password" name="user_pass"></td>
			</tr>
			
			<tr>
				<td colspan="4" align="center"><input type="submit" name="login" value="Login"></td>
			</tr>
		
		
		</table>
	</form>

</body>
</html>



<?php
include("connection.php"); 
$con=mysqli_connect("localhost","root","","interior");

if(isset($_POST['login'])){
	
	$user_name = $_POST['user_name'];
	$user_pass = $_POST['user_pass'];
	
	$query="Select * from admin where user_name='$user_name' AND user_pass='$user_pass'";
	
	$run=mysqli_query($con,$query);
	
	if(mysqli_num_rows($run)>0){
		
		$_SESSION['user_name']=$user_name;
		echo "<script>window.open('index.php','_self')</script>";
	}
	else{
		echo "<script>alert('Invalid user name or password!')</script>";
	}
	
}
?>