<?php
$connection = mysqli_connect("localhost", "root", " ", "user_info");


$id = $_GET['edit'];
var_dump($id);
$name = $_POST['username'];
$email = $_POST['email'];
var_dump($email);
$update_result = "UPDATE  data SET username='$name',email='$email' WHERE id=$id";
if(mysqli_query($connection, $update_result))
{
    header('Location: view.php');
}



mysqli_close($connection);

?>
