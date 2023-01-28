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
$buscar                             = addslashes($_REQUEST['buscar']);
$anyo                               = addslashes($_REQUEST['anyo']);
$pagina                             = addslashes($_REQUEST['pagina']);

if($buscar <> '') {
$condicional = "WHERE ((anyo = '$anyo') AND (nombre_grado = '$buscar'))";

$mostrar_datos_sql = "SELECT * FROM tbl15_info_asignar_asignatura_a_grado $condicional";
$consulta = mysqli_query($conectar, $mostrar_datos_sql) or die(mysqli_error($conectar));
$total_resultados = mysqli_num_rows($consulta);
} else {
$condicional = "WHERE ((anyo = '$anyo'))";

$mostrar_datos_sql = "SELECT * FROM tbl15_info_asignar_asignatura_a_grado $condicional";
$consulta = mysqli_query($conectar, $mostrar_datos_sql) or die(mysqli_error($conectar));
$total_resultados = mysqli_num_rows($consulta);
}




if ($total_resultados <> 0) {
?>
<br>
<div class="table-responsive">
<table class="table table-striped">
<tr>
    <th style="text-align:center" class="column-title">Edit</th>
    <th style="text-align:center" class="column-title">Grado</th>
    <th style="text-align:left" class="column-title">Asignaturas</th>
    <th style="text-align:center" class="column-title">Año</th>
    <th style="text-align:center" class="column-title">Fecha creación</th>
    <th style="text-align:center" class="column-title">Usuario</th>
    <th style="text-align:center" class="column-title">Elim</th>
</tr>
<?php
$tab                                = 'tbl15_info_asignar_asignatura_a_grado';
$campo                              = 'cod_info_asignar_asignatura_a_grado';
$tipo                               = 'eliminar';
$foco                               = 'busqueda';
$nombre_asignatura_concat           = '';

$sql_consulta = "SELECT * FROM tbl15_info_asignar_asignatura_a_grado $condicional ORDER BY nombre_grado";
$query_consulta = mysqli_query($conectar, $sql_consulta);
while ($datos_consulta = mysqli_fetch_array($query_consulta)) {

$nombre_asignatura_concat                         = '';
$cod_info_asignar_asignatura_a_grado              = $datos_consulta['cod_info_asignar_asignatura_a_grado'];
$cod_grado                                        = $datos_consulta['cod_grado'];
$nombre_grado                                     = $datos_consulta['nombre_grado'];
$nombre_grado_letra                               = $datos_consulta['nombre_grado_letra'];
$fecha_creacion                                   = $datos_consulta['fecha_creacion'];
$cuenta                                           = $datos_consulta['cuenta'];

$sql_datos_venta_temp = "SELECT * FROM tbl15_asignar_asignatura_a_grado 
WHERE (cod_info_asignar_asignatura_a_grado = '$cod_info_asignar_asignatura_a_grado') ORDER BY cod_asignar_asignatura_a_grado DESC";
$consulta_datos_venta_temp = mysqli_query($conectar, $sql_datos_venta_temp);
while ($datos_venta_temp = mysqli_fetch_assoc($consulta_datos_venta_temp)) {

$nombre_asignatura_con                            = $datos_venta_temp['nombre_asignatura'];
$nombre_asignatura_concat                        .= $nombre_asignatura_con.'<br>';
}
?>
<tr class="even pointer">
    <td style="text-align:center;"><a href="../admin/edit_facturacion_asignar_asignatura_a_grado.php?cod_info_asignar_asignatura_a_grado=<?php echo $cod_info_asignar_asignatura_a_grado?>&pagina=<?php echo $pagina?>"><img src="../imagenes/editar.png" class="img-polaroid" title="Editar" alt=""></a></td>
    <td style="text-align:center"><?php echo $nombre_grado; ?></td>
    <td style="text-align:left"><?php echo $nombre_asignatura_concat; ?></td>
    <td style="text-align:center"><?php echo $anyo; ?></td>
    <td style="text-align:center"><?php echo $fecha_creacion; ?></td>
    <td style="text-align:center"><?php echo $cuenta; ?></td>
    <td  style="text-align:center;"><a href="../admin/eliminar.php?llave=<?php echo $cod_info_asignar_asignatura_a_grado?>&tab=<?php echo $tab ?>&tipo=<?php echo $tipo ?>&campo=<?php echo $campo ?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/eliminar.png" class="img-polaroid" title="Eliminar" alt=""></a></td>
</tr>
<?php } ?>
</table>
</div>
<?php } else { } ?>