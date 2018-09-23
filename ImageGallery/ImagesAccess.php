<!DOCTYPE html>
<html>
<head>

<?php
//including required files
require("header.php");
require("db.php");
?>

</head>

<body style="background-color:grey">
<a style="color:white"href="home.php"><img src="images/prev.png"/>Back To Home</a>
<?php


    // Retrieve the URL variables (using PHP).
    $album_id = $_GET['album_id'];
    
    
	
			//Accessing the images and displaying it using lightbox library
			
			$sql="select imgname from imagesinfo where album_id=$album_id";
			$result=mysqli_query($con,$sql);
			

			while($row=mysqli_fetch_array($result))
			{
			 
			?>
			<div class="container">
			 <div class="row">
				<div class="col-md-3">
				  
				<a href="Uploads/<?php echo $row['imgname'];?>" data-lightbox="gallery">
					  <img class="thumbnail" src="Uploads/<?php echo $row['imgname'];?>" alt="light" style="width:250px">
					</a>
				 
				</div>
			
				
			 <?php
			}	
?>
</div>
</div><br/>

</body>
</html>