<?php
// DEBUG
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Establecer encabezados CORS para permitir cualquier origen
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: *");

// Verificar si es una solicitud OPTIONS (preflight)
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    // La solicitud es un preflight, responder y salir
    header("HTTP/1.1 200 OK");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, Content-Type, Accept");
    exit;
}

require_once '../controllers/sociController.php';
require_once '../models/subscripcioModel.php';


$soci = new Soci();
