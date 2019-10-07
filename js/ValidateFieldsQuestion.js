function comprobarEmail(input){
    if(){
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