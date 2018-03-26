<?php   

// DB class, implementes singleton design pattern, auto-connects
class DB {
    static protected $connection = null;

    protected function __construct() {
    }

    static function connect() {
        if (static::$connection===null) {
            static::$connection = new PDOExtended('mysql:host=localhost;dbname=andra_patri', DB_USERNAME, DB_PASSWORD);
            static::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }

        return static::$connection;
    }
}

class PDOExtended extends PDO {
    public function getAll($query, $bindData)
    {
        $smt = $this->prepare($query);
        $smt->execute($bindData);
        return $smt->fetchAll();

    }

    public function getRow($query, $bindData){
        return $this->getAll($query, $bindData)[0];
    }
}

// setup environment
ini_set('display_errors', '1');
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('UTC');



// always start session
session_start();
