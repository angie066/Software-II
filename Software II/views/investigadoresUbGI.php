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
    <title>UbGI | INVESTIGADORES</title>
    <link rel="icon" href="../img/iconoub.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Ranchers&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<script>
    function mostrarMensaje3(){
        alert("El investigador ha sido vinculado exitosamente");
    }
</script>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Menu Navegacion ">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav mr-auto" id="Menu">
                    <li class="nav-item">
                        <a href="UbGI.php" class="nav-link">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="datosGeneralesUbGI.php" class="nav-link">Datos Generales</a>
                    </li>
                    <li class="nav-item">
                        <a href="investigadoresUbGI.php" class="nav-link active">Investigadores</a>
                    </li>
                    <li class="nav-item">
                        <a href="produccionUbGI.php" class="nav-link">Producción</a>
                    </li>
                    <li class="nav-item">
                        <a href="clasificacionUbGI.php" class="nav-link">Clasificación</a>
                    </li>
                    <li class="nav-item">
                        <a href="inicioSesionUbGI.php" class="nav-link">Salir</a>
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
        <h1 class="display-3" >Investigadores</h1>
        <img id="logoI" src="../img/img3.jpeg" alt="Logo UB" class="rounded-circle"><hr>
    </div>

    <div class="text-justify-center">
        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Desvincular</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $idGrupo = 1;
                    $_SESSION['idGrupo'] = 1;
                    $investigadores = getInvestigadoresPorIdGrupo($idGrupo);
                    while($investigador = mysqli_fetch_array($investigadores)) {
                        echo '<tr>';
                        echo '<td><a href="/UbGI.php">'.$investigador['CODIGO'].'</a></td>';
                        echo '<td>'.$investigador['NOMBRE'].'</td>';
                        echo '<td>'.$investigador['EDAD'].'</td>';

                        echo   '<td>
                                    <a href="#ventana4" type="button" class="open-modify-modal3 btn btn-outline-danger btn-lg" data-id="' . $investigador['ID'] . '" style="margin-left: 10px;" data-toggle="modal">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                        </svg>
                                    </a>
                                </td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>

    <div class="container">
        <a href="#ventana3" class="btn btn-primary btn-lg" data-toggle="modal">Vincular</a>
        <!--Pantalla oscura-->
        <div class="modal fade" id="ventana3">
            <div class="modal-dialog"></div>
            <div class="modal-content">
                <!--Header de la ventana-->
                <div class="modal-header">
                    <h2 class="modal-title">Investigadores</h2>
                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>   
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                        </tr>
                        <?php
                            $investigadores = getInvestigadoresGrupoNulo();
                            while ($investigador = mysqli_fetch_array($investigadores)) {
                                print '<tr>';
                                print '<td><a href="/UbGI.php">' . $investigador['CODIGO'] . '</a></td>';
                                print '<td>' . $investigador['NOMBRE'] . '</td>';
                                print '<td>' . $investigador['EDAD'] . '</td>';
                                print   '<td> <a href="../models/vincularInv.php?id_inv='.$investigador['ID'].'" class="btn btn-outline-primary">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10zM13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"></path>
                                        </svg></a>
                                        </td>';
                                print '</tr>';
                            }
                        ?>
                    </table>
        
                    <!--Footer de la ventana-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <div class="modal fade" id="ventana4">
        <div class="modal-dialog"></div>
        <div class="modal-content">
            <!--Header de la ventana-->
            <div class="modal-header">
                <h2 class="modal-title">Eliminar Investigador</h2>
                <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>

            <!--Contenido de la ventana-->
            <div class="modal-body">

                <form action="../models/desvincularInvestigador.php" method="POST">

                    <h3>¿Seguro que desea desvincular el investigador?</h3><br>
                    <!--Footer de la ventana-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <input type="hidden" id="desvincularInv" name="desvincularInv">
                        <button type="submit" class="btn btn-success" value="Eliminar">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>
</html>
<script>
    $(document).on("click", ".open-modify-modal3", function() {
        var idP = $(this).data('id');
        $("#desvincularInv").val(idP);
        console.log("valu:: ", idP);
    });
</script>