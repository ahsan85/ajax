<?php
$connection=mysqli_connect("localhost","root","","user_info");

$name='';
$email='';

$id=0;

if(isset($_GET['edit'])) {


    $id=$_GET['edit'];
    $get_result="SELECT * FROM data WHERE id=$id";
    $sql= mysqli_query($connection,$get_result);
    $_row=mysqli_fetch_assoc($sql);
    $name=$_row['username'];
    $email=$_row['email'];

}
$id=$_GET['edit'];
if (isset($_POST['update'])) {

    $name=$_POST['username'];
    $email=$_POST['email'];

    $update_result="UPDATE  data SET username='$name',email='$email' WHERE id=$id";
    mysqli_query($connection,$update_result);
    header('Location: view.php');

}


mysqli_close($connection);

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ajax</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    </link>

</head>
<body>

<div class="container mt-5 col-lg-4 ">

    <form method="post" action="" id="Form" class="form">
        <input type="hidden" name="id" value=" <?php echo $id ?>">
        <header class="card mb-4 bg-dark">
            <h3 style="text-align: center; color: whitesmoke">Insert Data </h3>
        </header>
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Enter username here"  value=" <?php echo $name ?>" >
        </div>

        <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Enter your email here" value=" <?php echo $email ?>">
        </div>
        <button type="submit" class="btn btn-primary float-right form-control" name="update">Save record</button>
    </form>

</div>



</body>
</html>


