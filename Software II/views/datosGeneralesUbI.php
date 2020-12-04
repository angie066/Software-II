<!DOCTYPE html>
<?php
session_start();
include("../models/conexion.php");


?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1, maxium-scale=1.0, minium-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>UbI | DATOS GENERALES</title>
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
                        <a href="datosGeneralesUbI.php" class="nav-link active">Datos Generales</a>
                    </li>
                    <li class="nav-item">
                        <a href="participacionGI.php" class="nav-link">Participación GI</a>
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
        <h1 class="display-3">Datos Generales</h1>
        <img id="logoI" src="../img/img2.jpeg" alt="Logo UB" class="rounded-circle"><hr>
    </div>
    <div class="text-justify-center">
        <div>
            <table >
                <thead>
                    <tr>
                        <th scope=col>Nombre Investigador</th>
                        <th scope=col>Nivel de Formación</th>
                        <th scope=col>Fecha de nacimiento</th>
                        <th scope=col>Programa Academico</th>
                        <th scope=col>Facultad</th>
                        <th scope=col>Grupo al que pertenece</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            $cod1 = $_SESSION["codI"];
                            $conn = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
                            $consulta_mysql="SELECT i.NOMBRE AS NOMBRE_INV, i.FECHA_NACIMIENTO, i.NIVEL_FORMACION, p.NOMBRE AS NOMBREP, f.NOMBRE AS NOMBREF, g.NOMBRE AS NOMBREG FROM investigador i INNER JOIN programa_academico p ON  i.ID_PROGRAMA_ACADEMICO = p.ID INNER JOIN facultad f ON p.ID_FACULTAD = f.ID LEFT JOIN grupo g ON i.ID_GRUPO = g.ID WHERE i.CODIGO = $cod1";
                            $result = mysqli_query($conn, $consulta_mysql);
                            while($fila = mysqli_fetch_array($result)){
                                echo "<th>".$fila['NOMBRE_INV']."</th><td>".$fila["NIVEL_FORMACION"]."</td><td>".$fila["FECHA_NACIMIENTO"]."</td><td>".$fila["NOMBREP"]."</td><td>".$fila["NOMBREF"]."</td><td>".($fila["NOMBREG"]== null ? '' : $fila["NOMBREG"])."</td>";
                            }		
                        ?>
                    </tr>
                </tbody>
            </table>    
        </div>   
    </div>                    
</body>
</html>