<?php

class User extends dbObject{
	
	protected static $db_table = "users";
	protected static $db_table_fields = array('fname', 'lname', 'email', 'mobile', 'parcel_number', 'status');
	
	public $id;
	public $fname;
	public $lname;
	public $email;
	public $mobile;
	public $parcel_number;
    public $status;

    public static function checkUser($email, $parcel_number){
        return static::findByQuery("SELECT * FROM " . static::$db_table ." WHERE email = '$email' AND parcel_number = '$parcel_number' AND status <> 'completed' ORDER BY id DESC ");
    }

}

?>