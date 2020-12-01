<?php
        $conectar = mysqli_connect("localhost","root","","db_proyect");
        $correo = $_POST['correo'];
        $codigo = $_POST['code'];
        $contrasenna = $_POST['password'];

        $insertar = "INSERT INTO administrador VALUES('$correo', '$codigo', '$contrasenna')";
        $query = mysqli_query($conectar, $insertar);
        if($query){
            echo 'sirvioooo';
        }
?>