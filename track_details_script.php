<?php

require("control/init.php");

if(isset($_POST['track_id'])) {

    $track_id = trim($_POST['track_id']);

    $tracker = Tracker::findtrack($track_id);

    //redirect page if exists
    if($tracker) {
        header("location:Get-tracking-details?id=$track_id");
    }else{
        header("location:Track-parcel?err=" . urlencode("Unable to get tracking details, tracking ID not available"));
    }
}
?>