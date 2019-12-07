<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ajax</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
    </link>

</head>
<body onload="onload()">

<div class="container mt-5 col-lg-4 " id="content" style="display: none">

    <form method="post" action="" id="myForm" class="form">
        <header class="card mb-4 bg-dark">
            <h3 style="text-align: center; color: whitesmoke">Insert Data </h3>
        </header>
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Enter username here">
        </div>

        <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Enter your email here">
        </div>
        <button type="submit" class="btn btn-primary float-right form-control" name="submit">Save record</button>
    </form>

</div>
<div class=" spinner-onload spinner-border text-primary float-center" style="display: block;" id="spinner"></div>


<style>
    .spinner-onload {
        position: absolute;
        height: 100px;
        width: 100px;
        top: 50%;
        left: 50%;
        margin-left: -50px;
        margin-top: -50px;

        background-size: 100%;
    }

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">

    function onload() {
        var teat = setTimeout(loadPage, 3000);
    }

    function loadPage() {
        document.getElementById("content").style.display = "block";
        document.getElementById("spinner").style.display = "none";

    }

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

        $('#myForm').submit(function (e) {
            //  console.log("submitted");
            $.ajax({
                type: 'POST',
                url: 'submit.php',
                data: $('#myForm').serialize(),
                success: function (data) {
                    if (data == 0) {

                        toastr["success"]("Record Have Been Saved Successfully", "Success!")
                    } else {
                        toastr["error"]("Please Fill All Fields", "Error!");
                    }
                }

            })
            var form = document.getElementById('myForm').reset();
            return false;
            //  e.preventDefault();
        })

    })
</script>
</body>
</html>


