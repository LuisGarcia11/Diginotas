<?php
include_once('../conexiones/conexione.php');

include_once("../session/funciones_admin.php");
//include("../tbl15_notificacion_alerta/mostrar_noficacion_alerta.php");
if (verificar_usuario()){
//print "Bienvenido (a), <strong>".$_SESSION['usuario'].", </strong>al sistema.";
  } else { header("Location:../index.php");
}

$cod_administrador                  = ($_SESSION['cod_administrador']);
$cod_base_caja                      = ($_SESSION['cod_base_caja']);
$cod_seguridad                      = ($_SESSION['cod_seguridad']);
//----------------------------------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------------------------------//
$buscar                             = addslashes($_POST['buscar']);
$pagina                             = addslashes($_POST['pagina']);
$nombre_tipo_moneda                 = addslashes($_POST['nombre_tipo_moneda']);
$nombre_tipo_factura                = addslashes($_POST['nombre_tipo_factura']);
$cod_estado_vacuna                  = addslashes($_POST['cod_estado_vacuna']);
$tipo_busqueda                      = addslashes($_POST['tipo_busqueda']);
$buscar_por                         = addslashes($_POST['buscar_por']);
$cuenta                             = addslashes($_POST['cuenta']);
$cod_caja_virtual                   = addslashes($_POST['cod_caja_virtual']);
$cod_info_asignar_alumno_a_grupo    = intval($_POST['cod_info_asignar_alumno_a_grupo']);
$anyo                               = intval($_POST['anyo']);

if($buscar <> NULL) {
if ($buscar_por == 'nombre_producto') {
$mostrar_datos_sql = "SELECT * FROM tbl15_alumno WHERE((nombre1_alumno LIKE '$buscar%') ORDER BY nombre1_alumno ASC";
$consulta = mysqli_query($conectar, $mostrar_datos_sql) or die(mysqli_error($conectar));
$total_resultados = mysqli_num_rows($consulta);
} elseif ($buscar_por == 'cod_producto_barra') {
$mostrar_datos_sql = "SELECT * FROM tbl15_alumno WHERE (identificacion_alumno LIKE '$buscar') ORDER BY nombre1_alumno ASC";
$consulta = mysqli_query($conectar, $mostrar_datos_sql) or die(mysqli_error($conectar));
$total_resultados = mysqli_num_rows($consulta);
} elseif ($buscar_por == 'cod_producto_barra_nombre_producto') {
$mostrar_datos_sql = "SELECT * FROM tbl15_alumno WHERE (nombre1_alumno LIKE '$buscar%') OR (identificacion_alumno LIKE '$buscar') ORDER BY nombre1_alumno ASC";
$consulta = mysqli_query($conectar, $mostrar_datos_sql) or die(mysqli_error($conectar));
$total_resultados = mysqli_num_rows($consulta);
} else {
$mostrar_datos_sql = "SELECT * FROM tbl15_alumno WHERE (nombre1_alumno LIKE '%$buscar%') OR (identificacion_alumno LIKE '$buscar') ORDER BY nombre1_alumno ASC";
$consulta = mysqli_query($conectar, $mostrar_datos_sql) or die(mysqli_error($conectar));
$total_resultados = mysqli_num_rows($consulta);
}
echo $total_resultados." Resultados para: ".$buscar."<br>";
}
if ($total_resultados <> 0) {
?>
<br>
<div class="table-responsive">
<table class="table table-striped">
<tr>
<th style="text-align:center;">Anexar</th>
<th style="text-align:center;">Identificacion</th>
<th style="text-align:center;">Tipo Doc</th>
<th style="text-align:left;">Nombres</th>
<th style="text-align:left;">Apellidos</th>
</tr>
<?php
$tab                      = 'tbl15_alumno';
$campo                    = 'cod_producto';
$tipo                     = 'insertar';
$foco                     = 'busqueda';
while ($matriz_consulta = mysqli_fetch_assoc($consulta)) {
 	
$cod_alumno                     = $matriz_consulta['cod_alumno'];
$nombre_tipo_identificacion     = $matriz_consulta['nombre_tipo_identificacion'];
$identificacion_alumno          = $matriz_consulta['identificacion_alumno'];
$nombre1_alumno                 = $matriz_consulta['nombre1_alumno'];
$nombre2_alumno                 = $matriz_consulta['nombre2_alumno'];
$apellido1_alumno               = $matriz_consulta['apellido1_alumno'];
$apellido2_alumno               = $matriz_consulta['apellido2_alumno'];
$nombres_alumno                 = $nombre1_alumno.' '.$nombre2_alumno;
$apellidos_alumno               = $apellido1_alumno.' '.$apellido2_alumno;

?>
<td style="text-align:center;"><a href="../admin/edit_reg_asignar_alumno_a_grupo_reg.php?identificacion_alumno=<?php echo $identificacion_alumno?>&cod_info_asignar_alumno_a_grupo=<?php echo $cod_info_asignar_alumno_a_grupo?>&buscar_por=<?php echo $buscar_por?>&nombre_tipo_moneda=<?php echo $nombre_tipo_moneda?>&nombre_tipo_factura=<?php echo $nombre_tipo_factura?>&foco=<?php echo $foco?>&cod_estado_vacuna=<?php echo $cod_estado_vacuna?>&cuenta=<?php echo $cuenta?>&cod_caja_virtual=<?php echo $cod_caja_virtual?>&pagina=<?php echo $pagina?>"><img src="../imagenes/btn_anexar.png" class="img-polaroid" alt=""></a></td>
<td style="text-align:center;"><?php echo $identificacion_alumno; ?></td>
<td style="text-align:center;"><?php echo $nombre_tipo_identificacion; ?></td>
<td style="text-align:left;"><?php echo $nombres_alumno; ?></td>
<td style="text-align:left;"><?php echo $apellidos_alumno; ?></td>
</tr>
<?php } ?>
</table>
</div>
<?php } else { } ?>