function mostrarModalRegistro() {
    $('#modalLogin').modal('hide');
    $('#modalRegistrarse').modal('show');
}

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
        let respuesta = res.data;

        if (respuesta.codigoResultado == 1) {
            setTimeout(() => {
                window.location.href = "index.php";
            }, 1200);

            document.getElementById('msj-login').style.display = 'block';
            document.getElementById('msj-login').innerHTML = respuesta.mensaje;

        } else {
            document.getElementById('msj-login').style.display = 'block';
            document.getElementById('msj-login').innerHTML = respuesta.mensaje;
        }


        console.log(res.data);
    }).catch(err => {
        console.log(err);
    })
}


//Registra un usuario

function registrarUsuario() {

    let codigoUsuario = '';
    let nombre = document.getElementById('nombre').value;
    let apellido = document.getElementById('apellido').value;
    let correo = document.getElementById('correoElectronico').value;
    let nombreUsuario = nombre + apellido;
    let fechaNacimiento = document.getElementById('fechaNacimiento').value;
    let contrasena = document.getElementById('password').value;

    let usuario = {

        "codigoUsuario": codigoUsuario,
        "nombre": nombre,
        "apellido": apellido,
        "correo": correo,
        "nombreUsuario": "@" + nombreUsuario,
        "fechaNacimiento": fechaNacimiento,
        "contrasena": contrasena
    }

    axios({
        url: "../backend/api/usuarios.php",
        method: "post",
        responseType: "json",
        data: usuario,
    }).then(res => {
        setTimeout(() => {
            $('#modalRegistrarse').modal('hide');
        }, 1500);

        let respuesta = res.data;
        document.getElementById('msj-registro').style.display = 'block'
        document.getElementById('msj-registro').innerHTML = respuesta.mensaje;


        console.log(res);
    }).catch(error => {
        console.log(error);
    });
}