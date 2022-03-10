let buscarForm = document.querySelector(".formBuscar");

document.querySelector("#btnBuscar").onclick = () => {
    buscarForm.classList.toggle('activar');
    login.classList.remove('activar');
    carrito.classList.remove('activar');
    menu.classList.remove('activar');   
    
};

let carrito = document.querySelector(".carrito");

document.querySelector("#btnCarrito").onclick = () => {
    carrito.classList.toggle('activar');
    login.classList.remove('activar');
    buscarForm.classList.remove('activar');
    menu.classList.remove('activar');   
    
};


let login = document.querySelector(".login-form");
/*
document.querySelector("#btnLogin").onclick = () => {
    login.classList.toggle('activar');
    carrito.classList.remove('activar');
    buscarForm.classList.remove('activar');
    menu.classList.remove('activar');   
    
};
*/

let menu = document.querySelector(".nav");

document.querySelector("#btnMenu").onclick = () => {
    menu.classList.toggle('activar');
    login.classList.remove('activar');
    carrito.classList.remove('activar');
    buscarForm.classList.remove('activar');  
};


window.onscroll = () => {
    login.classList.remove('activar');
    carrito.classList.remove('activar');
    buscarForm.classList.remove('activar');
    menu.classList.remove('activar');    
};


$(document).on("click", ".btnLoginI", function(){
    const ruta = document.getElementById('rutaOculta').value;
    window.location = ruta+"login";
});
