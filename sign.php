<?php
$user=$_GET['user'];
$pass=$_GET['pass'];
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

    $query = "SELECT * from users where uname='$user'";
     if ($result=mysqli_query($conn,$query))
  {
   if(mysqli_num_rows($result) > 0)
    {
      echo "<style onload=\"parent.sign()\"></style>";
 }
  else{
$sql = "INSERT INTO users (uname, pass)
VALUES ('$user', '$pass')";

if ($conn->query($sql) === TRUE) {

echo "<style onload=\"parent.login()\"></style>";
    
} 
else
 {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
        }
}
else
    echo "Query Failed.";

?>
