<?php
include("../init.php");

$id = $_POST['id'];

$parcel = Parcel::findById($id);

if($parcel){
    $parcel->delete();
    echo "<div align='center' style='background-color:red; width:100%; padding-top:5px; padding-bottom:5px; margin-bottom:3px; color:#fff; '>Deleted</div>";
}else{
    echo "<div align='center' style='background-color:red; width:100%; padding-top:5px; padding-bottom:5px; margin-bottom:3px; color:#fff; '>Unable to delete</div>";
}

?>