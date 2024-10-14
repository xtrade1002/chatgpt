<?php
require_once 'config/database.php';
require_once 'controllers/ProductController.php';


// Egyszerű útvonalak kezelése
$page = isset($_GET['page']) ? $_GET['page'] : 'service_overview';

$controller = new ProductController();

switch ($page) {
    case 'product_submission':
        $controller->submitProduct();
        break;
    case 'service_overview':
    default:
        $controller->showServiceOverview();
        break;
}



error_reporting(E_ALL);
ini_set('display_errors', 1);

?>


