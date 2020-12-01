<?php
    include_once ("conexion.php");
    if(isset($_GET['idC'])){
        $cat = $_GET['idC'];
        $idG = $_GET['idG'];
        
       /** Se abre la conexión */
       $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
       if (mysqli_connect_errno()) {
           echo "Error en la conexión: " . mysqli_connect_error();
       }
       // 
       $sql = "UPDATE  PRODUCTOVINCULADOXGRUPO SET APROBADO = 1 WHERE ID_CATEGORIA_PRODUCTO  = $cat AND ID_GRUPO = $idG";

       if(mysqli_query($con,$sql)){
           /**  se cierra la conexion */
            mysqli_close($con);            
            echo '<script language="javascript">';
            echo 'alert("Se ha aprobado!");';
            echo 'window.location.href = "../views/notificaciones.php";';
            echo '</script>';
       }
       else{
           $error = mysqli_error($con);
           echo '<script language="javascript">';
           echo 'alert("Error aprobando");';
           echo 'window.location.href = "../views/notificaciones.php";';
           echo '</script>';
           
           mysqli_close($con);
       }
   } else {
       echo '<script language="javascript">';
       echo 'alert("Error aprobando, datos incompletos ");';
       echo 'window.location.href = "../views/notificaciones.php";';
       echo '</script>';
   }
?>