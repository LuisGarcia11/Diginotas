﻿<?php $serguridad_pagina = 1; ?>
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
if ((isset($_POST["ins_edit"])) && ($_POST["ins_edit"] == "formulario_insert_edit")) {

if (isset($_POST['cod_asignatura']) <> '') { $cod_asignatura = intval($_POST['cod_asignatura']); } else { $cod_asignatura = ''; }

if (isset($_POST['identificacion_asignatura']) <> '') { $identificacion_asignatura = mysqli_real_escape_string($conectar, ($_POST['identificacion_asignatura'])); } else { $identificacion_asignatura = ''; }
if (isset($_POST['nombre_asignatura']) <> '') { $nombre_asignatura = mysqli_real_escape_string($conectar, ($_POST['nombre_asignatura'])); } else { $nombre_asignatura = ''; }
if (isset($_POST['cod_tipo_asignatura']) <> '') { $cod_tipo_asignatura = mysqli_real_escape_string($conectar, ($_POST['cod_tipo_asignatura'])); } else { $cod_tipo_asignatura = ''; }
if (isset($_POST['cod_estado']) <> '') { $cod_estado = mysqli_real_escape_string($conectar, ($_POST['cod_estado'])); } else { $cod_estado = '1'; }

$sql_data = sprintf("UPDATE tbl15_asignatura SET identificacion_asignatura = '$identificacion_asignatura', nombre_asignatura = '$nombre_asignatura', 
cod_tipo_asignatura = '$cod_tipo_asignatura', cod_estado = '$cod_estado' WHERE cod_asignatura = '$cod_asignatura'");
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));

$pagina                       = addslashes($_POST['pagina']);
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>">
<?php } else { ?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>">
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