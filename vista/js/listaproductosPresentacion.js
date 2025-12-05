$(document).ready(function(){
    cargarProdutosPresentacion()
    function cargarProdutosPresentacion(){
        $.ajax({
            url: "vista/action/action.php",
            type: "GET",
            dataType: "json",
            data : { accion: "listarProductos" },
            success: function(data) {
                var productosBody = $("#contenedorProductos");
                productosBody.empty();
                $.each(data, function(index, response) {
                    if(response.prodesactivado == null){
                        var fila = "<div class='col-12 col-sm-6 col-md-4 col-lg-3 mb-4'>" + 
                                        "<div class='card shadow-sm h-100'>" + 
                                            "<img src='vista/imagenes/imagen1.jpg' class='card-img-top p-2 border ' alt='Producto'>" +
                                            "<div class='card-body'>" +
                                                "<h5 class='card-title'>"+ response.pronombre +"</h5>"+
                                                "<p class='card-text'>"+ response.prodetalle+"</p>"+
                                                "<p class='fw-bold text-success'>$"+ response.proprecio+"</p>"+
                                                "<form id='cantidadproducto'>"+
                                                    "<input type='number' id='cantidad'>"+
                                                "</form>"+
                                            "</div>"+
                                        " <div class='card-footer d-flex justify-content-between'>"+
                                                "<button class='btn btn-info btn-sm comprarProducto' id='"+ response.idproducto +"'>comprar</button>"+ 
                                            "</div>"
                                        "</div>"
                                    "</div>";
                        productosBody.append(fila);
                    }    
                });
            }
        }) 
    }
    $(".comprarProducto").on('click', function(){
        var idproducto =  $(this).attr('id');
        var cantidad = $("#cantidad").val();
        $.ajax({
            url: "vista/action/action.php",
            type: "POST",
            data: {accion: "ingresarProducto", productoid: idproducto, cant: cantidad},
            success: function(response){

            }
        })
    })
})