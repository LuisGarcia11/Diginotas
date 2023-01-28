<?php $serguridad_pagina = 1; ?>
<?php $nombre_pagina = "Crear Nuevo Grupo"; ?>
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

<div class="breadcrumbs">
<a href="../admin/lista_caja_virtual.php"><h4>GRUPOS</a>
</div>
<hr>
<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
$smtr = 0;
$contador_mesas_array = 1;

$pagina                             = 'facturacion_grupo_temporal_multi.php'; 
$nombre_estado_factura              = 'ABIERTA';
$mesas_caja_en_uso                  = array();

$sql_mesas_caja_en_uso = "SELECT cod_grado_grupo FROM tbl15_info_grupo_alumno ORDER BY cod_grado_grupo";
$consulta_mesas_caja_en_uso = mysqli_query($conectar, $sql_mesas_caja_en_uso);
while ($datos_mesas_caja_en_uso = mysqli_fetch_assoc($consulta_mesas_caja_en_uso)) {

$cod_grado_grupo_en_uso             = $datos_mesas_caja_en_uso['cod_grado_grupo'];

$mesas_caja_en_uso[$contador_mesas_array] = $cod_grado_grupo_en_uso;
$contador_mesas_array ++;
}

$sql_animal = "SELECT MAX(cod_caja_virtual) AS cod_caja_virtual FROM tbl15_info_grupo_alumno";
$resultado_animal = mysqli_query($conectar, $sql_animal);
$info_animal = mysqli_fetch_assoc($resultado_animal);

$cod_caja_virtual                   = $info_animal['cod_caja_virtual'] + 1;
?>
<table class="table table-striped">
<tr>
<?php 
$i = 1;

$sql_grado_grupo_en_uso = "SELECT * FROM tbl15_grado_grupo ORDER BY nombre_grado_grupo";
$consulta_grado_grupo_en_uso = mysqli_query($conectar, $sql_grado_grupo_en_uso);
while ($datos_grado_grupo_en_uso = mysqli_fetch_assoc($consulta_grado_grupo_en_uso)) {

$cod_grado_grupo                    = $datos_grado_grupo_en_uso['cod_grado_grupo'];
$nombre_grado_grupo                 = $datos_grado_grupo_en_uso['nombre_grado_grupo'];
$cod_estado_ocupado                 = $datos_grado_grupo_en_uso['cod_estado_ocupado'];
$cod_info_grupo_alumno              = $datos_grado_grupo_en_uso['cod_info_grupo_alumno'];

		if ($smtr % 4 == 0) { echo "<tr></tr>"; }
		$smtr++;
		$i++;
		$indice_mesas_caja_en_uso = array_search($cod_grado_grupo, $mesas_caja_en_uso, false);
		//if ($cod_estado_ocupado == '0') { 
		if ($indice_mesas_caja_en_uso == '') { ?>
		<th style="text-align:center"><a href="../admin/crear_grupo_virtual_sesion_reg.php?cod_caja_virtual=<?php echo $cod_caja_virtual?>&cod_grado_grupo=<?php echo $cod_grado_grupo ?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/mesa_caja_disponible.png"><br><?php echo $nombre_grado_grupo ?></a></th>
		<?php
		} else { ?>
		<th style="text-align:center"><a href="../admin/edit_factura_grupo.php?cod_info_grupo_alumno=<?php echo $cod_info_grupo_alumno?>&cod_grado_grupo=<?php echo $cod_grado_grupo ?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/mesa_caja_disponible_no.png"><br><?php echo $nombre_grado_grupo; ?></th>
		<?php } ?>
<?php } ?>
</tr>
</table>
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