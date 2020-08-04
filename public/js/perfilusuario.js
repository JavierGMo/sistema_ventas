//Listado de los div ocultos

const divOcultos = {
    0:document.getElementById('cont-actualizar-datos'),
    1:document.getElementById('subir-producto'),
    2:document.getElementById('cambiar-contrasenia'),
    3:document.getElementById('eliminar-cuenta')
};
const monstrarOpcion = function(divAMostrar, listadoDivs){
    for(const elem in listadoDivs) listadoDivs[elem].style.display = 'none';
    divOcultos[divAMostrar].style.display = 'flex';
};
//funcion para hacer consultas
const enviarData = (URL, data, mensaje)=>{
    const xhr = new XMLHttpRequest();
    xhr.open('POST',URL);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');   
    // xhr.setRequestHeader("Content-type","multipart/form-data");
    xhr.onreadystatechange = function() {
        if (xhr.readyState>3 && xhr.status==200){
            console.log(xhr.responseText);
            const resJson = JSON.parse( xhr.responseText);
            if(resJson['ok']){
                Swal.fire({
                    icon: 'success',
                    title: 'Exito',
                    text: mensaje,
                    showConfirmButton: false,
                    timer: 1500
                });
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Algo salio mal, intentalo de nuevo',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }
    };
    xhr.send(data);
};

const sendData = async function(URL, formData){
    const resp = await fetch(URL,{
        method: 'POST',
        body: formData
    });
    
    const result = await resp.json();
    console.log(result)
    return result;
};

const borrarCuenta = (URL, data)=>{
    const xhr = new XMLHttpRequest();
    xhr.open('POST',URL);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');   
    // xhr.setRequestHeader("Content-type","multipart/form-data");
    xhr.onreadystatechange = function() {
        if (xhr.readyState>3 && xhr.status==200){
            console.log(xhr.responseText);
            const resJson = JSON.parse( xhr.responseText);
            if(resJson['ok']){
                Swal.fire({
                    title: 'Exito',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Continuar',
                    onClose: () => {
                        console.log('Despues de dar el ok');
                        window.location = 'http://localhost/sistemaventas/';
                    }
                  });
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Algo salio mal, intentalo de nuevo',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }
    };
    xhr.send(data);
};
//Funcion para verificar que los datos vengan
const verificarData = (data)=>{
    let todoBien = false;
    for (const elem of data) {
        if(elem.value && elem.value.trim() !== '') todoBien = true;
        else{
            todoBien = false;
            break;
        }
    }
    return todoBien;
};
//Variables para moverme en el menu

let perfilUsuario = document.getElementById('moveUpdateDataUser');
let subirProducto = document.getElementById('moveUploadProduct');
let cambiarContrasenia = document.getElementById('moveUpdatePass');
let eliminarCuenta = document.getElementById('moveDelAccount');

//Variables para actualizar datos

let banderaIconActualizar = true;
let btnActualizar = document.getElementById('btn-actualizar-datos');
let btnConfirmDataUser = document.getElementById('btn-edit-confirm-data');

//Variables para subir productos
let btnSubirProducto = document.getElementById('btn-subir-producto');

//Variables para cambiar contrasenia
let btnCambiarContrasenia = document.getElementById('btn-cambiar-contrasenia');

//Variables para eliminar la cuenta

let btnConfirmEliminar = document.getElementById('btn-pre-eliminar');
let btnEliminarCuenta = document.getElementById('btn-contrasenia-seguridad-del');
let banderaConfirmDel = false;


//Eventos para moverme entre el menu
perfilUsuario.addEventListener('click', function(e){
    e.preventDefault();
    console.log('Perfil usuario');
    monstrarOpcion(0, divOcultos);
});
subirProducto.addEventListener('click', function(e){
    e.preventDefault();
    console.log('subir producto');
    monstrarOpcion(1, divOcultos);
    
});
cambiarContrasenia.addEventListener('click', function(e){
    e.preventDefault();
    console.log('cambiar contraseña');
    monstrarOpcion(2, divOcultos);
});
eliminarCuenta.addEventListener('click', function(e){
    e.preventDefault();
    console.log('aliminar cuenta');
    monstrarOpcion(3, divOcultos);
});


//Eventos para actualizar datos
btnConfirmDataUser.addEventListener('click', function(e){
    e.preventDefault();
    console.log('Click al icon');
    if(banderaIconActualizar){//Si True
        //Si ya esta desactivado, lo activamos
        document.getElementById('form-desactivado').disabled = !banderaIconActualizar;  
    }else{
        document.getElementById('form-desactivado').disabled = !banderaIconActualizar;
    }
    banderaIconActualizar = !banderaIconActualizar;
});
//Evento para enviar la data;
btnActualizar.addEventListener('click', function(e){
    e.preventDefault();

    console.log('Actualizaste');
    const actualizarImagen = document.getElementById('actualizar-img-perfil');
    const actualizarNombre = document.getElementById('actualizar-nombres-s');
    const actualizarApellido = document.getElementById('actualizar-apellido-s');
    const dataForm = new FormData();
    dataForm.append('refimagen', actualizarImagen.files[0]);
    dataForm.append('nombre', actualizarNombre.value);
    dataForm.append('apellido', actualizarApellido.value);
    sendData('http://localhost/sistemaventas/usuario/actualizarPerfil', dataForm)
    .then(async(res)=>{
        const data = await res;
        if(data['ok']===1){
            Swal.fire({
                icon: 'success',
                title: 'Exito',
                text:'Actualizacion exitosa',
                showConfirmButton: false,
                timer: 1500,
                onClose: () => {
                    console.log('Despues de dar el ok');
                    window.location = 'http://localhost/sistemaventas/usuario';
                }
            });
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Intente de nuevo',
                showConfirmButton: false,
                timer: 1500
            });
        }
    })
    .catch(e=>{
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Algo salio mal, intentalo de nuevo',
            showConfirmButton: false,
            timer: 1500
        });
    });
});

