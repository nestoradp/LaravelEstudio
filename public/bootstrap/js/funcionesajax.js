$(document).on('click','.bModificar', function () {
    var id = $(this).data('identificador');
    localStorage.setItem('id_modificar', id);
    //Mostrar modal
    $('#modalModificar').modal('show');
});

$(document).on('click','.bEliminar', function () {
    var id = $(this).data('identificador');
    var nombre =$(this).data('nombre');
    localStorage.setItem('id_modificar', id);
    //Mostrar modal
    $('#eliminarusuario').text(nombre);
    $('#modalEliminar').modal('show');
});

$(document).ready(function() {
    //$('#tabla_usuarios').DataTable();


    //Al mostrar el modal, debe cargar la info
    $('#modalModificar').on('show.bs.modal', function () {
        var id = localStorage.getItem('id_modificar');
        var parametros = {'id': id};
        $.ajax({
            data: parametros,
            type: "PUT",
            headers:{ 'X-CSRF-TOKEN': $('#meta_csrf').attr('content')},
            url: "/lista/modificar",
            beforeSend: function () {
                //$('#section').html("<h1>Procesando.....</h1>");
            },

            success: function (respuesta) {

                var datos = JSON.parse(respuesta);

                $('#Actnombre').val(datos.nombre);
                $('#Actapellidos').val(datos.apellidos);
                $('#Actusuario').val(datos.usuario);
                $('#acttelefono').val(datos.telefono);

                $("#confirmarModificar").attr("value", datos.identificador);
            }
            // error: function (xhr, status) {
            //   alert("Ha ocurrido un error");
            // }
        });

    }).on('hidden.bs.modal', function () {
        $('.formulario1 input').val('');
    });

    $('#confirmarModificar').on('click', function () {

    });




    $('#ConfirmarEliminarUsuario').on('click',function () {
       var id = localStorage.getItem('id_modificar');
        var parametros={
            "id": id

        };

        $.ajax({
            data: parametros,
            url:"/lista/eliminar",
            type: "DELETE",
            headers:{ 'X-CSRF-TOKEN': $('#meta_csrf').attr('content')},
            beforeSend: function() {
                //$('#principal').html("<h1>Procesando.....</h1>");
            },

            success: function(respuesta){
                $('#modalEliminar').modal('hide');
                if(JSON.parse(respuesta)=='ok'){
                   //$.notify("Se ha eliminado correctamente", "success", { globalPosition: 'top left'});
                    iziToast.success({title: 'Atención', message: 'Se ha eliminado correctamente', position: 'topCenter'});
                    var tabla1= $('#userList').DataTable();
                    tabla1.rows('#fila-'+id).remove().draw();
                }else{

                    $.notify("Error al eliminar el usuario", "error", { position:"top left" });
                }


            },
            error: function (xhr, status){
                alert("Ha ocurrido un error");
            }



        });




    });

$('.bAdicionar').on('click', function () {
$('#modalAdicionar').modal('show');




});

$('#ejecutaradicionar').on('click', function () {
    var identificador=$('#Adicidentificador').val();
    var nombre = $('#Adicnombre').val();
    var apellidos= $('#Adicapellidos').val();
    var usuario= $('#Adicusuario').val();
    var telefono = $('#Adictelefono').val();

var parametros=
    {
        'identificador': identificador,
        'nombre' : nombre,
        'apellidos' : apellidos,
        'usuario' : usuario,
        'telefono' : telefono,
    };
    $.ajax({
        data: parametros,
        type: "POST",
        headers:{ 'X-CSRF-TOKEN': $('#meta_csrf').attr('content')},
        url: "/lista/Insertar",
        beforeSend: function () {
            $('#section').html("<h1>Procesando.....</h1>");

        },

        success: function (respuesta) {
            $('#modalAdicionar').modal('hide');
            var datos = JSON.parse(respuesta);
            if(datos=='ok') {
                var t = $('#userList').DataTable();
                var botones='<span><button style="cursor: pointer"  class="btn btn-sm btn-success bModificar" data-identificador="'+identificador+'">Modificar</button>\n' +
                    '<button style="cursor: pointer" class="btn btn-sm btn-danger bEliminar"   data-nombre="'+nombre+'"  data-identificador="'+identificador+'"  ><i class="fas fa-cloud"></i>Eliminar</button></span>';
                t.row.add( [identificador, nombre, apellidos, usuario, telefono, botones] ).draw( true );
                iziToast.success({
                    title: 'Atención',
                    message: 'Se ha Insertado correctamente un Usuario',
                    position: 'topCenter'
                });
            }


        else
                iziToast.success({title: 'Atención', message: 'Error', position: 'topCenter'});


            },
       //  error: function (xhr, status) {
       //    alert("Ha ocurrido un error");
       //  }
    });


});
















});








