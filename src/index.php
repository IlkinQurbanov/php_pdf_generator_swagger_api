<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\PdfController;

$controller = new PdfController();

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($path) {
    case '/generate-pdf':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->generatePdf();
        } else {
            http_response_code(405); // Method Not Allowed
            echo json_encode(['message' => 'Method Not Allowed']);
        }
        break;
    default:
        http_response_code(404);
        echo json_encode(['message' => 'Not Found']);
        break;
}
