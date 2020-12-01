<?php
    session_start();
    include_once ("conexion.php");
    if(isset($_POST['desvincularInv'])){
        $id_inv = $_POST['desvincularInv'];
        $id_g = $_SESSION['idGrupo'];
       /** Se abre la conexión */
        $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
        if (mysqli_connect_errno()) {
            echo "Error en la conexión: " . mysqli_connect_error();
        }
        //  

        $sql =  "UPDATE INVESTIGADOR SET ID_GRUPO = NULL WHERE ID = $id_inv";
        if(mysqli_query($con,$sql)){
            // UPDATE `HISTORIALXINVESTIGADOR` SET `FIN` = current_timestamp() WHERE ID = -3 AND ID_GRUPO = 1;
            $sql =  "UPDATE HISTORIALXINVESTIGADOR SET 	FIN = CURRENT_TIME() WHERE ID_INVESTIGADOR = $id_inv AND ID_GRUPO = $id_g";
            if (mysqli_query($con,$sql)) {
                /**  se cierra la conexion */
                mysqli_close($con);            
                echo '<script language="javascript">';
                echo 'alert("Se ha desvinculado ");';
                echo 'window.location.href = "../views/produccionUbGI.php";';
                echo '</script>';
            } else {
                /**  se cierra la conexion */
                mysqli_close($con);            
                echo '<script language="javascript">';
                echo 'alert("No se ha actualizado el historial ");';
                echo 'window.location.href = "../views/produccionUbGI.php";';
                echo '</script>';
            }
        }
        else{
            $error = mysqli_error($con);
            mysqli_close($con);
            echo '<script language="javascript">';
            echo 'alert("No se ha desvinculado Error:  '.$error.' ");';
            echo 'window.location.href = "../views/produccionUbGI.php";';
            echo '</script>';
            

            echo '<script language="javascript">';
            echo 'alert("Error desvinculando")';
            /**  se cierra la conexion */
            echo 'window.location.href = "../views/produccionUbGI.php";';
            echo '</script>';
        }
    } else {
        echo '<script language="javascript">';
        echo 'alert("Error desvinculando, no hay datos suficientes")';
        echo 'window.location.href = "../views/produccionUbGI.php";';
        echo '</script>';
    }
?>