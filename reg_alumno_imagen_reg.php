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

if ((isset($_POST["insersion"])) && ($_POST["insersion"] == "formulario_de_insersion")) {

if (isset($_POST['cod_alumno']) <> '') { $cod_alumno = intval($_POST['cod_alumno']); } else { $cod_alumno = ''; }
if (isset($_FILES['url_img1']) <> '') { $url_img1 = $_FILES['url_img1']['name']; } else { $url_img1 = ''; }

$pagina_else                     = addslashes($_POST['pagina']);
$pagina                          = addslashes($_POST['pagina']);
$pagina_redirect                 = $pagina.'?cod_alumno='.$cod_alumno.'&pagina='.$pagina;
/* ----------------------------------------------------------------------------------------------------------/ */
$time                            = time();
$fecha_ymdHis                    = date("YmdHis");
$formato                         = 'jpg';
$fecha_hora                      = date("H:i:s");
$fecha_ymd                       = date("Y-m-d");
/* ----------------------------------------------------------------------------------------------------------/ */
$ruta_firma_miniatura            = '../archivador/firma/miniatura/';
$ruta_foto_miniatura             = '../archivador/foto/miniatura/';
$ruta_firma_orig                 = '../archivador/firma/original/';
$ruta_foto_orig                  = '../archivador/foto/original/';
/* ----------------------------------------------------------------------------------------------------------/ */
/* ----------------------------------------------------------------------------------------------------------/ */
$mostrar_datos_sql = "SELECT * FROM tbl15_alumno WHERE cod_alumno = '$cod_alumno'";
$consulta = mysqli_query($conectar, $mostrar_datos_sql) or die(mysqli_error($conectar));
$matriz_consulta = mysqli_fetch_assoc($consulta);

$identificacion_alumno           = $matriz_consulta['identificacion_alumno'];
$url_img_alumno_orig_db          = $matriz_consulta['url_img_alumno_orig'];
$url_img_alumno_min_db           = $matriz_consulta['url_img_alumno_min'];
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

$actualiza_alumno = sprintf("UPDATE tbl15_alumno SET url_img_alumno_orig = '$url_img_alumno_orig', url_img_alumno_min = '$url_img_alumno_min' WHERE cod_alumno = '$cod_alumno'");
$resultado_actualiza_alumno = mysqli_query($conectar, $actualiza_alumno) or die(mysqli_error($conectar));
} else { echo 'error : ' . $imagen_foto_miniatura->error; }
/* ----------------------------------------------------------------------------------------------------------/ */
}
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina_redirect ?>">
<?php } ?>
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