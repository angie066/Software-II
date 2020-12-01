<?php
    include_once ("conexion.php");
    if(isset($_POST['nombre'])){
        $nombre = $_POST['nombre'];
        $fechaIn = $_POST['fechaIn'];
        $fechaNac = date('Y-m-d', strtotime($_POST["fechaNac"]));
        $nacionalidad = $_POST['nacionalidad'];
        $nivelF = $_POST['nivelF'];
        $hora = $_POST['hora'];
        $facultad = $_POST['facultad'];
        $programa = $_POST['programa'];
        $correo = $_POST['correo']."@uniboyaca.edu.co";
        $codigo = $_POST['codigo'];
        $contrasenna = $_POST['password'];

        $fecha_nacimiento = new DateTime($fechaNac);
        $hoy = new DateTime();
        $edad = $hoy->diff($fecha_nacimiento);
        $edadNum = $edad->y;

       /** Se abre la conexión */
       $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
       if (mysqli_connect_errno()) {
           echo "Error en la conexión: " . mysqli_connect_error();
       }
       $sql = "INSERT INTO INVESTIGADOR (NOMBRE, FECHA_NACIMIENTO, Correo, Codigo,
       Contrasenia, FECHA_INICIO, NIVEL_FORMACION, HORAS_DEDICADAS, EDAD, LIDER, ID_PROGRAMA_ACADEMICO,
       ID_NACIONALIDAD, ID_GRUPO, ID_ADMINISTRADOR) 
       VALUES ('$nombre','$fechaNac', '$correo', '$codigo', '$contrasenna', '$fechaIn',
       '$nivelF', '$hora', $edadNum, 0, $programa, $nacionalidad, NULL, 1)";

       echo 'sql: '.$sql;
      
       if(mysqli_query($con,$sql)){
           echo "Se ha insertado a $nombre";
           echo '<script language="javascript">';
           echo 'alert("Se ha insertado a '.$nombre.'")';
           echo '</script>';
           /**  se cierra la conexion */
           mysqli_close($con);
           header("location:../views/inicioSesionUbI.php");
       }
       else{
           $error = mysqli_error($con);
           echo '<script language="javascript">';
           echo 'alert("Error insertando a '.$nombre." error: ".$error.'")';
           echo '</script>';
           /**  se cierra la conexion */
           mysqli_close($con);
           header("location:../views/registrarseUBI.php");
       }
   }
?>