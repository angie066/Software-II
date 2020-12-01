<?php
    session_start();
    include_once ("conexion.php");
    if(isset($_GET['id_inv'])){
        $id = $_GET['id_inv'];
        $id_g = $_SESSION['idGrupo'];
       /** Se abre la conexión */
       $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
       if (mysqli_connect_errno()) {
           echo "Error en la conexión: " . mysqli_connect_error();
       }
       //  

       $sql = "UPDATE INVESTIGADOR SET ID_GRUPO = $id_g WHERE ID = $id";
       if(mysqli_query($con,$sql)){
           /**  se cierra la conexion */
            mysqli_close($con);            
            echo '<script language="javascript">';
            echo 'alert("Se ha vinculado ");';
            echo 'window.location.href = "../views/investigadoresUbGI.php";';
            echo '</script>';
       }
       else{
           $error = mysqli_error($con);
           mysqli_close($con);
           echo '<script language="javascript">';
           echo 'alert("No se ha vinculado Error:  '.$error.' ");';
           echo 'window.location.href = "../views/investigadoresUbGI.php";';
           echo '</script>';
           

           echo '<script language="javascript">';
           echo 'alert("Error insertando a '.$nombre." error: ".$error.'")';
           /**  se cierra la conexion */
           echo 'window.location.href = "../views/investigadoresUbGI.php";';
           echo '</script>';
       }
   } else {
       echo '<script language="javascript">';
        echo 'alert("Error insertando a '.$nombre." error: ".$error.'")';
        echo '</script>';
   }
?>