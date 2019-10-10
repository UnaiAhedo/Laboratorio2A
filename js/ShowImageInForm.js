function mostrarImagen(input) {
    if (input.files && input.files[0]) {
         var reader = new FileReader();
        reader.onload = function (e) {
            $('<img id="fotomostrar" width = "100px" height = "100px"/><br>').insertBefore($('#enviar'));
            $('#fotomostrar').attr('src', e.target.result);        
        };
         reader.readAsDataURL(input.files[0]);
    }
}