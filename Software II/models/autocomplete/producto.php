<?php
    if (isset($_POST['investigador'])){
        include("../conexion.php");
        /* If connection to database, run sql statement. */
        $data="";
        $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
        $str_datos = "";
        if (mysqli_connect_errno()) {
            die("imposible conectarse: " . mysqli_connect_error());
        } else {
            $id=$_POST['investigador'];
            if ($con){
                $sql ="SELECT * FROM PRODUCCION
                INNER JOIN CATEGORIA_PRODUCTO 
                ON PRODUCCION.ID_CATEGORIA_PRODUCTO=CATEGORIA_PRODUCTO.ID
                where ID_INVESTIGADOR=$id";
                $res_programa= mysqli_query($con, $sql);
                $data ='';
                if(!$res_programa) {
                    echo "Error: ".mysqli_error($con);
                }
                while($rw = mysqli_fetch_array($res_programa)) {
                    $data.="<option value='".$rw['ID_CATEGORIA_PRODUCTO']."'>".$rw['NOMBRE']."</option>";
                }
            }
    
            /* Free connection resources. */
            mysqli_close($con);
    
            /* Toss back results as json encoded array. */
            echo $data;
        }
    }
?>