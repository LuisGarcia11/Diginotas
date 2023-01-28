<?php $serguridad_pagina = 1; ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<?php include_once('../admin/01_modulo_diseno_superior.php'); ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
<?php include_once('../admin/02_modulo_estilo_css.php'); ?>
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
</head>
<body id="pageBody">
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php include_once('../seguridad/seguridad_diseno_plantillas.php'); ?>
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php //$pagina = addslashes($_GET['pagina']); ?>
<div id="contentOuterSeparator"></div>
<div class="container">
<div class="divPanel page-content">

<div class="breadcrumbs"><a href="#">Guardando...</a> <img src="../imagenes/popup_ajax_loader.gif" class="img-polaroid" alt=""></div>

<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
include("../admin/class_php/class.upload.php");

$pagina_else = addslashes($_POST['pagina']);

if ((isset($_POST["insersion"])) && ($_POST["insersion"] == "formulario_de_insersion")) {

if (isset($_POST['identificacion_alumno']) <> '') { $identificacion_alumno = mysqli_real_escape_string($conectar, ($_POST['identificacion_alumno'])); } else { $identificacion_alumno = ''; }

$obtener_entidad = "SELECT nombre1_alumno FROM tbl15_alumno WHERE identificacion_alumno = '".($identificacion_alumno)."'";
$consultar_entidad = mysqli_query($conectar, $obtener_entidad) or die(mysqli_error($conectar));
$existe_producto = mysqli_num_rows(@$consultar_entidad);
$info_entidad = mysqli_fetch_assoc($consultar_entidad);

if($existe_producto > 0) 	{
echo '<img src="../imagenes/advertencia.gif"><h4>EL CODIGO '. $identificacion_alumno.' YA ESTA REGISTRADO</h4></div>';
?>
<META HTTP-EQUIV="REFRESH" CONTENT="1; <?php echo $pagina_else ?>">
<!-- ***************************************************************************************************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
} else {

if (isset($_POST['nombre_tipo_identificacion']) <> '') { $nombre_tipo_identificacion = mysqli_real_escape_string($conectar, ($_POST['nombre_tipo_identificacion'])); } else { $nombre_tipo_identificacion = ''; }
if (isset($_POST['nombre1_alumno']) <> '') { $nombre1_alumno = mysqli_real_escape_string($conectar, ($_POST['nombre1_alumno'])); } else { $nombre1_alumno = ''; }
if (isset($_POST['nombre2_alumno']) <> '') { $nombre2_alumno = mysqli_real_escape_string($conectar, ($_POST['nombre2_alumno'])); } else { $nombre2_alumno = ''; }
if (isset($_POST['apellido1_alumno']) <> '') { $apellido1_alumno = mysqli_real_escape_string($conectar, ($_POST['apellido1_alumno'])); } else { $apellido1_alumno = ''; }
if (isset($_POST['apellido2_alumno']) <> '') { $apellido2_alumno = mysqli_real_escape_string($conectar, ($_POST['apellido2_alumno'])); } else { $apellido2_alumno = ''; }
if (isset($_POST['fecha_nac_alumno']) <> '') { $fecha_nac_alumno = mysqli_real_escape_string($conectar, ($_POST['fecha_nac_alumno'])); } else { $fecha_nac_alumno = ''; }
if (isset($_POST['direccion_alumno']) <> '') { $direccion_alumno = mysqli_real_escape_string($conectar, ($_POST['direccion_alumno'])); } else { $direccion_alumno = ''; }
if (isset($_POST['telefono1_alumno']) <> '') { $telefono1_alumno = mysqli_real_escape_string($conectar, ($_POST['telefono1_alumno'])); } else { $telefono1_alumno = ''; }
if (isset($_POST['cod_tipo_jornada']) <> '') { $cod_tipo_jornada = mysqli_real_escape_string($conectar, ($_POST['cod_tipo_jornada'])); } else { $cod_tipo_jornada = ''; }
if (isset($_POST['correo_alumno']) <> '') { $correo_alumno = mysqli_real_escape_string($conectar, ($_POST['correo_alumno'])); } else { $correo_alumno = ''; }
if (isset($_POST['cod_sexo']) <> '') { $cod_sexo = mysqli_real_escape_string($conectar, ($_POST['cod_sexo'])); } else { $cod_sexo = ''; }
if (isset($_POST['nombre_acudiente_alumno']) <> '') { $nombre_acudiente_alumno = mysqli_real_escape_string($conectar, ($_POST['nombre_acudiente_alumno'])); } else { $nombre_acudiente_alumno = ''; }
if (isset($_POST['telefono_acudiente_alumno']) <> '') { $telefono_acudiente_alumno = mysqli_real_escape_string($conectar, ($_POST['telefono_acudiente_alumno'])); } else { $telefono_acudiente_alumno = ''; }
if (isset($_FILES['url_img1']) <> '') { $url_img1 = $_FILES['url_img1']['name']; } else { $url_img1 = ''; }

$creador                         = $cuenta_actual;
$fecha_compra                    = date("Y-m-d");
$fecha_creacion                  = date("Y-m-d H:i:s");
$fecha_hora                      = date("H:i:s");
$time                            = time();
$fecha_ymdHis                    = date("YmdHis");
$formato                         = 'jpg';
$fecha_hora                      = date("H:i:s");
$fecha_ymd                       = date("Y-m-d");
$ruta_archivo_adjunto_orig       = '../archivador/documentos/';

$sql_autoincremento_sesion = "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$base_datos' AND TABLE_NAME = 'tbl15_alumno'";
$exec_autoincremento_sesion = mysqli_query($conectar, $sql_autoincremento_sesion) or die(mysqli_error($conectar));
$datos_autoincremento_sesion = mysqli_fetch_assoc($exec_autoincremento_sesion);

$cod_alumno                      = $datos_autoincremento_sesion['AUTO_INCREMENT'];

$agreg = "INSERT INTO tbl15_alumno (identificacion_alumno, nombre_tipo_identificacion, nombre1_alumno, nombre2_alumno, 
apellido1_alumno, apellido2_alumno, fecha_nac_alumno, direccion_alumno, telefono1_alumno, cod_tipo_jornada, correo_alumno, cod_sexo, 
nombre_acudiente_alumno, telefono_acudiente_alumno, cod_estado) 
VALUES ('$identificacion_alumno', '$nombre_tipo_identificacion', UPPER('$nombre1_alumno'), UPPER('$nombre2_alumno'), 
UPPER('$apellido1_alumno'), UPPER('$apellido2_alumno'), '$fecha_nac_alumno', UPPER('$direccion_alumno'), '$telefono1_alumno', '$cod_tipo_jornada', '$correo_alumno', '$cod_sexo', 
UPPER('$nombre_acudiente_alumno'), '$telefono_acudiente_alumno', '1')";
$resultado_sql1 = mysqli_query($conectar, $agreg) or die(mysqli_error($conectar));
/* ----------------------------------------------------------------------------------------------------------/ */
$ruta_firma_miniatura            = '../archivador/firma/miniatura/';
$ruta_foto_miniatura             = '../archivador/foto/miniatura/';
$ruta_firma_orig                 = '../archivador/firma/original/';
$ruta_foto_orig                  = '../archivador/foto/original/';
/* ----------------------------------------------------------------------------------------------------------/ */
/* ----------------------------------------------------------------------------------------------------------/ */
if ($url_img1 <> '') { 

$formato_img2                    = explode(".", $url_img1);
$formato_img2                    = end($formato_img2);
$formato_orig2                   = strtolower($formato_img2);
$nombre_foto_cryp                = crc32($url_img1);
$nombre_normal2                  = $fecha_ymdHis.'_'.$cod_alumno.'_'.$identificacion_alumno.'_ori'.'.'.$formato_orig2;
$url_img_alumno_orig             = $ruta_foto_orig.$nombre_normal2;

copy($_FILES['url_img1']['tmp_name'], $url_img_alumno_orig);
/* ----------------------------------------------------------------------------------------------------------/ */
$imagen_foto_miniatura                              = new upload($_FILES['url_img1']);
if ($imagen_foto_miniatura->uploaded) {
$imagen_foto_miniatura->image_resize                = true; // default is true
$imagen_foto_miniatura->image_convert               = $formato;
$imagen_foto_miniatura->image_x                     = 200; // para el ancho a cortar
$imagen_foto_miniatura->image_ratio_y               = true; // para que se ajuste dependiendo del ancho definido
$imagen_foto_miniatura->file_new_name_body          = $fecha_ymdHis.'_'.$cod_alumno.'_'.$identificacion_alumno.'_min'; // agregamos un nuevo nombre
$imagen_foto_miniatura->process($ruta_foto_miniatura);

$nombre_miniatura = $fecha_ymdHis.'_'.$cod_alumno.'_'.$identificacion_alumno.'_min'.'.'.$formato;
$url_img_alumno_min = $ruta_foto_miniatura.$nombre_miniatura;

$sql_data = sprintf("UPDATE tbl15_alumno SET url_img_alumno_orig = '$url_img_alumno_orig', url_img_alumno_min = '$url_img_alumno_min' WHERE cod_alumno = '$cod_alumno'");
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));
} else { echo 'error : ' . $imagen_foto_miniatura->error; }
/* ----------------------------------------------------------------------------------------------------------/ */
}
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; ../admin/lista_alumno.php">
<?php } } ?>
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* FIN MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
</div>
<!--End Main Content Area-->
</div>
<div id="footerInnerSeparator"></div>
</div>
</div>
<!-- 1******************************************************* MODULO FOOTER *********************************************** -->
<?php include_once('../admin/04_modulo_footer.php'); ?>
<!-- 1******************************************************* MODULO FOOTER *********************************************** -->
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->
<?php include_once('../admin/05_modulo_js.php'); ?>
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->
</body>
</html>