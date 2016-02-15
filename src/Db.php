<?php

class Db
{
	private static $db;
     
    public static function init()
    {
        if (!self::$db)
        {
            try {
                $dsn = "mysql:host=".Config::$db_host.";dbname=".Config::$db_name.";charset=utf8";
                self::$db = new PDO($dsn, Config::$db_user, Config::$db_pass);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                exit("Connection error: " . $e->getMessage());
            }
        }
        return self::$db;
    }

    public function __construct() {}
    public function __clone() {}
}