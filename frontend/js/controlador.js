function iniciarSesion() {
    $('#modalLogin').modal('show');
    $('#modalRegistrarse').modal('hide');
}

function registrarUsuario() {
    $('#modalLogin').modal('hide');
    $('#modalRegistrarse').modal('show');
}

function ocultaModalLogin() {
    $('#modalLogin').modal('hide');
}

//Activar Camara para grabar video
function activarCamara() {
    navigator.getUserMedia =
        navigator.getUserMedia ||
        navigator.webkitGetUserMedia ||
        navigator.mozGetUserMedia ||
        navigator.msGetUserMedia;
    window.URL = window.URL ||
        window.webkitURL ||
        window.mozURL ||
        window.msURL;

    var video = document.querySelector('video');

    if (navigator.getUserMedia) {
        navigator.getUserMedia({ audio: true, video: true },
            function(stream) {
                var mediaRecorder = new MediaRecorder(stream);
                video.src = window.URL.createObjectURL(stream);
                console.log(video.src);
            },
            function() {
                document.writeLn("problema");
            });
    } else {
        document.writeLn("video capture no soporta");
    }
    $("#stop").click(function() {
        mediaRecorder.stop();
    });
}

// activarCamara();


// Login de usuarios
function login() {
    axios({
        url: "../backend/api/login.php",
        method: "post",
        responseType: "json",
        data: {
            correo: document.getElementById('correo').value,
            contrasena: document.getElementById('contrasena').value
        }
    }).then(res => {
        if (res.data.codigoResultado == 1) {
            document.getElementById('msj-login').style.display = 'block';
            document.getElementById('msj-login').innerHTML = res.data.mensaje;
            setTimeout('ocultaModalLogin()', 1500);
            document.getElementById('btn-login').style.display = 'none';
            document.getElementById('foto-perfil').style.display = 'block';
            // console.log(res.data.codigoResultado);

        } else {
            document.getElementById('msj-login').style.display = 'block';
            document.getElementById('msj-login').innerHTML = res.data.mensaje;
        }
        console.log(res.data);
    }).catch(err => {
        console.log(err);
    })
}

// iniciarSesion();

// Muestra las publicaciones de todos los usuarios

function mostrarPublicaciones() {
    let publicaciones = [];
    let usuarios = [];
    axios({
        url: "../backend/api/publicaciones.php",
        method: "get",
        responseType: "json"
    }).then(res => {
        publicaciones = res.data;

        for (let i = 0; i < publicaciones.length; i++) {
            if (screen.width >= 767) {

                document.getElementById('video-contenedor').innerHTML += `
                <div class="col-xl-4 foto-perfil" style="background-image: url('${publicaciones[i].imagenUsuario}'); margin-left: 75px"></div>
                <div class="col-xl-8">
                    <h3 class="autor-id"></h3>
                    <h4 class="autor-usuarioN">${publicaciones[i].nombreUsuario}</h4>
                </div>
                
                <div class="col-xl-8">
                    <div class="video-container" style="margin-left: 140px">
                        <div class="video-container1">
                            <div class="video-container2">
                                <div class="video-container3">
                                    <div class="video-container4">
                                        <video class="video video-${i}" id="video" autoplay muted loop>
                                            <source src="${publicaciones[i].urlVideo}" type="video/mp4">
                                        </video>
                                        <!-- <span class="prueba"></span> -->
                                        <div class="botonMute">
                                            <a onclick="silenciarActivar(${i})"><i class="iconoMute-${i} fas fa-volume-mute"></i></a>
                                        </div>
                                        <div class="botonPlaypausa">
                                            <a onclick="pausarReproducir(${i})"><i class="iconoPausa-${i} fas fa-pause" id="iconoPausa"></i></a>
                                        </div>


                                        <!-- <span class="prueba2"></span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="video-foot" style="margin-left: 140px">
                        <div class="video-foot1">
                            <div class="feed-icono" style="background-image: url('img/iconos/like.svg');">
                            </div>
                            <strong title="like" class="contadores">${publicaciones[i].cantidadLikes}</strong>
                        </div>
                        <div class="video-foot1">
                            <div class="feed-icono1" style="background-image: url('img/iconos/comment.svg');">
                            </div>
                            <strong title="like" class="contadores">${publicaciones[i].comentarios.length}</strong>
                        </div>
                        <div class="video-foot1">
                            <div class="feed-icono1" style="background-image: url('img/iconos/share.svg');">
                            </div>
                            <strong title="like" class="contadores">28.8K</strong>
                        </div>
                    </div>
                    <hr style="margin-left: 75px"><br>
                </div>
                
                <div class="col-xl-4">
                    
                </div>
            `;
            }
        }
    }).catch(error => {
        console.log(error);
    })
}
mostrarPublicaciones();

