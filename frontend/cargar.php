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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TikTok</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/cargarVideo.css">
    <script src="js/all.js" crossorigin="anonymous"></script>
</head>

<body style="background-color: white;">
    <nav class="barra-superior navbar navbar-expand-lg navbar-light d-none d-sm-none d-md-block">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <img src="img/logo-1.svg" alt="">
            <img src="img/logo.svg" alt="">
        </div>
    </nav>

    <div class="container">
        <form action="" name="formSubir" id="subir-video">
            <div class="row contenido-principal" style="margin-left: 0%;">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <button type="bottom" class="btn btn-ligth"><i class="fas fa-arrow-left"></i> <a href="index.php">Volver</a> </button><br><br>
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
                                <input id="leyenda" class="form-control" type="text" required>
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
                                        <input class="form-check-input" type="radio" name="privacidad" id="publico" value="1" checked>
                                        <label class="form-check-label" for="publico">
                                            Publico
                                        </label>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="privacidad" id="Privado" value="0">
                                        <label class="form-check-label" for="Privado">
                                            Privado
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
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


    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/axios.min.js"></script>
    <script src="js/controlador.js"></script>
    <script src="js/publicaciones/cargarVideo.js"></script>


</body>

</html>