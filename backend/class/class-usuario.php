<?php
class Usuario
{
    private $codigoUsuario;
    private $nombre;
    private $apellido;
    private $correElectronico;
    private $nombreUsuario;
    private $fechaNacimiento;
    private $contrasena;

    // Constructor
    public function __construct(
        $nombre,
        $apellido,
        $correElectronico,
        $nombreUsuario,
        $fechaNacimiento,
        $contrasena
    ) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correElectronico = $correElectronico;
        $this->nombreUsuario = $nombreUsuario;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->contrasena = $contrasena;
    }

    public static function verificarUsuario($correo, $contrasena)
    {
        $contenidoArchivoUsuarios = file_get_contents('../data/usuarios.json');
        $usuarios = json_decode($contenidoArchivoUsuarios, true);

        for ($i = 0; $i < sizeof($usuarios); $i++) {
            if ($usuarios[$i]["correo"] == $correo && $usuarios[$i]["contrasena"] == sha1($contrasena)) {
                return $usuarios[$i];
            }
        }

        return null;
    }

    // Obtiene todos los usuario registrados
    public static function mostrarUsuarios()
    {
        $contenidoArchivoUsuarios = file_get_contents('../data/usuarios.json');
        $usuarios = json_decode($contenidoArchivoUsuarios, true);

        echo json_encode($usuarios);
    }

    // Obtiene un usuario
    public static function obtenerUsuario($codigoUsuario)
    {
        $contenidoArchivoUsuarios = file_get_contents('../data/usuarios.json');
        $usuarios = json_decode($contenidoArchivoUsuarios, true);

        $usuario = array();

        for ($i = 0; $i < sizeof($usuarios); $i++) {
            if ($usuarios[$i]["codigoUsuario"] == $codigoUsuario) {
                $usuario = $usuarios[$i];
            }
        }

        echo json_encode($usuario);
    }

    // Guarda un usuario
    public function guardarUsuario()
    {
        $contenidoArchivoUsuarios = file_get_contents('../data/usuarios.json');
        $usuarios = json_decode($contenidoArchivoUsuarios, true);
        $usuarios[] = array(
            "codigoUsuario" => sizeof($usuarios) + 1,
            "nombre" => $this->nombre,
            "apellido" => $this->apellido,
            "correo" => $this->correElectronico,
            "nombreUsuario" => $this->nombreUsuario,
            "fechaNacimiento" => $this->fechaNacimiento,
            "contrasena" => sha1($this->contrasena),
            "siguiendo" => '',
            "imagen" => "img/fotos-perfil/default.png"
        );

        $archivo = fopen("../data/usuarios.json", "w");
        fwrite($archivo, json_encode($usuarios));
        fclose($archivo);
    }

    // Metodos SET y GET    
    public function getCodigoUsuario()
    {
        return $this->codigoUsuario;
    }

    public function setCodigoUsuario($codigoUsuario)
    {
        $this->codigoUsuario = $codigoUsuario;

        return $this;
    }


    public function getCorreElectronico()
    {
        return $this->correElectronico;
    }

    public function setCorreElectronico($correElectronico)
    {
        $this->correElectronico = $correElectronico;

        return $this;
    }

    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;

        return $this;
    }

    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    public function getContrasena()
    {
        return $this->contrasena;
    }

    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;

        return $this;
    }
}
