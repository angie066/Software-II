<?php
    session_start();
    $id_i = $_SESSION['id'];
    $id_g = $_SESSION['idGrupo'];
    include_once ("conexion.php");
    if(isset($_POST['claseP'])){
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $subtipo = $_POST['subTipo'];
        $tipo = $_POST['tipo'];
        $claseP = $_POST['claseP'];

       /** Se abre la conexión */
       $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
       if (mysqli_connect_errno()) {
           echo "Error en la conexión: " . mysqli_connect_error();
       }
       $sql = "INSERT INTO CATEGORIA_PRODUCTO (NOMBRE, DESCRIPCION, ID_SUBTIPO_PRODUCTO) 
       VALUES ('$nombre', '$descripcion', $subtipo)";

       if(mysqli_query($con,$sql)){
        $id_c = mysqli_insert_id($con);
        $sql= "INSERT INTO PRODUCCION (ID_CATEGORIA_PRODUCTO, ID_INVESTIGADOR, ID_GRUPO) 
        VALUES ($id_c, $id_i, $id_g)";
        /**  se cierra la conexion */
        if(mysqli_query($con,$sql)) {
            echo '<script language="javascript">';
            echo 'alert("Se ha insertado a  '.$nombre.' ");';
            echo 'window.location.href = "../views/produccionUbI.php";';
            echo '</script>';
        } else {
            echo "Error: ".mysqli_error($con);
            mysqli_close($con);
        }


       }
       else{
           $error = mysqli_error($con);
           echo '<script language="javascript">';
           echo 'alert(No se ha insertado a  '.$nombre.' ");';
           echo 'window.location.href = "../views/produccionUbI.php";';
           echo '</script>';
           
           mysqli_close($con);

           echo '<script language="javascript">';
           echo 'alert("Error insertando a '.$nombre." error: ".$error.'")';
           /**  se cierra la conexion */
           echo 'window.location.href = "../views/produccionUbI.php";';
           echo '</script>';
       }
   } else {
       echo '<script language="javascript">';
        echo 'alert("Error insertando a '.$nombre." error: ".$error.'")';
        echo '</script>';
   }
?>