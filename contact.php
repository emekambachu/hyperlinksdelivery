<!DOCTYPE html>
<html>

<head>
    <title>Shipping - Logistics & Transport HTML Template</title>
    
    <meta charset="utf-8" />
    <!-- Page Loader - Needs to be placed in header for loading at top of all content -->
    <script type="text/javascript" src="js/pace.min.js"></script>
    
    <link href="css/pace-loading-bar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/animate.shipping.css">
    <link rel="stylesheet" type="text/css" href="css/ShippingIcon.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    
    <!-- Main Style -->
    <link rel="stylesheet" id="main-style" type="text/css" href="css/style.css">
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
        <div class="header-bg header-small">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 slantbar hidden-xs"></div>
            <!-- Header Tracking Box - Start -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 white-wrap hidden-xs">
                <div class="white-box">
                    <div class="track-order">
                        <div class="track-logo transition col-lg-3 col-md-3 col-sm-3 col-xs-3">
                            <i class="icon icon-logo"></i>
                        </div>
                        <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9 track-form-wrap">
                            <form method='post' action="#" class="track-form">
                                <input type="text" name='track-input' placeholder="Track ID">
                                <i class="icon icon-magnify"></i>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Tracking Box - End -->
            
            <!-- Header Content Slide - Start -->
            <div style="position:relative;display:inline-block;width:100%;height:auto;">
                <img src="img/delivery_Man.jpg" alt="Header Image" class="img-responsive">
                <div class="bg-overlay"></div>
                <div class="main-wrap">
                    <div class="container">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 main-content">
                            <h1>Contact Us</h1>
                            <div class="headul"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Content Slide - End -->
        </div>
    </section>
    <!-- Section End - Header -->
    
    <!-- Section Start - Get In Touch -->
    <section class='contact' id='contact'>
        <div class="container">
            <div class="row">
                <h1 class="heading">Get In Touch</h1>
                <div class="headul"></div>
                <p class="subheading"></p>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <!-- Contact Form - Start -->
                    <div class='row'>
                        <form action='sendmail.php' method='post'>
                            <div class='col-xs-12'>
                                <input type='text' placeholder='Name' name="name" class='transition' id='c_name'>
                            </div>
                            <div class='col-xs-12'>
                                <input type='text' placeholder='Email' name="email" class='transition' id='c_email'>
                            </div>
                            <div class='col-xs-12'>
                                <textarea class='transition' placeholder='Message' name="message" id='c_message'></textarea>
                            </div>
                            <div id='response_email' class='col-xs-12'></div>
                            <div class='col-xs-4'>
                                <button type='button' name="submit" class='btn btn-primary disabled transition' id='c_send'>Send Message</button>
                            </div>
                        </form>
                    </div>
                    <!-- Contact Form - End -->
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-0 contact-full-info">
                    <h5>Contact</h5>
                    <p>
                        <strong>Email:</strong> info@hyperlinksdelivery.com<br> 
                        <strong>US Mobile:</strong> +15185515512<br>
                        <strong>China Mobile:</strong> +1 234 5678 910
                    </p>
                    <br>
                    
                    <h5>Address</h5>
                    <p>
                        <strong>US:</strong> 8400 6th Street North, Madison Avenue, RINGROAD NY, 13027.<br>
                        <strong>China:</strong> 8/F Bright Way Tower, No. 37 Mong Kok Rd, KL, HK
                    </p>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Section End - Get In Touch -->
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div id="contact-map" class="gmap"></div>
        </div>
    </div>
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
                            <span class="">&copy; 2015 Shipping theme | Made by THEMEPASSION</span>
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
    <!-- Google Map -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArv9ALhBv6ihfhABHEAkFg0-JHywhtgjM&amp;sensor=false"></script>
    <script type="text/javascript" src="js/gmap.js"></script>
    <!--Fancybox -->
    <script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="js/jquery.fancybox-media.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />
    <!-- Bootstrap Carousel -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Main JS -->
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>
