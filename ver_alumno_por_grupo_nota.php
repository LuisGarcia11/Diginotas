<?php $serguridad_pagina = 1; ?>
<?php $nombre_pagina = "Notas Por Estudiante"; ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<?php include_once('../admin/01_modulo_diseno_superior.php'); ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
<?php include_once('../admin/02_modulo_estilo_css.php'); ?>
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="../estilo_css/estilo_modal.css">
<script type="text/javascript" src="js/jquery.number.js"></script>
</head>
<body id="pageBody">
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php include_once('../seguridad/seguridad_diseno_plantillas.php'); ?>
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php //$pagina = addslashes($_GET['pagina']); ?>
<div id="contentOuterSeparator"></div>
<!--<div class="container">-->
<div class="divPanel page-content">
<!--
<div class="breadcrumbs">
<a href="../admin/menu_lista.php"><h4>Lista de Area a Laborar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
<a href="../admin/reg_grupo_area.php">Registrar Area a Laborar</h4></a>
</div>
-->
<hr>
<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
if (isset($_GET['cuenta'])) { $cuenta_actual = addslashes($_GET['cuenta']); } else { $cuenta_actual = $cuenta_actual; }
if (isset($_GET['cod_caja_virtual'])) { $cod_caja_virtual = addslashes($_GET['cod_caja_virtual']); } else { $cod_caja_virtual = $cod_caja_virtual; }
if (isset($_GET['cuenta'])) { $url_visit_user_extern = '?cuenta='.$cuenta_actual.'&cod_caja_virtual='.$cod_caja_virtual; } else { $url_visit_user_extern = ""; }

$cod_info_asignar_alumno_a_grupo   = intval($_GET['cod_info_asignar_alumno_a_grupo']);

$pagina                            = $_SERVER['PHP_SELF'];
$pagina_local                      = $_SERVER['PHP_SELF'];
$incre                             = 0;
$tab                               = 'tbl15_asignar_alumno_a_grupo';
$time_seg                          = time();
$fecha                             = date("Ymd");
$hora                              = date("His");

if (isset($_GET['foco'])) { $foco = addslashes($_GET['foco']); } else { $foco = 'busqueda'; }
if (isset($_GET['buscar_por'])) { $buscar_por = addslashes($_GET['buscar_por']); } else { $buscar_por = $nombre_buscar_por; }

$sql_info_alumno_gra = "SELECT cod_info_asignar_alumno_a_grupo, anyo FROM tbl15_info_asignar_alumno_a_grupo WHERE (cod_info_asignar_alumno_a_grupo = '$cod_info_asignar_alumno_a_grupo')";
$consulta_info_alumno_gra = mysqli_query($conectar, $sql_info_alumno_gra);
$data_info_alumno_gra = mysqli_fetch_assoc($consulta_info_alumno_gra);

$cod_info_asignar_alumno_a_grupo_inf      = $data_info_alumno_gra['cod_info_asignar_alumno_a_grupo'];
$anyo_inf                                 = $data_info_alumno_gra['anyo'];

$datos_factura = "SELECT cod_asignar_alumno_a_grupo FROM tbl15_asignar_alumno_a_grupo WHERE (cod_info_asignar_alumno_a_grupo = '$cod_info_asignar_alumno_a_grupo') GROUP BY cod_alumno";
$consulta = mysqli_query($conectar, $datos_factura);
$total_datos = mysqli_num_rows($consulta);
?>
<input type="hidden" id="pagina" value="<?php echo $pagina_local ?>">

<div class="table-responsive">

<table align="center" border="0" cellpadding="0" cellspacing="0" style="font-family:mono; width:100%">
    <tbody><tr>
        <td bgcolor="#fff" align="center"><strong><a href="#">Notas Por Estudiantes</a></strong></td>
    </tr></tbody>
