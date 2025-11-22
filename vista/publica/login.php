<?php 
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header("Location: ../../index.php");
    exit();
}?>
<style>
    body {
        background-image: url("vista/imagenes/fondo.jpg");
    }
</style>
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row col-lg-4 p-4 bg-white rounded shadow-lg">
        <form action="#" class="needs-validation" novalidate>
            <h1 class="text-center">Inico de Sesion</h1>
            <input type="hidden" name="login" value="session">
            <div class="mt-2">
                <label for="nombreUsuario" class="form-label">Usuario</label>
                <input type="text" name="nombreUsuario" id="nombreUsuario" class="form-control" required autocomplete="username">
                <div class="valid-feedback" id="mensaje_usuario_valido"></div>
                <div class="invalid-feedback" id="mensaje_usuario_invalido"></div>
            </div>
            <div class="mt-2">
                <label for="passUsuario" class="form-label">Contraseña</label>
                <input type="password" name="passUsuario" id="passUsuario" class="form-control" required autocomplete="current-password">
                <div class="valid-feedback" id="mensaje_contrasenia_valido"></div>
                <div class="invalid-feedback" id="mensaje_contrasenia_invalido"></div>
            </div>
            <div class="d-grid gap-2 text-center mt-3">
                <a href="?page=crear">Crear un nuevo usuario</a>
            </div>
            <div class="d-grid gap-2">
                <input type="submit" class="btn btn-info mt-3" value="ingresar">
            </div>
        </form>
    </div>
</div>
<script src="vista/js/loginSesionAjax.js"></script>
