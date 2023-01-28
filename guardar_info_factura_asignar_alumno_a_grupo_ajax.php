<?php
include_once('../conexiones/conexione.php'); 
include_once('../admin/class_php/funcion_cryptor_descryptor_class.php');
include_once('../evitar_mensaje_error/error.php');
date_default_timezone_set("America/Bogota");
include ("../session/funciones_admin.php");
if (verificar_usuario()){
//print "Bienvenido (a), <strong>".$_SESSION['usuario'].", </strong>al sistema.";
    } else { header("Location:../index.php");
}
$cuenta_actual                      = DAXCRYPTOR::descriptardax($_SESSION['usuario_cryp']);
$cuenta                             = $_SESSION['usuario'];
$cod_administrador_sesion           = $_SESSION['cod_administrador'];
$tipo_ajax                          = addslashes($_POST['tipo_ajax']);
$campo                              = addslashes($_POST['campo']);
// ------------------------------------------------------------------------------------------------- //
$retorno_array                      = array();
$retorno_array2                     = array();
$codigoHTML_menu                    = '';
$codigoHTML_menu_total_reg          = '';
// ------------------------------------------------------------------------------------------------- //
$sql_infos_empresas = "SELECT * FROM tbl15_info_empresa WHERE cod_info_empresa = '1'";
$resultado_infos_empresas = mysqli_query($conectar, $sql_infos_empresas);
$info_empresa_data = mysqli_fetch_assoc($resultado_infos_empresas);

$cod_estado_bascula_balanza_electronica_pesar_producto_global      = $info_empresa_data['cod_estado_bascula_balanza_electronica_pesar_producto_global'];
$cod_estado_bascula_balanza_cod_barras_pesar_producto_global       = $info_empresa_data['cod_estado_bascula_balanza_cod_barras_pesar_producto_global'];
// ------------------------------------------------------------------------------------------------- //
$datos_info = "SELECT * FROM tbl15_info_factura_venta WHERE (cod_estado_factura = '1') AND (cuenta = '$cuenta_actual')";
$consulta_info = mysqli_query($conectar, $datos_info) or die(mysqli_error($conectar));
$info = mysqli_fetch_assoc($consulta_info);
$factura_ocupada = mysqli_num_rows($consulta_info);
// ------------------------------------------------------------------------------------------------- //
$sql_infos_empresas = "SELECT * FROM tbl15_info_empresa WHERE cod_info_empresa = '1'";
$resultado_infos_empresas = mysqli_query($conectar, $sql_infos_empresas);
$info_empresa_data = mysqli_fetch_assoc($resultado_infos_empresas);

