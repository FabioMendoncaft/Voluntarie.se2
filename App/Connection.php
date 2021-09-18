<?php

namespace App;

use PDOException;

class Connection {

    public static function getDb(){

        try {

            $conn = new \PDO(
                "mysql:host=localhost;dbname=baseteste;charset=utf8",
                "root",
                ""
            );
            return $conn;

        } catch (PDOException $e) {
            //throw $th;
        }

    }



}


?>