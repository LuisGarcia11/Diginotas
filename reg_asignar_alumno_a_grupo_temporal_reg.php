<?php $serguridad_pagina = 1; ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<?php include_once('../admin/01_modulo_diseno_superior.php'); ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->

<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
<?php include_once('../admin/02_modulo_estilo_css.php'); ?>
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->

<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php //include_once('../seguridad/seguridad_diseno_plantillas.php'); ?>
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->

<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<div id="contentOuterSeparator"></div>
<div class="container">
<div class="divPanel page-content">

<div class="breadcrumbs"><a href="#">Guardando...</a> <img src="../imagenes/popup_ajax_loader.gif" class="img-polaroid" alt=""></div>

<div class="row-fluid">
<div class="span12" id="divMain">
<?php
if (isset($_GET['identificacion_alumno'])) {

$identificacion_alumno                        = addslashes($_GET['identificacion_alumno']);
$nombre_tipo_moneda                           = addslashes($_GET['nombre_tipo_moneda']);
$nombre_tipo_factura                          = addslashes($_GET['nombre_tipo_factura']);
$foco                                         = addslashes($_GET['foco']);
$cod_estado_vacuna                            = intval($_GET['cod_estado_vacuna']);
$buscar_por                                   = addslashes($_GET['buscar_por']);
$cuenta                                       = addslashes($_GET['cuenta']);
$cod_caja_virtual                             = addslashes($_GET['cod_caja_virtual']);
$cod_check_imp                                = '1';
$cod_tipo_metodo_envio                        = '1';

if (isset($_GET['cod_tipo_aplicacion'])) { $cod_tipo_aplicacion = intval($_GET['cod_tipo_aplicacion']); } else { $cod_tipo_aplicacion = '0'; }
if (isset($_GET['cod_categoria'])) { $cod_categoria = intval($_GET['cod_categoria']); $condicional_url_categoria = "&cod_categoria=".$cod_categoria; } else { $condicional_url_categoria = ""; }
if ($identificacion_alumno == '55555555') { $cod_estado_cava = 1; } else { $cod_estado_cava = 0; }

//cod_grado 	nombre_grado 	nombre_grado_letra 	cod_grupo 	nombre_grupo 	anyo

$sql_producto = "SELECT * FROM tbl15_alumno WHERE (identificacion_alumno = '$identificacion_alumno')";
$consulta_producto = mysqli_query($conectar, $sql_producto) or die(mysqli_error($conectar));
$existe_producto = mysqli_num_rows($consulta_producto);
$datos_producto = mysqli_fetch_assoc($consulta_producto);

$cod_alumno                         = $datos_producto['cod_alumno'];

$fecha_ymd_venta_producto           = date("Y-m-d");
$fecha_mes_venta_producto           = date("Y-m");
$fecha_anyo_venta_producto          = date("Y");
$fecha_seg_venta_producto           = time();
//$cuenta                             = $cuenta_actual;
$cod_estado_factura                 = '1';
$descuento_ptj                      = '0';
$flete_ptj                          = '0';
$vlr_cancelado                      = '';
$vlr_vuelto                         = '';
$fecha_dia                          = strtotime(date("Y/m/d"));
$fecha_mes                          = date("Y-m");
$fecha_anyo                         = date("Y-m-d");
$anyo                               = date("Y");
$fecha_hora                         = date("H:i:s");
$fecha_remision                     = date("Y-m-d");
$nombre_ccosto                      = '';
$garantia_meses                     = '';
$observacion                        = '';
$cod_empresa                        = '0';
$fecha_ymdhis                       = date("Y-m-d H:is");
$cod_tipo_cobrar                    = '1';
$cod_tercero                        = '1';
$nombre_estado_factura              = 'ABIERTA';
$cod_tipo_pago                      = "1";
$cod_tipo_forma_pago                = "1";


$pagina = addslashes($_GET['pagina'])."?&foco=".$foco."&buscar_por=".$buscar_por."&cuenta=".$cuenta."&cod_caja_virtual=".$cod_caja_virtual.$condicional_url_categoria."&pagina=facturacion_grupo_temporal.php";

$sql_info = "SELECT * FROM tbl15_info_asignar_alumno_a_grupo WHERE (cuenta = '$cuenta') AND (cod_caja_virtual = '$cod_caja_virtual')";
$consulta_info = mysqli_query($conectar, $sql_info) or die(mysqli_error($conectar));
$factura_abierta = mysqli_num_rows($consulta_info);
$datos_info = mysqli_fetch_assoc($consulta_info);

if (($cod_estado_venta_prod_en_cero_global <> '0') && ($und_producto <= '0')) { ?>
<table class="table table-striped">
<tr>
<th style="text-align:center"><a href="<?php echo $pagina?>"><h3>Regresar</h3></a></th>
</tr>
<tr>
<th style="text-align:center"><h4><img src=../imagenes/advertencia.gif alt='Advertencia'>EL PRODUCTO NO TIENE UNIDADES DISPONIBLES PARA VENDER<img src=../imagenes/advertencia.gif alt='Advertencia'></h4></th>
</tr>
<tr>
<th style="text-align:center"><h4><?php echo $nombre_producto.' | '.$identificacion_alumno ?></h4></th>
</tr>
</table>
<?php
} else {

if ($existe_producto > '0') {
//---------------------------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------FACTURA NUEVA INICIO----------------------------------------------------------------//
//---------------------------------------------------------------------FACTURA NUEVA INICIO----------------------------------------------------------------//
if ($factura_abierta == '0') {

$sql_autoincremento_info_factura = "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$base_datos' AND TABLE_NAME = 'tbl15_info_asignar_alumno_a_grupo'";
$exec_autoincremento_info_factura = mysqli_query($conectar, $sql_autoincremento_info_factura) or die(mysqli_error($conectar));
$datos_autoincremento_info_factura = mysqli_fetch_assoc($exec_autoincremento_info_factura);

$cod_info_asignar_alumno_a_grupo             = $datos_autoincremento_info_factura['AUTO_INCREMENT'];
//---------------------------------------------------------------------------------------------------------------------------------------------//
$sql_data = "INSERT INTO tbl15_info_asignar_alumno_a_grupo (cod_info_asignar_alumno_a_grupo, cuenta cod_administrador, cod_caja_virtual, nombre_estado_factura) 
VALUES ('$cod_info_asignar_alumno_a_grupo', '$cuenta', '$cod_administrador', '$cod_caja_virtual', '$nombre_estado_factura')";
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));

$sql_data = "INSERT INTO tbl15_asignar_alumno_a_grupo_temporal cod_info_asignar_alumno_a_grupo, cod_alumno, cuenta, cod_administrador, cod_caja_virtual) 
VALUES ('$cod_info_asignar_alumno_a_grupo', '$cod_alumno', '$cuenta', '$cod_administrador', '$cod_caja_virtual')";
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));
//---------------------------------------------------------------------FACTURA NUEVA FIN----------------------------------------------------------------//
//---------------------------------------------------------------------FACTURA NUEVA FIN----------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------------------------------------//
}
//---------------------------------------------------------------------FACTURA ABIERTA INICIO----------------------------------------------------------------//
//---------------------------------------------------------------------FACTURA ABIERTA INICIO----------------------------------------------------------------//
else { 

$sql_info_factura = "SELECT cod_info_asignar_alumno_a_grupo FROM tbl15_info_asignar_alumno_a_grupo WHERE (cuenta = '$cuenta') AND (cod_caja_virtual = '$cod_caja_virtual')";
$consulta_info_factura = mysqli_query($conectar, $sql_info_factura) or die(mysqli_error($conectar));
$datos_info_factura = mysqli_fetch_assoc($consulta_info_factura);

$cod_info_asignar_alumno_a_grupo             = $datos_info_factura['cod_info_asignar_alumno_a_grupo'];
$fecha_ymdhis                       = date("Y-m-d H:is");

$sql_data = "INSERT INTO tbl15_asignar_alumno_a_grupo_temporal (cod_info_asignar_alumno_a_grupo, cod_alumno, cuenta, cod_administrador, cod_caja_virtual) 
VALUES ('$cod_info_asignar_alumno_a_grupo', '$cod_alumno', '$cuenta', '$cod_administrador', '$cod_caja_virtual')";
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));
}
//---------------------------------------------------------------------FACTURA ABIERTA FIN----------------------------------------------------------------//
//---------------------------------------------------------------------FACTURA ABIERTA FIN----------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------------------------------------//
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>">
<?php } else {
?>
<table class="table table-striped">
<tr>
<th style="text-align:center"><img src=../imagenes/advertencia.gif alt='Advertencia'>EL CODIGO <?php echo $identificacion_alumno ?> NO EXISTE EN LA LISTA.<img src=../imagenes/advertencia.gif alt='Advertencia'></th>
</tr>
</table>
<META HTTP-EQUIV="REFRESH" CONTENT="3; <?php echo $pagina?>">
<?php } ?>

<?php } ?>

<?php } ?>
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* FIN MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
</div>
</div>
<div id="footerInnerSeparator"></div>
</div>
</div>
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* FIN MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->

  <!-- 1******************************************************* MODULO FOOTER *********************************************** -->
<?php //include_once('../admin/04_modulo_footer.php'); ?>
<!-- 1******************************************************* MODULO FOOTER *********************************************** -->

<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->
<?php include_once('../admin/05_modulo_js.php'); ?>
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->

</body>
</html>