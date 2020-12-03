<?php
    session_start();
    include("../models/conexion.php");
    
    if(isset($_SESSION['id'])) {
        // Tipo Top
        $subTipo1 = 0; // Articulo A1
        $subTipo2 = 0; // Articulo A2
        $subTipo3 = 0; // Libro A1
        $subTipo4 = 0; // Libro A
        //Tipo A
        $subTipo5 = 0; // Articulo B
        $subTipo6 = 0; // Articulo C
        $subTipo7 = 0; // Libro B
       
        $resultado = getProductoPorGrupo($_SESSION['idGrupo']);
        while ($product =mysqli_fetch_array($resultado)){
            if($product ['ID_SUBTIPO']==){ // Articulo A1
                $subTipo1++;
            }
            if($product ['ID_SUBTIPO']==){// Articulo A2
                $subTipo2++;
            }
            if($product ['ID_SUBTIPO']==){// Libro A1
                $subTipo3++;
            }
            if($product ['ID_SUBTIPO']==){// Libro A
                $subTipo4++;
            }
            if($product ['ID_SUBTIPO']==){// Articulo B
                $subTipo5++;
            }
            if($product ['ID_SUBTIPO']==){// Articulo C
                $subTipo6++;
            }
            if($product ['ID_SUBTIPO']==){// Libro B
                $subTipo7++;
            }
        }

        $lambdaArt_a1 = log[($subTipo1/7)+1];
        $lambdaArt_a2 = log[($subTipo2/7)+1];
        $lambdaLib_a1 = log[($subTipo3/7)+1];
        $lambdaLib_a = log[($subTipo4/7)+1];
        $lambdaArt_b = log[($subTipo5/7)+1];
        $lambdaArt_c = log[($subTipo6/7)+1];
        $lambdaLib_b = log[($subTipo7/7)+1];

        $ind_art_r = (10 * $lambdaArt_a1) + (6 * $lambdaArt_a2) + (3.5 * $lambdaArt_b) + (2*$lambdaArt_c); //Indicador Articulo de Investigación
        $ind_lib = (10 * $lambdaLib_a1) + (9 * $lambdaLib_a) + (8 * $lambdaLib_b); //Indicador de libros
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