<?php
@session_start();

require('control/init.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ('phpmailer/Exception.php');
require ('phpmailer/PHPMailer.php');
require ('phpmailer/SMTP.php');

$status = '';

if(isset($_POST['submit'])){

    $user = new User();

    if($user){

        $user->fname = trim($_POST['fname']);
        $user->lname = trim($_POST['lname']);
        $user->mobile = trim($_POST['mobile']);
        $user->email = trim($_POST['email']);
        $user->parcel_number = trim($_POST['parcel_number']);

        $name = trim($_POST['fname']).' '.trim($_POST['lname']);

        $idGenerated = User::checkUser($user->email, $user->parcel_number);

        if($idGenerated){

            header("location:Get-tracking-id?err=" . urlencode("Tracking ID has been generated for this user"));
            
        }else{

            //generate random id for user
            //set the random id length
            $random_id_length = 12;

            //generate a id encrypt it and store it in $rnd_id
            $rnd_id = crypt(uniqid(mt_rand(),1));

            //to remove any slashes that might have come
            $rnd_id = strip_tags(stripslashes($rnd_id));

            //Removing any . or / and reversing the string
            $rnd_id = str_replace(".","",$rnd_id);
            $rnd_id = strrev(str_replace("/","",$rnd_id));

            //finally I take the first 18 characters from the $rnd_id
            $rnd_id = substr($rnd_id,0,$random_id_length);

            $track_id = 'HLD' . $rnd_id; //final track id

        if($user->create()){

            $tracker = new tracker();

            $tracker->track_id = $track_id;
            $tracker->user_email = $user->email;
            $tracker->parcel_number = $user->parcel_number;
            $tracker->message = 'Your delivery order is being processed';
            $tracker->status = 'processing';

            $tracker->create();

            //send email
            $mail = new PHPMailer();

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'hyperlinksdelivery.com';                  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'info@hyperlinksdelivery.com';    // SMTP username
            $mail->Password = 'Info@123456';                         // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to

            //Recipients
            try {
                $mail->setFrom('info@hyperlinksdelivery.com', 'Hyperlinks Delivery');
            } catch (Exception $e) {
            }
            // $mail->addAddress('joe@example.net', 'Joe users');     // Add a recipient
            $mail->addAddress("$user->email", "$name");               // Name is optional
            $mail->addReplyTo('info@hyperlinksdelivery.com');
            $mail->addCC('marshall@hyperlinksdelivery.com'); //Add carbon copy
            $mail->addCC('info@hyperlinksdelivery.com'); //Add carbon copy

            //Email body
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'YOur Tracking ID';
            $mail->Body    = "<h3>Hello $name</h3> 
                            <p>Your tracking id is: <strong>$tracker->track_id</strong> Use this to track your parcel</p>";

            try {
                $sendEmail = $mail->Send();
            } catch (Exception $e) {
            }

            if ($sendEmail == false):
                echo "Something went wrong";
            endif;

//            $to = $user->email; // Send email to our user
//            $subject = 'Your Tracking ID' ; // Give the email a subject
//            $message = '
//
//            ------------------------
//            Hello '.$user->fname.' '.$user->fname.'
//            Your tracking id is: '.$track_id.'
//            Use this to track your parcel
//            ------------------------
//
//             '; // Our message above including the link
//
//            $headers =  'From: Hyperlinks Delivery'."\r\n".
//                        'Reply-To: info@hyperlinksdelivery.com'."\r\n" .
//                        'Bcc: info@hyperlinksdelivery.com' . "\r\n" .
//                        'X-Mailer: PHP/' . phpversion(); // Set from headers
//            mail($to, $subject, $message, $headers); // Send our email

            header("location:Get-tracking-id?success=" . urlencode("Your Tracking code has been generated. Tracking ID: $track_id, use this to track your parcel"));

        }

        }

    }else{
        header("location:Get-tracking-id?err=" . urlencode("Unable to get tracking id"));
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Track your parcel - Hyperlinks Delivery</title>

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
                    <h3 class="box-heading">Track Your Order</h3>
                    <p class="box-tagline">ENTER YOUR TRACK ID FOR INSTANT SEARCH</p>
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-0 col-xs-offset-0">

                        <form id="track_form" method='post' action="get_tracking_details.php" class="track-form">
                            <input type="text" name='track_id' placeholder="Track ID">
                            <i class="icon icon-magnify"></i>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- Header Tracking Box - End -->

        <!-- Header Content Slide - Start -->
        <div style="position:relative;display:inline-block;width:100%;height:auto;">
            <img src="img/banner-3s.jpg" alt="Header Image" class="img-responsive">
            <div class="bg-overlay"></div>
            <div class="main-wrap">
                <div class="container">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 main-content">

                        <?php
                        //display error messages
                        if(isset($_GET['err'])) {
                            ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                                <?php echo $_GET['err'];?>
                            </div>
                        <?php } ?>

                        <?php
                        //display error messages
                        if(isset($_GET['success'])) {
                            ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Congratulations!</h4>
                                <?php echo $_GET['success']; ?>
                            </div>
                        <?php } ?>

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

<section class="bg-black" id="worldwide">
    <div class="container">

        <div class="row">
            <div class="col-lg-8 col-md-8 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-sm-10  col-xs-offset-1 col-xs-10 ">
                <h1 style="color: #fff;" class="heading left-align">Get your Tracking ID</h1>
                <div class="headul left-align"></div>

                <p class="subheading left-align">Get your tracking ID for your product after making payment to any of our agents</p>

            </div>
            <div class="col-lg-4 col-md-4 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-sm-10  col-xs-offset-1 col-xs-10 ">
                <!-- Estimate Form - Start -->
                <div class="row">

                    <form action='get_tracking_id.php' method='post'>
                        <div class='col-xs-6'>
                            <label>First Name</label>
                            <input type='text' placeholder='First Name' class='transition' name="fname" id='est_qty' required>
                        </div>
                        <div class='col-xs-6'>
                            <label>Last Name</label>
                            <input type='text' placeholder='Last Name' class='transition' name="lname" id='est_weight' required>
                        </div>

                        <div class='col-xs-12'>
                            <label>Email Address</label>
                            <input type='text' placeholder='Email Address' class='transition' name="email" id='est_load_type' required>
                        </div>

                        <div class='col-xs-12'>
                            <label>Mobile Number</label>
                            <input type='number' placeholder='Mobile Number' class='transition' name="mobile" id='est_total'>
                        </div>

                        <div class='col-xs-12'>
                            <label>Parcel Number</label>
                            <input type='number' placeholder='Parcel Number' class='transition' name="parcel_number" id='est_total'>
                        </div>

                        <div class='col-xs-12'>
                            <button class="btn btn-primary" type="submit" name="submit">Get Your Code</button>
                        </div>
                    </form>

                </div>
                <!-- Estimate Form - End -->
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 pic">
                <img src="img/track_code_img.jpg" class="img-responsive style-dependent" alt="Estimate Fork Image">
            </div>
        </div>

        <div class="row">
            <div class="worldwide col-md-12 col-xs-12">
                <div class="map">
                    <img src="img/map.png" class="img-responsive" alt="Map image">
                </div>
                <div class="map-locations inviewport animated delay2 hiddenthis visiblethis fadeIn" data-effect="fadeIn">
                    <img src="img/map-locations-blue.png" class="img-responsive style-dependent" alt="Map Locations">
                </div>
                <div class="map-connect inviewport animated delay6 hiddenthis visiblethis fadeIn" data-effect="fadeIn">
                    <img src="img/map-connect-blue.png" class="img-responsive style-dependent" alt="Map Connections">
                </div>
            </div>
        </div>

    </div>
</section>

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

