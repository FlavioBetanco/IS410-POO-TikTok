<?php
class Publicacion
{
    private $codigoPublicacion;
    private $codigoUsuario;
    private $leyenda;
    private $privacidad;

    


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
}
