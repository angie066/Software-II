<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1, maxium-scale=1.0, minium-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>INICIO SESIÓN | INVESTIGADORES</title>
    <link rel="icon" href="../img/iconoub.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Ranchers&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <div class="text-center">
        <h1 class="display-3" >UbI</h1>
        <img id="logoI" src="../img/img2.jpeg" alt="Logo UB" class="rounded-circle" style="width: 90px; height: 80px;"><hr>
    </div>
    
    
    <form id="loginUser" action="../models/auth.php" method="POST">
        <div class="form-group">
            <label>Correo:</label>
            <div class="input-group-prepend">
                <input type="text" style="width: 3.5cm" class="field" id="correo" name="correo">
                <spand class="input-group-text">@uniboyaca.edu.co</span> 
            </div>
        </div>

        <div class="form-group">
            <label>Código:</label><br/>
            <input type="text" class="field" id="codigo" name="codigo"><br/>
        </div>

        <div class="form-group">
            <label>Contraseña:</label><br/>
            <input type="password" class="field" id="contrasenia" name="contrasenia"><br/>
        </div>

        <div class="text-center">
            <a class="olvidar" href=""><u>¿Olvidaste tu contraseña?</u></a><br><br/>
            <a class="registro" href="registrarseUBI.php"><u>¿No estas registrado?</u></a><br><br/>
        </div>

        <p class="center-content"><input type="submit" class="btn btn-outline-danger" value="Ingresar"></p>

    </form>

    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>