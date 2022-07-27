<?php
class Database {
    //Development connection
    //private static $dsn = 'mysql:host=localhost;dbname=music_database';
    //private static $username = 'root';
    //private static $password = 'sesame';
    //private static $db;
    
    //Remote Database Connection
    private static $dsn = 'mysql:host=remotemysql.com;dbname=UkK8JbXPP9';
    private static $username = 'UkK8JbXPP9';
    private static $password = 'u9dpbBRT5b';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }
}
?>
