<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 10/4/2018
 * Time: 1:30 PM
 */

class Parcel extends dbObject
{

    protected static $db_table = "parcels";
    protected static $db_table_fields = array('number', 'description', 'origin', 'destination', 'status');

    public $id;
    public $number;
    public $description;
    public $origin;
    public $destination;
    public $status;

}