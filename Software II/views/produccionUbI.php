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
    <title>UbI | PRODUCCIÓN</title>
    <link rel="icon" href="../img/iconoub.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Ranchers&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<script>
     function mostrarMensaje1() {
         alert("El producto ha sido creado exitosamente");
     }

     function mostrarMensaje2() {
         alert("El producto ha sido modificado exitosamente");
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
                        <a href="UbI.php" class="nav-link">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="datosGeneralesUbI.php" class="nav-link">Datos Generales</a>
                    </li>
                    <li class="nav-item">
                        <a href="participacionGI.php" class="nav-link">Participación GI</a>
                    </li>
                    <li class="nav-item">
                        <a href="produccionUbI.php" class="nav-link active">Producción</a>
                    </li>
                    <li class="nav-item">
                        <a href="clasificacionUbI.php" class="nav-link">Clasificación</a>
                    </li>
                    <li class="nav-item">
                        <a href="inicioSesionUbI.php" class="nav-link">Salir</a>
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
        <img id="logoI" src="../img/img2.jpeg" alt="Logo UB" class="rounded-circle"><hr>
    </div>

    <div class="text-justify-center">
        <table>
            <tr>
                <th>Nombre Producto</th>
                <th>Tipo</th>
                <th>Subtipo</th>
                <th>Clase</th>
                <th>Accion</th>
            </tr>
            <?php

                $productosQuery = getProduct($_SESSION['id']);

                while ($product = mysqli_fetch_array($productosQuery)) {
                    echo '<tr>';
                    echo '<td>' . $product['NOMBRE_CATEGORIA'] . '<input type="hidden" id="nombre_cat' . $product['ID_CATEGORIA'] . '" value="' . $product['NOMBRE_CATEGORIA'] . '"> </td>';
                    echo '<td>' . $product['NOMBRE_TIPOP'] . '<input type="hidden" id="nombre_tipo' . $product['ID_CATEGORIA'] . '" value="' . $product['ID_TIPO'] . '"> </td>';
                    echo '<td>' . $product['NOMBRE_SUBTIPO'] . '<input type="hidden" id="nombre_clas' . $product['ID_CATEGORIA'] . '" value="' . $product['ID_SUBTIPO'] . '"> </td>';
                    echo '<td>' . $product['NOMBRE_CLASEP'] . '<input type="hidden" id="nombre_sub' . $product['ID_CATEGORIA'] . '" value="' . $product['ID_CLASE'] . '"> </td>';
                    echo '<td>
                            <div style=" display: flex;">
                                <a href="#ventana2" class="open-modify-modal btn btn-outline-dark btn-lg" data-id="' . $product['ID_CATEGORIA'] . '" data-toggle="modal">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                                    </svg>
                                </a>
                                <a href="#ventana3" type="button" class="open-modify-modal2 btn btn-outline-danger btn-lg" data-id="' . $product['ID_CATEGORIA'] . '" style="margin-left: 10px;" data-toggle="modal">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                    </svg>
                                </a>
                            </div>
                        </td>';

                    echo '</tr>';
                }
                ?>
        </table>
    </div>

    <div class="container">
        <br>
        <a href="#ventana1" class="btn btn-primary btn-lg" data-toggle="modal">Crear</a>
        <!--Pantalla oscura-->
        <div class="modal fade" id="ventana1">
            <div class="modal-dialog"></div>
            <div class="modal-content">
                <!--Header de la ventana-->
                <div class="modal-header">
                     <h2 class="modal-title">Crear Producto</h2>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    
                </div>
    
                <!--Contenido de la ventana-->
                <div class="modal-body">
                    
                    <form action="../models/insertProduct.php" method="POST">
                        <label>Nombre Producto: </label>
                        <input type="text" name="nombre"><br><br>

                        <label>Descripción: </label>
                        <input type="text" name="descripcion"><br><br>

                        <div style=" display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span>Tipo:</span>
                                <select name="tipo" id="tipo" style="width: 202px;">
                                <option value="">--Seleccione--</option>
                                <?php 
                                    $tipos = getTipos();
                                    while($fila = mysqli_fetch_array($tipos)){
                                        echo "<option value=".$fila ['ID'].">".$fila['NOMBRE']."</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div style=" display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span>Subtipo:</span>
                            <select name="subTipo" id="subTipo" style="width: 202px;">
                                <option value="">--Seleccione Tipo--</option>
                            </select>
                        </div>

                        <div style=" display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span>Clase Producto:</span>
                            <select name="claseP" id="claseP" style="width: 202px;">
                                <option value="">--Seleccione--</option>
                                <?php 
                                    $clase = getClase();
                                    while($fila = mysqli_fetch_array($clase)){
                                        echo "<option value=".$fila ['ID'].">".$fila['NOMBRE']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
    
                        <!--Footer de la ventana-->
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>-->
                            <button name="boton" type="submit" class="btn btn-primary" value="Crear">Crear</button>
                        </div>
                    </form>    
                </div>
            </div>
        </div>    
    
        <div class="modal fade" id="ventana2">
            <div class="modal-dialog"></div>
            <div class="modal-content">
                <!--Header de la ventana-->
                <div class="modal-header">
                    <h2 class="modal-title">Modificar Producto</h2>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    
                </div>
    
                <!--Contenido de la ventana-->
                <div class="modal-body">
                    
                    <form action="../models/modificarProducto.php" method="POST">
             
                    <label>Nombre Producto</label><br>
                         <input id="nameP2" id="nameP2" type="text" value=""><br><br>
                         <input type="hidden" name="id_p" id="id_p" value="">
    
                        <div style=" display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span>Tipo:</span>
                            <select name="tipo2" id="tipo2" style="width: 202px;">
                                <option value="">--Seleccione--</option>
                                <?php
                                    $tipos = getTipos();
                                    while ($fila = mysqli_fetch_array($tipos)) {
                                        echo "<option value=" . $fila['ID'] . ">" . $fila['NOMBRE'] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
    
                        <div style=" display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span>Subtipo:</span>
                            <select name="subTipo2" id="subTipo2" style="width: 202px;">
                                <option value="">--Seleccione Tipo--</option>
                            </select>
                        </div>

                        <div style=" display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span>Clase Producto:</span>
                            <select name="claseP2" id="claseP2" style="width: 202px;">
                                <option value="">--Seleccione--</option>
                                <?php
                                    $clase = getClase();
                                    while ($fila = mysqli_fetch_array($clase)) {
                                        echo "<option value=" . $fila['ID'] . ">" . $fila['NOMBRE'] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
    
                        <!--Footer de la ventana-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" value="Modificar">Modificar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ventana3">
            <div class="modal-dialog"></div>
            <div class="modal-content">
                <!--Header de la ventana-->
                <div class="modal-header">
                    <h2 class="modal-title">Eliminar Producto</h2>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                </div>

                <!--Contenido de la ventana-->
                <div class="modal-body">

                    <form action="../models/eliminarProducto.php" method="POST">

                        <h3>¿Seguro que desea eliminar el producto?</h3><br>
                        <!--Footer de la ventana-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <input type="hidden" id="eliminarP" name="eliminarP">
                            <button type="submit" class="btn btn-success" value="Vincular">Eliminar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    
</body>
</html>

<script>
    $("#tipo").on('change', function() {
        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "../models/autocomplete/subTipos.php",
            data: parametros,
            beforeSend: function(objeto) {
                $("#tipo").attr("disabled", true);
            },
            success: function(datos) {
                $('#tipo').attr("disabled", false);
                $("#subTipo").html(datos);
            }
        }).fail(function() {
            alert('Hubo problemas al cargar los datos de la marca escogida')
        });
    })
    $("#tipo2").on('change', function() {
         var parametros = $(this).serialize();
         $.ajax({
             type: "POST",
             url: "../models/autocomplete/subTipos.php",
             data: parametros,
             beforeSend: function(objeto) {
                 $("#tipo2").attr("disabled", true);
             },
             success: function(datos) {
                 $("#subTipo2").html(datos);
                 $("#tipo2").attr("disabled", false);
             }
         }).fail(function() {
             $("#tipo2").attr("disabled", false);
             alert('Hubo problemas al cargar los datos de la marca escogida')
         });
     })
     $(document).on("click", ".open-modify-modal", function() {
        var idCat = $(this).data('id');
        var aux = "#nombre_cat" + idCat;
        var nomCat = $(aux).val();
        aux = "#nombre_tipo" + idCat;
        var nomT = $(aux).val();
        aux = "#nombre_clas" + idCat;
        var nomC = $(aux).val();
        aux = "#nombre_sub" + idCat;
        var nomS = $(aux).val();
        $("#nameP2").val(nomCat).trigger('change');
        $("#tipo2").val(nomT).trigger('change');
        console.log("classs", nomC, nomT, nomS);
        $("#claseP2").val(nomS).trigger('change');
        $("#subTipo2").val(nomC).trigger('change');
        $("#id_p").val(idCat);
        $("#subTipo2 option[value=" + nomC + "]").attr('selected', 'selected');
    });
    $(document).on("click", ".open-modify-modal2", function() {
        var idP = $(this).data('id');
        $("#eliminarP").val(idP);
        console.log("valu:: ", idP);
    });
</script>