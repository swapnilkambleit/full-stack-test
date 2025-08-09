<?php
namespace App\Config;

use PDO;
use PDOException;
class Database
{
    private static ?PDO $connection = null;

    public static function connect (): PDO
    {
        if(self::$connection === null) {
            try {
                self::$connection = new PDO("mysql:host=localhost;dbname=wppoet_full_stack_test", "root", "");
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        return self::$connection;
    }
}