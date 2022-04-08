/* inicio de seccion para agregar al carrito */
if(localStorage.getItem("listaProductos") != null){
    var listaCarrito = JSON.parse(localStorage.getItem("listaProductos"));
}
$(document).on('click', '.agregarCarrito', function () {
    const idProducto = $(this).attr("idproducto");
    const producto = $(this).attr("producto");
    const precio = $(this).attr("precio");
    const oferta = $(this).attr("oferta");
    const imagen = $(this).attr("imagen");
    var rutaOculta = $("#rutaOculta").val();
    //var agregarAlCarrito = false;
    var agregarAlCarrito = true;
    /* capturar detalles 
    var seleccionarDetalle = $(".seleccionarDetalle");
    for (let i = 0; i < seleccionarDetalle.length; i++) {
        if(seleccionarDetalle[i].val() == ""){
            Swal.fire({
                title: "Debe seleccionar Talla y color",
                text: "",
                type: "warning",
                showCancelButton: false,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "¡Seleccionar!",
                closeOnConfirm: false
            });
        }else{
            agregarAlCarrito = true;
        }
        
    }

    */
   if(localStorage.getItem("listaProductos") != null){
       var productos = JSON.parse(localStorage.getItem('listaProductos'));
       var arrayProductos = productos.filter( (producto) => producto["idProducto"] == idProducto);
        console.log("arrayProductos", arrayProductos);
   }

    


    /* se almacenan los productos en el localstorage */
    if (agregarAlCarrito) {
        /* recuperar almacenamiento del localstorage */
        if(localStorage.getItem("listaProductos") == null){
            listaCarrito = [];

        }else{
            listaCarrito.concat(localStorage.getItem("listaProductos"));
        }
        listaCarrito.push({
            "idProducto": idProducto,
            "producto": producto,
            "precio": precio,
            "oferta": oferta,
            "imagen": imagen,
            "cantidad": 1
        });

        localStorage.setItem("listaProductos", JSON.stringify(listaCarrito));

    }
    /* mostrar alerta de que el producto ya fue agregado */
    Swal.fire({
        title: '',
        text: "¡Se ha agregado un nuevo producto al carrito de compras!",
        icon: 'success',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: '!continuar comprando!',
        confirmButtonText: '!Ir a mi carrito de compras!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = rutaOculta + "carrito-de-compras";
        }
      }); 
});
/* fin de seccion para agregar al carrito */