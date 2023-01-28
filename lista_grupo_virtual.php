<?php $serguridad_pagina = 1; ?>
<?php $nombre_pagina = "Lista Grupos Abiertos"; ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<?php include_once('../admin/01_modulo_diseno_superior.php'); ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
<?php include_once('../admin/02_modulo_estilo_css.php'); ?>
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
<script language="javascript" src="isiAJAX.js"></script>
<script language="javascript">
var last;
function Focus(elemento, valor) {
$(elemento).className = 'inputon';
last = valor;
}
function Blur(elemento, valor, campo, id) {
$(elemento).className = 'inputoff';
if (last != valor) {
myajax.Link('lista_caja_virtual_editable_ajax_reg.php?valor='+valor+'&campo='+campo+'&id='+id);
}
}
</script>

</head>
<body onLoad="myajax = new isiAJAX();" id="pageBody">
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php include_once('../seguridad/seguridad_diseno_plantillas.php'); ?>
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php //$pagina = addslashes($_GET['pagina']); ?>
<!--<div id="contentOuterSeparator"></div>-->
<div class="container">
<div class="divPanel page-content">

<div class="breadcrumbs">
<a href="../admin/lista_grupo_virtual.php"><h4>GRUPOS ABIERTOS</a>
</div>
<hr>

<div class="row-fluid no-gutters">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">

<?php //include_once("../admin/ver_modal_mapa_domicilio.php"); ?>
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
if (isset($_GET['pagina'])) { $pagina = addslashes($_GET['pagina']); } else { $pagina = 'facturacion_grupo_temporal.php'; }
if (isset($_GET['caja_mesa']) && ($_GET['caja_mesa'] <> '')) {  $caja_mesa = ($_GET['caja_mesa']); $filtro_buscar_mesa = "AND (cod_base_caja = '$caja_mesa')"; } else { $caja_mesa = ''; $filtro_buscar_mesa = ""; }
$pagina_local        = $_SERVER['PHP_SELF'];
?>
<div class="table-responsive">
<form method="GET" name="formulario" action="">
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="shop-cat-box">
            	<a class="btn btn-success" href="../admin/crear_grupo_virtual_sesion.php?pagina=<?php echo $pagina ?>">CREAR NUEVO GRUPO</a>
            </div>
        </div>
    </div>
</div>
</form>


<div id="salida_tabla_caja_mesa_ajax">
<table class="table table-hover">
<tr>
<th style="text-align:center;">VER</th>
<th style="text-align:center;">GRUPO</th>
<th style="text-align:center;">ASIGNATURAS</th>
</tr>
<?php


if ($cod_seguridad=='1') {
$mostrar_datos_sql = "SELECT * FROM tbl15_info_grupo_alumno WHERE (nombre_estado_factura = 'ABIERTA')";
} else {
$mostrar_datos_sql = "SELECT * FROM tbl15_info_grupo_alumno WHERE (cuenta = '$cuenta_actual') AND (nombre_estado_factura = 'ABIERTA')";
}
$consulta = mysqli_query($conectar, $mostrar_datos_sql);
while ($datos = mysqli_fetch_assoc($consulta)) {

$cod_info_grupo_alumno              = $datos['cod_info_grupo_alumno'];
$cod_grupo                          = $datos['cod_grupo'];
$cod_asignatura                     = $datos['cod_asignatura'];
$cod_docente                        = $datos['cod_docente'];
$cuenta                             = $datos['cuenta'];
$cod_administrador                  = $datos['cod_administrador'];
$cod_caja_virtual                   = $datos['cod_caja_virtual'];
$ini_hora                           = $datos['ini_hora'];
$fin_hora                           = $datos['fin_hora'];
$cod_periodo                        = $datos['cod_periodo'];
$observacion                        = $datos['observacion'];

$sql_info_grupo_alumno = "SELECT nombres, apellidos FROM tbl15_administrador WHERE (cod_administrador = '$cod_administrador')";
$consulta_info_grupo_alumno = mysqli_query($conectar, $sql_info_grupo_alumno);
$datos_info_grupo_alumno = mysqli_fetch_assoc($consulta_info_grupo_alumno);

$nombres                            = $datos_info_grupo_alumno['nombres'];
$apellidos                          = $datos_info_grupo_alumno['apellidos'];
$nombres_apellidos                  = $nombres.' '.$apellidos;

$sql_info_grupo = "SELECT * FROM tbl15_grupo WHERE (cod_grupo = '$cod_grupo')";
$consulta_info_grupo = mysqli_query($conectar, $sql_info_grupo);
$datos_info_grupo = mysqli_fetch_assoc($consulta_info_grupo);

$nombre_grupo                       = $datos_info_grupo['nombre_grupo'];

$sql_info_asignatura = "SELECT * FROM tbl15_asignatura WHERE (cod_asignatura = '$cod_asignatura')";
$consulta_info_asignatura = mysqli_query($conectar, $sql_info_asignatura);
$datos_info_asignatura = mysqli_fetch_assoc($consulta_info_asignatura);

$nombre_asignatura                       = $datos_info_asignatura['nombre_asignatura'];

$sql_info_docente = "SELECT * FROM tbl15_docente WHERE (cod_docente = '$cod_docente')";
$consulta_info_docente = mysqli_query($conectar, $sql_info_docente);
$datos_info_docente = mysqli_fetch_assoc($consulta_info_docente);

$nombre_docente                       = $datos_info_docente['nombre1_docente'].' '.$datos_info_docente['nombre2_docente'].' '.$datos_info_docente['apellido1_docente'].' '.$datos_info_docente['apellido2_docente'];

$sql_info_periodo = "SELECT * FROM tbl15_periodo WHERE (cod_periodo = '$cod_periodo')";
$consulta_info_periodo = mysqli_query($conectar, $sql_info_periodo);
$datos_info_periodo = mysqli_fetch_assoc($consulta_info_periodo);

$nombre_periodo                       = $datos_info_periodo['nombre_periodo'];
?>
<tr>
<td style="text-align:center;"><a href="../admin/entrar_sesion_grupo_virtual.php?cod_info_grupo_alumno=<?php echo $cod_info_grupo_alumno ?>&cuenta=<?php echo $cuenta ?>&cod_caja_virtual=<?php echo $cod_caja_virtual ?>&cod_grupo=<?php echo $cod_grupo ?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/ver.png" class="img-polaroid" alt=""></a></td>
<td style="text-align:center;"><h4><?php echo $nombre_grupo;?></h4></td>
<td style="text-align:left;"><h4><?php echo $nombre_asignatura;?></h4></td>
</tr>
<?php } ?>
</table>
</div>
</div>
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
<!-- *********************************************************************************************** -->
<!-- *********************************************************************************************** -->
