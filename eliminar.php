<?php error_reporting(E_ALL ^ E_NOTICE);
include_once('../conexiones/conexione.php'); 
include_once('../evitar_mensaje_error/error.php'); 
 
include_once("../session/funciones_admin.php");
if (verificar_usuario()){
//print "Bienvenido (a), <strong>".$_SESSION['usuario'].", </strong>al sistema.";
	} else { header("Location:../index.php");
}
date_default_timezone_set("America/Bogota");
$cuenta_actual             = addslashes($_SESSION['usuario']);
$cuenta                    = addslashes($_SESSION['usuario']);
$cod_caja_virtual          = addslashes($_SESSION['cod_caja_virtual']);

$tab                       = addslashes($_GET['tab']);
$tipo                      = addslashes($_GET['tipo']);
$campo                     = addslashes($_GET['campo']);
$pagina                    = addslashes($_GET['pagina']);

if ($tipo == 'eliminar' && $tab == 'tbl15_grupo_alumno_temporal') {
$llave                                          = intval($_GET['llave']);
$cuenta_actual                                  = addslashes($_GET['cuenta']);
$cod_caja_virtual                               = intval($_GET['cod_caja_virtual']);

$sql_cod_info_impuesto_facturas = "SELECT cod_info_grupo_alumno FROM tbl15_grupo_alumno_temporal WHERE (cod_grupo_alumno_temporal = '$llave')";
$consulta_cod_info_impuesto_facturas = mysqli_query($conectar, $sql_cod_info_impuesto_facturas) or die(mysqli_error($conectar));
$datos_cod_info_impuesto_facturas = mysqli_fetch_assoc($consulta_cod_info_impuesto_facturas);

$cod_info_grupo_alumno            = $datos_cod_info_impuesto_facturas['cod_info_grupo_alumno'];

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));

$datos_info_factura_cero = "SELECT cod_grupo_alumno_temporal FROM tbl15_grupo_alumno_temporal WHERE (cuenta = '$cuenta_actual') AND (cod_caja_virtual = '$cod_caja_virtual')";
$consulta_info_factura_cero = mysqli_query($conectar, $datos_info_factura_cero) or die(mysqli_error($conectar));
$existe_factura_abierta_cero = mysqli_num_rows($consulta_info_factura_cero);

if ($existe_factura_abierta_cero == 0) {
$borrar_sql = sprintf("DELETE FROM tbl15_info_grupo_alumno WHERE (cod_info_grupo_alumno = '$cod_info_grupo_alumno') AND (nombre_estado_factura = 'ABIERTA')");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
}

if ($tipo == 'eliminar' && $tab == 'tbl15_asignar_asignatura_a_grado_temporal') {
$llave                                          = intval($_GET['llave']);
$cuenta_actual                                  = addslashes($_GET['cuenta']);
$cod_caja_virtual                               = intval($_GET['cod_caja_virtual']);

$sql_cod_info_impuesto_facturas = "SELECT cod_info_asignar_asignatura_a_grado FROM tbl15_asignar_asignatura_a_grado_temporal WHERE (cod_asignar_asignatura_a_grado_temporal = '$llave')";
$consulta_cod_info_impuesto_facturas = mysqli_query($conectar, $sql_cod_info_impuesto_facturas) or die(mysqli_error($conectar));
$datos_cod_info_impuesto_facturas = mysqli_fetch_assoc($consulta_cod_info_impuesto_facturas);

$cod_info_asignar_asignatura_a_grado            = $datos_cod_info_impuesto_facturas['cod_info_asignar_asignatura_a_grado'];


$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));

$datos_info_factura_cero = "SELECT cod_asignar_asignatura_a_grado_temporal FROM tbl15_asignar_asignatura_a_grado_temporal WHERE (cuenta = '$cuenta_actual') AND (cod_caja_virtual = '$cod_caja_virtual')";
$consulta_info_factura_cero = mysqli_query($conectar, $datos_info_factura_cero) or die(mysqli_error($conectar));
$existe_factura_abierta_cero = mysqli_num_rows($consulta_info_factura_cero);

if ($existe_factura_abierta_cero == 0) {
$borrar_sql = sprintf("DELETE FROM tbl15_info_asignar_asignatura_a_grado WHERE (cod_info_asignar_asignatura_a_grado = '$cod_info_asignar_asignatura_a_grado') AND (nombre_estado_factura = 'ABIERTA')");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>?cuenta=<?php echo $cuenta_actual ?>&cod_caja_virtual=<?php echo $cod_caja_virtual ?>">
<?php } ?>


