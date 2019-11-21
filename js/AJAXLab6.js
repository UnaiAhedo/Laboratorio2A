function emailVIP(id) {
    $.ajax({
        type: "GET",
        url: "ClientVerifyEnrollment.php",
        data: "emailReg=" + id,
        success: function(result) {
            if(result == 'SI'){
                $('#valEmail').html("El email es VIP, se puede registrar.");
                $('#valEmail').css("color", "green");
            }else{
                $('#valEmail').html("El email no es VIP, no se puede registrar.");
                $('#valEmail').css("color", "red");
            }
        }
    });
};

function contraVal(id) {
    $.ajax({
        type: "GET",
        url: "ClientVerifyPass.php",
        data: "contraReg=" + id,
        success: function(result) {
            if(result == 'VALIDA'){
                $('#valCon').html("La contraseña es válida.");
                $('#valCon').css("color", "green");
            }else if(result == 'SIN SERVICIO'){
                $('#valCon').html("SIN SERVICIO");
            }else{
                $('#valCon').html("La contraseña no es válida.");
                $('#valCon').css("color", "red");
            }
        }
    });
};