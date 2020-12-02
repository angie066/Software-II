<?php
/* incluye archivos de config*/
include_once dirname(__FILE__) . '/config.php';

/*Conexion a la base de datos*/

function getNacionalidades() {
	$con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
	$str_datos = "";
	if (mysqli_connect_errno()) {
		$str_datos.= "Error en la conexión: " . mysqli_connect_error();
	}
	$sql = "SELECT * FROM NACIONALIDAD";
	$resultado = mysqli_query($con,$sql);
	mysqli_close($con);
	return $resultado;
}

function getFacultades() {
	$con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
	$str_datos = "";
	if (mysqli_connect_errno()) {
		$str_datos.= "Error en la conexión: " . mysqli_connect_error();
	}
	$sql = "SELECT * FROM FACULTAD";
	$resultado = mysqli_query($con,$sql);
	mysqli_close($con);
	return $resultado;
}

function getSubareas() {
	$con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
	$str_datos = "";
	if (mysqli_connect_errno()) {
		$str_datos.= "Error en la conexión: " . mysqli_connect_error();
	}
	$sql = "SELECT * FROM SUB_AREA_CONOCIMIENTO";
	$resultado = mysqli_query($con,$sql);
	mysqli_close($con);
	return $resultado;
}

function getCiudades() {
	$con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
	$str_datos = "";
	if (mysqli_connect_errno()) {
		$str_datos.= "Error en la conexión: " . mysqli_connect_error();
	}
	$sql = "SELECT * FROM CIUDAD";
	$resultado = mysqli_query($con,$sql);
	mysqli_close($con);
	return $resultado;
}

function getTipos() {
	$con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
	$str_datos = "";
	if (mysqli_connect_errno()) {
		$str_datos.= "Error en la conexión: " . mysqli_connect_error();
	}
	$sql = "SELECT * FROM TIPO_PRODUCTO";
	$resultado = mysqli_query($con,$sql);
	mysqli_close($con);
	return $resultado;
}

function getSubtipo() {
	$con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
	$str_datos = "";
	if (mysqli_connect_errno()) {
		$str_datos.= "Error en la conexión: " . mysqli_connect_error();
	}
	$sql = "SELECT * FROM SUBTIPO_PRODUCTO";
	$resultado = mysqli_query($con,$sql);
	mysqli_close($con);
	return $resultado;
}

function getArea() {
	$con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
	$str_datos = "";
	if (mysqli_connect_errno()) {
		$str_datos.= "Error en la conexión: " . mysqli_connect_error();
	}
	$sql = "SELECT * FROM AREA_CONOCIMIENTO";
	$resultado = mysqli_query($con,$sql);
	mysqli_close($con);
	return $resultado;
}

function getUser($codigo, $correo) {
	$con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
	$str_datos = "";
	if (mysqli_connect_errno()) {
		$str_datos.= "Error en la conexión: " . mysqli_connect_error();
	}
	$sql = "SELECT * FROM INVESTIGADOR where CODIGO='$codigo' and CORREO='$correo'";
	$resultado = mysqli_query($con,$sql);
	mysqli_close($con);
	return $resultado;
}

function getUserAdmin($correo) {
	$con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
	$str_datos = "";
	if (mysqli_connect_errno()) {
		$str_datos.= "Error en la conexión: " . mysqli_connect_error();
	}
	$sql = "SELECT * FROM ADMINISTRADOR where CORREO='$correo'";
	$resultado = mysqli_query($con,$sql);
	mysqli_close($con);
	return $resultado;
}

function getInvestigadores() {
	$con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
	$str_datos = "";
	if (mysqli_connect_errno()) {
		$str_datos.= "Error en la conexión: " . mysqli_connect_error();
	}
	$sql = "SELECT * FROM INVESTIGADOR";
	$resultado = mysqli_query($con,$sql);
	mysqli_close($con);
	return $resultado;
}

function getClase() {
	$con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
	$str_datos = "";
	if (mysqli_connect_errno()) {
		$str_datos.= "Error en la conexión: " . mysqli_connect_error();
	}
	$sql = "SELECT * FROM CLASE_PRODUCTO";
	$resultado = mysqli_query($con,$sql);
	mysqli_close($con);
	return $resultado;
}

