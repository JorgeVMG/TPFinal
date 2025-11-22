<style>
    body {
        background-image: url("vista/imagenes/fondo.jpg");
    }
</style>
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row col-lg-4 p-4 bg-white rounded shadow-lg">
        <form action="#" class="needs-validation" novalidate>
            <a href="index.php?page=login" class="text-decoration-none text-dark">
                <i class="bi bi-arrow-left fs-4"></i>
            </a>
            <h1 class="text-center">Crear Usuario</h1>
            <input type="hidden" name="login" value="crearUsuario">
            <label for="nombreUsuario" class="form-label">Nombre</label>
            <input type="text" name="nombreUsuario" id="nombreUsuario" class="form-control" required>
            <div class="valid-feedback" id="mensaje_usuario_valido"></div>
            <div class="invalid-feedback" id="mensaje_usuario_invalido"></div>
            <label for="mailUsuario" class="form-label">Email</label>
            <input type="email" name="mailUsuario" id="mailUsuario" class="form-control" required>
            <div class="valid-feedback" id="mensaje_email_valido"></div>
            <div class="invalid-feedback" id="mensaje_email_invalido"></div>
            <label for="passUsuario" class="form-label">Contraseña</label>
            <input type="password" name="passUsuario" id="passUsuario" class="form-control" required>
            <div class="valid-feedback" id="mensaje_contrasenia_valido"></div>
            <div class="invalid-feedback" id="mensaje_contrasenia_invalido"></div>
            <div class="d-grid gap-2">
                <input type="submit" class="btn btn-info mt-3" value="Crear Usuario">
            </div>
        </form>
    </div>
</div>

<script src="vista/js/loginSesionAjax.js"></script>