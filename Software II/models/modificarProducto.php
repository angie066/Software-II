<?php
    include_once ("conexion.php");
    if(isset($_POST['nameP2'])){
        $nombre = $_POST['nameP2'];
        $subtipo = $_POST['subTipo2'];
        $tipo = $_POST['tipo2'];
        $claseP = $_POST['claseP2'];
        $id = $_POST['id_p'];
       /** Se abre la conexión */
       $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
       if (mysqli_connect_errno()) {
           echo "Error en la conexión: " . mysqli_connect_error();
       }
       // 
       $sql = "UPDATE CATEGORIA_PRODUCTO SET NOMBRE = '$nombre', ID_SUBTIPO_PRODUCTO = $subtipo WHERE ID = $id";

       if(mysqli_query($con,$sql)){
           /**  se cierra la conexion */
            mysqli_close($con);            
            echo '<script language="javascript">';
            echo 'alert("Se ha actualizado a  '.$nombre.' ");';
            echo 'window.location.href = "../views/produccionUbI.php";';
            echo '</script>';
       }
       else{
           $error = mysqli_error($con);
           echo '<script language="javascript">';
           echo 'alert("Error insertando a '.$nombre.' ");';
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
       echo 'alert("Error insertando, datos incompletos ");';
       echo 'window.location.href = "../views/produccionUbI.php";';
       echo '</script>';
   }
?>