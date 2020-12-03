<?php
    session_start();
    include("../models/conexion.php");
    
    if(isset($_SESSION['id'])) {
        $subTipo1 = 0;
        $subTipo2 = 0;
        $subTipo3 = 0;
       
        $resultado = getProductoPorGrupo($_SESSION['idGrupo']);
        while ($product =mysqli_fetch_array($resultado)){
            if($product ['ID_SUBTIPO']==5){
                $subTipo1++;
            }
            if($product ['ID_SUBTIPO']==6){
                $subTipo2++;
            }
            if($product ['ID_SUBTIPO']==7){
                $subTipo3++;
            }
        }

        $lambdaArt_a1 = log[($subTipo1/7)+1];
        $lambdaArt_a2 = log[($subTipo2/7)+1];
        $lambdaLib_a1 = log[($subTipo3/5)+1];

        $ind_art_r = (10 * $lambdaArt_a1) + (6 * $lambdaArt_a2);
        $ind_lib = (10 * $lambdaLib_a1)
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1, maxium-scale=1.0, minium-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>UbGI | CLASIFICACIÓN</title>
    <link rel="icon" href="../img/iconoub.jpg">
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Menu Navegacion">
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
                        <a href="produccionUbGI.php" class="nav-link">Producción</a>
                    </li>
                    <li class="nav-item active">
                        <a href="clasificacionUbGI.php" class="nav-link active">Clasificación</a>
                    </li>
                    <li class="nav-item">
                        <a href="inicioSesionUbGI.php" class="nav-link">Salir</a>
                    </li>i

                </ul>

            </div>

        </div>

    </nav>
    <br>
    <div>
        <div class="dropdown">
            <button class="btn btn-secundary dropdown-toggle" type="button" id="dropdown" 
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                <img id="campana" src="../img/campana.jpg" class="rounded-circle"></button>
        </div>
    </div>
    <div class="text-center">
        <br>
        <br>
        <hr>
        <h1 class="display-3" >Clasificación</h1>
        <img id="logoI" src="../img/img3.jpeg" alt="Logo UB" class="rounded-circle"><hr>
    </div>

    <div>
        <table>
            <tr>
                <th>Tipo</th>
                <th></th>
                <th></th>
                <th>Requisitos que cumple</th>
                <th>Requisitos</th>
            </tr>
            <tr>
                <td rowspan="2">A</td>
                <td rowspan="2"><img id="chulo" src="../img/chulito.jpeg"></td>
                <td><img id="chulo" src="../img/chulito.jpeg"></td>
                <td>(5) Producto tipo top A</td>
                <td>(5) Producto tipo top A</td>
            </tr>
            <tr>
                <td><img id="chulo" src="../img/chulito.jpeg"></td>
                <td>(2) Trabajo de maestría</td>
                <td>(2) Trabajo de maestría</td>
            </tr>
            <tr>
                <td rowspan="2">B</td>
                <td rowspan="2"><img id="x" src="../img/x.jpeg"></td>
                <td><img id="x" src="../img/x.jpeg"></td>
                <td>(2) Producto tipo top A</td>
                <td>(5) Producto tipo top A</td>
            </tr>
            <tr>
                <td><img id="chulo" src="../img/chulito.jpeg"></td>
                <td>(1) Trabajo de maestría</td>
                <td>(1) Trabajo de maestría</td>
            </tr>
    </div>
    <div class="text-center">
        <p class="center-content simular"><input type="submit" class="btn btn-danger" value="Simular"></p>
    </div>
    
</body>
</html>