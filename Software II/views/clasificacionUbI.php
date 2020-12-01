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
                <td rowspan="2">Investigador Emerito</td>
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
                <td rowspan="2">Investigador Junior</td>
                <td rowspan="2"><img id="x" src="../img/x.jpeg"></td>
                <td><img id="x" src="../img/x.jpeg"></td>
                <td>(2) Producto tipo top A</td>
                <td>(5) Producto tipo top A</td>
            </tr>
            <tr>
                <td><img id="x" src="../img/x.jpeg"></td>
                <td>Pertenecer minimo a (1) grupos</td>
                <td>Pertenecer minimo a (2)grupos</td>
            </tr>
    </div>
    <div class="text-center">
        <p class="center-content simular"><input type="submit" class="btn btn-danger" value="Simular"></p>
    </div>
    
</body>
</html>