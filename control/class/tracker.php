<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 10/4/2018
 * Time: 1:30 PM
 */

class Tracker extends dbObject
{
    protected static $db_table = "trackers";
    protected static $db_table_fields = array('track_id', 'departure', 'first_stop', 'second_stop', 'third_stop', 'arrival', 'parcel_number', 'user_id', 'user_email', 'message', 'status');

    public $id;
    public $track_id;
    public $departure;
    public $first_stop;
    public $second_stop;
    public $third_stop;
    public $arrival;
    public $parcel_number;
    public $user_id;
    public $user_email;
    public $message;
    public $status;

    public static function findtrack($track_id){
        global $db;
        $theResultArray = static::findByQuery("SELECT * FROM " . static::$db_table ." WHERE track_id = '$track_id' LIMIT 1");

        return !empty($theResultArray) ? array_shift($theResultArray) : false;
    }
}