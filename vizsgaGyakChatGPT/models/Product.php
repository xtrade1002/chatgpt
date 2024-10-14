<?php
require_once 'config/database.php';

class Product {

    public $id;
    public $serial_number;
    public $manufacturer;
    public $type;
    public $status;
    public $submission_date;
    public $last_status_change;

    public static function getActiveProducts() {
        $db = Database::getConnection();
        $stmt = $db->query("SELECT * FROM products WHERE status != 'Kész' OR (status = 'Kész' AND last_status_change = CURDATE()) ORDER BY FIELD(status, 'Beérkezett', 'Hibafeltárás', 'Alkatrész beszerzés alatt', 'Javítás', 'Kész')");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save() {
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO products (serial_number, manufacturer, type, status, submission_date, last_status_change) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$this->serial_number, $this->manufacturer, $this->type, $this->status, $this->submission_date, $this->last_status_change]);
        $this->id = $db->lastInsertId();
    }
}
