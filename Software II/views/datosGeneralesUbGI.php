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
    <title>UbGI | DATOS GENERALES</title>
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
                        <a href="UbGI.php" class="nav-link">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="datosGeneralesUbGI.php" class="nav-link active">Datos Generales</a>
                    </li>
                    <li class="nav-item">
                        <a href="investigadoresUbGI.php" class="nav-link">Investigadores</a>
                    </li>
                    <li class="nav-item">
                        <a href="produccionUbGI.php" class="nav-link">Producción</a>
                    </li>
                    <li class="nav-item">
                        <a href="clasificacionUbGI.php" class="nav-link">Clasificación</a>
                    </li>
                    <li class="nav-item">
                        <a href="inicioSesionUbGI.php"  class="nav-link">Salir</a>
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
        <img id="logoI" src="../img/img3.jpeg" alt="Logo UB" class="rounded-circle"><hr>
    </div>
    <div class="text-justify-center">
    <div>
            <table >
                <thead>
                    <tr>
                        <th scope=col>Nombre Grupo</th>
                        <th scope=col>Fecha Inscripcion</th>
                        <th scope=col>Fecha de certificación</th>
                        <th scope=col>Programa Academico</th>
                        <th scope=col>Facultad</th>
                        <th scope=col>Ciudad</th>
                        <th scope=col>Area de orientación</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            $codGr = $_SESSION["codG"];
                            $conn = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
                            $consulta_mysql="SELECT g.NOMBRE as nomGrup, g.FECHA_INSCRIPCION as fechaI, g.FECHA_CERTIFICACION as fechaC, p.NOMBRE as nomProg, f.NOMBRE as nomFac, c.NOMBRE as nomCiu, s.NOMBRE as subNom from GRUPO g INNER JOIN PROGRAMA_ACADEMICO p ON g.ID_PROGRAMA_ACADEMICO=p.ID, FACULTAD f, CIUDAD c, SUB_AREA_CONOCIMIENTO s, INVESTIGADOR i WHERE g.ID_CIUDAD=c.ID AND g.ID_SUB_AREA_CONOCIMIENTO=s.ID AND p.ID_FACULTAD=f.ID AND i.CODIGO=$codGr";
                            $result = mysqli_query($conn, $consulta_mysql);
                            while($fila = mysqli_fetch_assoc($result)){
                                echo "<th>".$fila['nomGrup']."</th><td>".$fila["fechaI"]."</td><td>".$fila["fechaC"]."</td><td>".$fila["nomProg"]."</td><td>".$fila["nomFac"]."</td><td>".$fila["nomCiu"]."</td><td>".$fila["subNom"]."</td>";
                            }		
                        ?>
                    </tr>
                </tbody>
            </table>    
        </div>
    </div>
    
</body>
</html>