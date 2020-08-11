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

    public static function verificarUsuario($correo, $contrasena)
    {
        $contenidoArchivoUsuarios = file_get_contents('../data/usuarios.json');
        $usuarios = json_decode($contenidoArchivoUsuarios, true);

        for ($i = 0; $i < sizeof($usuarios); $i++) {
            if ($usuarios[$i]['correo'] == $correo && $usuarios[$i]['contrasena'] == sha1($contrasena)) {
                return $usuarios[$i];
            } else {
                return null;
            }
        }

    }

    public static function mostrarUsuarios()
    {
        $contenidoArchivoUsuarios = file_get_contents('../data/usuarios.json');
        $usuarios = json_decode($contenidoArchivoUsuarios, true);

        echo json_encode($usuarios);
    }
}