//Eventos para subir productos

btnSubirProducto.addEventListener('click', e=>{
    e.preventDefault();
    const dataForm = new FormData();
    const imgProducto = document.getElementById('img-producto');
    const nombreProducto = document.getElementById('nombre-producto');
    const descripcionProducto = document.getElementById('descripcion-producto');
    const precioProducto = document.getElementById('precio-producto');
    if(imgProducto.files[0]!=null && verificarData([nombreProducto, descripcionProducto, precioProducto])){
        dataForm.append('imgproducto', imgProducto.files[0]);
        dataForm.append('nombreproducto', nombreProducto.value.trim());
        dataForm.append('descripcionproducto', descripcionProducto.value.trim());
        dataForm.append('precioproducto', precioProducto.value.trim());
        //enviarData('http://localhost/sistemaventas/producto/nuevoProducto', dataForm);
        sendData('http://localhost/sistemaventas/producto/nuevoProducto', dataForm)
        .then(async(res)=>{
            const data = await res;
            console.log(data);
            if(data['ok']===1){
                Swal.fire({
                    icon: 'success',
                    title: 'Exito',
                    text:'Su producto se subio',
                    showConfirmButton: false,
                    timer: 1500,
                    onClose: () => {
                        imgProducto.value = '';
                        nombreProducto.value = '';
                        descripcionProducto.value = '';
                        precioProducto.value = '';
                    }
                });
                

            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Intente de nuevo',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        })
        .catch(e=>{
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Algo salio mal, intentalo de nuevo',
                showConfirmButton: false,
                timer: 1500
            });
        });

    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Parece que no llenaste algunos campos'
        });
    }
});

//Evento para cambiar la contrasnia
btnCambiarContrasenia.addEventListener('click', (e)=>{
    e.preventDefault();
    const dataForm = new FormData();
    const nuevaContrasenia = document.getElementById('nueva-contrasenia');
    const confirmarNuevaContra = document.getElementById('confirm-contrasenia-nueva');
    if(verificarData([nuevaContrasenia, confirmarNuevaContra])){
        if(nuevaContrasenia.value === confirmarNuevaContra.value){
            dataForm.append('nuevacontrasenia', nuevaContrasenia.value.trim());
            dataForm.append('confirmnuevacontra', confirmarNuevaContra.value.trim());
            //enviarData('http://localhost/sistemaventas/usuario/changePass', dataForm, 'Su contraseña se actualizo');
            sendData('http://localhost/sistemaventas/usuario/changePass', dataForm)
            .then(async(res)=>{
                const data = await res;
                console.log(data);
                if(data['ok']===1){
                    Swal.fire({
                        icon: 'success',
                        title: 'Exito',
                        text:'Su producto se subio',
                        showConfirmButton: false,
                        timer: 1500,
                        onClose: () => {
                            console.log('Despues de dar el ok');
                            window.location = 'http://localhost/sistemaventas/';
                        }
                    });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Intente de nuevo',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            })
            .catch(e=>{
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Algo salio mal, intentalo de nuevo',
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Verifica que las contraseñas sean iguales...'
            });
        }
        //Enviar por post
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Parece que no llenaste algunos campos'
        });
    }
});

btnConfirmEliminar.addEventListener('click', (e)=>{
    Swal.fire({
        title: '¿Esta seguro de continuar?',
        text: "Esta por eliminar su cuenta",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'Cancelar',
      }).then((result) => {
        if (result.value) {
            
            Swal.fire(
                'Listo',
                'Puede continuar',
                'success'
            );
            banderaConfirmDel = true;
            document.getElementById('form-eliminar-cuenta').style.display = 'flex';
            btnConfirmEliminar.disabled = true;
        }
      });
});

btnEliminarCuenta.addEventListener('click', (e)=>{
    e.preventDefault();
    const contraseniaActual = document.getElementById('contrasenia-verificar-eliminacion');
    const dataForm = new FormData();
    if(banderaConfirmDel){
        Swal.fire({
            title: 'Eliminacion permanente',
            text: "Su cuenta se eliminara para siempre",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Borrar cuenta',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.value) {
                dataForm.append('contrasenia', contraseniaActual.value);
                borrarCuenta('http://localhost/sistemaventas/usuario/borrarCuenta', dataForm);
                //Redireccionar
            }else if (result.dismiss === Swal.DismissReason.cancel){
                btnConfirmEliminar.disabled = false;
                document.getElementById('form-eliminar-cuenta').style.display = 'none';
            }
        });
    }else{

    }

});
