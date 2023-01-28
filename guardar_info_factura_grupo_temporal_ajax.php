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
if (($campo=='cod_asignatura') && ($tipo_ajax=='tbl15_info_grupo_alumno')) {
$cod_asignatura                      = intval($_POST['valor']);
$cod_info_grupo_alumno             = intval($_POST['id']);

$data_sql = ("UPDATE tbl15_info_grupo_alumno SET cod_asignatura = '$cod_asignatura' WHERE cod_info_grupo_alumno = '$cod_info_grupo_alumno'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if ( mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}
// ------------------------------------------------------------------------------------------------- //
if (($campo=='cod_docente') && ($tipo_ajax=='tbl15_info_grupo_alumno')) {
$cod_docente                      = intval($_POST['valor']);
$cod_info_grupo_alumno             = intval($_POST['id']);

$data_sql = ("UPDATE tbl15_info_grupo_alumno SET cod_docente = '$cod_docente' WHERE cod_info_grupo_alumno = '$cod_info_grupo_alumno'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if ( mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}
// ------------------------------------------------------------------------------------------------- //
if (($campo=='ini_hora') && ($tipo_ajax=='tbl15_info_grupo_alumno')) {
$ini_hora                          = addslashes($_POST['valor']);
$cod_info_grupo_alumno             = intval($_POST['id']);

$data_sql = ("UPDATE tbl15_info_grupo_alumno SET ini_hora = '$ini_hora' WHERE cod_info_grupo_alumno = '$cod_info_grupo_alumno'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if ( mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}
?>