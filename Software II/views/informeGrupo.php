<?php
    session_start();

    include("../models/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1, maxium-scale=1.0, minium-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <title>ADMINISTRADOR</title>
    <link rel="icon" href="../img/iconoub.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Ranchers&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/estilos.css">

</head>

<body>
    <div class="text-center">
        <h1 class="display-3">Informe Grupos</h1>
        <img id="img4" src="../img/img4.jpeg" alt="Logo UB" class="rounded-circle">
        <hr>
    </div>

    <?php
        $grupos = getGrupos();

        while( $grupo = mysqli_fetch_array($grupos)) {
            echo 'gg'.$grupo['ID'];
            echo '<tr><th>'.$grupo['NOMBRE'].'</th></tr>';
            $investigadores = getInvestigadoresPorIdGrupo($grupo['ID']);
            while($investigador = mysqli_fetch_array($investigadores)) {
                echo '<tr><td>'.$investigador['NOMBRE'].'</tr></td>';
            }
        }
    ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

</body>
</html>