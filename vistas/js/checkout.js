
const mostrarCheckout = async () => {
  const productos = JSON.parse(localStorage.getItem("listaProductos"));
  var html = "";
  var precio = 0;
  productos.forEach(mostrarProductos);

  function mostrarProductos(item, index) {
    if (item.oferta != "") {
      precio = item.oferta;
    } else {
      precio = item.precio;
    }
    html = "<tr>" +
      "<td>" + item.producto + "</td>" +
      "<td>" + item.cantidad + "</td>" +
      "<td><span>$ <span class='preciaProductoCheckout'>" + (precio * item.cantidad) + "</span>.00</span></td>" +
      "</tr>";

    $(".table").append(html);
    sumaTotalCheckout();
  }
}

/* Suma de todos los subtotales */
function sumaTotalCheckout() {

  var subtotales = $(".preciaProductoCheckout");
  var arraySumaSubtotales = [];

  for (let i = 0; i < subtotales.length; i++) {

    var sumatotalArray = $(subtotales[i]).html();

    arraySumaSubtotales.push(Number(sumatotalArray));
  }



  function sumaArrayTotales(total, numero) {

    return total + numero;
  }

  var sumatotal = arraySumaSubtotales.reduce(sumaArrayTotales);

  $(".totalCheckout").html('$<span>' + sumatotal + "</span>.00");

}



mostrarCheckout();

/* paypal */
var totalApagar = $(".totalCheckout span").html();
var rutaOculta = $("#rutaOculta").val();
var datosCarrito = localStorage.getItem('listaProductos');
var cliente = $("#cliente").val();
var usuario = $("#usuario").val();
paypal.Buttons({
  style: {
    color: 'blue',
    shape: 'pill',
    label: 'pay'
  },
  // Sets up the transaction when a payment button is clicked
  createOrder: (data, actions) => {
    return actions.order.create({
      purchase_units: [{
        amount: {
          value: totalApagar // Can also reference a variable or function
        }
      }]
    });
  },
  // Finalize the transaction after payer approval
  onApprove: (data, actions) => {
    return actions.order.capture().then(function(detalles) {
      /*window.location.href = rutaOculta+"inicio";*/
      var datos = new FormData();
      datos.append('paypal', JSON.stringify(detalles));
      datos.append('carrito', datosCarrito);
      datos.append('cliente', cliente);
      datos.append('usuario', usuario);
      
      return fetch(
        rutaOculta+'ajax/checkout.ajax.php',
        {
          method : 'POST',
          body : datos
        }
      );
    });
  },
  onCancel: function (data) {
    // Show a cancel page, or return to cart
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: '!Pago cancelado!'
    })
    console.log(data);
  }
}).render('#paypal-button-container');