var filename;

jQuery('input[type=file]').change(function() {
    filename = jQuery(this).val().split('\\').pop();
    var idname = jQuery(this).attr('id');
    jQuery('span.' + idname).next().find('span').html(filename);
    document.getElementById('nombreArchivo').innerHTML = filename;
});

document.addEventListener("DOMContentLoaded", () => {
    let formulario = document.getElementById('subir-video');

    formulario.addEventListener("submit", function(event) {

        event.preventDefault();
        if (document.getElementById('file-video').files.length == 0) {
            console.log("nada");
        } else {

            subir_archivo(this);
            let leyenda = document.getElementById('leyenda').value;
            let privacidad = document.formSubir.privacidad.value;
            let urlVideo = filename;
            formulario.reset();
            document.getElementById('nombreArchivo').innerHTML = "Subir nuevo video";

            

            let publicacion = {
                "codigoPublicacion": "",
                "codigoUsuario": getCookie('codigoUsuario'),
                "leyenda": leyenda,
                "privacidad": parseInt(privacidad),
                "urlVideo": urlVideo,
                "cantidadLikes": 0,
                "comentarios": 0,
            }

            axios({
                url: "../backend/api/publicaciones.php",
                method: "post",
                responseType: "json",
                data: publicacion
            }).then(res => {
                console.log("exito");
            }).catch(error => {
                console.log(error);
            });
        }
    });
});

function subir_archivo(formulario) {
    let barraEstadoPadre = document.getElementById('barraEstado-padre');
    let barraEstadoHijo = document.getElementById('barraEstado-hijo');
    let btnSubir = document.getElementById('btn-cargar');

    let peticion = new XMLHttpRequest();

    peticion.upload.addEventListener("progress", (event) => {
        let porcentaje = Math.round((event.loaded / event.total) * 100);

        console.log(porcentaje);

        barraEstadoHijo.style.width = porcentaje + '%';
        barraEstadoHijo.innerHTML = porcentaje + '%';
    });

    peticion.addEventListener("load", () => {
        barraEstadoPadre.classList.add('progress');
        barraEstadoHijo.classList.add('progress-bar');
        barraEstadoHijo.innerHTML = "Video cargado";

    });

    peticion.open('post', 'subir-archivo.php');
    peticion.send(new FormData(formulario));

}

