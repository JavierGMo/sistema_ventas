const btnComprarProducto = document.getElementById('btn-comprar-producto');


//Usamos fetch para enviar la data
const sendData = async function(URL, formData){
    const resp = await fetch(URL,{
        method: 'POST',
        body: formData
    });
    
    const result = resp;
    return result;
};


btnComprarProducto.addEventListener('click', (e)=>{
    e.preventDefault();
    const idProducto = document.getElementById('id-producto-input');
    const precioProducto = document.getElementById('precio-producto-input');
    const cantidadProductos = document.getElementById('numero-productos');
    const dataForm = new FormData();
    if(cantidadProductos.value && parseInt(cantidadProductos.value) === 0){
        Swal.fire({
            icon: 'error',
            title: 'Vaya',
            text: 'No puedes poner 0 piezas:/',
        });
    }else if(cantidadProductos.value && cantidadProductos.value !== ''){
        const total = parseInt(precioProducto.value)*parseInt(cantidadProductos.value);
        Swal.fire({
            title: 'Seguir',
            text: `Realizar el pago de $${total}.00 pesos mexicanos`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, comprar',
            cancelButtonText: 'No, cancelar',
        }).then((result) => {
            if (result.value) {
                //Enviar data
                dataForm.append('idproducto', idProducto.value);
                dataForm.append('numerodepiezas', cantidadProductos.value);
                dataForm.append('total', total);
                sendData('http://localhost/sistemaventas/productousuario/registrarCompra', dataForm)
                .then(async (res)=>{
                    const resultado = await res.json();
                    console.log(resultado);
                    console.log(resultado['hola']===1);
                    if(resultado['session'] === 0){
                        Swal.fire(
                            'Vaya',
                            'Inicie sesion para poder comprar este articulo',
                            'error'
                        );
                    }
                    else if(resultado['ok'] === 1 && resultado['session'] == 1){
                        Swal.fire(
                            'Exito',
                            'Compra realizada',
                            'success'
                        );
                    }else{
                        Swal.fire(
                            'Vaya',
                            'Ocurrio un error',
                            'error'
                        );    
                    }
                })
                .catch((e)=>{
                    console.log(e);
                    Swal.fire(
                        'Vaya',
                        'Ocurrio un error, intente de nuevo',
                        'error'
                    );
                });
                
            }
        });
        
        console.log(total);
        // dataForm.append('totalpagar', ());
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Vaya',
            text: 'Escoge tu numero de piezas',
        });
    }
    



    



});