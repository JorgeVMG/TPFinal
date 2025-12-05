$(document).ready(function(){
    function cargarProdutosCarrito(){
        $.ajax({
            url: "vista/action/action.php",
            type: "GET",
            dataType: "json",
            data : { accion: "listarProductosCarrito" },
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
})