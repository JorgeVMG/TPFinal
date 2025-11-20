$(document).ready(function(){
    var loginUsuario = document.getElementsByName("login")[0].value;
    (() => {
        'use strict'
        let forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                event.preventDefault();   // evitar envío por defecto
                event.stopPropagation();  // detener propagación

                if(validarUsuario(loginUsuario)){   
                    if(loginUsuario == "session"){
                        validarExistenciaUsuario();
                    }else{
                        crearUsuario();
                    } 
                }
            }, false)
        })
    })()
    function validarUsuario(loginUsuario){
        let iniciovalido = false;
        var usuario= nombreUsuario();
        var contrasenia = contraseniaUsuario();
        if(loginUsuario === "session"){
            if(usuario && contrasenia){ 
                iniciovalido = true;
            }
        }else{
            var email = validarEmailUsuario();
            if(usuario && contrasenia && email){ 
                iniciovalido = true;
            }
        }
        return iniciovalido;
    }
    function nombreUsuario(){
        var inputnombrUsuario = document.getElementById("nombreUsuario");
        var inputmensajevalido = document.getElementById("mensaje_usuario_valido");
        var inputmensajeinvalido = document.getElementById("mensaje_usuario_invalido");
        var nombreUsuario = inputnombrUsuario.value;
        let respuesta = false;
        if(nombreUsuario === ""){
            inputnombrUsuario.classList.remove("is-valid");
            inputnombrUsuario.classList.add("is-invalid");
            inputmensajevalido.innerText = "";
            inputmensajeinvalido.innerText = "El nombre de usuario no puede estar vacio";
        }else if(/\s/.test(nombreUsuario)){
            inputnombrUsuario.classList.remove("is-valid");
            inputnombrUsuario.classList.add("is-invalid");
            inputmensajevalido.innerText = "";
            inputmensajeinvalido.innerText = "El nombre de usuario no puede tener espacio vacios";
        }else{
            inputnombrUsuario.classList.remove("is-invalid");
            inputnombrUsuario.classList.add("is-valid");
            inputmensajeinvalido.innerText = "";
            inputmensajevalido.innerText = "nombre valido";
            respuesta = true;
        }
        return respuesta;
    }
    function contraseniaUsuario(){
        var inputcontraseniaUsuario = document.getElementById("passUsuario");
        var inputmensajevalido = document.getElementById("mensaje_contrasenia_valido");
        var inputmensajeinvalido = document.getElementById("mensaje_contrasenia_invalido");
        var contraseniaUsuario = inputcontraseniaUsuario.value;
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).*$/
        let respuesta = false;
        if(contraseniaUsuario === ""){
            inputcontraseniaUsuario.classList.remove("is-valid");
            inputcontraseniaUsuario.classList.add("is-invalid");
            inputmensajevalido.innerText = "";
            inputmensajeinvalido.innerText = "La contrasenia no puede estar vacia";
        }else if(contraseniaUsuario.length < 8){
            inputcontraseniaUsuario.classList.remove("is-valid");
            inputcontraseniaUsuario.classList.add("is-invalid");
            inputmensajevalido.innerText = "";
            inputmensajeinvalido.innerText = "La contrasenia no puede ser menor a 6 caracteres";
        }else if(/\s/.test(contraseniaUsuario)){
            inputcontraseniaUsuario.classList.remove("is-valid");
            inputcontraseniaUsuario.classList.add("is-invalid");
            inputmensajevalido.innerText = "";
            inputmensajeinvalido.innerText = "La contrasenia tener espacios vacios";
        }else if(!passwordRegex.test(contraseniaUsuario)){
            inputcontraseniaUsuario.classList.remove("is-valid");
            inputcontraseniaUsuario.classList.add("is-invalid");
            inputmensajevalido.innerText = "";
            inputmensajeinvalido.innerText = "La contrasenia tiene que tener al menos una letra mayuscula, una minuscula y un numero";
        }else{
            inputcontraseniaUsuario.classList.remove("is-invalid");
            inputcontraseniaUsuario.classList.add("is-valid");
            inputmensajevalido.innerText = "contrasenia valida";
            inputmensajeinvalido.innerText = "";
            respuesta = true;
        }
        return respuesta;
    }
    function validarEmailUsuario(){
        var inputemailUsuario = document.getElementById("mailUsuario");
        var inputmensajevalido = document.getElementById("mensaje_email_valido");
        var inputmensajeinvalido = document.getElementById("mensaje_email_invalido");
        var emailUsuario = inputemailUsuario.value;
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        let respuesta = false;
        if(emailUsuario === ""){
            inputemailUsuario.classList.remove("is-valid");
            inputemailUsuario.classList.add("is-invalid");
            inputmensajevalido.innerText = "";
            inputmensajeinvalido.innerText = "El email no puede estar vacio";
        }else if(!emailRegex.test(emailUsuario)){
            inputemailUsuario.classList.remove("is-valid");
            inputemailUsuario.classList.add("is-invalid");
            inputmensajevalido.innerText = "";
            inputmensajeinvalido.innerText = "El email no es valido";
        }else{
            inputemailUsuario.classList.remove("is-invalid");
            inputemailUsuario.classList.add("is-valid");
            inputmensajeinvalido.innerText = "";
            inputmensajevalido.innerText = "Email valido";
            respuesta = true;
        }
        return respuesta;
    }
    function validarExistenciaUsuario(){
        var nombre = $("#nombreUsuario").val();
        var contrasenia = $("#passUsuario").val();
        $.ajax({
            url: "vista/action/action.php",
            type : "POST",
            data : {accion : "validarExistencia", usuario : nombre , contrasenia : contrasenia},
            dataType: "json",   
            success: function(response){
                if(response == true){
                    Swal.fire({
                        icon: "success",
                        title: 'Vienvenido '+nombre+'!!. Redirigiendo...',
                        html: 'Por favor espera',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading(); 
                        }
                    });
                    setTimeout(() => {
                        window.location.href = "index.php?page=presentacion";
                    }, 3000);
                }else{
                    Swal.fire({
                            icon: "error",
                            title: "Usuario invalido vuelva a intentarlo",
                            timer: 1500,
                            showConfirmButton: false
                        });
                    $("#nombreUsuario").val("");
                    $("#passUsuario").val("");
                    $("#nombreUsuario").removeClass("is-valid");
                    $("#passUsuario").removeClass("is-valid");
                }
            }
        })
    }
    function crearUsuario(){
        var nombre = $("#nombreUsuario").val();
        var email = $("#mailUsuario").val();
        var contrasenia = $("#passUsuario").val();
        $.ajax({
            url: "vista/action/action.php",
            type : "POST",
            data : {accion : "crearUsuario", usuario : nombre , email: email, contrasenia : contrasenia},
            success: function(response){
                if(response){
                    Swal.fire({
                        title: 'Usuario creado con exito',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    });
                    setTimeout(() => {
                        window.location.href = "index.php?page=login";
                    }, 1500);
                    
                }else{
                    Swal.fire({
                            icon: "error",
                            title: "Error al crear el usuario, intente nuevamente",
                            timer: 1500,
                            showConfirmButton: false   
                        });
                    $("#nombreUsuario").val("");
                    $("#mailUsuario").val("");
                    $("#passUsuario").val("");
                    $("#nombreUsuario").removeClass("is-valid");
                    $("#mailUsuario").removeClass("is-valid");
                    $("#passUsuario").removeClass("is-valid");
                }  
            }
        })
    }

})