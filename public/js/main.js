//Archivo para el home
// let dataPost = async function () {
//     let res = await fetch('https://pokeapi.co/api/v2/pokemon/ditto');
//     let data = await res.json();
//     return data;
// };

// let a = dataPost();
// a.then(res=>console.log(res)).catch(e=>console.error(e));
let divProductos = document.getElementById('todos-los-productos');

var consultaLista = false;


let dataProducts = async function (){
    let res = await fetch('http://localhost/sistemaventas/producto/verProductosPorCategoria');
    let data = await res.json();
    
    return data;
};

dataProducts().then(function (res) {
    let data = res['data'];
    data.forEach(element => {
        
        let plantilla = 
        `
        <div class="swiper-slide producto card-producto d-flex flex-column align-items-center w-50 h-75">
            <div class="d-flex justify-content-center">
                <h4>${element['nombre']}</h4>
            </div>
            <div class="d-flex justify-content-center">
                <img src="http://localhost/sistemaventas/assets/imgproductos/${element['refimagen']}" class="w-25 h-25" alt="Imagen de prueba para anuncios">
            </div>
            <div class="descripcion-producto w-75 mt-4">
                <p class="trucate-ellipsis">${element['descripcion']}</p>
            </div><!--Descripcion del producto, se trunca-->
            <div>
                <p>$${element['precio']}</p>
                <a href="producto/productoDetalle/${element['idproducto']}" class="btn btn-success">Comprar</a>
            </div><!--botones-->
        </div>
        `;
        divProductos.innerHTML += plantilla;
    });
    consultaLista = true;
}).catch(function (err) {
    
});


let swiper = new Swiper('.productos-car', {
    slidesPerView: 'auto',
    spaceBetween: 30,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    flipEffect: {
        rotate: 30,
        slideShadows: false,
        limitRotation: true
    },
});