<?php
require("control/init.php");

if(empty($_GET['id'])){
    header("location:Track-parcel?err=" . urlencode("Unable to get tracking details, tracking ID not available"));
}else {
    $track = Tracker::findtrack($_GET['id']);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Get tracking details - <?php echo $track->track_id; ?></title>

    <meta charset="utf-8" />

    <!-- Page Loader - Needs to be placed in header for loading at top of all content -->
    <script type="text/javascript" src="js/pace.min.js"></script>
    <link href="css/pace-loading-bar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/animate.shipping.css">
    <link rel="stylesheet" type="text/css" href="css/ShippingIcon.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    <!-- Favicon and Touch Icons -->
    <link href="img/hyperlinksdelivery_logoonly.png" rel="shortcut icon" type="image/png">
    <link href="img/hyperlinksdelivery_logoonly.png" rel="apple-touch-icon">
    <link href="img/hyperlinksdelivery_logoonly.png" rel="apple-touch-icon" sizes="72x72">
    <link href="img/hyperlinksdelivery_logoonly.png" rel="apple-touch-icon" sizes="114x114">
    <link href="img/hyperlinksdelivery_logoonly.png" rel="apple-touch-icon" sizes="144x144">

    <!-- Main Style -->
    <link rel="stylesheet" id="main-style" type="text/css" href="css/style.css">

    <!-- Track Style -->
    <link rel="stylesheet" type="text/css" href="css/track.css">

</head>

<body class="blue page-loading">

<!-- Section Start - Header -->
<section class='header' id='header'>

    <!-- Header Top Bar - Start -->
    <div class="topbar-wrap">
        <div class="container">

            <?php require('layout/topmenu.php'); ?>

        </div>
    </div>
    <!-- Header Top Bar - End -->
    <div class="header-bg">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 slantbar hidden-xs"></div>

    <!-- Header Tracking Box - Start -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 white-wrap hidden-xs">
        <div class="white-box">
            <div class="track-order">
                <div class="track-logo transition">
                    <i class="icon icon-logo"></i>
                </div>
                <h4 class="box-heading">Tracking ID: <?php echo $track->track_id ?></h4>
                <h5 style="color: #a92222;" class="box-heading"><?php echo getUserName($track->user_email); ?></h5>
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-0 col-xs-offset-0">

                </div>
            </div>
        </div>
    </div>
    <!-- Header Tracking Box - End -->

        <!-- Header Content Slide - Start -->
        <div style="position:relative;display:inline-block;width:100%;height:auto;">
            <img src="img/track_header_img.jpg" alt="Header Image" class="img-responsive">
            <div class="bg-overlay"></div>
            <div class="main-wrap">
                <div class="container">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 main-content">
                        <h1>Track Parcel</h1>
                        <div class="headul"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Content Slide - End -->

    </div>
</section>
<!-- Section End - Header -->

<div class="content">

    <div class="content1">
        <h2>Parcel ID: <?php echo $track->parcel_number ?> </h2>
    </div>

    <div class="content2">
        <div class="content2-header1">
            <p>From: <span><?php echo $track->departure ?></span></p>
        </div>
        <div class="content2-header1">
            <p>To: <span><?php echo $track->arrival; ?></span></p>
        </div>
        <div class="content2-header1">
            <p>Parcel ID: <span><?php echo $track->parcel_number; ?></span></p>
        </div>
        <div class="content2-header1">
            <p>Status: <span><?php echo $track->status; ?></span></p>
        </div>
        <div class="clear"></div>
    </div>

    <div class="content3">
        <div class="shipment">
            <div class="confirm">
                <div class="imgcircle">
                    <img src="track_img/confirm.png" alt="confirm order">
                </div>
                <span class="line"></span>
                <p>Departure: <?php echo $track->departure; ?></p>
            </div>
            <div class="process">
                <div class="imgcircle">
                    <img src="track_img/process.png" alt="process order">
                </div>
                <span class="line"></span>
                <p>First Stop: <?php echo $track->first_stop; ?></p>
            </div>
            <div class="quality">
                <div class="imgcircle">
                    <img src="track_img/quality.png" alt="quality check">
                </div>
                <span class="line"></span>
                <p>Second Stop: <?php echo $track->second_stop; ?></p>
            </div>
            <div class="dispatch">
                <div class="imgcircle">
                    <img src="track_img/dispatch.png" alt="dispatch product">
                </div>
                <span class="line"></span>
                <p>Third Stop: <?php echo $track->third_stop; ?></p>
            </div>
            <div class="delivery">
                <div class="imgcircle">
                    <img src="track_img/delivery.png" alt="delivery">
                </div>
                <p>Arrival: <?php echo $track->arrival; ?></p>
            </div>
            <div class="clear"></div>
        </div>
    </div>

</div>

<!-- Section Start - Worldwide Centres -->
<section class='bg-black' id='worldwide'>
    <div class="container">
        <div class="row">
            <h1 class="heading text-white">Delivery Locations</h1>
            <div class="headul"></div>
            <div class="worldwide col-md-12 col-xs-12">
                <div class="map">
                    <img src="img/map.png" class="img-responsive" alt="Map image">
                </div>
                <div class="map-locations inviewport animated delay2" data-effect="fadeIn">
                    <img src="img/map-locations-blue.png" class="img-responsive style-dependent" alt="Map Locations">
                </div>
                <div class="map-connect inviewport animated delay6" data-effect="fadeIn">
                    <img src="img/map-connect-blue.png" class="img-responsive style-dependent" alt="Map Connections">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section End - Worldwide Centres -->

<!-- Section Start - Footer -->
<section class='footer bg-black parallax ' id='footer'>
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row">

            <?php require('layout/footer.php'); ?>

        </div>
    </div>
    <!-- Copyright Bar - Start -->
    <div class="copyright">
        <div class="col-md-12">
            <div class="container">
                <div class="">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 message inviewport animated delay1" data-effect="fadeInUp">
                        <span class="">&copy; <?php echo date('Y'); ?> Hyperlinks Delivery</span>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 social">
                        <a href="#" class="inviewport animated delay1" data-effect="fadeInUp"><i class="icon icon-facebook text-on-primary"></i></a>
                        <a href="#" class="inviewport animated delay2" data-effect="fadeInUp"><i class="icon icon-twitter text-on-primary"></i></a>
                        <a href="#" class="inviewport animated delay3" data-effect="fadeInUp"><i class="icon icon-dribbble text-on-primary"></i></a>
                        <a href="#" class="inviewport animated delay4" data-effect="fadeInUp"><i class="icon icon-google-plus text-on-primary"></i></a>
                        <a href="#" class="inviewport animated delay5" data-effect="fadeInUp"><i class="icon icon-youtube-play text-on-primary"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright Bar - End -->
</section>
<!-- Section End - Footer -->

<!-- Javascript & CSS Files moved to bottom of page for faster loading -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/inviewport-1.3.2.js"></script>

<!--Fancybox -->
<script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="js/jquery.fancybox-media.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />

<!-- Main JS -->
<script type="text/javascript" src="js/main.js"></script>
</body>

</html>
