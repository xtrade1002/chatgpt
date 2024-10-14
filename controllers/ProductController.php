<?php
require_once 'models/Product.php';
require_once 'models/Contact.php';



class ProductController {
    

    public function submitProduct() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $serial_number = $_POST['serial_number'];
            $manufacturer = $_POST['manufacturer'];
            $type = $_POST['type'];
            $contact_name = $_POST['contact_name'];
            $contact_phone = $_POST['contact_phone'];
            $contact_email = $_POST['contact_email'];

            // Termék létrehozása
            $product = new Product();
            $product->serial_number = $serial_number;
            $product->manufacturer = $manufacturer;
            $product->type = $type;
            $product->status = 'Beérkezett';
            $product->submission_date = date('Y-m-d');
            $product->last_status_change = date('Y-m-d');
            $product->save();



            // Kapcsolattartó létrehozása
            $contact = new Contact();
            $contact->product_id = $product->id;
            $contact->name = $contact_name;
            $contact->phone = $contact_phone;
            $contact->email = $contact_email;
            $contact->save();

            // Átirányítás az összesítő oldalra
            header('Location: /Programozas/Webfejleszto_php/vizsgaGyakChatGPT/index.php?page=service_overview');

        } else {
            require 'views/product_submission.php'; // Form megjelenítése
        }
    }

    public function showServiceOverview() {
        $products = Product::getActiveProducts(); // Lekéri az éppen szervizben lévő termékeket
        require 'views/service_overview.php'; // Átadja az adatokat a nézetnek
    }
}
