<div class="container">
    <div class="row col-lg-10 offset-lg-1">
        <table id="tablaUsuarios" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="usuariosBody">
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="modalModificar" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modificar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="formModificarUsuario">

                <input type="hidden" id="mod_idusuario">

                <div class="mb-3">
                    <label clas="form-label">Nombre</label>
                    <input type="text" id="mod_usnombre" class="form-control">
                </div>

                <div class="mb-3">
                    <label clas="form-label">Email</label>
                    <input type="text" id="mod_usmail" class="form-control">
                </div>

                <div class="mb-3">
                    <label clas="form-label">Rol</label>
                    <select id="mod_rol" class="form-select">
                        <?php
                            $rolAMB = new rolAMB();
                            $roles = $rolAMB->listarRoles();
                            foreach($roles as $r){
                                echo "<option value='".$r->getId()."'>".$r->getNombre()."</option>";
                            }
                        ?>
                    </select>
                </div>

                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button class="btn btn-success" id="btnGuardarCambios">Guardar Cambios</button>
            </div>

        </div>
    </div>
</div>
