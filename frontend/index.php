<?php
session_start();
if (!isset($_SESSION["token"])) {
    header("location: login.php");
}

if (!isset($_COOKIE["token"])) {
    header("location: login.php");
}

if ($_SESSION["token"] != $_COOKIE["token"]) {
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>TikTok</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/custom-movil.css">
    <link rel="stylesheet" href="css/cargarVideo.css">
    <script src="js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="menu-movil">
        <nav class="navbar navbar-expand-lg bg-dark fixed-bottom d-block d-sm-block d-md-none">
            <div class="row">
                <div class="col-2">
                    <a onclick="verInicio()"><img src="img/iconos-movil/home.svg" alt=""></a>
                    <!-- <div style="background-image: url('img/iconos-movil/home.svg');"></div> -->
                </div>
                <div class="col-2">
                    <img src="img/iconos-movil/lupa.svg" alt="">
                </div>
                <div class="col-4">
                    <a href="cargar.php"><img src="img/iconos-movil/subirvideo.svg" alt=""></a>
                </div>
                <div class="col-2">
                    <img src="img/iconos-movil/notificaciones.svg" alt="">
                </div>
                <div class="col-2" id="verperfil">
                    <img src="img/iconos-movil/perfil.svg" alt="" onclick="mostrarPerfil()">
                </div>
            </div>
        </nav>
    </div>

    <div class="">
        <nav class="barra-superior navbar navbar-expand-lg navbar-light d-none d-sm-none d-md-block">
            <div class="row">
                <div class="col-6">
                    <a href="index.html"><img src="img/logo-1.svg" alt="">
                        <img src="img/logo.svg" alt=""></a>
                </div>
                <div class="col-6">
                    <div class="my-2 my-md-0 my-lg-0 ml-auto" style="float: right;">
                        <a href="cargar.php"><img class="" src="img/iconos/subirvideo.svg" alt=""></a>

                        <a onclick="mostrarPerfil()" id="imagen-perfil" role="button" data-container="body" data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">Dismissible
                            popover></a>

                    </div>
                </div>
            </div>
        </nav>
    </div>


    <div class="">
        <aside class="barra-lateralpc d-none d-sm-none d-md-block">
            <div class="row">
                <div class="col-12 bl-caja">
                    <a onclick="verInicio()"><img src="img/home.svg" alt=""><span class="bl-opciones">Para ti</span></a>
                </div>
                <div class="col-12 bl-caja">
                    <img src="img/hashtag.svg" alt=""><span class="bl-opciones">Tendencias</span>
                </div>
                <div class="col-12 bl-caja">
                    <img src="img/users.svg" alt=""><span class="bl-opciones">Siguiendo</span>
                </div>
            </div><br><br>


            <div class="col-12 bl-enlaces">
                <a href="">Inicio</a><a href="">Acerca de</a><a href="">Sala de prensa</a><br>

            </div>
            <div class="col-12"><span>© 2020 TikTok</span></div>

        </aside>

        <section class="contenido-principal">
            <div class="row" id="seccionPublicaciones" style="display: block">
                <div class="col-md-2 col-lg-2 col-xl-2"></div>
                <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-4 contenedor-video" id="publicaciones">

                </div>
            </div>

            <!-- Sección perfil del usuario -->
            <div id="perfil-usuario" style="display: none">
                <div class=" row ">
                    <div class=" col-12 col-sm-12 col-md-4 col-lg-2 col-xl-2 ">
                        <div class=" d-flex justify-content-center ">
                            <img class=" img-fluid perfil-imagen " src="img/usuario.jpg" alt=" " style=" width: 120px; height: 120px; border-radius: 50%; ">
                        </div>
                    </div>
                    <div class=" col-12 col-sm-12 col-md-8 col-lg-3 col-xl-3 ">
                        <h3 class=" ml-auto d-flex justify-content-center "></h3>
                        <h5 class=" d-flex justify-content-center "></h5>
                        <div class=" d-flex justify-content-center ">
                            <button style=" width: 200px; " class=" btn btn-primary " type=" button ">Seguir</button>
                        </div>
                    </div>
                    <div class=" col-lg-7 col-xl-7 "></div>
                    <div class=" col-12 col-sm-12 col-md-10 col-lg-4 col-xl-4 " style=" padding: 20px; ">
                        <div class=" d-flex justify-content-center ">
                            <strong>27</strong>&nbspSiguiendo&nbsp
                            <strong>777</strong>&nbspSeguidores&nbsp
                            <strong>777</strong>&nbspMe gusta
                        </div>
                    </div>
                    <div class=" col-md-2 col-lg-8 col-xl-8 "></div>
                    <div class=" col-12 col-sm-12 col-md-12 col-lg-8 col-lx-8 ">
                        <div class=" row ">
                            <div class=" col-4 col-sm-4 ">
                                <div class=" miniatura-video ">
                                    <video class=" video " id=" video " autoplay muted loop>
                                        <source src=" videos/video.mp4 " type=" video/mp4 ">
                                    </video>
                                </div>
                            </div>
                            <div class=" col-4 col-sm-4 ">
                                <div class=" miniatura-video ">
                                    <video class=" video " id=" video " autoplay muted loop>
                                        <source src=" videos/video.mp4 " type=" video/mp4 ">
                                    </video>
                                </div>
                            </div>
                            <div class=" col-4 col-sm-4 ">
                                <div class=" miniatura-video ">
                                    <video class=" video " id=" video " autoplay muted loop>
                                        <source src=" videos/video.mp4 " type=" video/mp4 ">
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Fin seccion perfil del usuario -->
        </section>

        <form action="" id="subir-video" style="display: none">
            <div class="row contenido-principal" style="margin-left: 0%;">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <h1 class="titulo-cargar">Cargar Video</h1>
                    <span class="subtitulo-cargar">Este video se publicará en @flaviobetanco</span><br>
                </div>

                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" style="padding-top: 25px;">
                    <div class="form-group">
                        <input id="file-video" class="" type="file" name="file-video" required>
                        <label id="input-adArchivo" for="file-video" class="form-control btn" style="background-color: #f0f2f5;">
                            <h5 id="nombreArchivo">Adjuntar Video</h5>
                        </label>
                    </div>
                    <div id="barraEstado-padre" class="">
                        <div class="" id="barraEstado-hijo" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8" style="padding-top: 25px;">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label for="">
                                    <h5>Leyenda</h5>
                                </label>
                                <input class="form-control" type="text" required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">
                                            <h5>Quién puede ver este video</h5>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="publico" value="option1" checked>
                                        <label class="form-check-label" for="publico">
                                            Publico
                                        </label>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="Privado" value="option1">
                                        <label class="form-check-label" for="Privado">
                                            Privado
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">
                                            <h5>Permitir que otros puedan Comentar</h5>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="si" value="option1" checked>
                                        <label class="form-check-label" for="si">
                                            Si
                                        </label>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="no" value="option1">
                                        <label class="form-check-label" for="no">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12" style="padding-top: 25px;">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input class="form-control btn-ligth" type="button" value="Descartar">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input id="btn-cargar" class="form-control btn-primary" type="submit" value="Cargar">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </form> -->
            </div>
        </form>

    </div>


    <script src=" js/jquery-3.4.1.min.js "></script>
    <script src=" js/popper.min.js "></script>
    <script src=" js/bootstrap.min.js "></script>
    <script src=" js/axios.min.js "></script>
    <script src=" js/controlador.js "></script>
    <script src=" js/publicaciones/controlador.js "></script>
    <script src="js/publicaciones/cargarVideo.js"></script>
</body>

</html>