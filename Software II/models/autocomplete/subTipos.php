<?php
    if (isset($_POST['tipo'])){
        include("../conexion.php");
        /* If connection to database, run sql statement. */
        $data="";
        $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
        $str_datos = "";
        if (mysqli_connect_errno()) {
            die("imposible conectarse: " . mysqli_connect_error());
        } else {
            $id=$_POST['tipo'];
            if ($con){
                $res_subTipo= mysqli_query($con, "select * from SUBTIPO_PRODUCTO where ID_TIPO_PRODUCTO=$id");
                $data ='<option value="">-- Seleccione Tipo--</option>';
                if(!$res_subTipo) {
                    echo "Error: ".mysqli_error($con);
                }
                while($rw = mysqli_fetch_array($res_subTipo)) {
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