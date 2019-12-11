<?php
$connection = mysqli_connect("localhost", "root", "", "user_info");

var_dump($_POST);
var_dump($_GET);
//$id=0;
//$name='';
//$email='';
$id = $_POST['my'];
//
$name = $_POST['username'];
$email = $_POST['email'];
if(isset($_POST['update']))
{
    $update_result = "UPDATE  data SET username='$name',email='$email' WHERE id=$id";
    if(mysqli_query($connection, $update_result))
    {
        header('Location: view.php');
    }
}




mysqli_close($connection);

?>
