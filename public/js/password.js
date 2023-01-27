$(document).ready(inicio);
function inicio(){
    let  inputPassword = $("#registerPass");
    let formRegister = $("#formularioRegister");
    let formLogin = $("#formularioLogin");
    let ojoPassword = $('.ojoPassword');
    inputPassword.on("keyup", check);
    formLogin.submit(login);
    formRegister.submit(register);
    ojoPassword.on('click', ojoChange);

}

function login(){
}

function register(){
        if ($("#registerPass").val().length >= 1) {
            $("#pass1Div").text("");
            let div = $("#passstrength");
            if (div.text() == "Débil!" || div.text() == "Más caracteres.") {
                return false;
            }
        }
        return true;
}
function check(){
    var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
    var mediumRegex = new RegExp(
        "^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$",
        "g");
    var enoughRegex = new RegExp("(?=.{6,}).*", "g");
    var div = $("#passstrength");
    var barra = $("#progress-bar");
    if (false == enoughRegex.test($(this).val())) {
        div.html('Más caracteres.');
        div.css("color", "red");
        barra.removeClass();
        barra.css("width", "10%")
        barra.addClass("bg-danger");
        return false;
    } else if (strongRegex.test($(this).val())) {
        div.html('Fuerte!');
        div.css("color", "green");
        barra.removeClass();
        barra.css("width", "70%")
        barra.addClass("bg-success");
        return false;
    } else if (mediumRegex.test($(this).val())) {
        div.html('Media!');
        div.css("color", "orange");
        barra.removeClass();
        barra.css("width", "50%")
        barra.addClass("bg-warning");
        return false;
    } else {
        div.html('Débil!');
        div.css("color", "red");
        barra.removeClass();
        barra.css("width", "25%")
        barra.addClass("bg-danger");
        return false;
    }
}

function ojoChange(){
    let input = $(this).parent().children('input');
    let count = input.length;
    let i = 0;
    while(count != 0){
        if(input.get(i).type === "password"){
            input.get(i).type = "text";
            $(this).removeClass('bi-eye-fill');
            $(this).addClass('bi-eye-slash-fill');
        } else if(input.get(i).type === "text"){
            input.get(i).type = "password";
            $(this).removeClass('bi-eye-slash-fill');
            $(this).addClass('bi-eye-fill');
        }
        i++;
        count--;
    }
}