function mostrarPublicacionesMovil() {
    let publicaciones;
    axios({
        url: "../backend/api/publicaciones.php",
        method: "get",
        responseType: "json"
    }).then(res => {
        publicaciones = res.data;

        let idVideo = 0;
        for (let i = 0; i < publicaciones.length; i++) {

            idVideo = i;
            document.getElementById('videos-movil').innerHTML += `
            <div class="clase-5" style="position: relative; width: 100vw; height: 100vh;" id="video${i}">
                <video class="video-${i} video" id="video" style="object-fit: cover;" onclick="pausarReproducir(${i})">
                    <source src="${publicaciones[i].urlVideo}" type="video/mp4">
                </video>
                <div class="icono-play" style="display: none;"><i class="fas fa-play iconoPausa-${idVideo}"></i></div>
                
                <div class="barra-lateral" style="text-align: center;">
                    <div class="sub-barra">
                        <div class="icono-lateral">
                            <i class="fas fa-2x fa-heart"></i>
                            <span style="font-size: 13px;">${publicaciones[i].cantidadLikes}<span>
                        </div>
                        <div class="icono-lateral">
                            <i class="fas fa-2x fa-comments"></i>
                            <span style="font-size: 13px;">${publicaciones[i].comentarios.length}<span>
                        </div>
                        <div class="icono-lateral">
                            <a href="#video${idVideo-1}"><i class="fas fa-2x fa-arrow-left"></i></a>
                        </div>
                        <div class="icono-lateral">
                            <a href="#video${idVideo+1}"><i class="fas fa-2x fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>`;

        }



    }).catch(error => {
        console.log(error);
    });


}

mostrarPublicacionesMovil();



//Reproduce o pausa el video, cambia el icono 
function pausarReproducir(idVideo) {

    let video = document.querySelector(`.video-${idVideo}`);
    // let video1 = document.querySelector(`.video-${idVideo+1}`);
    // let btnPlaypausa = document.querySelector('.icono-play');
    let icono = document.querySelector(`.iconoPausa-${idVideo}`);

    function playPausar() {

        if (video.paused) {
            icono.classList.remove('fa-play');
            icono.classList.add("fa-pause");
            // btnPlaypausa.style.display = 'none';
            video.play();
        } else {
            icono.classList.remove('fa-pause');
            icono.classList.add('fa-play');
            // btnPlaypausa.style.display = 'block';
            video.pause();
        }
    }
    playPausar();

}

// document.querySelector('.botonPlaypausa').addEventListener('click', pausarReproducir);

// Activa el sonido del video que se está reproduciendo
function silenciarActivar(idVideo) {

    let video = document.querySelector(`.video-${idVideo}`);
    // let btnPlaypausa = document.querySelector('.botonPlaypausa');
    let icono = document.querySelector(`.iconoMute-${idVideo}`);

    function activarDesactivar() {

        if (video.muted == true) {
            icono.classList.remove('fa-volume-mute');
            icono.classList.add("fa-volume-up");
            video.muted = false;
        } else {
            icono.classList.remove('fa-volume-up');
            icono.classList.add('fa-volume-mute');
            video.muted = true;
        }
    }
    activarDesactivar();
}

// document.querySelector('.botonMute').addEventListener('click', silenciarActivar);

// Detecta el tamaño de pantalla y renderiza el contenido dependiendo de el

function detectarTamanoPantalla() {
    if (screen.width <= 768) {
        document.getElementById('contenido-pc').style.display = 'none';
        document.getElementById('contenido-movil').style.display = 'block';

    } else {
        document.getElementById('contenido-pc').style.display = 'block';
        document.getElementById('contenido-movil').style.display = 'none';

    }
}

// detectarTamanoPantalla();