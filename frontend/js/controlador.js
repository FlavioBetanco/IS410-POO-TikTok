function mostrarPerfil() {

    document.getElementById('perfil-usuario').style.display = 'block';
    document.getElementById('seccionPublicaciones').style.display = 'none';
    document.getElementById('subir-video').style.display = 'none';

}

function verInicio() {
    document.getElementById('perfil-usuario').style.display = 'none';
    document.getElementById('seccionPublicaciones').style.display = 'block';

}

// Funcion que devuelve el valor de una cookie
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

// Muestra la imagen de perfil y otros datos de un usuario logueado
function mostrarDatosUsuario(nombreCookie, codigoUsuario) {
    let imagen = getCookie(nombreCookie);

    document.getElementById('imagen-perfil').innerHTML = `<img class="foto-perfil" src="${imagen}" alt="">`;
    document.getElementById('verperfil').innerHTML = `
        <img src="img/iconos-movil/perfil.svg" alt="" onclick="mostrarPerfil(${parseInt(getCookie(codigoUsuario))})">
    `;

}

mostrarDatosUsuario("imagen");

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