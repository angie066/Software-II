<?php
    session_start();
    include_once ("conexion.php");
    if(isset($_POST['producto'])){
        $id_p = $_POST['producto'];
        $id_g = $_SESSION['idGrupo'];
       /** Se abre la conexión */
       $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
       if (mysqli_connect_errno()) {
           echo "Error en la conexión: " . mysqli_connect_error();
       }
       //  

       $sql =  "INSERT INTO PRODUCTOVINCULADOXGRUPO (ID_CATEGORIA_PRODUCTO, ID_GRUPO, APROBADO) 
       VALUES ($id_p, $id_g, 0)";
       if(mysqli_query($con,$sql)){
           /**  se cierra la conexion */
            mysqli_close($con);            
            echo '<script language="javascript">';
            echo 'alert("Se ha vinculado ");';
            echo 'window.location.href = "../views/produccionUbGI.php";';
            echo '</script>';
       }
       else{
           $error = mysqli_error($con);
           mysqli_close($con);
           echo '<script language="javascript">';
           echo 'alert("No se ha vinculado Error:  '.$error.' ");';
           echo 'window.location.href = "../views/produccionUbGI.php";';
           echo '</script>';
           

           echo '<script language="javascript">';
           echo 'alert("Error vinculando")';
           /**  se cierra la conexion */
           echo 'window.location.href = "../views/produccionUbGI.php";';
           echo '</script>';
       }
   } else {
       echo '<script language="javascript">';
        echo 'alert("Error Vinculando, no hay datos suficientes")';
        echo 'window.location.href = "../views/produccionUbGI.php";';
        echo '</script>';
   }
?>