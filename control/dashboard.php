<?php
require("init.php");

if(!$adminSession->isSignedIn()){
    redirect("Login");
}else{

    $admin = Admin::findById($adminSession->adminId);
    $users = User::findAll();
    $trackers = Tracker::findAll();
    $parcels = Parcel::findAll();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

        <title>Admin Dashboard</title>

        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesdesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="../img/hyperlinksdelivery_logoonly.png">

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="assets/plugins/morris/morris.css">

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
                                <ol class="breadcrumb hide-phone p-0 m-0"></ol>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

<div class="row">
<div class="col-12">
<div class="card m-b-30">
    <div class="card-body">

    <h4 class="mt-0 header-title">Add Parcel</h4>

    <span id="add_parcel_status"></span>

    <form id="add_parcel" action="" method="post">

        <div class="form-group">
            <label>Parcel Number</label>
            <div>
                <input type="text" name="number" class="form-control" required />
            </div>
        </div>

        <div class="form-group">
            <label>Description</label>
            <div>
                <input type="text" name="description" class="form-control" required />
            </div>
        </div>

        <div class="form-group">
            <label>Origin</label>
            <div>
                <input type="text" name="origin" class="form-control" required />
            </div>
        </div>

        <div class="form-group">
            <label>Destination</label>
            <div>
                <input type="text" name="destination" class="form-control" required />
            </div>
        </div>

        <div class="form-group">
            <label>Status</label>
            <div>
                <input type="text" name="status" class="form-control" />
            </div>
        </div>

        <div class="form-group">
            <div>
                <button type="submit" class="add_parcel_btn btn btn-primary waves-effect waves-light">
                    Add Parcel
                </button>
            </div>
        </div>

    </form>

    </div>
</div>
</div> <!-- end col -->
</div> <!-- end row -->

<div class="row">
<div class="col-12">

    <div class="card m-b-30">
        <div class="card-body">

            <h4 class="mt-0 header-title">Parcels</h4>
            <span id="parcel_status"></span>

            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>S/N</th>
                    <th>Parcel Number</th>
                    <th>Description</th>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Status</th>
                    <th>Delete</th>
                </tr>
                </thead>

                <tbody>

                <?php
                if (!empty($parcels)):
                    $i = 1;
                    foreach($parcels as $parcel):
                        ?>
                        <tr id="row_<?php echo $parcel->id; ?>">
                            <td class="c-table__cell"><?php echo $i++; ?></td>
                            <td class="c-table__cell"><?php echo $parcel->number; ?></td>
                            <td class="c-table__cell"><?php echo $parcel->description; ?></td>
                            <td class="c-table__cell"><?php echo $parcel->origin; ?></td>
                            <td class="c-table__cell"><?php echo $parcel->destination; ?></td>
                            <td class="c-table__cell"><?php echo $parcel->status; ?></td>
                            <td class="c-table__cell">
                                <button type="button" class="del_parcel btn btn-danger btn-rounded" id="<?php echo $parcel->id; ?>" title="Delete">Delete
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    No Records available
                <?php endif; ?>

                </tbody>
            </table>

        </div>
    </div>
</div> <!-- end col -->
</div> <!-- end row -->

<div class="row">
    <div class="col-12">

        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">All Users</h4>
                <span id="user_status"></span>

                <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Parcel Number</th>
                        <th>Status</th>
                        <th>Delete</th>
                    </tr>
                    </thead>

                    <tbody>

<?php
if (!empty($users)):
$i = 1;
foreach($users as $user):
    ?>
<tr id="row_<?php echo $user->id; ?>">
<td class="c-table__cell"><?php echo $i++; ?></td>
<td class="c-table__cell"><?php echo $user->fname; ?> <?php echo $user->lname; ?></td>
<td class="c-table__cell"><?php echo $user->email; ?></td>
<td class="c-table__cell"><?php echo $user->mobile; ?></td>
<td class="c-table__cell"><?php echo $user->parcel_number; ?></td>
<td class="c-table__cell"><?php echo $user->status; ?></td>
<td class="c-table__cell">
<button type="button" class="del_user btn btn-danger btn-rounded" id="<?php echo $user->id; ?>" title="Delete">Delete
</button>
</td>
</tr>
<?php endforeach; ?>
<?php else: ?>
No Records available
<?php endif; ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


    <div class="row">
        <div class="col-12">

        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">Tracking</h4>
                <span id="track_status"></span>

                <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>User</th>
                            <th>Parcel Number</th>
                            <th>Tracking ID</th>
                            <th>Departure</th>
                            <th>First Stop</th>
                            <th>Second Stop</th>
                            <th>Third Stop</th>
                            <th>Arrival</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>

        <?php
        if (!empty($trackers)):
            $i = 1;
            foreach($trackers as $tracker):
                ?>
    <tr id="row_<?php echo $tracker->id; ?>">
        <td class="c-table__cell"><?php echo $i++; ?></td>
        <td class="c-table__cell"><?php echo $tracker->user_email; ?></td>
        <td class="c-table__cell"><?php echo $tracker->parcel_number; ?></td>
        <td class="c-table__cell"><?php echo $tracker->track_id; ?></td>
        <td class="c-table__cell"><?php echo $tracker->departure; ?></td>
        <td class="c-table__cell"><?php echo $tracker->first_stop; ?></td>
        <td class="c-table__cell"><?php echo $tracker->second_stop; ?></td>
        <td class="c-table__cell"><?php echo $tracker->third_stop; ?></td>
        <td class="c-table__cell"><?php echo $tracker->arrival; ?></td>
        <td class="c-table__cell"><?php echo $tracker->message; ?></td>
        <td class="c-table__cell"><?php echo $tracker->status; ?></td>
        <td class="c-table__cell">
            <a href="update_track.php?id=<?php echo $tracker->id; ?>">
                <button type="button" class="btn btn-warning btn-rounded"  title="Update">Update
                </button>
            </a>
        </td>
        <td class="c-table__cell">
            <button type="button" class="del_track btn btn-danger btn-rounded" id="<?php echo $tracker->id; ?>" title="Delete">Delete
            </button>
        </td>
    </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        No Records available
                    <?php endif; ?>

                    </tbody>
                </table>

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
            //Add parcel
            $(document).ready(function(e){
                $("#add_parcel").on('submit', function(e){
                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: 'ajax/ajax_add_parcel.php',
                        data: new FormData(this),
                        dataType: "html",
                        contentType: false,
                        cache: false,
                        processData:false,
                        beforeSend: function(){
                            $('.add_parcel_btn').attr("disabled","disabled");
                            $('#add_parcel').css("opacity",".5");
                        },

                        //success after submission
                        success: function(status){
                            $('#add_parcel_status').html(status)

                            //quick transparency after submission
                            $('#add_parcel').css("opacity","");

                            //clear all fields after submittion
                            $(".add_parcel_btn").removeAttr("disabled");
                        }
                    });
                });
            });
        </script>

        <script type="text/javascript">
            //delete data
            $(document).ready(function(){
                $(document).on('click', '.del_user', function(){
                    var id = $(this).attr("id");
                    if(confirm("Are you sure you want to delete this?")){
                        $.ajax({
                            url: "ajax/del_user.php",
                            method: "POST",
                            data:{id:id},
                            success:function(status)
                            {
                                $('#user_status').html(status);
                                $('#row_'+id).hide();
                                fetch_data();
                            }
                        });
                    }
                });
            });
        </script>

        <script type="text/javascript">
            //delete data
            $(document).ready(function(){
                $(document).on('click', '.del_track', function(){
                    var id = $(this).attr("id");
                    if(confirm("Are you sure you want to delete this?")){
                        $.ajax({
                            url: "ajax/del_track.php",
                            method: "POST",
                            data:{id:id},
                            success:function(status)
                            {
                                $('#track_status').html(status);
                                $('#row_'+id).hide();
                                fetch_data();
                            }
                        });
                    }
                });
            });
        </script>

        <script type="text/javascript">
            //delete data
            $(document).ready(function(){
                $(document).on('click', '.del_parcel', function(){
                    var id = $(this).attr("id");
                    if(confirm("Are you sure you want to delete this?")){
                        $.ajax({
                            url: "ajax/del_parcel.php",
                            method: "POST",
                            data:{id:id},
                            success:function(status)
                            {
                                $('#parcel_status').html(status);
                                $('#row_'+id).hide();
                                fetch_data();
                            }
                        });
                    }
                });
            });
        </script>

        <script src="ajax/ajax.js"></script><!--Ajax Scripts-->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!--Morris Chart-->
        <script src="assets/plugins/morris/morris.min.js"></script>
        <script src="assets/plugins/raphael/raphael-min.js"></script>

        <script src="assets/pages/dashborad.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>
</html>