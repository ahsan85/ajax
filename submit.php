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


$getUserName = $_POST['username'];
$getUserEmail = $_POST['email'];
if (!empty($getUserName) && !empty($getUserEmail)) {
    $sql = "INSERT INTO data (username,email) VALUES ('$getUserName','$getUserEmail')";
    if (mysqli_query($conn, $sql)) {
        return 1;
    }
} else {
    echo "Empty";
}


mysqli_close($conn);

?>

