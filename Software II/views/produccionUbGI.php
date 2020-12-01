<?php 
    session_start();
    include("../models/conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1, maxium-scale=1.0, minium-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>UbGI | PRODUCCIÓN</title>
    <link rel="icon" href="../img/iconoub.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Ranchers&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/estilos.css">
    
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
</head>

<script>
    function mostrarMensaje(){
        alert("El producto ha sido creado exitosamente");
    }

    function alerta()
    {
    var mensaje;
    var opcion = confirm("¿Esta seguro de eliminar esta vinculación?");
    if (opcion == true) {
        mensaje = "Has clickado OK";
	} else {
        mensaje = "Has clickado Cancelar";
    }

}
</script>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Menu Navegacion ">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="UbGI.php" class="nav-link">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="datosGeneralesUbGI.php" class="nav-link">Datos Generales</a>
                    </li>
                    <li class="nav-item">
                        <a href="investigadoresUbGI.php" class="nav-link">Investigadores</a>
                    </li>
                    <li class="nav-item">
                        <a href="produccionUbGI.php" class="nav-link active">Producción</a>
                    </li>
                    <li class="nav-item">
                        <a href="clasificacionUbGI.php" class="nav-link">Clasificación</a>
                    </li>
                    <li class="nav-item">
                        <a href="inicioSesionUbGI.php" class="nav-link">Salir</a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>
    <br>
    <div>
        <img id="campana" src="../img/campana.jpg" class="rounded-circle"><hr>
    </div>
    <div class="text-center">
        <h1 class="display-3" >Producción</h1>
        <img id="logoI" src="../img/img3.jpeg" alt="Logo UB" class="rounded-circle"><hr>
    </div>
    <table>
            <tr>
                <th>Nombre Producto</th>
                <th>Tipo</th>
                <th>Subtipo</th>
                <th>Clase</th>
                <th>Investigador</th>
                <th>Accion</th>
            </tr>
            <?php

                $datos = getProductoPorGrupo($_SESSION['idGrupo']);
                while ($prod = mysqli_fetch_array($datos)) {
                    echo "
                    <tr>
                    <td>{$prod['NOMBRE_PRODUCTO']}</td>
                    <td>{$prod['NOMBRE_TIPO']}</td>
                    <td>{$prod['NOMBRE_SUBTIPO']}</td>
                    <td>{$prod['NOMBRE_CLASE']}</td>
                    <td>{$prod['NOMBRE_INVESTIGADOR']}</td>
                    <td>".'
                        <a href="#ventana3" class="open-modify-modal2 btn btn-outline-danger btn-lg" data-id="' . $prod['ID_CATEGORIA'] . '" style="margin-left: 10px;" data-toggle="modal">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                            </svg>
                        </a>
                    </td>
                    </tr>
                    ';
                }

            ?>
    </div>
      
    <div class="container">
        <br>
        <a href="#ventana1" class="btn btn-secondary btn-lg" data-toggle="modal">Vincular</a>
        <!--Pantalla oscura-->
        <div class="modal fade" id="ventana1">
            <div class="modal-dialog"></div>
            <div class="modal-content">
                <!--Header de la ventana-->
                <div class="modal-header">
                     <h2 class="modal-title">Vincular</h2>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    
                </div>
 
                <form action="../models/vincularProducto.php" method="POST">
                    <!--Contenido de la ventana-->
                    <div class="modal-body">
                        
                        <div style="display: flex; align-content: center; justify-content: space-around;">
                            <div>
                                <label>Investigador</label><br>
                                <select multiple="multiple" name="investigador" id="investigador" class="form-control" >
                                    
                                <?php

                                    $investigadores = getInvestigadoresPorIdGrupoConLider($_SESSION['idGrupo']);
                                    while($investigador = mysqli_fetch_array($investigadores)) {
                                        echo "<option value=\"{$investigador['ID']}\">{$investigador['NOMBRE']}</option>";
                                    }
                                ?>
                                </select>
                            </div>
                            <div>
                                <label>Producto</label><br>
                                <select multiple="multiple" name="producto" id="producto" class="form-control">
                                    <option value="">Selecciona un investigador</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!--Footer de la ventana-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" value="Vincular">Vincular</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="ventana3">
        <div class="modal-dialog"></div>
        <div class="modal-content">
            <!--Header de la ventana-->
            <div class="modal-header">
                <h2 class="modal-title">Desvincular Producto</h2>
                <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>

            <!--Contenido de la ventana-->
            <div class="modal-body">

                <form action="../models/desvincularProducto.php" method="POST">

                    <h3>¿Seguro que desea desvincular el producto?</h3><br>
                    <!--Footer de la ventana-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <input type="hidden" id="desvincularP" name="desvincularP">
                        <button type="submit" class="btn btn-success" value="Desvincular">Desvincular</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
<script>
    $("#investigador").on('change', function() {
        var parametros = $(this).serialize();
        console.log("cambia", parametros);
        $.ajax({
            type: "POST",
            url: "../models/autocomplete/producto.php",
            data: parametros,
            beforeSend: function(objeto) {
                $("#investigador").attr("disabled", true);
            },
            success: function(datos) {
                $('#investigador').attr("disabled", false);
                $("#producto").html(datos);
            }
        }).fail(function() {
            alert('Hubo problemas al cargar los datos de la marca escogida')
        });
    });
    $(document).on("click", ".open-modify-modal2", function() {
        var idP = $(this).data('id');
        $("#desvincularP").val(idP);
        console.log("valu:: ", idP);
    });
</script>