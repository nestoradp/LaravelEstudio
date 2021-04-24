

function MostarModalEliminarUsuariosAjax(nombre) {
    var id = $(this).data('identificador');
    localStorage.setItem('id_eliminar', id);
    $('#eliminarusuario').text(nombre);
    $('#modalEliminar').modal('show');
}


function EliminarUsuario() {
    $.ajax({
        data: parametros,
        url: "/lista/eliminar",
        type: "POST",
        beforeSend: function () {
            $('#section').html("<h1>Procesando.....</h1>");
        },

        success: function (respuesta) {
            $('#principal').html(respuesta);
        },
        error: function (xhr, status) {
            alert("Ha ocurrido un error");
        }

    });
};