function getProduct($id) {
	$con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
	$str_datos = "";
	if (mysqli_connect_errno()) {
		$str_datos.= "Error en la conexión: " . mysqli_connect_error();
	}
	$sql = "SELECT 
		CATEGORIA_PRODUCTO.ID as ID_CATEGORIA,
		TIPO_PRODUCTO.ID as ID_TIPO,
		CATEGORIA_PRODUCTO.ID_SUBTIPO_PRODUCTO as ID_SUBTIPO,
		SUBTIPO_PRODUCTO.ID_CLASE_PRODUCTO  as ID_CLASE,
		CATEGORIA_PRODUCTO.NOMBRE as NOMBRE_CATEGORIA,
		SUBTIPO_PRODUCTO.NOMBRE as NOMBRE_SUBTIPO,
		TIPO_PRODUCTO.NOMBRE as NOMBRE_TIPOP,
		CLASE_PRODUCTO.NOMBRE as NOMBRE_CLASEP,
		PRODUCCION.ID_INVESTIGADOR as ID_INVESTIGADOR
		FROM CATEGORIA_PRODUCTO
		INNER JOIN SUBTIPO_PRODUCTO
		ON CATEGORIA_PRODUCTO.ID_SUBTIPO_PRODUCTO=SUBTIPO_PRODUCTO.ID 
		INNER JOIN TIPO_PRODUCTO 
		ON TIPO_PRODUCTO.ID = SUBTIPO_PRODUCTO.ID_TIPO_PRODUCTO 
		INNER JOIN CLASE_PRODUCTO 
		ON CLASE_PRODUCTO.ID = SUBTIPO_PRODUCTO.ID_CLASE_PRODUCTO
		INNER JOIN PRODUCCION
		ON CATEGORIA_PRODUCTO.ID=PRODUCCION.ID_CATEGORIA_PRODUCTO
		WHERE ID_INVESTIGADOR=$id";
	$resultado = mysqli_query($con,$sql);
	mysqli_close($con);
	return $resultado;
}

function getInvestigadoresGrupoNulo() {
	$con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
	$str_datos = "";
	if (mysqli_connect_errno()) {
		$str_datos.= "Error en la conexión: " . mysqli_connect_error();
	}
	$sql = "SELECT * FROM INVESTIGADOR WHERE ID_GRUPO IS NULL;";
	$resultado = mysqli_query($con,$sql);
	mysqli_close($con);
	return $resultado;
}

function getInvestigadoresPorIdGrupo($idGrupo) {
	$con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
	$str_datos = "";
	if (mysqli_connect_errno()) {
		$str_datos.= "Error en la conexión: " . mysqli_connect_error();
	}
	$sql = "SELECT * FROM INVESTIGADOR WHERE ID_GRUPO=$idGrupo and LIDER=0";
	$resultado = mysqli_query($con,$sql);
	mysqli_close($con);
	return $resultado;
}

function getInvestigadoresNoLider() {
	$con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
	$str_datos = "";
	if (mysqli_connect_errno()) {
		$str_datos.= "Error en la conexión: " . mysqli_connect_error();
	}
	$sql = "SELECT * FROM INVESTIGADOR WHERE LIDER IS NOT TRUE;";
	$resultado = mysqli_query($con,$sql);
	mysqli_close($con);
	return $resultado;
}

function getInvestigadoresPorIdGrupoConLider($idGrupo) {
	$con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
	$str_datos = "";
	if (mysqli_connect_errno()) {
		$str_datos.= "Error en la conexión: " . mysqli_connect_error();
	}
	$sql = "SELECT * FROM INVESTIGADOR WHERE ID_GRUPO=$idGrupo";
	$resultado = mysqli_query($con,$sql);
	mysqli_close($con);
	return $resultado;
}

