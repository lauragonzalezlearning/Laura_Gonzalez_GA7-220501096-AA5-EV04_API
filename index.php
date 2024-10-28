<?php 

// Configuración de CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Instanciar los archivos necesarios
require('./config.php');
require('./usuariosModel.php');
require('./usuariosController.php');

// URL de la API
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Se separa la API mediante /
$url_api = explode('/', $url);

// Instanciamos los controladores
$controlador = new usuariosController();

if (isset($url_api[1]) && $url_api[1] === 'usuarios') {
    if (isset($url_api[2]) && $url_api[2] !== '') {
        // Validar que el ID sea numérico
        if (is_numeric($url_api[2])) {
            header('Content-Type: application/json');
            $controlador->MostrarUsuariosId($url_api[2]);
        } else {
            http_response_code(400);
            header('Content-Type: application/json');
            echo json_encode(['mensaje' => 'ID inválido']);
        }
    } else {
        header('Content-Type: application/json');
        $controlador->MostrarUsuarios();
    }
} else {
    http_response_code(404);
    header('Content-Type: application/json');
    echo json_encode(['mensaje' => 'API NO INICIALIZADA']);
}