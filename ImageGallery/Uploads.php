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

<nav class="navbar navbar-inverse">
  <div class="container-fluid">	
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a style="color:orange;font-size:20px" class="navbar-brand" href="Home.php"><b>Gallery<b></a>
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
<form action="ImageUpload.php" method="post" enctype="multipart/form-data">
    
	<div class="form-group">
	<label class="col-sm-offset-2 col-sm-10" for="fileToUpload"><h3 style="color:white">Select The Image</h3></label>
	<span class="file-upload btn btn-primary"><input type="file" name="fileToUpload" id="fileToUpload"></span>
	</div>
	
	<label><p> Select The Image Type</p></label><br/>
	 
	 <label class="radio-inline">
	 <?php 
	 //accessing album names from database and display it in radio buttons
	 $sql = "SELECT * FROM Album";
	$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_assoc($result)) 
		{?>
			<input type="radio" name="category" value="<?php echo $row['album_id']?>"> <?php echo $row['album_name']?></label><br/>
	<?php
		}
	} 
	
	else 
	
	{
    echo "0 results";
	}

	mysqli_close($con);

?><br/>
    <button type="submit" class="btn btn-default">Upload </button>
</form>
</div>
</div>
</body>
</html>