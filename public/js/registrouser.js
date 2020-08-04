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
            const dataForm = new FormData();
            dataForm.append('nombres', nombres.value.trim());
            dataForm.append('apellidos', apellidos.value.trim());
            dataForm.append('nombreDeUsuario', nombreDeUsuario.value.trim());
            dataForm.append('correo', correo.value.trim());
            dataForm.append('imgPerfil', imgPerfil.files[0]);
            dataForm.append('contrasenia', contrasenia.value.trim());
            dataForm.append('confirmarContrasenia', confirmarContrasenia.value.trim());
            console.log(dataForm);
            /*const params = `
            nombres=${nombres.value.trim()}&apellidos=${apellidos.value.trim()}
            &nombreDeUsuario=${nombreDeUsuario.value.trim()}&correo=${correo.value.trim()}
            &imgPerfil=${imgPerfil.files[0]}&contrasenia=${contrasenia.value.trim()}
            &confirmarContrasenia=${confirmarContrasenia.value.trim()}
            `;*/
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'http://localhost/sistemaventas/usuario/registrarUsuario');
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');   
            // xhr.setRequestHeader("Content-type","multipart/form-data");
            xhr.onreadystatechange = function() {
                if (xhr.readyState>3 && xhr.status==200){
                    console.log(xhr.responseText);
                    const resJson = JSON.parse( xhr.responseText);
                    if(resJson['ok']){
                        // Swal.fire({
                        //     title: 'Exito',
                        //     html: 'Se registro con exito',
                        //     timer: 5000,
                        //     onClose: () => {
                        //         window.location.replace("http://localhost/sistemaventas/iniciosesion");
                        //     }
                        // });
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Registro exitoso',
                            showConfirmButton: false,
                            timer: 1500,
                            onClose: () => {
                                window.location.replace("http://localhost/sistemaventas/iniciosesion");
                            }
                        });
                    }
                }
            };
            xhr.send(dataForm);
    }else{
        alert('Deberia revisar sus datos :/');
    }

});