<?php

class Admin extends dbObject{

    protected static $db_table = "admin";
    protected static $db_table_fields = array('uname', 'pword');

    public $id;
    public $uname;
    public $pword;


    public static function getCommonAdmins(){
        return static::findByQuery("SELECT * FROM " . static::$db_table ." WHERE level = 'common' ORDER BY id DESC ");
    }

    public static function getCommonAdminId($id){
        global $db;
        $theResultArray = static::findByQuery("SELECT * FROM " . static::$db_table ." WHERE id = '$id' AND level = 'common' LIMIT 1");

        return !empty($theResultArray) ? array_shift($theResultArray) : false;
    }


    public static function verifyUser($uname, $pword){
        global $db;

        $uname = $db->escapeString($uname);
        $pword = $db->escapeString($pword);

        $sql = "SELECT * FROM " . self::$db_table ." WHERE ";
        $sql .= "uname = '{$uname}' ";
        $sql .= "AND pword = '{$pword}' ";
        $sql .= " LIMIT 1 ";

        $theResultArray = self::findByQuery($sql);

        return !empty($theResultArray) ? array_shift($theResultArray) : false;
    }

}

?>