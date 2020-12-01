<?php
    include_once ("conexion.php");
    if(isset($_POST['nombre'])){
        $nombre = $_POST['nombre'];
        $fechaIns = $_POST['fechaIns'];
        $fechaC = $_POST["fechaC"];
        $lider = $_POST['lider'];
        $facultad = $_POST['facultad'];
        $programa = $_POST['programa'];
        $areaCon = $_POST['areaCon'];
        $ciudad = $_POST['ciudad'];

       /** Se abre la conexión */
       $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
       if (mysqli_connect_errno()) {
           echo "Error en la conexión: " . mysqli_connect_error();
       }
       $sql = "INSERT INTO GRUPO (NOMBRE, FECHA_INSCRIPCION, FECHA_CERTIFICACION, 
               ID_PROGRAMA_ACADEMICO, ID_SUB_AREA_CONOCIMIENTO, ID_CIUDAD) 
               VALUES ('$nombre','$fechaIns', '$fechaC', $programa, $areaCon, $ciudad)";

       echo 'sql: '.$sql;
      
       if(mysqli_query($con,$sql)){
        $idG = mysqli_insert_id($con);
        $sqlUpdate = "UPDATE INVESTIGADOR SET LIDER = 1, ID_GRUPO = $idG WHERE ID = $lider";
        if(mysqli_query($con,$sqlUpdate)){ 
            /**  se cierra la conexion */
             mysqli_close($con);
             echo '<script language="javascript">';
             echo 'alert("Se ha insertado a '.$nombre.'");';
             echo 'window.location.href = ".../views/admin.php";';
             echo '</script>';
        }
         echo "Se ha insertado a $nombre pero no se le ha agregado el lider, ".mysqli_error($con);
         echo '<script language="javascript">';
         echo 'alert("Se ha insertado a '.$nombre.'")';
         echo '</script>';
         /**  se cierra la conexion */
         mysqli_close($con);
         header("location:../views/admin.php");
    }
    else{
        $error = mysqli_error($con);
        echo '<script language="javascript">';
        echo 'alert("Error insertando a '.$nombre." error: ".$error.'")';
        echo '</script>';
        /**  se cierra la conexion */
        mysqli_close($con);
        header("location:../views/registroGrupos.php");
    }
   }
?>