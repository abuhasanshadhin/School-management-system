<?php

class DB{
    protected static $host     = "localhost";
    protected static $username = "root";
    protected static $password = "";
    protected static $database = "high_school";

    /**
     * @return mysqli
     */
    public static function connection()
    {
        try{
            $mysqli = new mysqli(self::$host, self::$username, self::$password, self::$database);
            return $mysqli;
        }catch (Exception $e){
            die("Server not connected ! ".$e->getMessage());
        }
    }

    public static function select($query)
    {
        $data = self::connection()->query($query);
        return $data;
    }

    public static function insert($query)
    {
        $data = self::connection()->query($query);
        return $data;
    }

    public static function update($query)
    {
        $data = self::connection()->query($query);
        return $data;
    }

    public static function delete($query)
    {
        $data = self::connection()->query($query);
        return $data;
    }

}