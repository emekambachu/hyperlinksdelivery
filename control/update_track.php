<?php
require("init.php");

if(!$adminSession->isSignedIn()){
    redirect("Login");
}else{

if(empty($_GET['id'])){
    redirect("Dashboard");
}

    $track = Tracker::findById($_GET['id']);
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Update Track</title>

    <meta content="Admin Dashboard" name="description" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="../img/hyperlinksdelivery_logoonly.png">

    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

</head>


<body>

<!-- Loader -->
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>

<!-- Navigation Bar-->
<header id="topnav">
    <?php include('layouts/header.php'); ?>
</header>
<!-- End Navigation Bar-->


<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item active">Update Track</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Track Info</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

<div class="row">
<div class="col-12">
<div class="card m-b-30">
    <div class="card-body">

        <span id="update_status"></span>

        <form id="update" action="" method="post">

            <input type="hidden" id="id" name="id" value="<?php echo $track->id; ?>">

            <div class="form-group">
                <label>Departure</label>
                <div>
                    <input type="text" name="departure" class="form-control" value="<?php echo $track->departure; ?>" required/>
                </div>
            </div>

            <div class="form-group">
                <label>First Stop</label>
                <div>
                    <input type="text" name="first_stop" class="form-control" value="<?php echo $track->first_stop; ?>"/>
                </div>
            </div>

            <div class="form-group">
                <label>Second Stop</label>
                <div>
                    <input type="text" name="second_stop" class="form-control" value="<?php echo $track->second_stop; ?>"/>
                </div>
            </div>

            <div class="form-group">
                <label>Third Stop</label>
                <div>
                    <input type="text" name="third_stop" class="form-control" value="<?php echo $track->third_stop; ?>"/>
                </div>
            </div>

            <div class="form-group">
                <label>Arrival</label>
                <div>
                    <input type="text" name="arrival" class="form-control" value="<?php echo $track->arrival; ?>" required />
                </div>
            </div>

            <div class="form-group">
                <label>Message</label>
                <div>
                    <input type="text" name="message" class="form-control" value="<?php echo $track->message; ?>" required />
                </div>
            </div>

            <div class="form-group">
                <label>Status</label>
                <div>
                    <input type="text" name="status" class="form-control" value="<?php echo $track->status; ?>" required />
                </div>
            </div>

            <div class="form-group">
                <div>
                    <button type="submit" class="submit btn btn-primary waves-effect waves-light">
                        Update
                    </button>
                </div>
            </div>

        </form>

    </div>
</div>
</div> <!-- end col -->
</div> <!-- end row -->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->


<!-- Footer -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                © 2018
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->


<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>

<script>
    //insert information
    $(document).ready(function(e){
        $("#update").on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'ajax/ajax_update_track.php',
                data: new FormData(this),
                dataType: "html",
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                    $('.submit').attr("disabled","disabled");
                    $('#update').css("opacity",".5");
                },

                //success after submittion
                success: function(status){
                    $('#update_status').html(status);

                    //quick transparency after submission
                    $('#update').css("opacity","");

                    //clear all fields after submittion
                    $(".submit").removeAttr("disabled");
                }
            });
        });
    });
</script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/modernizr.min.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>

<!-- Required datatable js -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Buttons examples -->
<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables/jszip.min.js"></script>
<script src="assets/plugins/datatables/pdfmake.min.js"></script>
<script src="assets/plugins/datatables/vfs_fonts.js"></script>
<script src="assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables/buttons.print.min.js"></script>
<script src="assets/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/pages/datatables.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>
</html>


