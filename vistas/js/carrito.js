/* mostrar los productos en carrito de compras */
if (localStorage.getItem("listaProductos") != null) {
    var listaCarrito = JSON.parse(localStorage.getItem("listaProductos"));
    var html = '';
   
    var precio = 0;
    listaCarrito.forEach(funcionMostrarProductos);

    function funcionMostrarProductos(item, index) {
        if (item.oferta != "") {
            precio = item.oferta;
        } else {
            precio = item.precio;
        }
        html = '<tr>' +
            ' <td>' +
            ' <div class="cart-info">' +
            ' <img class="img" src="' + item.imagen + '" alt="' + item.producto + '" >' +
            '<div class="precioCarrito">' +
            ' <p class="productoCarrito">' + item.producto + '</p>' +
            '<small>Precio: $<span>' + precio + '</span>.00</small>' +
            '<br>' +
            '<a href="#" class="quitarItemCarrito" idProducto="' + item.idProducto + '"  precio="' + item.precio + '" oferta="' + item.oferta + '">Eliminar Articulo</a>' +
            ' </div>' +
            '</div>' +
            '</td>' +
            '<td><input type="number" class="cantidadCarrito" min="1" name="cantidadCarritos" id="cantidadCarrito" idProducto="' + item.idProducto + '"  precio="' + precio + '" value="' + item.cantidad + '"></td>' +
            '<td class="subtotal' + item.idProducto + '"><h4>$<span class="preciaProducto">'+(item.cantidad*precio)+'</span>.00</h4></td>' +
            '</tr>';

        $(".mostrarCarrito").append(html);
        
    }
} else {

    //$(".mostrarCarrito").html('<div class="alert alert-warning" role="alert">Aún no hay productos en el carrito de compras.</div>');
    $(".mostrarCarrito").html('<tr class="mostrar">' +
        '<td class="alert alert-warning">' +
        '<div role="alert">Aún no hay productos en el carrito de compras.</div>' +
        '</td>' +
        '<td class="alert alert-warning"></td>' +
        '<td class="alert alert-warning"></td>' +
        '</tr>');
}

