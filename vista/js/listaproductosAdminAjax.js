$(document).ready(function(){
    cargarProdutos();
    function cargarProdutos(){
        $.ajax({
            url: "vista/action/action.php",
            type: "GET",
            dataType: "json",
            data : { accion: "listarProductos" },
            success: function(data) {
                var productosBody = $("#productosTbody");
                productosBody.empty();
                $.each(data, function(index, response) {
                    var estado = "<strong class='text-success'>Activo</strong>";
                    var boton = "<button class='btn btn-secondary' id='desactivarProducto'>Desactivar</button>";
                    if(response.prodesactivado != null){
                        estado = "<strong class='text-danger'>Desactivado</strong>";
                        boton = "<button class='btn btn-info' id='activarProducto'>Activar</button>";
                    }
                    var fila = "<tr>" + response.idproducto + 
                    "<td>" + response.idproducto + "</td>" +
                    "<td>" + response.pronombre + "</td>" +
                    "<td>" + response.prodetalle + "</td>" +
                    "<td>" + response.proprecio + "</td>" +
                    "<td>" + response.procantstock + "</td>"+
                    "<td>" + estado + "</td>"+
                    "<td class=''><button class='btn btn-warning me-2' id='modificarproducto'>Modificar</button>"+
                    boton +"</td>"+ 
                    "</tr>";
                    productosBody.append(fila);
                });
            }
        }) 
    }
    $('#btnNuevoProducto').on('click', function () {
        var modal = new bootstrap.Modal(document.getElementById('modalCrearProducto'));
        modal.show();
    });
    $('#btnCrearProducto').on('click', function () {
        var nombre = $('#nuevo_pronombre').val();
        var detalle = $('#nuevo_prodetalle').val();
        var cantstock = $('#nuevo_procantstock').val();
        var precio = $("#nuevo_proprecio").val(); 
        $.ajax({
            url: "vista/action/action.php",
            type: "POST",
            data: {
                accion: "crearProducto",
                pronombre: nombre,
                prodetalle: detalle,
                proprecio: precio,
                procantstock: cantstock
            },
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    text: "Producto creado correctamente",
                    timer: 2000,
                    showConfirmButton: false
                });
                cargarProdutos();
                $('#modalCrearProducto').modal('hide');
            }
        });

    });
    $(document).on('click', '#modificarproducto', function () {
        var fila = $(this).closest('tr');

        var idproducto  = fila.find('td:eq(0)').text();
        var nombre= fila.find('td:eq(1)').text();
        var detalle= fila.find('td:eq(2)').text();
        var precio = fila.find('td:eq(3)').text();
        var cantstock= fila.find('td:eq(4)').text();

        $('#mod_idproducto').val(idproducto);
        $('#mod_pronombre').val(nombre);
        $('#mod_prodetalle').val(detalle);
        $('#mod_proprecio').val(precio);
        $('#mod_procantstock').val(cantstock);

        var modal = new bootstrap.Modal(document.getElementById('modalModificarProducto'));
        modal.show();
    });

    $('#btnGuardarCambiosProducto').on('click', function () {

        var idproducto = $('#mod_idproducto').val();
        var nombre = $('#mod_pronombre').val();
        var detalle = $('#mod_prodetalle').val();
        var precio = $('#mod_proprecio').val();
        var cantstock = $('#mod_procantstock').val();

        $.ajax({
            url: "vista/action/action.php",
            type: "POST",
            data: {
                accion: "modificarProducto",
                idproducto: idproducto,
                pronombre: nombre,
                prodetalle: detalle,
                proprecio: precio,
                procantstock: cantstock
            },
            success: function (response) {

                Swal.fire({
                    icon: "success",
                    text: "Producto modificado correctamente",
                    timer: 2000,
                    showConfirmButton: false
                });

                cargarProdutos();
                $('#modalModificarProducto').modal('hide');
            }
        });

    });
    $(document).on('click', '#desactivarProducto', function() {

        let fila = $(this).closest('tr');
        let idproducto = fila.find('td:eq(0)').text(); // ID del producto

        Swal.fire({
            title: "¿Desactivar el Producto?",
            text: "Este producto se desactivara y los clientes no podran verlo.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, desactivar",
            cancelButtonText: "Cancelar"
        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({
                    url: "vista/action/action.php",
                    type: "POST",
                    data: { accion: "cambioEstado", idproducto: idproducto },
                    success: function(response) {

                        Swal.fire({
                            icon: "success",
                            title: "Producto desactivado",
                            timer: 1500,
                            showConfirmButton: false
                        });

                        cargarProdutos(); // Recarga la tabla de productos
                    }
                });
            }
        });
    });
    
    $(document).on('click', '#activarProducto', function() {

        let fila = $(this).closest('tr');
        let idproducto = fila.find('td:eq(0)').text(); // ID del producto

        Swal.fire({
            title: "¿Activar el Producto?",
            text: "Este producto sera visible para los usuarios.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, activar",
            cancelButtonText: "Cancelar"
        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({
                    url: "vista/action/action.php",
                    type: "POST",
                    data: { accion: "cambioEstado", idproducto: idproducto },
                    success: function(response) {

                        Swal.fire({
                            icon: "success",
                            title: "Producto activado",
                            timer: 1500,
                            showConfirmButton: false
                        });

                        cargarProdutos(); // Recarga la tabla de productos
                    }
                });
            }
        });
    });


})