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
	    <li><a href="home.html">Home</a></li>
		<li><a href="gallery.php">Gallery</a></li>
		<li><a href="services.html">Services</a></li>
		<li><a>Themes</a>
		   <ul>
		    <li><a href="blue theme.html">Blue theme</a></li>
		    <li><a href="green theme.html">Green theme</a></li>
		    <li><a href="purple theme.html">Purple theme</a></li>
		   </ul>
		</li>
		<li><a href="about.html">About<a></li>
		<li><a href="contact.html">Contact us<a></li>
		
	 </ul>
		</div>
		
		<div class="search">
		   <form action="search.php" method="get">
           <input type="text" size="25" name="search" placeholder="Search your design">
		   
		   <input type="submit" name="submit" value="Search">
		   <
		   
		</div>
		
		<div class="post_body">
		<?php 
        include("connection.php"); 
        $con=mysqli_connect("localhost","root","","interior");
		
		$search_id= $_GET['search'];
		
		$query="Select * from posts where type like '%$search_id%'";
		
		$run=mysqli_query($con,$query);
		
		while ($row=mysqli_fetch_array($run)){
		     
			 $id= $row['id'];
			 $type = $row['type'];
			 $image = $row['image'];
			 
			 
		
		?>
		<center><h2>Type: <?php echo $type; ?></h2></center>
		<center><image src="bed/<?php echo $image; ?>" width="600" height="400"></center>
		<p align="center"><a href="detail.php?id= <?php echo $id; ?>">Click here to see details!</a></p> 
		
		<?php } ?>
		
		</div>
		  
	 </body>
	 </html>