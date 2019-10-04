<?php
require("../init.php");

if(!$adminSession->isSignedIn()){
    redirect("Login");
}

    $parc = new Parcel();

    if($parc) {

        $parc->number = trim($_POST['number']);
        $parc->description = trim($_POST['description']);
        $parc->origin = trim($_POST['origin']);
        $parc->destination = trim($_POST['destination']);
        $parc->status = trim($_POST['status']);

        if($parc->create()){
            echo "							
                <div class='alert alert-success alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-check'></i> Alert!</h4>
                    Parcel $parc->number Created
                </div>
            ";
        }
}
?>