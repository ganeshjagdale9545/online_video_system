<?php
$name=$_GET['name'];
$views=$_GET['views'];
$views=$views+1;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mytube";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE videos SET views='$views' WHERE name='$name'";

if ($conn->query($sql) === TRUE) {
   // echo "Record updated successfully";
} else {
    //echo "Error updating record: " . $conn->error;
}

$conn->close();

?>