</table>
<br>
<!-- ***************************************************************************************************************************** -->
<?php include_once('../admin/ver_info_alumno_por_grupo_nota.php'); ?>
<!-- ***************************************************************************************************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php if ($total_datos <> 0) { ?>

<table <table class="table table-hover" border="" cellspacing="0" cellpadding="0">
<thead>
	<tr>
        <th style="text-align:center;">Ver Notas</th>
		<th style="text-align:center;">#</th>
        <th style="text-align:center;">Estudiante</th>
        <th style="text-align:center;">Documento</th>
	</tr>
</thead>
<tbody>
<?php
$campo                             = 'cod_asignar_alumno_a_grupo';
$tipo                              = 'eliminar';
$nombre_tipo_moneda                = "COP";
$nombre_tipo_factura               = "POS";
$cod_estado_vacuna                 = "0";

$sql_asignar_alumno_a_grupo = "SELECT * FROM tbl15_asignar_alumno_a_grupo WHERE (cod_info_asignar_alumno_a_grupo = '$cod_info_asignar_alumno_a_grupo') 
GROUP BY cod_alumno ORDER BY cod_asignar_alumno_a_grupo DESC";
$consulta_asignar_alumno_a_grupo = mysqli_query($conectar, $sql_asignar_alumno_a_grupo);
while ($datos_asignar_alumno_a_grupo = mysqli_fetch_assoc($consulta_asignar_alumno_a_grupo)) {

$cod_asignar_alumno_a_grupo                      = $datos_asignar_alumno_a_grupo['cod_asignar_alumno_a_grupo'];
$cod_info_asignar_alumno_a_grupo                 = $datos_asignar_alumno_a_grupo['cod_info_asignar_alumno_a_grupo'];
$cod_alumno                                      = $datos_asignar_alumno_a_grupo['cod_alumno'];
$nota_periodo1                                   = $datos_asignar_alumno_a_grupo['nota_periodo1'];
$nota_periodo2                                   = $datos_asignar_alumno_a_grupo['nota_periodo2'];
$nota_periodo3                                   = $datos_asignar_alumno_a_grupo['nota_periodo3'];
$nota_periodo4                                   = $datos_asignar_alumno_a_grupo['nota_periodo4'];
$falla_alumno                                    = $datos_asignar_alumno_a_grupo['falla_alumno'];
$nota_final                                      = ($nota_periodo1 + $nota_periodo2 + $nota_periodo3 + $nota_periodo4) / 4;

$obtener_entidad = "SELECT * FROM tbl15_alumno WHERE cod_alumno = '".($cod_alumno)."'";
$consultar_entidad = mysqli_query($conectar, $obtener_entidad) or die(mysqli_error($conectar));
$info_entidad = mysqli_fetch_assoc($consultar_entidad);

$nombre_tipo_identificacion     = $info_entidad['nombre_tipo_identificacion'];
$identificacion_alumno          = $info_entidad['identificacion_alumno'];
$nombre1_alumno                 = $info_entidad['nombre1_alumno'];
$nombre2_alumno                 = $info_entidad['nombre2_alumno'];
$apellido1_alumno               = $info_entidad['apellido1_alumno'];
$apellido2_alumno               = $info_entidad['apellido2_alumno'];
$nombres_alumno                 = $nombre1_alumno.' '.$nombre2_alumno;
$apellidos_alumno               = $apellido1_alumno.' '.$apellido2_alumno;

$incre++;
?>
	<tr id="tr<?php echo $cod_asignar_alumno_a_grupo;?>">
        <td style="text-align:center;"><a href="../admin/ver_nota_alumno_asignatura.php?cod_info_asignar_alumno_a_grupo=<?php echo $cod_info_asignar_alumno_a_grupo?>&cod_alumno=<?php echo $cod_alumno ?>&cod_info_asignar_alumno_a_grupo=<?php echo $cod_info_asignar_alumno_a_grupo ?>&tab=<?php echo $tab ?>&tipo=<?php echo $tipo ?>&campo=<?php echo $campo ?>&cuenta=<?php echo $cuenta ?>&cod_caja_virtual=<?php echo $cod_caja_virtual ?>&pagina=<?php echo $pagina_local ?>"><img src="../imagenes/ver.png" class="img-polaroid" title="Ver Notas" alt=""></a></td>
        <td style="text-align:center;" id="nombre_producto_<?php echo $incre;?>"><?php echo $incre ?></td>
        <td style="text-align:left;" id="nombre_producto_<?php echo $incre;?>"><?php echo $nombres_alumno.' '.$apellidos_alumno ?></td>
        <td style="text-align:left;" id="nombre_producto_<?php echo $incre;?>"><?php echo $identificacion_alumno ?></td>
    </tr id="tr<?php echo $cod_asignar_alumno_a_grupo;?>">
<?php } ?>
</tbody>
</table>

<?php } else { } ?>

</div>
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* FIN MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
</div>
<!--End Main Content Area-->
<!--</div>-->
<div id="footerInnerSeparator"></div>
</div>
</div>
<!-- 1******************************************************* MODULO FOOTER *********************************************** -->
<?php include_once('../admin/04_modulo_footer.php'); ?>
<!-- 1******************************************************* MODULO FOOTER *********************************************** -->
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->
<?php include_once('../admin/05_modulo_js_sin_jquery.php'); ?>
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->
</body>
</html>