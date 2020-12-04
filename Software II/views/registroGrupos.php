<?php 
    include("../models/conexion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1, maxium-scale=1.0, minium-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>REGISTRO GRUPO | </title>
    <link rel="icon" href="../img/iconoub.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Ranchers&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <div class="text-center">
        <h1 class="display-3" >Registro Grupo</h1>
        <img id="logoI" src="../img/img3.jpeg" alt="Logo UB" class="rounded-circle" style="width: 90px; height: 80px;"><hr>
    </div>
    
    
    <form id="formUBI" action="../models/insertGrup.php" method="POST">

        <p>Nombre: <input type="text" class="field float-right" name="nombre" required><br/></p>

        <p>Fecha de inscripcion: <input type="date" class="field float-right" name="fechaIns" style="width: 202px; required"><br/></p>

        <p>Fecha de certificación: <input type="date" class="field float-right" name="fechaC" style="width: 202px; required"><br/></p>
        
        <div style=" display: flex; justify-content: space-between; margin-bottom: 10px;" >
            <span>Lider del grupo:</span>
            <select name="lider" id="lider" style="width: 202px;" required>
                <option value="">--Seleccione--</option>
                <?php 
                    $investigadores = getInvestigadoresNoLider();
                    while($fila = mysqli_fetch_array($investigadores)) {
                        echo "<option value=".$fila['ID'].">".$fila['NOMBRE']."</option>";
                    }
                ?>
            </select>
        </div>

        <div style=" display: flex; justify-content: space-between; margin-bottom: 10px;">
            <span>Facultad:</span>
            <select name="facultad" id="facultad" style="width: 202px;" required>
                <option value="">--Seleccione--</option>
                <?php 
                    $facultades = getFacultades();
                    while($fila = mysqli_fetch_array($facultades)) {
                        echo "<option value=".$fila['ID'].">".$fila['NOMBRE']."</option>";
                    }
                ?>
            </select>
        </div>

        <div style=" display: flex; justify-content: space-between; margin-bottom: 10px;">
            <span>Programa:</span>
            <select name="programa" id="programa" style="width: 202px;" required>
            <option value="">-Selecciona Facultad-</option>
        </select>
        </div>

        <div style=" display: flex; justify-content: space-between; margin-bottom: 10px;">
            <span>Area de conocimiento:</span>
            <select name="areaCon" id="areaCon" style="width: 202px;" required>
                <option value="">--Seleccione--</option>
                <?php 
                    $subareas = getSubareas();
                    while($fila = mysqli_fetch_array($subareas)) {
                        echo "<option value=".$fila['ID'].">".$fila['NOMBRE']."</option>";
                    }
                ?>
            </select>
        </div>
        
        <div style=" display: flex; justify-content: space-between; margin-bottom: 10px;">
            <span>Ciudad:</span>
            <select name="ciudad" id="ciudad" style="width: 202px;" required>
                <option value="">--Seleccione--</option>
                <?php 
                    $ciudades = getCiudades();
                    while($fila = mysqli_fetch_array($ciudades)) {
                        echo "<option value=".$fila['ID'].">".$fila['NOMBRE']."</option>";
                    }
                ?>
            </select>
        </div>

        <p class="center-content"><input id="boton" type="submit" class="btn btn-outline-danger" value="Registrarse"></p>
    </form>

    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
<script>
    $("#facultad").on('change', function() {
        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "../models/autocomplete/programas.php",
            data: parametros,
            beforeSend: function(objeto) {
                $("#facultad").attr("disabled", true);
            },
            success: function(datos) {
                $('#facultad').attr("disabled", false);
                $("#programa").html(datos);
            }
        }).fail(function() {
            alert('Hubo problemas al cargar los datos de la marca escogida')
        });
    })
</script>