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
    <title>REGISTRO INVESTIGADOR</title>
    <link rel="icon" href="../img/iconoub.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Ranchers&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <div class="text-center">
        <h1 class="display-3" >UbI</h1>
        <img id="logoI" src="../img/img2.jpeg" alt="Logo UB" class="rounded-circle" style="width: 90px; height: 80px;"><hr>
    </div>
    
    
    <form id="formUBI" action="../models/insertInv.php" method="POST">

        <p>Nombre: <input type="text" class="field float-right" name="nombre" style="width: 244px;"><br/></p>

        <p>Fecha de Inicio: <input type="date" style="width: 244px" class="field float-right" name="fechaIn"><br/></p>

        <p>Fecha de Nacimiento: <input type="date" style="width: 244px;" class="field float-right" name="fechaNac"><br/></p>
        
        <div style=" display: flex; justify-content: space-between; margin-bottom: 10px;">
            <span>Nacionalidad:</span>
            <select name="nacionalidad" id="nacionalidad" style="width: 244px;">
                <option value="">--------------Seleccione--------------</option>
                <?php 
                    $nacionalidades = getNacionalidades();
                    while($fila = mysqli_fetch_array($nacionalidades)) {
                        echo "<option value=".$fila ['ID'].">".$fila['NOMBRE']."</option>";
                    }
                ?>
            </select>
        </div>

        <div style=" display: flex; justify-content: space-between; margin-bottom: 10px;">
            <span>Nivel de Formacion:</span>
            <select name="nivelF" id="nivelF" style="width: 244px;">
                <option value="">--------------Seleccione--------------</option>
                <option value="Pregrado">Pregrado</option>
                <option value="Posgrado">Posgrado</option>
                <option value="Especializacion">Especializacion</option>
                <option value="Magister">Magister</option>
                <option value="Doctorado">Doctorado</option>
            </select>
        </div>

        <p>Horas Dedicadas: <input type="text" class="field float-right" name="hora" style="width:244px;"><br/></p>
        
        <div style=" display: flex; justify-content: space-between; margin-bottom: 10px;">
            <span>Facultad:</span>
            <select name="facultad" id="facultad" style="width: 244px;">
                <option value="">--------------Seleccione--------------</option>
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
            <select name="programa" id="programa" style="width: 244px;">
            <option value="">----------Selecciona Facultad----------</option>
        </select>
        </div>

        <div class="form-group">
            <label>Correo:</label>
            <div class="field float-right">
                <div class="input-group-prepend">
                    <input type="text" class="field float-right" name="correo" style="width:100px; high:10px;">
                    <span class="input-group-text" style="width:145px;">@uniboyaca.edu.co</span> 
                </div>
            </div>
        </div>
        
        <p>Código: <input type="text" class="field float-right" name="codigo" style="width:244px;"><br/></p>
        
        <p>Contraseña:  <input type="password" class="field float-right" name="password" style="width:244px;"><br/></p>

        <small>Su contraseña debe contener entre 8 a 16 caracteres, contener letras, números y mayúsculas.</small>

        <p class="center-content"><input id="boton" type="submit" class="btn btn-outline-danger" value="Registrar"></p>

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