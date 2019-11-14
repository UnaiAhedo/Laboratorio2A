function mostrarPreguntas() {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState==4 && xmlhttp.status == 200){
            document.getElementById("divMostrar").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "../php/ShowXmlQuestions.php", true);
    xmlhttp.send();
}

function limpiar(){
    $('#fquestionajax').trigger("reset");
    $('#fotomostrar').remove();
    $('#saltoFoto').remove();
    $("#divMostrar").html("");
    $("#mensajeSer").html("");
}