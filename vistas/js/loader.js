const preloader = document.querySelector(".socket");
const mostrar = document.querySelectorAll(".mostrar");

window.addEventListener("load", () => {
    preloader.style.display = "none";
    //    mostrar.style.display = "";
    $('.mostrar').removeClass('mostrar');
});