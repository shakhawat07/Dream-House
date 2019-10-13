<!DOCTYPE html>
<html>
<head>
    <title>Gallery</title>
	<link href='gallerystyle.css' rel='stylesheet' >
	
</head>

<body>
	      <div class="row">
		       <header>
		            <h1> Designs</h1>
			   </header>
		  </div>
		  
	      <div class="quote">
		            <h1> We make your dreams <br> come TRUE!</h1>
		  </div>
		  
		  <div>
		  <ul>
	    <li><a>Home</a></li>
		<li><a>Gallery</a></li>
		<li><a>Services</a></li>
		<li><a>Themes</a>
		   <ul>
		    <li><a>Blue theme</a></li>
		    <li><a>Green theme</a></li>
		    <li><a>Purple theme</a></li>
		    
		   </ul>
		</li>
		<li><a>About<a></li>
		<li><a>Contact us<a></li>
		
	 </ul>
		</div>
		<div class="post_body">
		<?php 
        include("connection.php"); 
        $con=mysqli_connect("localhost","root","","interior");
		
		$detail_id= $_GET['id'];
		$query="Select * from posts where id='$detail_id'";
		
		$run=mysqli_query($con,$query);
		
		while ($row=mysqli_fetch_array($run)){
		     
			 $type = $row['type'];
			 $image = $row['image'];
			 $price = $row['price'];
			 $size = $row['size'];
			 $material = $row['material'];
			 $time = $row['time'];
			 
		
		?>
		<center><h2>Type: <?php echo $type; ?></h2></center>
		<center><image src="bed/<?php echo $image; ?>"></center>
		<center><h3>Design cost: <?php echo $price; ?></h3></center>
		<center><h3>Room size: <?php echo $size; ?></h3></center>
		<center><h3>Materials which are used: <?php echo $material; ?></h3></center>
		<center><h3>Working time: <?php echo $time; ?></h3></center>
		
		<?php } ?>
		
		</div>
		  
	 </body>
	 </html>