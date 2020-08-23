<?php
header("Content-Type: application/json");
include_once("../class/class-publicacion.php");
$_POST = json_decode(file_get_contents('php://input'), true);

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $publicacion = new Publicacion(
            $_POST["codigoPublicacion"],
            $_POST["codigoUsuario"],
            $_POST["leyenda"],
            $_POST["privacidad"],
            "videos/" . $_POST["urlVideo"],
            $_POST["cantidadLikes"],
            $_POST["comentarios"]
        );

        $publicacion->guadarPublicacion();

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
