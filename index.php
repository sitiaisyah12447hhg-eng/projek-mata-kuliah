<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config/Database.php';
require_once 'models/MataKuliah.php';
require_once 'controllers/MataKuliahController.php';

// Membuat koneksi database
$database = new Database();
$db = $database->getConnection();

// Membuat objek model dan controller
$model = new MataKuliah($db);
$controller = new MataKuliahController($model);

// Menentukan halaman yang dibuka
$action = $_GET['action'] ?? 'index';

// Menjalankan controller
switch ($action) {

    case 'create':
        $controller->create();
        break;

    case 'edit':
        $controller->edit();
        break;

    case 'delete':
        $controller->delete();
        break;

    case 'index':
    default:
        $controller->index();
        break;
}

?>