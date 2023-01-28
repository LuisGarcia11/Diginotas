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

if (isset($_POST['identificacion_docente']) <> '') { $identificacion_docente = mysqli_real_escape_string($conectar, ($_POST['identificacion_docente'])); } else { $identificacion_docente = ''; }

$obtener_entidad = "SELECT nombre1_docente FROM tbl15_docente WHERE identificacion_docente = '".($identificacion_docente)."'";
$consultar_entidad = mysqli_query($conectar, $obtener_entidad) or die(mysqli_error($conectar));
$existe_producto = mysqli_num_rows(@$consultar_entidad);
$info_entidad = mysqli_fetch_assoc($consultar_entidad);

if($existe_producto > 0) 	{
echo '<img src="../imagenes/advertencia.gif"><h4>EL CODIGO '. $identificacion_docente.' YA ESTA REGISTRADO</h4></div>';
?>
<META HTTP-EQUIV="REFRESH" CONTENT="1; <?php echo $pagina_else ?>">
<!-- ***************************************************************************************************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
} else {

if (isset($_POST['nombre_tipo_identificacion']) <> '') { $nombre_tipo_identificacion = mysqli_real_escape_string($conectar, ($_POST['nombre_tipo_identificacion'])); } else { $nombre_tipo_identificacion = ''; }
if (isset($_POST['nombre1_docente']) <> '') { $nombre1_docente = mysqli_real_escape_string($conectar, ($_POST['nombre1_docente'])); } else { $nombre1_docente = ''; }
if (isset($_POST['nombre2_docente']) <> '') { $nombre2_docente = mysqli_real_escape_string($conectar, ($_POST['nombre2_docente'])); } else { $nombre2_docente = ''; }
if (isset($_POST['apellido1_docente']) <> '') { $apellido1_docente = mysqli_real_escape_string($conectar, ($_POST['apellido1_docente'])); } else { $apellido1_docente = ''; }
if (isset($_POST['apellido2_docente']) <> '') { $apellido2_docente = mysqli_real_escape_string($conectar, ($_POST['apellido2_docente'])); } else { $apellido2_docente = ''; }
if (isset($_POST['fecha_nac_docente']) <> '') { $fecha_nac_docente = mysqli_real_escape_string($conectar, ($_POST['fecha_nac_docente'])); } else { $fecha_nac_docente = ''; }
if (isset($_POST['direccion_docente']) <> '') { $direccion_docente = mysqli_real_escape_string($conectar, ($_POST['direccion_docente'])); } else { $direccion_docente = ''; }
if (isset($_POST['telefono1_docente']) <> '') { $telefono1_docente = mysqli_real_escape_string($conectar, ($_POST['telefono1_docente'])); } else { $telefono1_docente = ''; }
if (isset($_POST['cod_tipo_jornada']) <> '') { $cod_tipo_jornada = mysqli_real_escape_string($conectar, ($_POST['cod_tipo_jornada'])); } else { $cod_tipo_jornada = ''; }
if (isset($_POST['correo_docente']) <> '') { $correo_docente = mysqli_real_escape_string($conectar, ($_POST['correo_docente'])); } else { $correo_docente = ''; }
if (isset($_POST['cod_sexo']) <> '') { $cod_sexo = mysqli_real_escape_string($conectar, ($_POST['cod_sexo'])); } else { $cod_sexo = ''; }
if (isset($_POST['nombre_acudiente_docente']) <> '') { $nombre_acudiente_docente = mysqli_real_escape_string($conectar, ($_POST['nombre_acudiente_docente'])); } else { $nombre_acudiente_docente = ''; }
if (isset($_POST['telefono_acudiente_docente']) <> '') { $telefono_acudiente_docente = mysqli_real_escape_string($conectar, ($_POST['telefono_acudiente_docente'])); } else { $telefono_acudiente_docente = ''; }
if (isset($_POST['cod_grupo']) <> '') { $cod_grupo = mysqli_real_escape_string($conectar, ($_POST['cod_grupo'])); } else { $cod_grupo = '1'; }


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

$sql_autoincremento_sesion = "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$base_datos' AND TABLE_NAME = 'tbl15_docente'";
$exec_autoincremento_sesion = mysqli_query($conectar, $sql_autoincremento_sesion) or die(mysqli_error($conectar));
$datos_autoincremento_sesion = mysqli_fetch_assoc($exec_autoincremento_sesion);

$cod_docente                      = $datos_autoincremento_sesion['AUTO_INCREMENT'];

$agreg = "INSERT INTO tbl15_docente (identificacion_docente, nombre_tipo_identificacion, nombre1_docente, nombre2_docente, 
apellido1_docente, apellido2_docente, fecha_nac_docente, direccion_docente, telefono1_docente, cod_tipo_jornada, correo_docente, cod_sexo, 
nombre_acudiente_docente, telefono_acudiente_docente, cod_estado, cod_grupo) 
VALUES ('$identificacion_docente', '$nombre_tipo_identificacion', UPPER('$nombre1_docente'), UPPER('$nombre2_docente'), 
UPPER('$apellido1_docente'), UPPER('$apellido2_docente'), '$fecha_nac_docente', UPPER('$direccion_docente'), '$telefono1_docente', '$cod_tipo_jornada', '$correo_docente', '$cod_sexo', 
UPPER('$nombre_acudiente_docente'), '$telefono_acudiente_docente', '1', '$cod_grupo')";
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
$nombre_normal2                  = $fecha_ymdHis.'_'.$cod_docente.'_'.$identificacion_docente.'_ori'.'.'.$formato_orig2;
$url_img_docente_orig             = $ruta_foto_orig.$nombre_normal2;

copy($_FILES['url_img1']['tmp_name'], $url_img_docente_orig);
/* ----------------------------------------------------------------------------------------------------------/ */
$imagen_foto_miniatura                              = new upload($_FILES['url_img1']);
if ($imagen_foto_miniatura->uploaded) {
$imagen_foto_miniatura->image_resize                = true; // default is true
$imagen_foto_miniatura->image_convert               = $formato;
$imagen_foto_miniatura->image_x                     = 200; // para el ancho a cortar
$imagen_foto_miniatura->image_ratio_y               = true; // para que se ajuste dependiendo del ancho definido
$imagen_foto_miniatura->file_new_name_body          = $fecha_ymdHis.'_'.$cod_docente.'_'.$identificacion_docente.'_min'; // agregamos un nuevo nombre
$imagen_foto_miniatura->process($ruta_foto_miniatura);

$nombre_miniatura = $fecha_ymdHis.'_'.$cod_docente.'_'.$identificacion_docente.'_min'.'.'.$formato;
$url_img_docente_min = $ruta_foto_miniatura.$nombre_miniatura;

$sql_data = sprintf("UPDATE tbl15_docente SET url_img_docente_orig = '$url_img_docente_orig', url_img_docente_min = '$url_img_docente_min' WHERE cod_docente = '$cod_docente'");
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));
} else { echo 'error : ' . $imagen_foto_miniatura->error; }
/* ----------------------------------------------------------------------------------------------------------/ */
}
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; ../admin/lista_docente.php">
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