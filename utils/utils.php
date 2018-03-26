<?php   

// DB class, implementes singleton design pattern, auto-connects
class DB {
    static protected $connection = null;

    protected function __construct() {
    }

    static function connect() {
        if (static::$connection===null) {
            static::$connection = new PDOExtended('mysql:host=localhost;dbname=andra_magazin_de_materiale', DB_USERNAME, DB_PASSWORD);
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




// always start session
session_start();
