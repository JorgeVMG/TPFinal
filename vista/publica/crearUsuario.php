<style>
    body {
        background-image: url("vista/imagenes/fondo.jpg");
    }
</style>
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row col-lg-4 p-4 bg-white rounded shadow-lg">
        <form action=" " class="p-4">
            <h1 class="text-center">Crear Usuario</h1>
            <label for="nombreUsuario" class="form-label">Nombre</label>
            <input type="text" name="nombreUsuario" id="nombreUsuario" class="form-control" placeholder="Usuario">
            <label for="mailUsuario" class="form-label">Email</label>
            <input type="email" name="mailUsuario" id="mailUsuario" class="form-control" placeholder="Email ">
            <label for="passUsuario" class="form-label">Contraseña</label>
            <input type="password" name="passUsuario" id="passUsuario" class="form-control" placeholder="Contraseña">
            <div class="d-grid gap-2">
                <input type="submit" class="btn btn-primary mt-3" value="Crear Usuario">
            </div>
        </form>
    </div>
</div>