$(document).ready(inicio);
function inicio() {
    let signInButton = $('#signIn');
    let signUpButton = $('#signUp');
    signUpButton.on('click', search);
    signInButton.on('click', search2);
}
function search(){
    let main = $('#main');
    main.addClass("right-panel-active");
}
function search2(){
    let main = $('#main');
    main.removeClass("right-panel-active");
}