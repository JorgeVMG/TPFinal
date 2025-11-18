$(document).ready(function() {
    cargarUsuarios();
    
    function cargarUsuarios() {
        $.ajax({
            url: "vista/action/action.php",
            type: "GET",
            dataType: "json",
            data : { accion: "listarUsuario" },
            success: function(data) {
                var usuariosBody = $("#usuariosBody");
                usuariosBody.empty();
                $.each(data, function(index, usuario) {
                    if(usuario.estado == "deshabilitado"){
                        boton = "<td><button class='btn btn-success btn-activar'>activar usuario</button></td>"; 
                    }else{
                        boton = "<td><button class='btn btn-danger btn-desactivar'>desactivar usuario</button></td>";
                    }
                    var fila = "<tr>" +
                        "<td>" + usuario.idusuario + "</td>" +
                        "<td>" + usuario.usnombre + "</td>" +
                        "<td>" + usuario.usmail + "</td>" +
                        "<td>" + usuario.rol + "</td>" +
                        "<td>" + usuario.estado + "</td>" +
                        boton +
                        "<td><button class='btn btn-primary btn-modificar'>modificar usuario</button></td>"+
                        "</tr>";
                    usuariosBody.append(fila);
                });
            }
        })  
    }
    $(document).on('click', '.btn-desactivar', function() {
        let fila = $(this).closest('tr');
        let idusuario = fila.find('td:eq(0)').text();

        Swal.fire({
            title: "¿Desactivar usuario?",
            text: "El usuario no podrá iniciar sesión.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, desactivar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: "vista/action/action.php",
                    type: "POST",
                    data: { accion: "desactivarUsuario", idusuario: idusuario },
                    success: function(response) {

                        Swal.fire({
                            icon: "success",
                            title: "Usuario desactivado",
                            timer: 1500,
                            showConfirmButton: false
                        });

                        cargarUsuarios();
                    }
                });
            }
        });
    });

    $(document).on('click', '.btn-activar', function() {
        let fila = $(this).closest('tr');
        let idusuario = fila.find('td:eq(0)').text();

        Swal.fire({
            title: "¿Activar usuario?",
            text: "El usuario podrá volver a iniciar sesión.",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Sí, activar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: "vista/action/action.php",
                    type: "POST",
                    data: { accion: "activarUsuario", idusuario: idusuario },
                    success: function(response) {

                        Swal.fire({
                            icon: "success",
                            title: "Usuario activado",
                            timer: 1500,
                            showConfirmButton: false
                        });

                        cargarUsuarios();
                    }
                });
            }
        });
    });

    $(document).on('click', '.btn-modificar', function () {
        var fila = $(this).closest('tr');
        var idusuario = fila.find('td:eq(0)').text();
        var nombre= fila.find('td:eq(1)').text();
        var mail= fila.find('td:eq(2)').text();
        var rol= fila.find('td:eq(3)').text();
        $('#mod_idusuario').val(idusuario);
        $('#mod_usnombre').val(nombre);
        $('#mod_usmail').val(mail);
        $('#mod_rol').val(rol);
        var modal = new bootstrap.Modal(document.getElementById('modalModificar'));
        modal.show();
    });

    $('#btnGuardarCambios').on('click', function () {
        var idusuario = $('#mod_idusuario').val();
        var nombre= $('#mod_usnombre').val();
        var mail= $('#mod_usmail').val();
        var rol= $('#mod_rol').val();
        $.ajax({
            url: "vista/action/action.php",
            type: "POST",
            data: {
                accion: "modificarUsuario",
                idusuario: idusuario,
                usnombre: nombre,
                usmail: mail,
                rol: rol
            },
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    text: "Los cambios se guardaron correctamente",
                    timer: 2000,
                    showConfirmButton: false
                });
                cargarUsuarios();
                $('#modalModificar').modal('hide');
            }
        });

    });

});