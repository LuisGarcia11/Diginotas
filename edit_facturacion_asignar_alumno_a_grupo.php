﻿<?php $serguridad_pagina = 1; ?>
<?php $nombre_pagina = "Cursos"; ?>
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

<script>
window.onload = function() {
document.getElementById("<?php echo $foco ?>").focus();
}
</script>

<script type="text/javascript">
function hacer_busqueda() {
var xmlhttp;

var valor_buscar = document.getElementById('busqueda').value;
var pagina = document.getElementById('pagina').value;
var nombre_tipo_moneda = "COP";
var nombre_tipo_factura = "POS";
var cod_estado_vacuna = "0";
var tipo_busqueda = "parcial";
var buscar_por = $("#buscar_por").val();
var cuenta = "<?php echo $cuenta_actual ?>";
var cod_caja_virtual = "<?php echo $cod_caja_virtual ?>";
var cod_info_asignar_alumno_a_grupo = "<?php echo $cod_info_asignar_alumno_a_grupo_inf ?>";
var anyo = "<?php echo $anyo_inf ?>";

if(valor_buscar=='') { document.getElementById("logo_cargador").innerHTML=""; return; }

if (window.XMLHttpRequest) { xmlhttp=new XMLHttpRequest(); } else { xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); }
xmlhttp.onreadystatechange=function() {
  if (xmlhttp.readyState==4 && xmlhttp.status==200) { document.getElementById("logo_cargador").innerHTML=xmlhttp.responseText; } else { document.getElementById("logo_cargador").innerHTML='<center><img src="../imagenes/loader.gif"/></center>'; }
}
xmlhttp.open("POST","../admin/edit_busqueda_inmediata_asignar_alumno_a_grupo_php.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("buscar="+valor_buscar+"&buscar_por="+buscar_por+"&cod_info_asignar_alumno_a_grupo="+cod_info_asignar_alumno_a_grupo+"&anyo="+anyo+"&nombre_tipo_moneda="+nombre_tipo_moneda+"&nombre_tipo_factura="+nombre_tipo_factura+"&tipo_busqueda="+tipo_busqueda+"&cod_estado_vacuna="+cod_estado_vacuna+"&cuenta="+cuenta+"&cod_caja_virtual="+cod_caja_virtual+"&pagina="+pagina);
}
</script>

<div class="table-responsive">

<table align="center" border="0" cellpadding="0" cellspacing="0" style="font-family:mono; width:100%">
    <tbody><tr>
        <td bgcolor="#fff" align="center"><strong><a href="../admin/lista_asignar_alumno_a_grupo.php?pagina=<?php echo $pagina ?>">Editar Grupos a Grados</a></strong></td>
    </tr></tbody>
</table>
<br>

<table align="center" border="0" cellpadding="0" cellspacing="0" style="font-family:mono; width:100%">
    <tbody>
    	<tr>
            <td bgcolor="#fff" align="center"><strong>Buscar por:</strong>
            <select class="form-control" name="buscar_por" id="buscar_por" onchange="hacer_busqueda()" style="width: 180px;">
            <?php if (isset($buscar_por)) { echo ""; } else { echo  "<option value='' selected >Selecione</option>"; }
            $consulta2_sql = ("SELECT cod_buscar_por, nombre_buscar_por, titulo_buscar_por FROM tbl15_buscar_por WHERE (cod_tipo_busqueda = '1') ORDER BY cod_buscar_por ASC");
            $consulta2 = mysqli_query($conectar, $consulta2_sql);
            while ($datos2 = mysqli_fetch_assoc($consulta2)) {
            if(isset($buscar_por) and $buscar_por == $datos2['nombre_buscar_por']) {
            $seleccionado = "selected"; } else { $seleccionado = ""; }
            $codigo = $datos2['nombre_buscar_por'];
            $nombre = $datos2['titulo_buscar_por'];
            echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?></select>
            <strong><input type="text" id="busqueda" name="busqueda" onkeyup="hacer_busqueda()" style="height:40" placeholder="Buscar"/><input type="hidden" id="pagina" name="pagina" value="<?php echo $pagina_local ?>"/></strong><div id="logo_cargador"></div>
            </td>
    	</tr>
    </tbody>
</table>
<!-- ***************************************************************************************************************************** -->
<?php include_once('../admin/edit_info_asignar_alumno_a_grupo.php'); ?>
<!-- ***************************************************************************************************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php if ($total_datos <> 0) { ?>

<table <table class="table table-hover" border="" cellspacing="0" cellpadding="0">
<thead>
	<tr>
		<?php if ($cod_estado_eliminar_caja_mesa_virtual == '1') { ?><th style="text-align:center;">Excluir</th><?php } ?>
		<th style="text-align:center;">#</th>
        <th style="text-align:left;">Estudiante</th>
        <th style="text-align:left;">Documento</th>

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
		<?php if ($cod_estado_eliminar_caja_mesa_virtual == '1') { ?><td  style="text-align:center;"><a href="../admin/eliminar.php?llave=<?php echo $cod_asignar_alumno_a_grupo?>&cod_info_asignar_alumno_a_grupo=<?php echo $cod_info_asignar_alumno_a_grupo ?>&tab=<?php echo $tab ?>&tipo=<?php echo $tipo ?>&campo=<?php echo $campo ?>&cuenta=<?php echo $cuenta ?>&cod_caja_virtual=<?php echo $cod_caja_virtual ?>&pagina=<?php echo $pagina_local ?>"><img src="../imagenes/btn_excluir.png" class="img-polaroid" alt=""></a></td><?php } ?>
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