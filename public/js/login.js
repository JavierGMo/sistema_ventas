let usuario = document.getElementById('login-usuario');
let contrasenia = document.getElementById('login-contrasenia');
let buttonInicioSesion = document.getElementById('btn-iniciar-sesion');

//Funciones

const checkField = function(field){
    let itsOk = false;
    if(field){
        if(field.value.trim()!==''){
            itsOk = true;
        }
    }
    return itsOk;
};

//Eventos
buttonInicioSesion.addEventListener('click', function(e){
    e.preventDefault();
    if(checkField(usuario) && checkField(contrasenia)){
        if(contrasenia.value.trim().length >= 8){
            const params = `user=${usuario.value.trim()}&&contrasenia=${contrasenia.value.trim()}`;
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'http://localhost/sistemaventas/usuario/loginUsuario');
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState>3 && xhr.status==200){
                    const jsonData = JSON.parse( xhr.responseText);
                    console.log(jsonData);
                    console.log(`DATA: ${typeof jsonData['data']}`);
                }
            };
            xhr.send(params);
        }
    }else{
        alert('no');
    }
});