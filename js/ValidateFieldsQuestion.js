function comprobarEmail(){
    var re1 = /[a-z]*[A-Z]*[0-9]+[0-9]+[0-9]+@ikasle[.]ehu[.]e[u]?s/;
    var re2 = /[a-z]*[A-Z]*[.][a-z]*[A-Z]*@ehu[.]e[u]?s/;
    var re3 = /[a-z]*[A-Z]*@ehu[.]e[u]?s/;
    if($('#email').val().match(re1) || $('#email').val().match(re2) || $('#email').val().match(re3)){
       return true;
    }else{
       alert("Introduce un email válido.")
       return false;
    }
}

function comprobarCamposVacios(){
    if($('#email').val() == '' || $('#enunciado').val() == '' || $('#rescor').val() == '' || $('#respin1').val() == '' || $('#respin2').val() == '' || $('#respin3').val() == '' || $('#tema').val() == ''){
        alert("Algun campo está vacío.");
        return false;
    } else if($('#enunciado').val().length < 10){
        alert("El enunciado debe tener como mínimo 10 carácteres.");
        return false;   
    } else{
        return true;
    }
}