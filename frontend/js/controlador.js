function iniciarSesion() {
    $('#modalLogin').modal('show');
    $('#modalRegistrarse').modal('hide');
}

function registrarUsuario() {
    $('#modalLogin').modal('hide');
    $('#modalRegistrarse').modal('show');
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



//Reproduce o pausa el video, cambia el icono 
function pausarReproducir() {

    let video = document.querySelector('.video');
    // let btnPlaypausa = document.querySelector('.botonPlaypausa');
    let icono = document.querySelector('.iconoPausa');

    function playPausar() {

        if (video.paused) {
            icono.classList.remove('fa-play');
            icono.classList.add("fa-pause");
            video.play();
        } else {
            icono.classList.remove('fa-pause');
            icono.classList.add('fa-play');
            video.pause();
        }
    }
    playPausar();

}

document.querySelector('.botonPlaypausa').addEventListener('click', pausarReproducir);

// Activa el sonido del video que se está reproduciendo
function silenciarActivar() {

    let video = document.querySelector('.video');
    // let btnPlaypausa = document.querySelector('.botonPlaypausa');
    let icono = document.querySelector('.iconoMute');

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

document.querySelector('.botonMute').addEventListener('click', silenciarActivar);


// (function() {
//     let video = document.querySelector('.video');
//     let btnPlaypausa = document.querySelector('.boton-mute');
//     let icono = document.querySelector('.icono-mute');

//     function eventos() {
//         btnPlaypausa.addEventListener('click', muteSonido);
//     }
//     eventos();

//     function muteSonido() {

//         if (video.muted) {
//             icono.classList.remove('fa-volume-up');
//             icono.classList.add('fa-volume-mute');

//         } else {
//             icono.classList.remove('fa-volume-mute');
//             icono.classList.add('fa-volume-up');

//         }
//     }

// })();