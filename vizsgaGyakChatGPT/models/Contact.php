<?php
require_once 'config/database.php';

class Contact {
    public $id;
    public $product_id;
    public $name;
    public $phone;
    public $email;

    public function save() {
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO contacts (product_id, name, phone, email) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $this->product_id,
            $this->name,
            $this->phone,
            $this->email
        ]);
        $this->id = $db->lastInsertId();
    }
}
