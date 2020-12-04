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
    <title>UbGI | PARTICIPACION GI</title>
    <link rel="icon" href="../img/iconoub.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Ranchers&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>
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
                        <a href="participacionGI.php"  class="nav-link active">Participación GI</a>
                    </li>
                    <li class="nav-item">
                        <a href="produccionUbI.php" class="nav-link">Producción</a>
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
        <h1 class="display-3" >Participación en GI</h1>
        <img id="logoI" src="../img/img2.jpeg" alt="Logo UB" class="rounded-circle"><hr>
    </div>

    <div>
        <table>
            <tr>
                <th>Nombre Grupo</th>
                <th>Tiempo Duración</th>
            </tr>
            <?php 
                $participaciones = getParticipacion($_SESSION['id']);
                while($part = mysqli_fetch_array($participaciones)) {
                    $datetime1 = date_create($part['INICIO']);
                    $datetime2 = date_create($part['FIN']);
                    $interval = date_diff($datetime1, $datetime2);
                    echo "
                    <tr>
                    <td>".$part['NOMBRE']."</td>
                    <td>".$interval->format('%m Meses %d Dias')."</td>
                    </tr>
                    ";
                }
            ?>
    </div>
    
</body>
</html>