$cod_estado_modificar_und_venta_una_sola_vez_global                = $info_empresa_data['cod_estado_modificar_und_venta_una_sola_vez_global'];
// ------------------------------------------------------------------------------------------------- //
// ------------------------------------------------------------------------------------------------- //
// ------------------------------------------------------------------------------------------------- //
// ------------------------------------------------------------------------------------------------- //
// ------------------------------------------------------------------------------------------------- //
if (($campo=='nota_periodo1') && ($tipo_ajax=='tbl15_asignar_alumno_a_grupo')) {
$nota_periodo1                = addslashes($_POST['valor']);
$cod_asignar_alumno_a_grupo   = intval($_POST['id']);
$nombre_campo_incre           = addslashes($_POST['nombre_campo_incre']);
$frag_incre                   = explode("nota_periodo1", $nombre_campo_incre);
$incre                        = $frag_incre[1];

$data_sql = ("UPDATE tbl15_asignar_alumno_a_grupo SET nota_periodo1 = '$nota_periodo1' WHERE cod_asignar_alumno_a_grupo = '$cod_asignar_alumno_a_grupo'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

$sql_nota_asig_alumno = "SELECT * FROM tbl15_asignar_alumno_a_grupo WHERE (cod_asignar_alumno_a_grupo = '$cod_asignar_alumno_a_grupo')";
$consulta_nota_asig_alumno = mysqli_query($conectar, $sql_nota_asig_alumno) or die(mysqli_error($conectar));
$info_nota_asig_alumno = mysqli_fetch_assoc($consulta_nota_asig_alumno);

$nota_periodo1                = $info_nota_asig_alumno['nota_periodo1'];
$nota_periodo2                = $info_nota_asig_alumno['nota_periodo2'];
$nota_periodo3                = $info_nota_asig_alumno['nota_periodo3'];
$nota_periodo4                = $info_nota_asig_alumno['nota_periodo4'];

$nota_final = ($nota_periodo1 + $nota_periodo2 + $nota_periodo3 + $nota_periodo4) / 4;

if ( mysqli_affected_rows($conectar) > 0) { $resulatdo_afectado = "AFECTADO SI"; } else { $resulatdo_afectado = "AFECTADO NO"; }

header('Content-Type: application/json'); 
$datos_array['und_venta'] = "".$nota_periodo1;
$datos_array['total_venta'] = number_format($nota_periodo1, 0, ",", ".");
$datos_array['incre'] = $incre;
$datos_array['div_und_caja_sobre'] = 'und_caja_sobre'.$nota_periodo1;
$datos_array['total_venta_producto'] = number_format($nota_periodo1, 0, ",", ".");
$datos_array['ok_ajax'] = $resulatdo_afectado;
$datos_array['nota_final'] = $nota_final;

echo json_encode($datos_array); 
}
// ------------------------------------------------------------------------------------------------- //
if (($campo=='nota_periodo2') && ($tipo_ajax=='tbl15_asignar_alumno_a_grupo')) {
$nota_periodo2                = addslashes($_POST['valor']);
$cod_asignar_alumno_a_grupo   = intval($_POST['id']);
$nombre_campo_incre           = addslashes($_POST['nombre_campo_incre']);
$frag_incre                   = explode("nota_periodo2", $nombre_campo_incre);
$incre                        = $frag_incre[1];

$data_sql = ("UPDATE tbl15_asignar_alumno_a_grupo SET nota_periodo2 = '$nota_periodo2' WHERE cod_asignar_alumno_a_grupo = '$cod_asignar_alumno_a_grupo'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

$sql_nota_asig_alumno = "SELECT * FROM tbl15_asignar_alumno_a_grupo WHERE (cod_asignar_alumno_a_grupo = '$cod_asignar_alumno_a_grupo')";
$consulta_nota_asig_alumno = mysqli_query($conectar, $sql_nota_asig_alumno) or die(mysqli_error($conectar));
$info_nota_asig_alumno = mysqli_fetch_assoc($consulta_nota_asig_alumno);

$nota_periodo1                = $info_nota_asig_alumno['nota_periodo1'];
$nota_periodo2                = $info_nota_asig_alumno['nota_periodo2'];
$nota_periodo3                = $info_nota_asig_alumno['nota_periodo3'];
$nota_periodo4                = $info_nota_asig_alumno['nota_periodo4'];

$nota_final = ($nota_periodo1 + $nota_periodo2 + $nota_periodo3 + $nota_periodo4) / 4;

if ( mysqli_affected_rows($conectar) > 0) { $resulatdo_afectado = "AFECTADO SI"; } else { $resulatdo_afectado = "AFECTADO NO"; }

header('Content-Type: application/json'); 
$datos_array['und_venta'] = "".$nota_periodo2;
$datos_array['total_venta'] = number_format($nota_periodo2, 0, ",", ".");
$datos_array['incre'] = $incre;
$datos_array['div_und_caja_sobre'] = 'und_caja_sobre'.$nota_periodo2;
$datos_array['total_venta_producto'] = number_format($nota_periodo2, 0, ",", ".");
$datos_array['ok_ajax'] = $resulatdo_afectado;
$datos_array['nota_final'] = $nota_final;


echo json_encode($datos_array); 
}
// ------------------------------------------------------------------------------------------------- //
if (($campo=='nota_periodo3') && ($tipo_ajax=='tbl15_asignar_alumno_a_grupo')) {
$nota_periodo3                = addslashes($_POST['valor']);
$cod_asignar_alumno_a_grupo   = intval($_POST['id']);
$nombre_campo_incre           = addslashes($_POST['nombre_campo_incre']);
$frag_incre                   = explode("nota_periodo3", $nombre_campo_incre);
$incre                        = $frag_incre[1];

$data_sql = ("UPDATE tbl15_asignar_alumno_a_grupo SET nota_periodo3 = '$nota_periodo3' WHERE cod_asignar_alumno_a_grupo = '$cod_asignar_alumno_a_grupo'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

$sql_nota_asig_alumno = "SELECT * FROM tbl15_asignar_alumno_a_grupo WHERE (cod_asignar_alumno_a_grupo = '$cod_asignar_alumno_a_grupo')";
$consulta_nota_asig_alumno = mysqli_query($conectar, $sql_nota_asig_alumno) or die(mysqli_error($conectar));
$info_nota_asig_alumno = mysqli_fetch_assoc($consulta_nota_asig_alumno);

$nota_periodo1                = $info_nota_asig_alumno['nota_periodo1'];
$nota_periodo2                = $info_nota_asig_alumno['nota_periodo2'];
$nota_periodo3                = $info_nota_asig_alumno['nota_periodo3'];
$nota_periodo4                = $info_nota_asig_alumno['nota_periodo4'];

$nota_final = ($nota_periodo1 + $nota_periodo2 + $nota_periodo3 + $nota_periodo4) / 4;

if ( mysqli_affected_rows($conectar) > 0) { $resulatdo_afectado = "AFECTADO SI"; } else { $resulatdo_afectado = "AFECTADO NO"; }

header('Content-Type: application/json'); 
$datos_array['und_venta'] = "".$nota_periodo3;
$datos_array['total_venta'] = number_format($nota_periodo3, 0, ",", ".");
$datos_array['incre'] = $incre;
$datos_array['div_und_caja_sobre'] = 'und_caja_sobre'.$nota_periodo3;
$datos_array['total_venta_producto'] = number_format($nota_periodo3, 0, ",", ".");
$datos_array['ok_ajax'] = $resulatdo_afectado;
$datos_array['nota_final'] = $nota_final;


echo json_encode($datos_array); 
}
// ------------------------------------------------------------------------------------------------- //
if (($campo=='nota_periodo4') && ($tipo_ajax=='tbl15_asignar_alumno_a_grupo')) {
$nota_periodo4                = addslashes($_POST['valor']);
$cod_asignar_alumno_a_grupo   = intval($_POST['id']);
$nombre_campo_incre           = addslashes($_POST['nombre_campo_incre']);
$frag_incre                   = explode("nota_periodo4", $nombre_campo_incre);
$incre                        = $frag_incre[1];

$data_sql = ("UPDATE tbl15_asignar_alumno_a_grupo SET nota_periodo4 = '$nota_periodo4' WHERE cod_asignar_alumno_a_grupo = '$cod_asignar_alumno_a_grupo'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

$sql_nota_asig_alumno = "SELECT * FROM tbl15_asignar_alumno_a_grupo WHERE (cod_asignar_alumno_a_grupo = '$cod_asignar_alumno_a_grupo')";
$consulta_nota_asig_alumno = mysqli_query($conectar, $sql_nota_asig_alumno) or die(mysqli_error($conectar));
$info_nota_asig_alumno = mysqli_fetch_assoc($consulta_nota_asig_alumno);

$nota_periodo1                = $info_nota_asig_alumno['nota_periodo1'];
$nota_periodo2                = $info_nota_asig_alumno['nota_periodo2'];
$nota_periodo3                = $info_nota_asig_alumno['nota_periodo3'];
$nota_periodo4                = $info_nota_asig_alumno['nota_periodo4'];

$nota_final = ($nota_periodo1 + $nota_periodo2 + $nota_periodo3 + $nota_periodo4) / 4;

if ( mysqli_affected_rows($conectar) > 0) { $resulatdo_afectado = "AFECTADO SI"; } else { $resulatdo_afectado = "AFECTADO NO"; }

header('Content-Type: application/json'); 
$datos_array['und_venta'] = "".$nota_periodo4;
$datos_array['total_venta'] = number_format($nota_periodo4, 0, ",", ".");
$datos_array['incre'] = $incre;
$datos_array['div_und_caja_sobre'] = 'und_caja_sobre'.$nota_periodo4;
$datos_array['total_venta_producto'] = number_format($nota_periodo4, 0, ",", ".");
$datos_array['ok_ajax'] = $resulatdo_afectado;
$datos_array['nota_final'] = $nota_final;


echo json_encode($datos_array); 
}
// ------------------------------------------------------------------------------------------------- //
if (($campo=='falla_alumno') && ($tipo_ajax=='tbl15_asignar_alumno_a_grupo')) {
$falla_alumno                 = addslashes($_POST['valor']);
$cod_asignar_alumno_a_grupo   = intval($_POST['id']);

$data_sql = ("UPDATE tbl15_asignar_alumno_a_grupo SET falla_alumno = '$falla_alumno' WHERE cod_asignar_alumno_a_grupo = '$cod_asignar_alumno_a_grupo'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if ( mysqli_affected_rows($conectar) > 0) { $resulatdo_afectado = "AFECTADO SI"; } else { $resulatdo_afectado = "AFECTADO NO"; }

header('Content-Type: application/json'); 
$datos_array['und_venta'] = "".$falla_alumno;
$datos_array['total_venta'] = number_format($falla_alumno, 0, ",", ".");
$datos_array['incre'] = $falla_alumno;
$datos_array['div_und_caja_sobre'] = 'und_caja_sobre'.$falla_alumno;
$datos_array['total_venta_producto'] = number_format($falla_alumno, 0, ",", ".");
$datos_array['ok_ajax'] = $resulatdo_afectado;
$datos_array['nota_final'] = "";


echo json_encode($datos_array); 
}
?>