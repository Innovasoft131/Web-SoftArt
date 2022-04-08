/* inicio de seccion para agregar al carrito */
var listaCarrito = [];
$(document).on('click', '.agregarCarrito', function () {
    const idProducto = $(this).attr("idproducto");
    const producto = $(this).attr("producto");
    const precio = $(this).attr("precio");
    const oferta = $(this).attr("oferta");
    const imagen = $(this).attr("imagen");

    /* se almacenan los productos en el localstorage */
    listaCarrito.push({
        "idProducto": idProducto,
        "producto": producto,
        "precio": precio,
        "oferta": oferta,
        "imagen": imagen,
        "cantidad": 1
    });

    localStorage.setItem("listaProductos", JSON.stringify(listaCarrito));
});
/* fin de seccion para agregar al carrito */