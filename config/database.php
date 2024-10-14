<?php

class Database {
    private static $db;
     
    public static function getConnection() {
       
        // Ellenőrzi, hogy van-e már egy adatbázis kapcsolat
        if (self::$db === null) {
            try {
                // Kapcsolódás az adatbázishoz
                self::$db = new PDO('mysql:host=127.0.0.1;dbname=service', 'root', '');
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                // Hiba esetén kivétel dobása
                die('Adatbázis kapcsolódási hiba: ' . $e->getMessage());
            }
        }

        // Visszaadja az adatbázis kapcsolatot
        return self::$db;
    }
}