function getNotificacionesPorId($id) {
	$con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
	$str_datos = "";
	if (mysqli_connect_errno()) {
		$str_datos.= "Error en la conexión: " . mysqli_connect_error();
	}
	$sql = "SELECT 
	CATEGORIA_PRODUCTO.NOMBRE as NOMBRE_PRODUCTO,
	GRUPO.NOMBRE as NOMBRE_GRUPO,
	PRODUCTOVINCULADOXGRUPO.ID_CATEGORIA_PRODUCTO as ID_CATEGORIA,
	PRODUCTOVINCULADOXGRUPO.ID_GRUPO as ID_GRUPO
	FROM PRODUCTOVINCULADOXGRUPO 
	INNER JOIN CATEGORIA_PRODUCTO
	ON PRODUCTOVINCULADOXGRUPO.ID_CATEGORIA_PRODUCTO=CATEGORIA_PRODUCTO.ID
	INNER JOIN PRODUCCION
	ON PRODUCCION.ID_CATEGORIA_PRODUCTO=PRODUCTOVINCULADOXGRUPO.ID_CATEGORIA_PRODUCTO
	INNER JOIN INVESTIGADOR
	ON PRODUCCION.ID_INVESTIGADOR=INVESTIGADOR.ID
	INNER JOIN GRUPO
	ON GRUPO.ID=PRODUCTOVINCULADOXGRUPO.ID_GRUPO
	WHERE PRODUCTOVINCULADOXGRUPO.APROBADO=0 AND INVESTIGADOR.ID=$id";
	$resultado = mysqli_query($con,$sql);
	mysqli_close($con);
	return $resultado;
}

function getProductoPorGrupo($id) {
	$con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
	$str_datos = "";
	if (mysqli_connect_errno()) {
		$str_datos.= "Error en la conexión: " . mysqli_connect_error();
	}
	$sql = "SELECT 
	CATEGORIA_PRODUCTO.NOMBRE as NOMBRE_PRODUCTO,
	GRUPO.NOMBRE as NOMBRE_GRUPO,
	PRODUCTOVINCULADOXGRUPO.ID_CATEGORIA_PRODUCTO as ID_CATEGORIA,
	PRODUCTOVINCULADOXGRUPO.ID_GRUPO as ID_GRUPO,
	TIPO_PRODUCTO.NOMBRE as NOMBRE_TIPO,
	SUBTIPO_PRODUCTO.NOMBRE as NOMBRE_SUBTIPO,
	CLASE_PRODUCTO.NOMBRE as NOMBRE_CLASE,
	INVESTIGADOR.NOMBRE as NOMBRE_INVESTIGADOR
	FROM PRODUCTOVINCULADOXGRUPO 
	INNER JOIN CATEGORIA_PRODUCTO
	ON PRODUCTOVINCULADOXGRUPO.ID_CATEGORIA_PRODUCTO=CATEGORIA_PRODUCTO.ID
	INNER JOIN PRODUCCION
	ON PRODUCCION.ID_CATEGORIA_PRODUCTO=PRODUCTOVINCULADOXGRUPO.ID_CATEGORIA_PRODUCTO
	INNER JOIN INVESTIGADOR
	ON PRODUCCION.ID_INVESTIGADOR=INVESTIGADOR.ID
	INNER JOIN GRUPO
	ON GRUPO.ID=PRODUCTOVINCULADOXGRUPO.ID_GRUPO
	INNER JOIN SUBTIPO_PRODUCTO
	ON SUBTIPO_PRODUCTO.ID=CATEGORIA_PRODUCTO.ID_SUBTIPO_PRODUCTO
	INNER JOIN TIPO_PRODUCTO
	ON TIPO_PRODUCTO.ID=SUBTIPO_PRODUCTO.ID_TIPO_PRODUCTO
	INNER JOIN CLASE_PRODUCTO
	ON CLASE_PRODUCTO.ID=SUBTIPO_PRODUCTO.ID_CLASE_PRODUCTO
	WHERE PRODUCTOVINCULADOXGRUPO.APROBADO=1 AND PRODUCTOVINCULADOXGRUPO.ID_GRUPO=$id";
	$resultado = mysqli_query($con,$sql);
	mysqli_close($con);
	return $resultado;
}
function getUserById($id) {
	$con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
	$str_datos = "";
	if (mysqli_connect_errno()) {
		$str_datos.= "Error en la conexión: " . mysqli_connect_error();
	}
	$sql = "SELECT * FROM INVESTIGADOR where ID=$id";
	$resultado = mysqli_query($con,$sql);
	mysqli_close($con);
	return mysqli_fetch_array($resultado);
}
?>
