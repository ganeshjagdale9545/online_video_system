<?php
$target_dir = "videos/";
$fname = $_GET['n'];
$target_file = $target_dir .basename($_FILES["file1"]["name"]);
// basename($_FILES["file1"]["name"]);
$uploadOk = 1;
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$temp=$_FILES["file1"]["tmp_name"];
if(mime_content_type($temp)=="video/mp4")
{
 $uploadOk = 1;   
}
else
{
    $uploadOk = 0;
    echo"Invalid video contain.";
}
$target_file = "$target_dir/$fname.mp4";
if (file_exists($target_file)) {
  echo"Video is Exist.";
   $uploadOk = 0;
  }

if($FileType != "mp4" ) {
    echo "Sorry, only mp4 files are allowed.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your video was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["file1"]["tmp_name"], $target_file)) {
           echo "Successfull." ;
           
               


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mytube";


    // Create connection
    $conn = new mysqli($servername , $username , $password , $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
$sql = "INSERT INTO videos (name, likes,views)
VALUES ('$fname', 0,0)";

if ($conn->query($sql) === TRUE) {
    
} 
else
 {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
        







        
    } 
else {
        echo "Sorry, there was an error uploading your video.";
    }
}
?>