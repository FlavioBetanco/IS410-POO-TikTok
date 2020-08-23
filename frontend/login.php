
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body style="background-color: #f0f2f5; padding-top: 100px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4"></div>
            <div class="card col-12 col-sm-12 col-md-4 col-lg-4">
                <div style="background-color: white;">

                    <div id="msj-login" class="alert alert-danger" style="text-align: center; display: none; margin-top: 10px">Sesión Iniciada
                    </div>

                    <div class="col-12 text-center" style="padding-top:25px">
                        <img class="img-fluid" src="img/logo-1.svg" alt=""><img class="img-fluid" src="img/logo.svg" alt="">
                    </div>

                    <h2 style="text-align: center;">Iniciar Sesión</h2><br>
                    <!-- <h6>Correo Electronico o nombre de usuario</h6> -->
                    <form action="">
                        <div class="form-gruop">
                            <input id="correo" type="email" class="form-control" placeholder="Correo electronico o nombre de usuario" required>
                        </div>
                        <div class="form-gruop">
                            <input id="contrasena" type="password" class="form-control" placeholder="Contraseña" required>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <button type="button" class="btn btn-light form-control" onclick="login();">Iniciar
                                Sesión</button>
                        </div><br>
                        <hr>

                        <div class="form-gruop">
                            <input class="btn btn-primary form-control" type="button" value="Crear Cuenta" onclick="mostrarModalRegistro()"><br><br>
                        </div>


                    </form>
                </div>
            </div>
            <div class="col-md-4 col-lg-4"></div>
        </div>
    </div>

    <!-- Modal registro de usuarios -->
    <div class="modal fade" id="modalRegistrarse" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarseLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modalLogin-body">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-2 col-lg-2"></div>
                            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                                <h3 style="text-align: center;">Registrarse</h3><br>

                                <form action="">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            <div id="msj-registro" class="alert alert-danger" style="text-align: center; display: none; margin-top: 10px">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12"><input id="fechaNacimiento" type="date" class="form-control" placeholder="Fecha de Nacimiento" required></div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                            <input id="nombre" type="text" class="form-control" placeholder="Nombre" required>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                            <input id="apellido" type="text" class="form-control" placeholder="Apellido" required>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            <input id="correoElectronico" type="email" class="form-control" placeholder="Dirección de correo electrónico" required>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            <input id="password" type="text" class="form-control" placeholder="Contraseña" required>
                                        </div>
                                        <br><br><br><br>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            <input type="button" value="Siguiente" class="btn btn-primary form-control" onclick="registrarUsuario()">
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 texto-acuerdo">
                                            <p>Al continuar, confirmas que estás de acuerdo con los Términos de uso de TikTok y que has leído la Política de privacidad de TikTok. Si te registras con SMS, puede que se aplique una tarifa por SMS.</p>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div class="col-md-2 col-lg-2"></div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <p>¿Ya tienes cuenta?</p><a onclick="iniciarSesion()" class="btn-registrarse"> iniciar
                        Sesión</a>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/axios.min.js"></script>
    <script src="js/login.js"></script>
</body>

</html>