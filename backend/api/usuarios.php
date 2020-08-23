<?php
include_once("../class/class-usuario.php");
header("Content-Type: application/json");
$_POST = json_decode(file_get_contents('php://input'), true);

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $usuario = new Usuario(
            $_POST["nombre"],
            $_POST["apellido"],
            $_POST["correo"],
            $_POST["nombreUsuario"],
            $_POST["fechaNacimiento"],
            $_POST["contrasena"]
        );

        $usuario->guardarUsuario();

        echo '{"mensaje" : "Usuario Creado con éxito"}';
        break;
    case 'GET':
        if (isset($_GET["codigoUsuario"])) {
            Usuario::obtenerUsuario($_GET["codigoUsuario"]);
        } else {
            $usuarios = Usuario::mostrarUsuarios();
            echo json_decode($usuarios);
        }

        break;
    case 'PUT':
        // Actualizar
        break;
    case 'DELETE':
        // Eliminar
        break;
}
