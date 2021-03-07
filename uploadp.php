<?php
$target_dir = "poster/";
$fname = $_GET['n'];
$target_file = $target_dir . basename($_FILES["file2"]["name"]);
$uploadOk = 1;
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$temp=$_FILES["file2"]["tmp_name"];
if(mime_content_type($temp)=="image/jpeg" || mime_content_type($temp)=="image/png")
{
 $uploadOk = 1;   
}
else
{
    $uploadOk = 0;
    echo"Invalid image contain.";
}
if (file_exists($target_file)) {
  echo"Poster is Exist.";
   $uploadOk = 0;
  }
  chdir("videos/");
  $path = ".";
$dh = opendir($path);
if(!file_exists("$fname.mp4")){
    echo"Your video name does not match.";
    $uploadOk = 0;
}
closedir($dh);
//chdir("http://localhost/mytube/");
//if($FileType != "jpg" || $FileType != "jpeg" || $FileType != "png" ) {
  //  echo "Sorry, only \"jpg, png, jpeg\" files are allowed.";
    //$uploadOk = 0;
//}
if ($uploadOk == 0) {
    echo "Sorry, your poster was not uploaded.";
} 
else {
    if (move_uploaded_file($_FILES["file2"]["tmp_name"], $target_file)) {
         $old_name = $target_file ;
        $new_name = "poster/$fname.jpg"; 
           if(rename( $old_name, $new_name))
           { 
           echo "Successfull." ;
           }
          else
          {
           echo "Error." ;
          }
    }
    else
    {
        echo "Sorry, there was an error uploading your poster.";
    
}
}
?>