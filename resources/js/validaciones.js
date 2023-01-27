$("#formulario1").submit(function() {
    if ($("#password").val().length >= 1) {
        $("#pass1Div").text("");
        let div = $("#passstrength");
        if (div.text() == "Débil!" || div.text() == "Más caracteres.") {
            return false;
        }
    }
    if ($("#password2").val().length < 1) {
        let div = $("#pass2Div");
        div.text("La confirmación es obligatoria");
        div.css("color", "red");
        return false;
    }
    if ($("#password2").val().length >= 1) {
        let div = $("#pass2Div");
        div.text("");
    }
    if ($("#password").val() != $("#password2").val()) {
        alert("La contraseña no coincide");
        return false;
    }
    return true;
});
$('#password').keyup(function(e) {
    var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
    var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
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
        barra.css("width", "90%")
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
});