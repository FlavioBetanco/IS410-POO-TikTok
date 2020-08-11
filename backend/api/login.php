<?php
header("Content-Type: application/json");
include_once("../class/class-usuario.php");
$_POST = json_decode(file_get_contents('php://input'), true);

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $usuario = Usuario::verificarUsuario($_POST['correo'], $_POST['contrasena']);
        if ($usuario !=null){
            // echo '{"codigoResultado": 1, "mensaje": "Sesión Iniciada","token" : "'.sha1(uniqid(rand(), true)).'"}';
            $resultado = array(
                "codigoResultado" => 1,
                "mensaje" => "Sesión Iniciada",
                "token" => sha1(uniqid(rand(), true))
            );
            setcookie("token", $resultado["token"], time()+(60*60*24*31), "/");
            echo json_encode($resultado);
        } else {
            setcookie("token", "", time()-1, "/");
            echo '{"codigoResultado": 0, "mensaje": "Usuario/contrasena incorrectos"}';
        }
        // echo json_encode($_POST);
        break;
}

// echo sha1("hola");