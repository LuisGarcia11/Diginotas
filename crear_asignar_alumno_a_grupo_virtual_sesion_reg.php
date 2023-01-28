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
$cuenta_actual                      = DAXCRYPTOR::descriptardax($_SESSION['usuario_cryp']);
$nombres_des                        = DAXCRYPTOR::descriptardax($_SESSION['nombres_cryp']);
$apellidos_des                      = DAXCRYPTOR::descriptardax($_SESSION['apellidos_cryp']);
$nombre_sexo_des                    = DAXCRYPTOR::descriptardax($_SESSION['nombre_sexo_cryp']);
$url_img_firma_sesion               = ($_SESSION['url_img_firma_sesion']);
$url_img_foto_sesion                = ($_SESSION['url_img_foto_sesion']);
$tipo_dispositivo                   = ($_SESSION['tipo_dispositivo']);
$cod_cliente_sesion                 = ($_SESSION['cod_cliente_sesion']);
$cod_administrador                  = ($_SESSION['cod_administrador']);
$cuenta                             = ($cuenta_actual);

if (isset($_REQUEST["cod_caja_virtual"])) {
$cod_asignar_grupo_a_grado                = intval($_REQUEST['cod_asignar_grupo_a_grado']);
$nombre_grupo                             = addslashes($_REQUEST['nombre_grupo']);
$cod_caja_virtual                         = intval($_REQUEST['cod_caja_virtual']);
$pagina                                   = addslashes($_REQUEST['pagina']);
$nombre_estado_factura                    = 'ABIERTA';
$cod_estado_ocupado                       = '1';


$sql_info_grup_grad = "SELECT * FROM tbl15_asignar_grupo_a_grado WHERE (cod_asignar_grupo_a_grado = '$cod_asignar_grupo_a_grado')";
$consulta_info_grup_grad = mysqli_query($conectar, $sql_info_grup_grad) or die(mysqli_error($conectar));
$data_info_grup_grad = mysqli_fetch_assoc($consulta_info_grup_grad);

$cod_info_asignar_grupo_a_grado          = $data_info_grup_grad['cod_info_asignar_grupo_a_grado'];
$cod_grado                               = $data_info_grup_grad['cod_grado'];
$nombre_grado                            = $data_info_grup_grad['nombre_grado'];
$nombre_grado_letra                      = $data_info_grup_grad['nombre_grado_letra'];
$und_grupo                               = $data_info_grup_grad['und_grupo'];
$cod_grupo                               = $data_info_grup_grad['cod_grupo'];
$nombre_grupo                            = $data_info_grup_grad['nombre_grupo'];

$datos_info = "SELECT * FROM tbl15_info_asignar_grupo_a_grado WHERE (cod_info_asignar_grupo_a_grado = '$cod_info_asignar_grupo_a_grado')";
$consulta_info = mysqli_query($conectar, $datos_info) or die(mysqli_error($conectar));
$data_info = mysqli_fetch_assoc($consulta_info);

$anyo                                    = $data_info['anyo'];
$cod_docente                             = $data_info['cod_docente'];
$cod_director_grupo                      = $data_info['cod_director_grupo'];
$cod_tipo_jornada                        = $data_info['cod_tipo_jornada'];

$sql_autoincremento_info_factura = "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$base_datos' AND TABLE_NAME = 'tbl15_info_asignar_alumno_a_grupo'";
$exec_autoincremento_info_factura = mysqli_query($conectar, $sql_autoincremento_info_factura) or die(mysqli_error($conectar));
$datos_autoincremento_info_factura = mysqli_fetch_assoc($exec_autoincremento_info_factura);

$cod_info_asignar_alumno_a_grupo             = $datos_autoincremento_info_factura['AUTO_INCREMENT'];
//---------------------------------------------------------------------------------------------------------------------------------------------//
$sql_data = "INSERT INTO tbl15_info_asignar_alumno_a_grupo (cod_info_asignar_alumno_a_grupo, cod_info_asignar_grupo_a_grado, cod_grado, nombre_grado, nombre_grado_letra, cod_grupo, nombre_grupo, 
anyo, cuenta, cod_administrador, cod_caja_virtual, nombre_estado_factura) 
VALUES ('$cod_info_asignar_alumno_a_grupo', '$cod_info_asignar_grupo_a_grado', '$cod_grado', '$nombre_grado', '$nombre_grado_letra', '$cod_grupo', '$nombre_grupo', 
'$anyo', '$cuenta', '$cod_administrador', '$cod_caja_virtual', '$nombre_estado_factura')";
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));

$_SESSION['cod_grado']            = $cod_grado;
$_SESSION['cod_caja_virtual']     = $cod_caja_virtual;
?>
<!--  -->
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina ?>">
<?php } ?>