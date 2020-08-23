function mostrarPublicaciones() {
    axios({
        url: "../backend/api/publicaciones.php",
        method: "get",
        responseType: "json"
    }).then(res => {
        let publicaciones = res.data;
        let estilo = "";
        for (let i = 0; i < publicaciones.length; i++) {

            if (i == publicaciones.length - 1) {
                estilo = "padding-bottom: 50px";
            }

            document.getElementById('publicaciones').innerHTML += `
            <div class="">
                <div class="card publicacion mb-4 shadow-sm video${i}" style="width: 100%; height: 100vh-100px; ${estilo};">
                    <div class="card-header publicacion-header video-foot1">
                        <img class="img-fluid foto-perfil " src="${publicaciones[i].imagenUsuario}">
                        <strong>${publicaciones[i].nombreUsuario}</strong>
                    </div>
                    <div class="card-body publicacion-body px-0 py-0">
                        <div class="image-post video-container4 " style="width: 100%; height: 100vh-100px; ">
                            <video class="video video-${i} " id="video " muted>
                                <source src="${publicaciones[i].urlVideo}" type="video/mp4 ">
                            </video>
                            <div class="botonMute ">
                                <a onclick="silenciarActivar(${i}) "><i
                                        class="iconoMute-${i} fas fa-volume-mute "></i></a>
                            </div>
                            <div class="botonPlaypausa ">
                                <a onclick="pausarReproducir(${i}) "><i class="iconoPausa-${i} fas fa-play "
                                        id="iconoPausa "></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer publicacion-footer " style="background-color: white!important; " ">
                        <div class=" row ml-2 ">
                            <div class=" video-foot1 mr-5 ">
                                <div class=" feed-icono1 " style=" background-image: url( 'img/iconos/like.svg'); ">
                                </div>
                                <strong title=" like " class=" contadores ">${publicaciones[i].cantidadLikes}</strong>
                            </div>
                            <div class=" video-foot1 ">
                                <div class=" feed-icono1 " style=" background-image:url( 'img/iconos/comment.svg' ); ">
                                </div>
                                <strong title=" like " class=" contadores ">${publicaciones[i].comentarios.length}</strong>
                            </div>

                        </div>
                    </div>
                </div>
            </div>`;

        }
        console.log(res.data);
    }).catch(error => {
        console.log(error);
    });
}

mostrarPublicaciones();
