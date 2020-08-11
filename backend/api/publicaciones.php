<?php
header("Content-Type: application/json");
include_once("../class/class-publicacion.php");
$_GET = json_decode(file_get_contents('php://input'), true);

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        break;
    case 'GET':
        $publicaciones = Publicacion::mostrarPublicaciones();
        echo json_decode($publicaciones);

        break;
    case 'PUT':
        // Actualizar
        break;
    case 'DELETE':
        // Eliminar
        break;
}
