<div class="container">
    <div class="row mt-4 border border-dark">

        <div class="col-12 d-flex justify-content-between align-items-center border-bottom border-dark p-2">
            <h2 class="text-primary mb-0">Menu</h2>
            <button class="btn btn-success" id="btnNuevoMenu">
                <i class="bi bi-plus-lg"></i> Nuevo menu
            </button>
        </div>

        <table class="table table-striped col-lg-12 mb-0 mt-1">
            <thead>
                <tr class="fs-5">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>descripcion</th>
                    <th>IDpadre</th>
                    <th>Estado</th>
                    <th class="col-2">Acciones</th>
                </tr>
            </thead>
            <tbody id="menuTbody">
                <!-- lista Productos -->
            </tbody>
        </table>
    </div>
</div>
<script src="vista/js/listamenuAdminAjax.js"></script>