<?php 
$us = new usuarioAMB();
$usuarios = $us->listarUsuarios();
?>
<div class="container">
    <div class="row col-lg-8">
        <table id="tablaUsuarios" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($usuario->getId()); ?></td>
                        <td><?php echo htmlspecialchars($usuario->getNombre()); ?></td>
                        <td><?php echo htmlspecialchars($usuario->getEmail()); ?></td>
                        <td>cliente</td>
                        <td>activo</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>