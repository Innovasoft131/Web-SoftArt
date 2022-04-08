$(document).on("click", ".detalle", function(){
    var web = $("#rutaOculta").val();
    var producto = $(this).attr("nombre");
    window.location = web+"detalleProducto/"+producto;
});