<?php

    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

    defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'wamp64' . DS . 'www'. DS . 'hyperlinksdelivery');

    defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'control'.DS.'class');

    //Important Classes
    require_once("class/db.php");
    require_once("class/autoloader.php");
    require_once("class/db_object.php");
    
    //User specific Classes
    require_once("class/user.php");
    require_once("class/tracker.php");
    require_once("class/parcel.php");

    //admin specific
    require_once("class/admin.php");
    require_once("class/admin_session.php");

    //functions
    require_once("functions/time_ago.php");
    require_once("functions/get_location.php");
    require_once("functions/pretty_url.php");
    require_once("functions/get_name.php");
    require_once("functions/get_count.php");
    require_once("functions/get_sum.php");

?>