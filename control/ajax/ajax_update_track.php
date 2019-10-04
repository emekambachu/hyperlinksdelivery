<?php
require('../init.php');

    if(isset($_POST['id'])){

        $id = $_POST['id'];

        $track = Tracker::findById($id);

        if($track){

            $track->departure = $_POST['departure'];
            $track->first_stop = $_POST['first_stop'];
            $track->second_stop = $_POST['second_stop'];
            $track->third_stop = $_POST['third_stop'];
            $track->arrival = $_POST['arrival'];
            $track->message = $_POST['message'];
            $track->status = $_POST['status'];

            $track->save();

            echo "<div align='center' style='background-color:green; width:100%; padding-top:5px; padding-bottom:5px; margin-bottom:3px; color:#fff; '>Updated</div>";
        }
    }

?>