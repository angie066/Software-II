<?php
    if (isset($_POST['facultad'])){
        include("../conexion.php");
        /* If connection to database, run sql statement. */
        $data="";
        $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
        $str_datos = "";
        if (mysqli_connect_errno()) {
            die("imposible conectarse: " . mysqli_connect_error());
        } else {
            $id=$_POST['facultad'];
            if ($con){
                $res_programa= mysqli_query($con, "select * from PROGRAMA_ACADEMICO where ID_FACULTAD=$id");
                $data ='<option value="">-- Selecciona Programa --</option>';
                if(!$res_programa) {
                    echo "Error: ".mysqli_error($con);
                }
                while($rw = mysqli_fetch_array($res_programa)) {
                    $data.="<option value='".$rw['ID']."'>".$rw['NOMBRE']."</option>";
                }
            }
    
            /* Free connection resources. */
            mysqli_close($con);
    
            /* Toss back results as json encoded array. */
            echo $data;
        }
    }
?>