/* inicio de seccion para agregar al carrito */
$(document).on('click', '.agregarCarrito', function () {
    const idProducto = $(this).attr("idproducto");
    const producto = $(this).attr("producto");
    const precio = $(this).attr("precio");
    const oferta = $(this).attr("oferta");
    const imagen = $(this).attr("imagen");
    const cantidad = $("#txtCantidad").val();
    var rutaOculta = $("#rutaOculta").val();
    //var agregarAlCarrito = false;
    var agregarAlCarrito = false;
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
    if (localStorage.getItem("listaProductos") != null) {
        
        var productos = JSON.parse(localStorage.getItem('listaProductos'));
        var arrayProductos = productos.filter((producto) => producto["idProducto"] == idProducto);
        if (arrayProductos.length >= 1) {
            agregarAlCarrito = false;
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'El producto ya está agregado al carrito de compras',
                showConfirmButton: false,
                timer: 2500
            });

        }else{
            agregarAlCarrito = true;
        }

    }else{
        agregarAlCarrito = true;
    }




    /* se almacenan los productos en el localstorage */
    if (agregarAlCarrito) {
        /* recuperar almacenamiento del localstorage */
        if (localStorage.getItem("listaProductos") == null) {
            listaCarrito = [];

        } else {
            listaCarrito.concat(localStorage.getItem("listaProductos"));
        }

        if (cantidad != undefined) {
            listaCarrito.push({
                "idProducto": idProducto,
                "producto": producto,
                "precio": precio,
                "oferta": oferta,
                "imagen": imagen,
                "cantidad": cantidad
            });
        } else {
            listaCarrito.push({
                "idProducto": idProducto,
                "producto": producto,
                "precio": precio,
                "oferta": oferta,
                "imagen": imagen,
                "cantidad": 1
            });

        }

        localStorage.setItem("listaProductos", JSON.stringify(listaCarrito));

        /* mostrar alerta de que el producto ya fue agregado */
        Swal.fire({
            title: '',
            text: "¡Se ha agregado un nuevo producto al carrito de compras!",
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#000',
            cancelButtonColor: '#d33',
            cancelButtonText: '!continuar comprando!',
            confirmButtonText: '!Ir a mi carrito de compras!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = rutaOculta + "carrito-de-compras";
            }
        });
    }
});
/* fin de seccion para agregar al carrito */
/* inicio de seccion para quitar producto del carrito */
$(document).on("click", ".quitarItemCarrito", function () {
    $(this).parent().parent().parent().parent().remove();


    var idProducto = $(".mostrarCarrito .quitarItemCarrito");
    var imagen = $(".mostrarCarrito img");
    var producto = $(".mostrarCarrito .productoCarrito");
    var cantidad = $(".mostrarCarrito .cantidadCarrito");
    var rutaOculta = $("#rutaOculta").val();

    /* Si aun quedan productos volver agregar al carrito */

    listaCarrito = [];

    if (idProducto.length != 0) {
        for (let i = 0; i < idProducto.length; i++) {
            var idProductoArray = $(idProducto[i]).attr("idProducto");
            var precioArray = $(idProducto[i]).attr("precio");
            var ofertaArray = $(idProducto[i]).attr("oferta");
            var productoArray = $(producto[i]).html();
            var cantidadArray = $(cantidad[i]).val();
            var imagenArray = $(imagen[i]).attr("src");

            listaCarrito.push({
                "idProducto": idProductoArray,
                "producto": productoArray,
                "precio": precioArray,
                "oferta": ofertaArray,
                "imagen": imagenArray,
                "cantidad": cantidadArray
            });

        }
        localStorage.setItem("listaProductos", JSON.stringify(listaCarrito));
        sumaTotal();

    } else {
        /* sino quedan productos se borra todo */
        localStorage.removeItem("listaProductos");
        window.location = rutaOculta + "carrito-de-compras";
    }
});
/* fin de seccion para quitar producto del carrito */
/* inicio de seccion para sumar cantidades de producto del carrito */
$(document).on("change", ".cantidadCarrito", function () {

    var cantidad = $(this).val();
    var precio = $(this).attr("precio");
    var idProducto = $(this).attr("idProducto");

    $(".subtotal" + idProducto).html('<h4>$<span class="preciaProducto">'+(cantidad*precio)+'</span>.00</h4>');
    /* actualizar la cantidad en localStorage */

    var idProducto = $(".mostrarCarrito .quitarItemCarrito");
    var imagen = $(".mostrarCarrito img");
    var producto = $(".mostrarCarrito .productoCarrito");
    var cantidad = $(".mostrarCarrito .cantidadCarrito");
    var rutaOculta = $("#rutaOculta").val();

    listaCarrito = [];

    for (let i = 0; i < idProducto.length; i++) {
        var idProductoArray = $(idProducto[i]).attr("idProducto");
        var precioArray = $(idProducto[i]).attr("precio");
        var ofertaArray = $(idProducto[i]).attr("oferta");
        var productoArray = $(producto[i]).html();
        var cantidadArray = $(cantidad[i]).val();
        var imagenArray = $(imagen[i]).attr("src");

        listaCarrito.push({
            "idProducto": idProductoArray,
            "producto": productoArray,
            "precio": precioArray,
            "oferta": ofertaArray,
            "imagen": imagenArray,
            "cantidad": cantidadArray
        });

    }
    localStorage.setItem("listaProductos", JSON.stringify(listaCarrito));
    sumaTotal();
});
/* fin de seccion para sumar cantidades de producto del carrito */


/* Actualizar subtotal */

var precioCarritoCompra = $(".mostrarCarrito .precioCarrito span");
var cantidadItem = $(".mostrarCarrito .cantidadCarrito"); 


for (let i = 0; i < precioCarritoCompra.length; i++) {
    var precioCarritoArray = $(precioCarritoCompra[i]).html();
    var cantidadItemArray = $(cantidadItem[i]).val();
    var idProductoArray = $(cantidadItem[i]).attr("idProducto");


    $(".subtotal"+idProductoArray).html('<h4>$<span class="preciaProducto">'+(precioCarritoArray * cantidadItemArray)+'</span>.00</h4>');
    sumaTotal();
}

/* Suma de todos los subtotales */
function sumaTotal(){
    
    var idProducto = $(".quitarItemCarrito").attr("idProducto");
    var subtotales = $(".preciaProducto");
    var arraySumaSubtotales = [];
   
    for (let i = 0; i < subtotales.length; i++) {

        var sumatotalArray = $(subtotales[i]).html(); 
        
        arraySumaSubtotales.push(Number(sumatotalArray));
    }

   

    function sumaArrayTotales(total, numero){
        
        return total + numero;
    }

    var sumatotal = arraySumaSubtotales.reduce(sumaArrayTotales);
    

    $(".totalPedido").html('$'+sumatotal+".00");
    
}


$(document).on("click", "#btnCheckout", function(){
    var idUsuario = $(this).attr("idUsuario");
    var titulo = $(".mostrarCarrito .productoCarrito");
    var cantidad = $(".mostrarCarrito .cantidadCarrito");
    var subtotal = $(".preciaProducto");

    for (let i = 0; i < titulo.length; i++) {
        var tituloArray = $(titulo[i]).html();
        console.log("tituloArray", tituloArray);
        var cantidadArray = $(cantidad[i]).val();
        console.log("cantidadArray", cantidadArray);
        var subtotalArray = $(subtotal[i]).html();
        console.log("subtotalArray", subtotalArray);
        
    }
});