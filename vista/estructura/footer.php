    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function(){

            $.ajax({
                url: "control/usuarioAMB.php",
                type: "GET",
                dataType: "json",
                success: function(data){
                    let filas = "";

                    data.forEach(function(usuario){
                        filas += `
                            <tr>
                                <td>${usuario.id}</td>
                                <td>${usuario.nombre}</td>
                                <td>${usuario.email}</td>
                            </tr>
                        `;
                    });

                    $("#tablaUsuarios tbody").html(filas);
                }
            });

        });
    </script>
</body>
</html>