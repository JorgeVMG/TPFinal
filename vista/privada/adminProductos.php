<div class="container">
    <div class="row mt-4 border border-dark">

        <div class="col-12 d-flex justify-content-between align-items-center border-bottom border-dark p-2">
            <h2 class="text-primary mb-0">Productos</h2>
            <button class="btn btn-success" id="btnNuevoProducto">
                <i class="bi bi-plus-lg"></i> Nuevo Producto
            </button>
        </div>

        <table class="table table-striped col-lg-12 mb-0 mt-1">
            <thead>
                <tr class="fs-5">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Detalle</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Estado</th>
                    <th class="col-2">Acciones</th>
                </tr>
            </thead>
            <tbody id="productosTbody">
                <!-- lista Productos -->
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalCrearProducto" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Agregar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="formCrearProducto">

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" id="nuevo_pronombre" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Detalle</label>
                        <textarea id="nuevo_prodetalle" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Precio</label>
                        <input type="number" id="nuevo_proprecio" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cantidad en stock</label>
                        <input type="number" id="nuevo_procantstock" class="form-control">
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button class="btn btn-success" id="btnCrearProducto">Guardar</button>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="modalModificarProducto" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Modificar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="formModificarProducto">
                    <input type="hidden" id="mod_idproducto">

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" id="mod_pronombre" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Detalle</label>
                        <textarea id="mod_prodetalle" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Precio</label>
                        <input type="number" id="mod_proprecio" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cantidad en stock</label>
                        <input type="number" id="mod_procantstock" class="form-control">
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button class="btn btn-success" id="btnGuardarCambiosProducto">Guardar Cambios</button>
            </div>

        </div>
    </div>
</div>

<script src="vista/js/listaproductosAdminAjax.js"></script>