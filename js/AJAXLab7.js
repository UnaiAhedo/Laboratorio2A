function cambiarEstado(email) {
    $.ajax({
        type: "GET",
        url: "ChangeState.php",
        data: "email=" + email,
        success: function(result) {
            if(result == 'actualizado'){
                alert("El estado del usuario ha sido cambiado con exito.");
                location.reload();
            }else{
                alert("Error al cambiar el estado del usuario.");
                location.reload();
            }
        }
    });
};

function borrarCuenta(email) {
    if (window.confirm("Seguro que quiere eliminar el usuario con email: " + email)) { 
        $.ajax({
            type: "GET",
            url: "RemoveUser.php",
            data: "email=" + email,
            success: function(result) {
                if(result == 'borrado'){
                    alert("El usuario ha sido eliminado con exito.");
                    location.reload();
                }else{
                    alert("Error al eliminar al usuario.");
                    location.reload();
                }
            }
        });
    }
};