let nombres = document.getElementById('registro-nombre-s');
let apellidos = document.getElementById('registro-apellido-s');
let nombreDeUsuario = document.getElementById('registro-nombre-usuario');
let correo = document.getElementById('registro-correo');
let contrasenia = document.getElementById('registro-contrasenia');
let confirmarContrasenia = document.getElementById('registro-contrasenia-verificada');
let imgPerfil = document.getElementById('registro-imagen-perfil');
let buttonRegistrarse = document.getElementById('button-registrar-usuario');

const checkFields = function(arraysFields){
    let itsOk = false;
    for (const val of arraysFields) {
        console.log(`valor: ${val}`);
        if(val){
            if(val.value.trim()!==''){
                itsOk = true;
            }
        }else{
            itsOk = false;
            break;   
        }
            
    }
    return itsOk;
};
const checkPassword = function(pass, confirmPass){
    let itsOk = false;
    if(pass.value.trim() !== '' && confirmPass.value.trim() !== '') if (pass.value.trim().length >= 8 && pass.value.trim() === confirmPass.value.trim()) itsOk = true;
    return itsOk;
};

//Eventos
buttonRegistrarse.addEventListener('click',function (e) {
    e.preventDefault();
    console.log('Boton clickeado...');
    console.log(imgPerfil.files[0]);
    if(checkFields([nombres, apellidos, nombreDeUsuario, correo, contrasenia, confirmarContrasenia, imgPerfil])&&
        checkPassword(contrasenia, confirmarContrasenia)){
            const params = `nombres=${nombres.value.trim()}&apellidos=${apellidos.value.trim()}&nombreDeUsuario=${nombreDeUsuario.value.trim()}&correo=${correo.value.trim()}&imgPerfil=${imgPerfil.files[0]}&contrasenia=${contrasenia.value.trim()}&confirmarContrasenia=${confirmarContrasenia.value.trim()}`;
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'http://localhost/sistemaventas/usuario/registrarUsuario');
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');   
            xhr.setRequestHeader("Content-type","multipart/form-data"); 
            xhr.onreadystatechange = function() {
                if (xhr.readyState>3 && xhr.status==200){
                    console.log(xhr.responseText);
                }
            };
            xhr.send(params);
    }else{
        alert('Deberia revisar sus datos :/');
    }

});