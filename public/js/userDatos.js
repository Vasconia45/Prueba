$(document).ready(inicio);
function inicio(){
   let input = $("#fileupload");
   input.on("change", cambio);
}
function cambio(e){
    var x = URL.createObjectURL(e.target.files[0]);
    $("#upload-img").attr("src", x);
}