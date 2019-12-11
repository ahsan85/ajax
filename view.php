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
// show all records
$sql_record = "SELECT * FROM data";

$result = mysqli_query($conn, $sql_record);


mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
    </link>

    <title>Home</title>
</head>
<body>

<div class="container mt-5">
    <h1>Record System </h1>
    <hr>
    <br>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr id="<?php echo $row['id'] ?>">
                <td data-target="name" id="name"><?php echo $row['username']; ?></td>
                <td data-target="email" id="email"><?php echo $row['email']; ?></td>

                <td><a href="#?edit=<?php echo $row['id']; ?>" data-role="update" data-id="<?php echo $row['id']; ?>"
                       class="btn btn-primary"> <i class="fa fa-pencil-square-o" aria-hidden="true"
                                                   style="font-size: 25px ;margin-right: 20%"></i></a></td>

                <td>
                    <button id="<?php echo $row['id']; ?>" class="delbutton btn btn-danger"><i class="fa fa-trash"
                                                                                               aria-hidden="true"
                                                                                               style="font-size: 25px ;margin-right: 20%"></i>
                    </button>
                </td>


            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

</div>

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="container mt-5  ">

                    <form method="post" action="save_updated_data.php" id="Form" class="form">
                        <!--                        <input type="hidden" name="id" value=" -->
                        <?php //echo $id ?><!--">-->
                        <header class="card mb-4 bg-dark" style=" height: 35px">
                            <h2 style="text-align: center; color: whitesmoke ; margin-top: 3px">Update Data </h2>
                        </header>
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" id="username"
                                   style="height: 35px ; font-size:20px;">
                        </div>

                        <div class="form-group">
                            <input type="text" name="email" class="form-control" id="_email"
                                   style="height: 35px ; font-size:20px;">
                        </div>
                        <input type="hidden" id="userId" name="my">
                        <button type="submit" class="btn btn-primary float-right form-control" name="update" id="update"
                                style="height: 35px; font-size: 15px">Update
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        $(function () {

            $(".delbutton").click(function () {
                var del_id = $(this).attr("id");
                var info = 'id=' + del_id;


                $.ajax({
                    type: "POST",
                    url: "delete_entry.php", //URL to the delete php script
                    data: info,
                    success: function () {
                        toastr["success"]("Record Have Been Deleted Successfully", "Delete!")
                    }
                });
                $(this).closest("tr").remove();
                return false;
            });
        });


    })
    $(document).ready(function () {
        $(document).on('click', 'a[data-role=update]', function () {
            var id = $(this).data('id');


            var Uname = $('#' + id).children('#name').text();
            var email = $('#' + id).children('#email').text();

            $('#username').val(Uname);
            $('#_email').val(email);
            $('#userId').val(id);
            console.log($('#userId'));
            $('#myModal').modal('toggle');
        })
    });
    //
    // $('#Form').submit(function (e){
    // // $('#update').click(function (){
    // // // $('#update').click(function (e){
    //    var id = $('#userId').val();
    //
    //     var name = $('#Username').val();
    //     var email =  $('#_email').val();
    //     console.log(email);
    //
    //     // $.ajax({
    //     //     type: 'POST',
    //     //     url: 'save_updated_data.php',
    //     //     data:{ name:name, email:email, id:id },
    //     //
    //     //     success: function (response) {
    //     //         // if (data == 0) {
    //     //         //
    //     //         //     toastr["success"]("Record Have Been Saved Successfully", "Success!")
    //     //         // } else {
    //     //         //     toastr["error"]("Please Fill All Fields", "Error!");
    //     //         // }
    //     //         console.log(response);
    //     //     }
    //     //     console.log(data);
    //     // })
    // })

</script>

</body>
</html>




