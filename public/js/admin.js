$(document).ready(inicio);
function inicio(){
    let toggleButton = $("#menu-toggle");
    toggleButton.on("click", hacer);
}
function hacer(){
    let el = $("#wrapper");
    el.toggleClass("toggled");
}