<?php
if ($tipo == 'eliminar' && $tab == 'tbl15_asignar_asignatura_a_grado') {
$llave                                          = intval($_GET['llave']);
$cuenta_actual                                  = addslashes($_GET['cuenta']);
$cod_caja_virtual                               = intval($_GET['cod_caja_virtual']);
$cod_info_asignar_asignatura_a_grado            = intval($_GET['cod_info_asignar_asignatura_a_grado']);

$borrar_sql = sprintf("DELETE FROM $tab WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));

$datos_info_factura_cero = "SELECT cod_asignar_asignatura_a_grado FROM tbl15_asignar_asignatura_a_grado WHERE (cuenta = '$cuenta_actual') AND (cod_caja_virtual = '$cod_caja_virtual')";
$consulta_info_factura_cero = mysqli_query($conectar, $datos_info_factura_cero) or die(mysqli_error($conectar));
$existe_factura_abierta_cero = mysqli_num_rows($consulta_info_factura_cero);

if ($existe_factura_abierta_cero == 0) {
$borrar_sql = sprintf("DELETE FROM tbl15_info_asignar_asignatura_a_grado WHERE (cod_info_asignar_asignatura_a_grado = '$cod_info_asignar_asignatura_a_grado') AND (nombre_estado_factura = 'ABIERTA')");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
}
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>?cod_info_asignar_asignatura_a_grado=<?php echo $cod_info_asignar_asignatura_a_grado ?>&cuenta=<?php echo $cuenta_actual ?>&cod_caja_virtual=<?php echo $cod_caja_virtual ?>">
<?php } ?>


<?php
if ($tipo == 'eliminar' && $tab == 'tbl15_info_asignar_asignatura_a_grado') {
$llave                                          = intval($_GET['llave']);
$cuenta_actual                                  = addslashes($_GET['cuenta']);
$cod_caja_virtual                               = intval($_GET['cod_caja_virtual']);
$cod_info_asignar_asignatura_a_grado            = intval($_GET['cod_info_asignar_asignatura_a_grado']);

$borrar_sql = sprintf("DELETE FROM tbl15_info_asignar_asignatura_a_grado WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));

$borrar_sql = sprintf("DELETE FROM tbl15_asignar_asignatura_a_grado WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>?cod_info_asignar_asignatura_a_grado=<?php echo $cod_info_asignar_asignatura_a_grado ?>&cuenta=<?php echo $cuenta_actual ?>&cod_caja_virtual=<?php echo $cod_caja_virtual ?>">
<?php } ?>


<?php
if ($tipo == 'eliminar' && $tab == 'tbl15_asignar_grupo_a_grado') {
$llave                                          = intval($_GET['llave']);
$cuenta_actual                                  = addslashes($_GET['cuenta']);
$cod_caja_virtual                               = intval($_GET['cod_caja_virtual']);
$cod_asignar_grupo_a_grado                      = intval($_GET['cod_asignar_grupo_a_grado']);

$borrar_sql = sprintf("DELETE FROM tbl15_asignar_grupo_a_grado WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>?cod_asignar_grupo_a_grado=<?php echo $cod_asignar_grupo_a_grado ?>&cuenta=<?php echo $cuenta_actual ?>&cod_caja_virtual=<?php echo $cod_caja_virtual ?>">
<?php } ?>


<?php
if ($tipo == 'eliminar' && $tab == 'tbl15_info_asignar_alumno_a_grupo') {
$llave                                          = intval($_GET['llave']);
$cuenta_actual                                  = addslashes($_GET['cuenta']);
$cod_caja_virtual                               = intval($_GET['cod_caja_virtual']);

$borrar_sql = sprintf("DELETE FROM tbl15_info_asignar_alumno_a_grupo WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));

$borrar_sql = sprintf("DELETE FROM tbl15_asignar_alumno_a_grupo WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>?cod_info_asignar_alumno_a_grupo=<?php echo $llave ?>&cuenta=<?php echo $cuenta_actual ?>&cod_caja_virtual=<?php echo $cod_caja_virtual ?>">
<?php } ?>


<?php
if ($tipo == 'eliminar' && $tab == 'tbl15_info_asignar_grupo_a_grado') {
$llave                                          = intval($_GET['llave']);
$cuenta_actual                                  = addslashes($_GET['cuenta']);
$cod_caja_virtual                               = intval($_GET['cod_caja_virtual']);

$borrar_sql = sprintf("DELETE FROM tbl15_info_asignar_grupo_a_grado WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));

$borrar_sql = sprintf("DELETE FROM tbl15_asignar_grupo_a_grado WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>?cod_info_asignar_grupo_a_grado=<?php echo $llave ?>&cuenta=<?php echo $cuenta_actual ?>&cod_caja_virtual=<?php echo $cod_caja_virtual ?>">
<?php } ?>


<?php
if ($tipo == 'eliminar' && $tab == 'tbl15_info_asignar_alumno_a_grupo') {
$llave                                          = intval($_GET['llave']);
$cuenta_actual                                  = addslashes($_GET['cuenta']);
$cod_caja_virtual                               = intval($_GET['cod_caja_virtual']);

$borrar_sql = sprintf("DELETE FROM tbl15_info_asignar_alumno_a_grupo WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));

$borrar_sql = sprintf("DELETE FROM tbl15_asignar_alumno_a_grupo WHERE $campo = '$llave'");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>?cod_info_asignar_alumno_a_grupo=<?php echo $llave ?>&cuenta=<?php echo $cuenta_actual ?>&cod_caja_virtual=<?php echo $cod_caja_virtual ?>">
<?php } ?>