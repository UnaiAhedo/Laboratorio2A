function mostrarImagen(input) {
    if (input.files && input.files[0]) {
         var reader = new FileReader();
        reader.onload = function (e) {
            $('#fotomostrar').attr('src', e.target.result);
            $('#fotomostrar').show();
        };
         reader.readAsDataURL(input.files[0]);
    }
}