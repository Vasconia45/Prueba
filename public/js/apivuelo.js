$(document).ready(inicio);
function inicio(){
    cargar1();
}
function cargar1(){
    $.get("https://www.opendata.euskadi.eus/contenidos/ds_recursos_turisticos/aeropuertos_euskadi/opendata/transporte.json", function(data){
        for(let $i = 0; $i < data.length; $i++){
            let selectOri  = $("#aeropuerto_ori");
            let selectDes = $("#aeropuerto_des");
            let optionOri = $("<option></option>");
            let optionDes = $("<option></option>");
            optionOri.val(data[$i].documentName);
            optionDes.val(data[$i].documentName);
            optionOri.text(data[$i].documentName);
            optionDes.text(data[$i].documentName);
            selectOri.append(optionOri);
            selectDes.append(optionDes);
        }
    });
    cargar2();
}
function cargar2(){
    $.get("https://data.opendatasoft.com/api/records/1.0/search/?dataset=osm-world-airports%40babel&q=&facet=source&facet=country&facet=country_code", function(data){
        let records = data.records;
        for(let $i = 0; $i < records.length; $i++){
            let selectOri  = $("#aeropuerto_ori");
            let selectDes = $("#aeropuerto_des");
            let optionOri = $("<option></option>");
            let optionDes = $("<option></option>");
            optionOri.val(records[$i].fields.name);
            optionDes.val(records[$i].fields.name);
            optionOri.text(records[$i].fields.name);
            optionDes.text(records[$i].fields.name);
            selectOri.append(optionOri);
            selectDes.append(optionDes);
        }
    });
    cargar3();
}
function cargar3(){
    $.get("../airport.json", function(data){
        for(let $i = 0; $i < data.length; $i++){
            let selectOri  = $("#aeropuerto_ori");
            let selectDes = $("#aeropuerto_des");
            let optionOri = $("<option></option>");
            let optionDes = $("<option></option>");
            optionOri.val(data[$i].name);
            optionDes.val(data[$i].name);
            optionOri.text(data[$i].name);
            optionDes.text(data[$i].name);
            selectOri.append(optionOri);
            selectDes.append(optionDes);
        }
    });
}
function cargarTiempo(){
    let $pais = $('#pais').val();
    $.get("http://api.weatherapi.com/v1/current.json?key=22c77e690a4045a395f83506232301&q=" + $pais + "&aqi=no", function(data){
        let temperatura = $('#temp');
        let viento = $('#viento');
        let condicion = $('#condicion');
        let imagen = $('#im');
        temperatura.val(data.current.temp_c + "ºC");
        viento.val(data.current.wind_kph + "Km/h");
        condicion.val(data.current.condition.text);
        imagen.attr('src', data.current.condition.icon);
    });
}