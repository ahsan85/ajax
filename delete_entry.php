<?php
$servername = "localhost";
$database = "user_info";
$username = "root";
$password = "";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$id=$_POST['id'];
var_dump($id);
$delete = "DELETE FROM data WHERE id= $id";
mysqli_query($conn,$delete);


?>
