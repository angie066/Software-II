<?php
    include_once ("conexion.php"); //Incluye el archivo conexion.php
    if(isset($_POST['eliminarP'])){
        $id = $_POST['eliminarP'];

        /** Se abre la conexión */
        $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
        if (mysqli_connect_errno()) {
            echo "Error en la conexión: " . mysqli_connect_error();
        }
        $sql = "DELETE FROM PRODUCCION WHERE ID_CATEGORIA_PRODUCTO=$id;";
        if(mysqli_query($con,$sql)){
            $sql = "DELETE FROM CATEGORIA_PRODUCTO WHERE ID=$id;";
            if(mysqli_query($con,$sql)){
                /**  se cierra la conexion */
                    mysqli_close($con);            
                    echo '<script language="javascript">';
                    echo 'alert("Se ha Eliminado correctamente");';
                    echo 'window.location.href = "../views/produccionUbI.php";';
                    echo '</script>';
            } else {
                $error = mysqli_error($con);
                mysqli_close($con);            
                echo '<script language="javascript">';
                echo 'alert("No se ha Eliminado correctamente, '.$error.'");';
                echo 'window.location.href = "../views/produccionUbI.php";';
                echo '</script>';
            }
        }
        else{
            $error = mysqli_error($con);
            mysqli_close($con);
            echo '<script language="javascript">';
            echo 'alert("No se ha eliminado, '.$error.'");';
            echo 'window.location.href = "../views/produccionUbI.php";';
            echo '</script>';
        }
    } else {
        echo '<script language="javascript">';
        echo 'alert("Error eliminando")';
        echo 'window.location.href = "../views/produccionUbI.php";';
        echo '</script>';
    }
?>