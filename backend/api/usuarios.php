<?php
include_once("../class/class-usuario.php");
header("Content-Type: application/json");
$_POST = json_decode(file_get_contents('php://input'), true);

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        // Guardar
        break;
    case 'GET':
        $usuarios = Usuario::mostrarUsuarios();
        echo json_decode($usuarios);
        break;
    case 'PUT':
        // Actualizar
        break;
    case 'DELETE':
        // Eliminar
        break;
}
