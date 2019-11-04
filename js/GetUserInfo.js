function rellenarDatos(email){
    $.get('../xml/Users.xml', function(d){
        var usuarios = $(d).find('usuario');
        var x;
        for (var i = 0; i < usuarios.length && !salir; i++){
            x = d.getElementsByTagName("email")[i].childNodes[0].nodeValue;
            var salir = false;
            if(x == email){
                $('#nombre').attr('value', d.getElementsByTagName("nombre")[i].childNodes[0].nodeValue)
                $('#apellidos').attr('value', d.getElementsByTagName("apellido1")[i].childNodes[0].nodeValue + " " + d.getElementsByTagName("apellido2")[i].childNodes[0].nodeValue)
                $('#tel').attr('value', d.getElementsByTagName("telefono")[i].childNodes[0].nodeValue)
                salir = true;
            }
        }
        if(!salir){
            alert("No se ha encontrado un usuario con el email indicado. Introduzca otro email.")
        }
    })
};