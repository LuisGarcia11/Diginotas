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
if (($campo=='cod_director_grupo') && ($tipo_ajax=='tbl15_info_asignar_alumno_a_grupo')) {
$cod_director_grupo                    = intval($_POST['valor']);
$cod_info_asignar_alumno_a_grupo       = intval($_POST['id']);

$data_sql = ("UPDATE tbl15_info_asignar_alumno_a_grupo SET cod_director_grupo = '$cod_director_grupo' WHERE cod_info_asignar_alumno_a_grupo = '$cod_info_asignar_alumno_a_grupo'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if ( mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}

// ------------------------------------------------------------------------------------------------- //
if (($campo=='cod_tipo_jornada') && ($tipo_ajax=='tbl15_info_asignar_alumno_a_grupo')) {
$cod_tipo_jornada                      = intval($_POST['valor']);
$cod_info_asignar_alumno_a_grupo       = intval($_POST['id']);

$data_sql = ("UPDATE tbl15_info_asignar_alumno_a_grupo SET cod_tipo_jornada = '$cod_tipo_jornada' WHERE cod_info_asignar_alumno_a_grupo = '$cod_info_asignar_alumno_a_grupo'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if ( mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}
?>