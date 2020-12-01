<?php
    session_start();
    include("../models/conexion.php");
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1, maxium-scale=1.0, minium-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>UbI | PRINCIPAL</title>
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
                    <li class="nav-item active">
                        <a href="UbI.php" class="nav-link active">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="datosGeneralesUbI.php" class="nav-link">Datos Generales</a>
                    </li>
                    <li class="nav-item">
                        <a href="participaciónGI.php" class="nav-link">Participación GI</a>
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
        <img id="user" src="../img/user.jpg" class="rounded-circle">
        <img id="campana" src="../img/campana.jpg" class="rounded-circle"><hr>
    </div>
    
    <div class="text-center">
        <h1 class="display-3">Notificaciones</h1>
        <img id="logoI" src="../img/img2.jpeg" alt="Logo UB" class="rounded-circle"><hr>
    </div>
    
    <br>
    <div>
        <table>
            <tr>
                <th>Nombre Producto</th>
                <th>Grupo</th>
                <th>Accion</th>
            </tr>
            <?php
                $notis = getNotificacionesPorId($_SESSION['id']);
                while($noti = mysqli_fetch_array($notis)) {
                    echo "<tr>
                            <td>{$noti['NOMBRE_PRODUCTO']}</td>
                            <td>{$noti['NOMBRE_GRUPO']}</td>
                            <td>".'
                            <div style="display: flex;">
                            <a href="../models/aprobar.php?idC='.$noti['ID_CATEGORIA'].'&idG='.$noti['ID_GRUPO'].'" class="btn btn-outline-success btn-lg" >
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check2-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"></path>
                                    <path fill-rule="evenodd" d="M1.5 13A1.5 1.5 0 0 0 3 14.5h10a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-1 0v5a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 0 0-1H3A1.5 1.5 0 0 0 1.5 3v10z"></path>
                                </svg>
                            </a>
                            <a href="../models/rechazar.php?idC='.$noti['ID_CATEGORIA'].'&idG='.$noti['ID_GRUPO'].'" class="btn btn-outline-danger btn-lg" style="margin-left: 10px;">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"></path>
                                    <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
                                </svg>
                            </a>
                        </div>
                            </td>
                        </tr>';
                }
            ?>
        </table>
    </div>
     <hr>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>