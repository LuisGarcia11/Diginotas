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
$cod_info_asignar_asignatura_a_grado        = intval($_POST['cod_info_asignar_asignatura_a_grado']);
$anyo                                       = intval($_POST['anyo']);
$pagina                                     = addslashes($_POST['pagina']);
$nombre_estado_factura                      = 'CERRADA';
$pagina_redirect_imprimir                   = '../admin/lista_asignar_asignatura_a_grado.php';
$fecha_creacion                             = date("Y-m-m H:i:s");
//---------------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------------------------//
//-------------------------------------- LLAVE DE INICIO DEL CONDICIONAL VENDER POR CONTADO ------------------------------------------//
if (isset($_POST['cod_info_asignar_asignatura_a_grado'])) {

$cod_caja_virtual                           = intval($_POST['cod_caja_virtual']);
$cuenta                                     = addslashes($_POST['cuenta']);

$sql_info_asignar_asignatura_a_grado = "SELECT * FROM tbl15_info_asignar_asignatura_a_grado WHERE (cuenta = '$cuenta') AND (cod_caja_virtual = '$cod_caja_virtual')";
$consulta_info_asignar_asignatura_a_grado = mysqli_query($conectar, $sql_info_asignar_asignatura_a_grado) or die(mysqli_error($conectar));
$datos_info_asignar_asignatura_a_grado = mysqli_fetch_assoc($consulta_info_asignar_asignatura_a_grado); 

$cod_grado                                  = $datos_info_asignar_asignatura_a_grado['cod_grado'];
$nombre_grado                               = $datos_info_asignar_asignatura_a_grado['nombre_grado'];
$nombre_grado_letra                         = $datos_info_asignar_asignatura_a_grado['nombre_grado_letra'];

$sql_mconsulta = "SELECT * FROM tbl15_asignar_asignatura_a_grado_temporal WHERE (cuenta = '$cuenta') AND (cod_caja_virtual = '$cod_caja_virtual')";
$mconsulta = mysqli_query($conectar, $sql_mconsulta) or die(mysqli_error($conectar));
while ($datos_temp = mysqli_fetch_assoc($mconsulta)) {

$cod_asignatura                             = $datos_temp['cod_asignatura'];
$nombre_asignatura                          = $datos_temp['nombre_asignatura'];

$agregar_reg_grupo_alumno = "INSERT INTO tbl15_asignar_asignatura_a_grado (cod_info_asignar_asignatura_a_grado, cod_grado, nombre_grado, nombre_grado_letra, cod_asignatura, nombre_asignatura, 
anyo, cuenta, cod_administrador, cod_caja_virtual, fecha_creacion)
VALUES ('$cod_info_asignar_asignatura_a_grado', '$cod_grado', '$nombre_grado', '$nombre_grado_letra', '$cod_asignatura', '$nombre_asignatura', 
'$anyo', '$cuenta', '$cod_administrador', '$cod_caja_virtual', '$fecha_creacion')";
$resultado_grupo_alumno = mysqli_query($conectar, $agregar_reg_grupo_alumno) or die(mysqli_error($conectar));
} 
//----------------------------------------------------------------------- ---------------------------------------------------------//
//----------------------------------------------------------------------- ---------------------------------------------------------//
$borrar_sql = sprintf("DELETE FROM tbl15_asignar_asignatura_a_grado_temporal WHERE (cuenta = '$cuenta') AND (cod_caja_virtual = '$cod_caja_virtual')");
$Result1 = mysqli_query($conectar, $borrar_sql) or die(mysqli_error($conectar));
//----------------------------------------------------------------------- ---------------------------------------------------------//
//----------------------------------------------------------------------- ---------------------------------------------------------//
$agregar_regis = sprintf("UPDATE tbl15_info_asignar_asignatura_a_grado SET anyo = '$anyo', nombre_estado_factura = '$nombre_estado_factura', fecha_creacion = '$fecha_creacion' 
WHERE (cuenta = '$cuenta') AND (cod_caja_virtual = '$cod_caja_virtual')");
$resultado_regis = mysqli_query($conectar, $agregar_regis) or die(mysqli_error($conectar));
//----------------------------------------------------------------------- ---------------------------------------------------------//
$url_redir = $pagina_redirect_imprimir."?cod_info_asignar_asignatura_a_grado=".$cod_info_asignar_asignatura_a_grado."&pagina=".$pagina;
header("Location: $url_redir");
}
else { 
//$url_redir = "../admin/asignar_asignatura_a_grados_valor_cancelado_demasiado_grande.php?cod_info_asignar_asignatura_a_grado=".$cod_info_asignar_asignatura_a_grado."&cod_tipo_pago=".$cod_tipo_pago."&total_precio_venta=".$total_precio_venta."&vlr_cancelado=".$vlr_cancelado."&pagina=".$pagina;
//header("Location: $url_redir");
}
//----------------------------------------------------------------------- ---------------------------------------------------------//
//----------------------------------------------------------------------- ---------------------------------------------------------//
//----------------------------------------------------------------------- ---------------------------------------------------------//
//----------------------------------------------------------------------- ---------------------------------------------------------//
?>