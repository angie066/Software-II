<?php
    session_start();
    include("../models/conexion.php");
    $nivelF='';
    $edad ='';
    $nuevoCTipoA=0;
    $nuevoCTipoTop=0;
    $desTecTipoA=0;
    $desTecTipoTop=0;
    $cantTipoA = 0;
    $cantTipoTop = 0;
    
    if(isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $investigador = getUserById($id);
        $nivelF = $investigador['NIVEL_FORMACION'];
        $edad = $investigador['EDAD'];
        $productos = getProduct($id);
        while ($product = mysqli_fetch_array($productos)) {
            if($product['ID_CLASE'] == 1) { // tipo top
                $cantTipoTop++;
                if($product['ID_CLASE'] == 1) {
                    $desTecTipoTop++;
                } else if ($product['ID_CLASE'] == 2) {
                    $nuevoCTipoTop++;
                }
            } else if( $product['ID_CLASE'] == 2 ) { // tipo A
                $cantTipoA++;
                if($product['ID_CLASE'] == 1) { // clase desarrollo
                    $desTecTipoA++;
                } else if ($product['ID_CLASE'] == 2) { // nuevo conocimiento
                    $nuevoCTipoA++;
                }
            }
        }
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
                        <a href="produccionUbI.php" class="nav-link">Producción</a>
                    </li>
                    <li class="nav-item">
                        <a href="clasificacionUbI.php" class="nav-link active">Clasificación</a>
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
        <img id="campana" src="../img/campana.jpg" class="rounded-circle">
    </div>
    <div class="text-center">
        <hr>
        <h1 class="display-3" >Clasificación</h1>
        <img id="logoI" src="../img/img2.jpeg" alt="Logo UB" class="rounded-circle"><hr>
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
                <td rowspan="4">Investigador Emerito</td>
                <td rowspan="4">
                    <?php 
                        if( ($nivelF == 'Doctorado' || $nivelF == 'doctorado') &&
                            ($cantTipoA+$cantTipoTop > 0) &&
                            ($edad > 64)) {
                            echo '<img id="chulo" src="../img/chulito.jpeg">';
                        } else {
                            echo '<img id="x" src="../img/x.jpeg">';
                        }
                    ?>
                </td>
                <td>
                    <?php 
                        if( $nivelF == 'Doctorado' || $nivelF == 'doctorado' ) {
                            echo '<img id="chulo" src="../img/chulito.jpeg">';
                        } else {
                            echo '<img id="x" src="../img/x.jpeg">';
                        }
                    ?>
                </td>
                <td><?php echo $nivelF;?></td>
                <td>Título Doctorado</td>
            </tr>
            <tr>
                <td>
                    <?php 
                        if( $cantTipoA+$cantTipoTop > 0 ) {
                            echo '<img id="chulo" src="../img/chulito.jpeg">';
                        } else {
                            echo '<img id="x" src="../img/x.jpeg">';
                        }
                    ?>
                </td>
                <td><?php echo  $cantTipoA+$cantTipoTop;?></td>
                <td>Producto tipo top o tipo A</td>
            </tr>
            <tr>
                <td>IDK</td> <!-- // falta en el primer if -->
                <td>RIP</td>
                <td>Vínculo con una institución nacional de investigación</td>
            </tr>
            <tr>
                <td>
                    <?php 
                        if( $edad > 64 ) {
                            echo '<img id="chulo" src="../img/chulito.jpeg">';
                        } else {
                            echo '<img id="x" src="../img/x.jpeg">';
                        }
                    ?>
                </td>
                <td><?php echo $edad;?></td>
                <td>Tener 65 o más años</td>
            </tr>
            <tr>
                <td rowspan="2">Investigador Senior</td>
                <td rowspan="2">
                    <?php 
                        if( (($nivelF == 'Doctorado' || $nivelF == 'doctorado') || $cantTipoA > 14) &&
                            ($cantTipoA+$cantTipoTop > 9) ) {
                            echo '<img id="chulo" src="../img/chulito.jpeg">';
                        } else {
                            echo '<img id="x" src="../img/x.jpeg">';
                        }
                    ?>
                </td>
                <td>
                    <?php 
                        if( ($nivelF == 'Doctorado' || $nivelF == 'doctorado') || $cantTipoA > 14 ) {
                            echo '<img id="chulo" src="../img/chulito.jpeg">';
                        } else {
                            echo '<img id="x" src="../img/x.jpeg">';
                        }
                    ?>
                </td>
                <td><?php echo 'Nivel: '.$nivelF.' Cant: '. $cantTipoA;?></td>
                <td>Doctorado o 15 productos tipo A</td>
            </tr>
            <tr>
                <td>
                    <?php 
                        if( $cantTipoA+$cantTipoTop > 9 ) {
                            echo '<img id="chulo" src="../img/chulito.jpeg">';
                        } else {
                            echo '<img id="x" src="../img/x.jpeg">';
                        }
                    ?>
                </td>
                <td><?php echo 'Tipo A: '.$cantTipoA.' Tipo Top: '.$cantTipoTop; ?></td>
                <td>Tener 10 productos de tipo top o tipo A</td>
            </tr>
            <tr>
                <td rowspan="3">Investigador Asociado</td>
                <td rowspan="3">
                    <?php 
                        if( (($nivelF == 'Doctorado' ) || ($nivelF == 'Maestria'))&&
                            ($nuevoCTipoA+$nuevoCTipoTop > 6 || ($nivelF == 'Especializacion'))
                            (($nuevoCTipoA+$desTecTipoA) > 6)) {
                            echo '<img id="chulo" src="../img/chulito.jpeg">';
                        } else {
                            echo '<img id="x" src="../img/x.jpeg">';
                        }
                    ?>
                </td>
                <td>
                    <?php 
                        if( ($nivelF == 'Doctorado' || $nivelF == 'doctorado' ) || ($nivelF == 'Maestria' || $nivelF == 'maestria' )) {
                            echo '<img id="chulo" src="../img/chulito.jpeg">';
                        } else {
                            echo '<img id="x" src="../img/x.jpeg">';
                        }
                    ?>
                </td>
                <td><?php echo $nivelF;?></td>
                <td>Doctorado o maestría</td>
            </tr>
            <tr>
                <td>
                    <?php 
                        if( $nuevoCTipoA+$nuevoCTipoTop > 6 || ($nivelF == 'Especializacion'))  {
                            echo '<img id="chulo" src="../img/chulito.jpeg">';
                        } else {
                            echo '<img id="x" src="../img/x.jpeg">';
                        }
                    ?>
                </td>
                <td><?php echo 'Productos de N. Conocimiento: '.($nuevoCTipoA+$nuevoCTipoTop).' Nivel Formacion: '.$nivelF;?></td>
                <td>Tener una especialidad clínica o 7 productos de nuevo conocimiento</td>
            </tr>
            <tr>
                <td>
                    <?php 
                        if( ($nuevoCTipoA+$desTecTipoA) > 6)  {
                            echo '<img id="chulo" src="../img/chulito.jpeg">';
                        } else {
                            echo '<img id="x" src="../img/x.jpeg">';
                        }
                    ?>
                </td>
                <td><?php echo 'Productos: '.($nuevoCTipoA+$desTecTipoA);?></td>
                <td>7 productos de nuevo conocimiento o desarrollo tecnológico e invovación tipo A</td>
            </tr>
            <tr>
                <td rowspan="2">Investigador Junior</td>
                <td rowspan="2">
                    <?php
                        if( ($nivelF == 'Doctorado' || $nivelF == 'Magister' || $nivelF == 'Especializacion') &&
                            (($nuevoCTipoTop+$nuevoCTipoA)+( $desTecTipoA+$desTecTipoTop) > 4))  {
                            echo '<img id="chulo" src="../img/chulito.jpeg">';
                        } else {
                            echo '<img id="x" src="../img/x.jpeg">';
                        }
                    ?>
                </td>
                <td>
                    <?php
                        if( $nivelF == 'Doctorado' || $nivelF == 'Magister' || $nivelF == 'Especializacion' )  {
                            echo '<img id="chulo" src="../img/chulito.jpeg">';
                        } else {
                            echo '<img id="x" src="../img/x.jpeg">';
                        }
                    ?>
                </td>
                <td><?php echo $nivelF;?></td>
                <td>Doctorado finalizado de maestría o especialidad clínica</td>
            </tr>
            <tr>
                <td>
                    <?php
                        if(($nuevoCTipoTop+$nuevoCTipoA)+( $desTecTipoA+$desTecTipoTop) > 4)  {
                            echo '<img id="chulo" src="../img/chulito.jpeg">';
                        } else {
                            echo '<img id="x" src="../img/x.jpeg">';
                        }
                    ?>
                </td>
                <!-- 
    $nuevoCTipoA=0;
    $nuevoCTipoTop=0;
    $desTecTipoA=0;
    $desTecTipoTop=0;
                -->
                <td>
                    <?php
                        echo 'Productos de N. Conocimiento: '.($nuevoCTipoTop+$nuevoCTipoA).
                        ' Producto de desarrollo tecnológico'.( $desTecTipoA+$desTecTipoTop);
                    ?>
                </td>
                <td>5 productos de nuevo conocimiento o de resultado de actividad de desarrollo tecnológico e innovación</td>
            </tr>
    </div>
    
</body>
</html>

<!-- 
<img id="chulo" src="../img/chulito.jpeg">
<img id="x" src="../img/x.jpeg">
-->