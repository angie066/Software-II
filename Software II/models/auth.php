<?php
session_start();
include ("../models/conexion.php");
    if(isset($_POST['correo'])) {
        $correo = $_POST['correo']."@uniboyaca.edu.co";
        $contraseña = $_POST['contrasenia'];
        $codigo = $_POST['codigo'];
        $user = getUser($codigo, $correo);
        $_SESSION["codI"] = $codigo;
        while($fila = mysqli_fetch_array($user)) {
            if($fila['CONTRASENIA']==$contraseña) {
                $_SESSION['id'] = $fila['ID'];
                $_SESSION['idGrupo'] = $fila['ID_GRUPO'];
                header("location:../views/UbI.php");
            } else {
                echo '<script language="javascript">';
                echo 'alert("Error Inicio de sesion, datos invalidos");';
                echo 'window.location.href = "../views/inicioSesionUbI.php";';
                echo '</script>';
            }
        }
        echo '<script language="javascript">';
        echo 'alert("Error Inicio de sesion, datos invalidos");';
        echo 'window.location.href = "../views/inicioSesionUbI.php";';
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Error Inicio de sesion, datos invalidos");';
        echo 'window.location.href = "../views/inicioSesionUbI.php";';
        echo '</script>';
    }
?>