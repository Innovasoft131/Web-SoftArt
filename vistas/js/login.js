function toggleForm() {
    var container = document.querySelector(".contenedor");
    container.classList.toggle('activar');

    var container = document.querySelector(".login");
    container.classList.toggle('activarSeccion');
}

$(document).on("keyup", "#confirmarPasswor", function(){
    var password = $("#passwordCliente").val();
    var ConfirmarPassword = $("#confirmarPasswor").val();

    
    if(password == ConfirmarPassword){
        $("#btnEntrar").prop('disabled', false);
        var passwordcon = document.getElementById("confirmarPasswor");
        passwordcon.style.background = "";
        passwordcon.style.color = "";

    }else{
        var passwordcon = document.getElementById("confirmarPasswor");
        passwordcon.style.background = "#fe0000";
        passwordcon.style.color = "#fff";
    }

    if(password ==""){
        var passwordcon = document.getElementById("confirmarPasswor");
        passwordcon.style.background = "";
        passwordcon.style.color = "";
    }
});

$(document).on("keyup", "#passwordCliente", function(){
    var password = $("#passwordCliente").val();
    var ConfirmarPassword = $("#confirmarPasswor").val();



    if(password ==""){
        var passwordcon = document.getElementById("confirmarPasswor");
        passwordcon.style.background = "";
        passwordcon.style.color = "";
    }
});

