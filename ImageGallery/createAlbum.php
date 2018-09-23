<?php
//include auth.php file on all secure pages
include("auth.php");
//include header.php file for the bootstrap and jquery cdn
include("header.php");
//include database connection file
require("db.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Admin</title>
<link rel="stylesheet" href="css/style1.css" type="text/css">
</head>
<body>
<?php


// If form submitted, insert values into the database.
if (isset($_POST['album_name'])){
        // removes backslashes
	$album_name = stripslashes($_REQUEST['album_name']);
        //escapes special characters in a string
	$album_name = mysqli_real_escape_string($con,$album_name);
	
	//Inserting album name in album table
     
	  $sql = "INSERT INTO album(album_name) values('$album_name')";
	if (mysqli_query($con, $sql)) 
	{
		echo "New Album created successfully<br/>
		Click here to Upload Image <a href='Uploads.php'>Upload Image</a>";
	} 
	else 
	{
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}

mysqli_close($con); 
}

else{
?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">	
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a style="color:orange;font-size:20px" class="navbar-brand" href="#"><b>Gallery<b></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
	 <ul class="nav navbar-nav">  
        <li><a href="createAlbum.php">Create Album</a></li>
		<li><a href="Uploads.php">Upload Image</a></li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
	  <li><h4 style="color:white ">Wel Come <?php echo $_SESSION['username']; ?></h4></li>
        <li><a href="logout.php"><span> LogOut</span> <span class="glyphicon glyphicon-log-out"></span></a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
<form action="" method="post" enctype="multipart/form-data">
    
	<div class="form-group">
	<label class="col-sm-offset-2 col-sm-10" for="album_name"><h3 style="color:white">Create New Album</h3></label>
	<input type="text" name="album_name" id="album_name">
	</div>
	
    <button type="submit" class="btn btn-default">Create Album </button>
</form>
</div>
</div>
<?php } ?>

</body>

</html>