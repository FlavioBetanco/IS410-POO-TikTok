<?php
session_start();
header("Content-Type: application/json");
include_once("../class/class-usuario.php");
$_POST = json_decode(file_get_contents('php://input'), true);

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $usuario = Usuario::verificarUsuario($_POST['correo'], $_POST['contrasena']);
        
        if ($usuario !=null){
            $resultado = array(
                "codigoResultado" => 1,
                "mensaje" => "Sesión Iniciada",
                "token" => sha1(uniqid(rand(), true))
            );
            $_SESSION["token"] = $resultado["token"];
            setcookie("token", $resultado["token"], time()+(60*60*24*31), "/");
            setcookie("nombre", $usuario["nombre"], time()+(60*60*24*31), "/");
            setcookie("apellido", $usuario["apellido"], time()+(60*60*24*31), "/");
            setcookie("correo", $usuario["correo"], time()+(60*60*24*31), "/");
            setcookie("imagen", $usuario["imagen"], time()+(60*60*24*31), "/");
            setcookie("codigoUsuario", $usuario["codigoUsuario"], time()+(60*60*24*31), "/");
            echo json_encode($resultado);
            // echo json_encode($usuario);

        } else {
            setcookie("token", "", time()-1, "/");
            echo '{"codigoResultado": 0, "mensaje": "Usuario/contrasena incorrectos"}';
            // echo json_encode($usuario);
        }
        // echo json_encode($_POST);
        break;
}

// echo sha1("hola");