<?php
/*
    Database class
*/

class database{
    public static $db_host="localhost";
    public static $db_user="root";
    public static $db_pass="";
    public static $db_name="kpisms_db";



    public static function connect(){
        $db= new mysqli(self::$db_host,self::$db_user,self::$db_pass,self::$db_name);
        $db->set_charset('utf8');
        if(!$db){
            return "Connection fail";
        }else{
            return $db;
        }
    }
}
?>