<?php
$tiempo_inicial = microtime(true);
include_once('../conexiones/conexione.php');
include_once('../admin/class_php/funcion_cryptor_descryptor_class.php');
include_once('../evitar_mensaje_error/error.php');
date_default_timezone_set("America/Bogota");
include ("../session/funciones_admin.php");
if (verificar_usuario()){
//print "Bienvenido (a), <strong>".$_SESSION['usuario'].", </strong>al sistema.";
    } else { header("Location:../index.php");
}
$cuenta_actual                 = DAXCRYPTOR::descriptardax($_SESSION['usuario_cryp']);
$cuenta                        = $_SESSION['usuario'];
//---------------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------------------------//
$cod_info_asignar_alumno_a_grupo         = intval($_POST['cod_info_asignar_alumno_a_grupo']);
$cod_caja_virtual                        = intval($_POST['cod_caja_virtual']);
$cuenta                                  = addslashes($_POST['cuenta']);
$pagina                                  = addslashes($_POST['pagina']);
$nombre_estado_factura                   = 'CERRADA';
$pagina_redirect_imprimir                = '../admin/lista_asignar_alumno_a_grupo.php'; 
//---------------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------------------------//
//-------------------------------------- LLAVE DE INICIO DEL CONDICIONAL VENDER POR CONTADO ------------------------------------------//
if (isset($_POST['cod_info_asignar_alumno_a_grupo'])) {

$sql_producto = "SELECT * FROM tbl15_info_asignar_alumno_a_grupo WHERE (cod_info_asignar_alumno_a_grupo = '$cod_info_asignar_alumno_a_grupo')";
$consulta_producto = mysqli_query($conectar, $sql_producto) or die(mysqli_error($conectar));
$datos_producto = mysqli_fetch_assoc($consulta_producto);

$cod_info_asignar_grupo_a_grado     = $datos_producto['cod_info_asignar_grupo_a_grado'];
$cod_grado                          = $datos_producto['cod_grado'];
$nombre_grado                       = $datos_producto['nombre_grado'];
$nombre_grado_letra                 = $datos_producto['nombre_grado_letra'];
$cod_grupo                          = $datos_producto['cod_grupo'];
$nombre_grupo                       = $datos_producto['nombre_grupo'];
$anyo                               = $datos_producto['anyo'];
$fecha_creacion                     = date("Y-m-d H:i:s");

$sql_info_asignar_grupo_a_grado = "SELECT cod_info_asignar_asignatura_a_grado FROM tbl15_info_asignar_grupo_a_grado WHERE (cod_info_asignar_grupo_a_grado = '$cod_info_asignar_grupo_a_grado')";
$consulta_info_asignar_grupo_a_grado = mysqli_query($conectar, $sql_info_asignar_grupo_a_grado) or die(mysqli_error($conectar));
$datos_info_asignar_grupo_a_grado = mysqli_fetch_assoc($consulta_info_asignar_grupo_a_grado);

$cod_info_asignar_asignatura_a_grado     = $datos_info_asignar_grupo_a_grado['cod_info_asignar_asignatura_a_grado'];


$sql_asignar_asignatura_a_grado = "SELECT cod_asignatura, nombre_asignatura FROM tbl15_asignar_asignatura_a_grado WHERE (cod_info_asignar_asignatura_a_grado = '$cod_info_asignar_asignatura_a_grado')";
$mconsulta_asignar_asignatura_a_grado = mysqli_query($conectar, $sql_asignar_asignatura_a_grado) or die(mysqli_error($conectar));
while ($datos_asignar_asignatura_a_grado = mysqli_fetch_assoc($mconsulta_asignar_asignatura_a_grado)) {

$cod_asignatura                          = $datos_asignar_asignatura_a_grado['cod_asignatura'];
$nombre_asignatura                       = $datos_asignar_asignatura_a_grado['nombre_asignatura'];

	$sql_mconsulta = "SELECT * FROM tbl15_asignar_alumno_a_grupo_temporal WHERE (cuenta = '$cuenta') AND (cod_caja_virtual = '$cod_caja_virtual')";
	$mconsulta = mysqli_query($conectar, $sql_mconsulta) or die(mysqli_error($conectar));
	while ($datos_temp = mysqli_fetch_assoc($mconsulta)) {

		$cod_alumno                         = $datos_temp['cod_alumno'];
		//--------------------------------------------------------------------------------------------//
		//----------------------------- INSERTAR PRODUCTOS A LAS VENTAS -----------------------------//
		$sql_temp = "INSERT INTO tbl15_asignar_alumno_a_grupo (cod_info_asignar_alumno_a_grupo, cod_info_asignar_grupo_a_grado, cod_grado, nombre_grado, nombre_grado_letra, 
		cod_grupo, nombre_grupo, anyo, cod_alumno, cod_asignatura, nombre_asignatura, cuenta, fecha_creacion)
		VALUES ('$cod_info_asignar_alumno_a_grupo', '$cod_info_asignar_grupo_a_grado', '$cod_grado', '$nombre_grado', '$nombre_grado_letra', 
		'$cod_grupo', '$nombre_grupo', '$anyo', '$cod_alumno', '$cod_asignatura', '$nombre_asignatura', '$cuenta', '$fecha_creacion')";
		$resultado_asignar_alumno_a_grupo = mysqli_query($conectar, $sql_temp) or die(mysqli_error($conectar));
	}
}
//----------------------------------------------------------------------- ---------------------------------------------------------//
//----------------------------------------------------------------------- ---------------------------------------------------------//
$borrar_sql = sprintf("DELETE FROM tbl15_asignar_alumno_a_grupo_temporal WHERE (cod_info_asignar_alumno_a_grupo = '$cod_info_asignar_alumno_a_grupo')");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
//----------------------------------------------------------------------- ---------------------------------------------------------//
//----------------------------------------------------------------------- ---------------------------------------------------------//
$agregar_regis = sprintf("UPDATE tbl15_info_asignar_alumno_a_grupo SET nombre_estado_factura = '$nombre_estado_factura', fecha_creacion = '$fecha_creacion' WHERE cod_info_asignar_alumno_a_grupo = '$cod_info_asignar_alumno_a_grupo'");
$resultado_regis = mysqli_query($conectar, $agregar_regis) or die(mysqli_error($conectar));
//----------------------------------------------------------------------- ---------------------------------------------------------//
$url_redir = $pagina_redirect_imprimir."?cod_info_asignar_alumno_a_grupo=".$cod_info_asignar_alumno_a_grupo."&pagina=".$pagina;
header("Location: $url_redir");
}
else { 
//$url_redir = "../admin/asignar_alumno_a_grupos_valor_cancelado_demasiado_grande.php?cod_info_asignar_alumno_a_grupo=".$cod_info_asignar_alumno_a_grupo."&cod_tipo_pago=".$cod_tipo_pago."&total_precio_venta=".$total_precio_venta."&vlr_cancelado=".$vlr_cancelado."&pagina=".$pagina;
//header("Location: $url_redir");
}
//----------------------------------------------------------------------- ---------------------------------------------------------//
//----------------------------------------------------------------------- ---------------------------------------------------------//
//----------------------------------------------------------------------- ---------------------------------------------------------//
//----------------------------------------------------------------------- ---------------------------------------------------------//
?>