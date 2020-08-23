<?php
class Publicacion
{
    private $codigoPublicacion;
    private $codigoUsuario;
    private $leyenda;
    private $privacidad;
    private $urlVideo;
    private $cantidadLikes;
    private $comentarios;

    public function __construct(
        $codigoPublicacion,
        $codigoUsuario,
        $leyenda,
        $privacidad,
        $urlVideo,
        $cantidadLikes,
        $comentarios
    ) {
        $this->codigoPublicacion = $codigoPublicacion;
        $this->codigoUsuario = $codigoUsuario;
        $this->leyenda = $leyenda;
        $this->privacidad = $privacidad;
        $this->urlVideo = $urlVideo;
        $this->cantidadLikes = $cantidadLikes;
        $this->comentarios = $comentarios;
    }

    public static function mostrarPublicaciones()
    {
        $resultado = array();
        $contenidoArchivoPublicaciones = file_get_contents('../data/publicaciones.json');
        $publicacion = json_decode($contenidoArchivoPublicaciones, true);
        $publicaciones = [];

        // Obtine todas las publicaciones que no son privadas
        for ($i = 0; $i < sizeof($publicacion); $i++) {
            if ($publicacion[$i]["privacidad"] != 0) {
                $publicaciones[] = $publicacion[$i];
            }
        }

        //Obtiene los datos de los usuarios
        $contenidoArchivoUsuarios = file_get_contents('../data/usuarios.json');
        $usuario = json_decode($contenidoArchivoUsuarios, true);

        // Obtiene la data almacenada en el archivo comentarios.json
        $contenidoArchivoComentarios = file_get_contents('../data/comentarios.json');
        $comentarios = json_decode($contenidoArchivoComentarios, true);

        for ($i = 0; $i < sizeof($publicaciones); $i++) {
            for ($j = 0; $j < sizeof($usuario); $j++) {
                if ($publicaciones[$i]["codigoUsuario"] == $usuario[$j]["codigoUsuario"]) {
                    $publicaciones[$i]["nombreUsuario"] = $usuario[$j]["nombreUsuario"];
                    $publicaciones[$i]["imagenUsuario"] = $usuario[$j]["imagen"];
                }
            }

            $publicaciones[$i]["comentarios"] = array();

            for ($j = 0; $j < sizeof($comentarios); $j++) {
                if ($publicaciones[$i]["codigoPublicacion"] == $comentarios[$j]["codigoPost"]) {
                    $publicaciones[$i]["comentarios"][] = $comentarios[$j];
                }
            }
            $resultado[] = $publicaciones[$i];
        }
        echo json_encode($resultado);
        // echo json_encode($comentarios);
    }

    public function guadarPublicacion()
    {
        $contenidoArchivoPublicaciones = file_get_contents('../data/publicaciones.json');
        $publicaciones = json_decode($contenidoArchivoPublicaciones, true);

        $publicaciones[] = array(
            "codigoPublicacion" => sizeof($publicaciones) + 1,
            "codigoUsuario" => $this->codigoUsuario,
            "leyenda" => $this->leyenda,
            "privacidad" => $this->privacidad,
            "urlVideo" => $this->urlVideo,
            "cantidadLikes" => $this->cantidadLikes,
            "comentarios" => $this->comentarios
        );

        $archivo = fopen("../data/publicaciones.json", "w");
        fwrite($archivo, json_encode($publicaciones));
        fclose($archivo);
    }


    // Medotos SET y GET

    public function getCodigoPublicacion()
    {
        return $this->codigoPublicacion;
    }

    public function setCodigoPublicacion($codigoPublicacion)
    {
        $this->codigoPublicacion = $codigoPublicacion;

        return $this;
    }

    public function getCodigoUsuario()
    {
        return $this->codigoUsuario;
    }

    public function setCodigoUsuario($codigoUsuario)
    {
        $this->codigoUsuario = $codigoUsuario;

        return $this;
    }

    public function getLeyenda()
    {
        return $this->leyenda;
    }

    public function setLeyenda($leyenda)
    {
        $this->leyenda = $leyenda;

        return $this;
    }

    public function getPrivacidad()
    {
        return $this->privacidad;
    }

    public function setPrivacidad($privacidad)
    {
        $this->privacidad = $privacidad;

        return $this;
    }

    public function getUrlVideo()
    {
        return $this->urlVideo;
    }

    public function setUrlVideo($urlVideo)
    {
        $this->urlVideo = $urlVideo;

        return $this;
    }

    public function getCantidadLikes()
    {
        return $this->cantidadLikes;
    }

    public function setCantidadLikes($cantidadLikes)
    {
        $this->cantidadLikes = $cantidadLikes;

        return $this;
    }

    public function getComentarios()
    {
        return $this->comentarios;
    }

    public function setComentarios($comentarios)
    {
        $this->comentarios = $comentarios;

        return $this;
    }
}
