<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/controllers/PatientController.php';

$controller = new PatientController($conn);

// Check if cure action is requested
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cure'])) {
    $controller->markAsCured($_POST['cure']);
    header("Location: views/index.php");
    exit;
}

// Redirect to the main view
header("Location: views/index.php");
