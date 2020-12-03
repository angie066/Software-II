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

        $investigadores = getUserById($_SESSION['id']);
        $autores = 0;

        while ($inv = mysqli_fetch_array($investigadores)){
            $autores++;
        }

        echo $autores;
       
        $resultado = getProductoPorGrupo($_SESSION['idGrupo']);
        $productos = 0;

        while ($product =mysqli_fetch_array($resultado)){
            $productos++;

            if($product ['ID_SUBTIPO']==5){ // Articulo A1
                $subTipo1++;
            }
            if($product ['ID_SUBTIPO']==6){// Articulo A2
                $subTipo2++;
            }
            if($product ['ID_SUBTIPO']==7){// Libro A1
                $subTipo3++;
            }
            if($product ['ID_SUBTIPO']==8){// Libro A
                $subTipo4++;
            }
            if($product ['ID_SUBTIPO']==9){// Articulo B
                $subTipo5++;
            }
            if($product ['ID_SUBTIPO']==10){// Articulo C
                $subTipo6++;
            }
            if($product ['ID_SUBTIPO']==11){// Libro B
                $subTipo7++;
            }
        }

        $lambdaArt_a1 = log(($subTipo1/7)+1);
        $lambdaArt_a2 = log(($subTipo2/7)+1);
        $lambdaLib_a1 = log(($subTipo3/7)+1);
        $lambdaLib_a = log(($subTipo4/7)+1);
        $lambdaArt_b = log(($subTipo5/7)+1);
        $lambdaArt_c = log(($subTipo6/7)+1);
        $lambdaLib_b = log(($subTipo7/7)+1);

        $ind_art_r = (10 * $lambdaArt_a1) + (6 * $lambdaArt_a2) + (3.5 * $lambdaArt_b) + (2*$lambdaArt_c); //Indicador Articulo de Investigación
        $ind_lib = (10 * $lambdaLib_a1) + (9 * $lambdaLib_a) + (8 * $lambdaLib_b); //Indicador de libros

        //Peso Global Subtipo
        $pesoArt_a1 = 100 * 10;
        $pesoArt_a2 = 100 * 6;
        $pesoLib_a1 = 300 * 10;
        $pesoLib_a = 300 * 9;
        $pesoArt_b = 100 * 3.5;
        $pesoArt_c = 100 * 2;
        $pesoLib_b = 300 * 8;

        //Indicador clase TOP
        $indClass_top = ($lambdaArt_a1 * $pesoArt_a1) + ($lambdaArt_a2 * $pesoArt_a2) + ($lambdaLib_a1 * $pesoLib_a1) + ($lambdaLib_a * $pesoLib_a);

        //Indicador clase A
        $indClass_a = ($lambdaArt_b * $pesoArt_b) + ($lambdaArt_c *$pesoArt_c) + ($lambdaLib_b * $pesoLib_b);

        //Indicador Cohesión
        $indCo = ($autores/$productos)-1;

        //Indicador Cooperación
        $indCoop = (1/$productos)-1;

        //Indicador de grupo
        $indGrupo = (4 * $indClass_top) + (2.5 * $indClass_a) + (0.4 * $indCo) + (0.4 * $indCoop);
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
            </tr>
            <tr>
                <td rowspan="2">A1</td>
                <td rowspan="2"><img id="chulo" src="../img/chulito.jpeg"></td>
                <td><img id="chulo" src="../img/chulito.jpeg"></td>
            </tr>
            <tr>
                <td><img id="chulo" src="../img/chulito.jpeg"></td>
            </tr>
            <tr>
                <td>A</td>
                <td><img id="x" src="../img/x.jpeg"></td>
                <td><img id="x" src="../img/x.jpeg"></td>
            </tr>
            <tr>
                <td>B</td>
                <td><img id="x" src="../img/x.jpeg"></td>
                <td><img id="x" src="../img/x.jpeg"></td>
            </tr>
            <tr>
                <td rowspan="2">C</td>
                <td rowspan="2"><img id="x" src="../img/x.jpeg"></td>
                <td><img id="x" src="../img/x.jpeg"></td>
            </tr>
    </div>
    
</body>
</html>