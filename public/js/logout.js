let cerrarSesion = document.getElementById('cerrar-sesion');

cerrarSesion.addEventListener('click', function(e){
    e.preventDefault();
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://localhost/sistemaventas/usuario/logOut');
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function() {
        if (xhr.readyState>3 && xhr.status==200){
            const jsonData = JSON.parse( xhr.responseText);
            console.log(jsonData);
        }
    };
    xhr.send();
})