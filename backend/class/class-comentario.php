<?php

    class Comentario
    {
        private $codigoComentario;
        private $codigoPost;
        private $codigoUsuario;
        private $comentario;
        private $cantidadLikes;

        
        // Metodos SET y GET
        public function getCodigoComentario()
        {
                return $this->codigoComentario;
        }

        public function setCodigoComentario($codigoComentario)
        {
                $this->codigoComentario = $codigoComentario;

                return $this;
        }

        public function getCodigoPost()
        {
                return $this->codigoPost;
        }

        public function setCodigoPost($codigoPost)
        {
                $this->codigoPost = $codigoPost;

                return $this;
        }

        /**
         * Get the value of codigoUsuario
         */ 
        public function getCodigoUsuario()
        {
                return $this->codigoUsuario;
        }

        public function setCodigoUsuario($codigoUsuario)
        {
                $this->codigoUsuario = $codigoUsuario;

                return $this;
        }

        public function getComentario()
        {
                return $this->comentario;
        }
 
        public function setComentario($comentario)
        {
                $this->comentario = $comentario;

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
    }
?>