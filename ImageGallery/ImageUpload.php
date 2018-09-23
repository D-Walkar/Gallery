<html>
<head>
</head>
<body style="color:white;background-color:grey">
<a style="color:white"href="Uploads.php"><img src="images/prev.png"/>Upload Image</a><br/><br/>
<?php
//include auth.php file on all secure pages
require("auth.php");
require("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$album_id = $_POST["category"];
$target_dir = "uploads/";
$file_nm=basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check for image file
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// checking file size
if ($_FILES["fileToUpload"]["size"] > 15000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allowing file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
	}
// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 

	else {
    
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		//inserting image name in database table
		$sql = "INSERT INTO imagesinfo (album_id,imgname)
         VALUES ('$album_id','$file_nm')";
	if (mysqli_query($con, $sql)) {
         echo "New record created successfully";
		 
         } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}

    } 
	else 
	{
        echo "Sorry, there was an error uploading your file.";
    }
}
}
?>
</body>
</html>