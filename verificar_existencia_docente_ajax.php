<?php
include_once('../conexiones/conexione.php');
include_once('../admin/class_php/funcion_cryptor_descryptor_class.php');
include_once('../evitar_mensaje_error/error.php');
date_default_timezone_set("America/Bogota");
//include_once('../admin/fecha_en_espanol.php');
include_once("../session/funciones_admin.php");
//include("../tbl15_notificacion_alerta/mostrar_noficacion_alerta.php");
if (verificar_usuario()){
//print "Bienvenido (a), <strong>".$_SESSION['usuario'].", </strong>al sistema.";
  } else { header("Location:../index.php");
}
$cuenta_actual           = DAXCRYPTOR::descriptardax($_SESSION['usuario_cryp']);

$tipo_ajax                   = $_REQUEST['tipo_ajax'];
$campo                       = $_REQUEST['campo'];

if ($campo == 'identificacion_docente') {
$identificacion_docente              = addslashes($_REQUEST['identificacion_docente']);

$obtener_entidad = "SELECT * FROM tbl15_docente WHERE identificacion_docente = '".($identificacion_docente)."'";
$consultar_entidad = mysqli_query($conectar, $obtener_entidad) or die(mysqli_error($conectar));
$existe_producto = mysqli_num_rows(@$consultar_entidad);
$info_entidad = mysqli_fetch_assoc($consultar_entidad);

if($existe_producto > 0) {

$nombre1_docente                     = $info_entidad['nombre1_docente'];
$nombre2_docente                     = $info_entidad['nombre2_docente'];
$apellido1_docente                   = $info_entidad['apellido1_docente'];
$apellido2_docente                   = $info_entidad['apellido2_docente'];
$nombre_docente                      = $nombre1_docente.' '.$nombre2_docente.' '.$apellido1_docente.' '.$apellido2_docente;

echo "<img src=../imagenes/advertencia.gif>EL DOCUMENTO: ".$identificacion_docente." YA EXISTE EN EL LISTADO. (".$nombre_docente.")<img src=../imagenes/advertencia.gif>";
} else {
echo "<img src=../imagenes/corecto.png>";
}

}
?>