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

if($buscar <> NULL) {
$mostrar_datos_sql = "SELECT * FROM tbl15_asignatura WHERE (nombre_asignatura LIKE '%$buscar%') ORDER BY nombre_asignatura ASC";
$consulta = mysqli_query($conectar, $mostrar_datos_sql) or die(mysqli_error($conectar));
$total_resultados = mysqli_num_rows($consulta);

echo $total_resultados." Resultados para: ".$buscar."<br>";
}
if ($total_resultados <> 0) {
?>
<br>
<div class="table-responsive">
<table class="table table-striped">
<tr>
<th style="text-align:center;">Anexar</th>
<th style="text-align:left;">Nombre Asignatura</th>
</tr>
<?php
$tab                      = 'tbl15_asignatura';
$campo                    = 'cod_producto';
$tipo                     = 'insertar';
$foco                     = 'busqueda';
while ($matriz_consulta = mysqli_fetch_assoc($consulta)) {
 	
$cod_asignatura                 = $matriz_consulta['cod_asignatura'];
$nombre_asignatura              = $matriz_consulta['nombre_asignatura']; 	
?>
<td style="text-align:center;"><a href="../admin/reg_asignar_asignatura_a_grado_reg.php?cod_asignatura=<?php echo $cod_asignatura?>&buscar_por=<?php echo $buscar_por?>&nombre_tipo_moneda=<?php echo $nombre_tipo_moneda?>&nombre_tipo_factura=<?php echo $nombre_tipo_factura?>&foco=<?php echo $foco?>&cod_estado_vacuna=<?php echo $cod_estado_vacuna?>&cuenta=<?php echo $cuenta?>&cod_caja_virtual=<?php echo $cod_caja_virtual?>&pagina=<?php echo $pagina?>"><img src="../imagenes/btn_anexar.png" class="img-polaroid" alt=""></a></td>
<td style="text-align:left;"><?php echo $nombre_asignatura; ?></td>
</tr>
<?php } ?>
</table>
</div>
<?php } else { } ?>