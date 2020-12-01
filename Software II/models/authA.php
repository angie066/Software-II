<?php
session_start();
include ("../models/conexion.php");
    if(isset($_POST['correo'])) {
        $correo = $_POST['correo']."@uniboyaca.edu.co";
        $contraseña = $_POST['contrasenia'];
        $user = getUserAdmin($correo);
        while($fila = mysqli_fetch_array($user)) {
            if($fila['CONTRASENIA']==$contraseña) {
                $_SESSION['id'] = $fila['ID'];
                header("location:../views/admin.php");
            } else {
                echo '<script language="javascript">';
                echo 'alert("Error Inicio de sesion, datos invalidos");';
                echo 'window.location.href = "../views/inicioSesionAdmin.php";';
                echo '</script>';
            }
        }
        echo '<script language="javascript">';
        echo 'alert("Error Inicio de sesion, datos invalidos");';
        echo 'window.location.href = "../views/inicioSesionAdmin.php";';
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Error Inicio de sesion, datos invalidos");';
        echo 'window.location.href = "../views/inicioSesionAdmin.php";';
        echo '</script>';
    }
?>