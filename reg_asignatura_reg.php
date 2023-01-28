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

if (isset($_POST['identificacion_asignatura']) <> '') { $identificacion_asignatura = mysqli_real_escape_string($conectar, ($_POST['identificacion_asignatura'])); } else { $identificacion_asignatura = ''; }

$obtener_entidad = "SELECT identificacion_asignatura FROM tbl15_asignatura WHERE identificacion_asignatura = '".($identificacion_asignatura)."'";
$consultar_entidad = mysqli_query($conectar, $obtener_entidad) or die(mysqli_error($conectar));
$existe_producto = mysqli_num_rows(@$consultar_entidad);
$info_entidad = mysqli_fetch_assoc($consultar_entidad);

if($existe_producto > 0) 	{
echo '<img src="../imagenes/advertencia.gif"><h4>LA ASIGNATURA '. $identificacion_asignatura.' YA ESTA REGISTRADA</h4></div>';
?>
<META HTTP-EQUIV="REFRESH" CONTENT="1; <?php echo $pagina_else ?>">
<!-- ***************************************************************************************************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
} else {
if (isset($_POST['identificacion_asignatura']) <> '') { $identificacion_asignatura = mysqli_real_escape_string($conectar, ($_POST['identificacion_asignatura'])); } else { $identificacion_asignatura = ''; }
if (isset($_POST['nombre_asignatura']) <> '') { $nombre_asignatura = mysqli_real_escape_string($conectar, ($_POST['nombre_asignatura'])); } else { $nombre_asignatura = ''; }
if (isset($_POST['cod_tipo_asignatura']) <> '') { $cod_tipo_asignatura = mysqli_real_escape_string($conectar, ($_POST['cod_tipo_asignatura'])); } else { $cod_tipo_asignatura = ''; }
if (isset($_POST['cod_estado']) <> '') { $cod_estado = mysqli_real_escape_string($conectar, ($_POST['cod_estado'])); } else { $cod_estado = '1'; }

$agreg = "INSERT INTO tbl15_asignatura (identificacion_asignatura, nombre_asignatura, cod_tipo_asignatura, cod_estado) VALUES ('$identificacion_asignatura', '$nombre_asignatura', '$cod_tipo_asignatura', '$cod_estado')";
$resultado_sql1 = mysqli_query($conectar, $agreg) or die(mysqli_error($conectar));
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; ../admin/lista_asignatura.php">
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