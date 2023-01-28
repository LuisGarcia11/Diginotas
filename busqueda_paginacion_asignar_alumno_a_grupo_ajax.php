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
$condicional = "WHERE ((anyo = '$anyo') AND (nombre_grupo = '$buscar'))";

$mostrar_datos_sql = "SELECT * FROM tbl15_asignar_alumno_a_grupo $condicional ORDER BY cod_asignar_alumno_a_grupo DESC";
$consulta = mysqli_query($conectar, $mostrar_datos_sql) or die(mysqli_error($conectar));
$total_resultados = mysqli_num_rows($consulta);
} else {
$condicional = "WHERE ((anyo = '$anyo'))";

$mostrar_datos_sql = "SELECT * FROM tbl15_asignar_alumno_a_grupo $condicional ORDER BY cod_asignar_alumno_a_grupo DESC";
$consulta = mysqli_query($conectar, $mostrar_datos_sql) or die(mysqli_error($conectar));
$total_resultados = mysqli_num_rows($consulta);
}

if ($total_resultados <> 0) {
?>
<br>
<div class="table-responsive">
<table class="table table-striped">
<tr>
    <th style="text-align:center" class="column-title">Ver Nota Por Asignatura</th>
    <th style="text-align:center" class="column-title">Ver Nota Por Estudiante</th>
    <th style="text-align:center" class="column-title">Edit</th>
    <th style="text-align:center" class="column-title">Grado</th>
    <th style="text-align:center" class="column-title">Grupo</th>
    <th style="text-align:center" class="column-title">Año</th>
    <th style="text-align:center" class="column-title">Jornada</th>
    <th style="text-align:center" class="column-title">Director de grupo</th>
    <th style="text-align:center" class="column-title">Fecha creación</th>
    <th style="text-align:center" class="column-title">Usuario</th>
    <th style="text-align:center" class="column-title">Elim</th>
</tr>
<?php
$tab                                = 'tbl15_info_asignar_alumno_a_grupo';
$campo                              = 'cod_info_asignar_alumno_a_grupo';
$tipo                               = 'eliminar';
$foco                               = 'busqueda';
$nombre_grupo_concat                = '';

$sql_consulta = "SELECT * FROM tbl15_info_asignar_alumno_a_grupo $condicional ORDER BY nombre_grado";
$query_consulta = mysqli_query($conectar, $sql_consulta);
while ($datos_consulta = mysqli_fetch_array($query_consulta)) {

$nombre_grupo_concat                         = '';
$nombre_asignatura_concat                    = '';

$cod_info_asignar_alumno_a_grupo             = $datos_consulta['cod_info_asignar_alumno_a_grupo'];
$cod_grado                                   = $datos_consulta['cod_grado'];
$nombre_grado                                = $datos_consulta['nombre_grado'];
$nombre_grado_letra                          = $datos_consulta['nombre_grado_letra'];
$fecha_creacion                              = $datos_consulta['fecha_creacion'];
$cuenta                                      = $datos_consulta['cuenta'];
$anyo                                        = $datos_consulta['anyo'];
$nombre_grupo                                = $datos_consulta['nombre_grupo'];
$cod_director_grupo                          = $datos_consulta['cod_director_grupo'];
$cod_tipo_jornada                            = $datos_consulta['cod_tipo_jornada'];

$sql_director_grupo = "SELECT identificacion_docente, nombre1_docente, nombre2_docente, apellido1_docente, apellido2_docente FROM tbl15_docente WHERE (cod_docente = '$cod_director_grupo')";
$consulta_director_grupo = mysqli_query($conectar, $sql_director_grupo);
$datos_director_grupo = mysqli_fetch_assoc($consulta_director_grupo);

$nombre_director_grupo                       = $datos_director_grupo['nombre1_docente'].' '.$datos_director_grupo['nombre2_docente'].' '.$datos_director_grupo['apellido1_docente'].' '.$datos_director_grupo['apellido2_docente'];


$sql_tipo_jornada = "SELECT * FROM tbl15_tipo_jornada WHERE (cod_tipo_jornada = '$cod_tipo_jornada')";
$consulta_tipo_jornada = mysqli_query($conectar, $sql_tipo_jornada);
$datos_tipo_jornada = mysqli_fetch_assoc($consulta_tipo_jornada);

$nombre_tipo_jornada                         = $datos_tipo_jornada['nombre_tipo_jornada'];
?>
<tr class="even pointer">
    <td style="text-align:center;"><a href="../admin/ver_facturacion_grupo_asignatura.php?cod_info_asignar_alumno_a_grupo=<?php echo $cod_info_asignar_alumno_a_grupo?>&pagina=<?php echo $pagina?>"><img src="../imagenes/ver.png" class="img-polaroid" title="Ver Nota Por Asignatura" alt=""></a></td>
    <td style="text-align:center;"><a href="../admin/ver_alumno_por_grupo_nota.php?cod_info_asignar_alumno_a_grupo=<?php echo $cod_info_asignar_alumno_a_grupo?>&pagina=<?php echo $pagina?>"><img src="../imagenes/ver.png" class="img-polaroid" title="Ver Nota Por Estudiante" alt=""></a></td>
    <td style="text-align:center;"><a href="../admin/edit_facturacion_asignar_alumno_a_grupo.php?cod_info_asignar_alumno_a_grupo=<?php echo $cod_info_asignar_alumno_a_grupo?>&pagina=<?php echo $pagina?>"><img src="../imagenes/editar.png" class="img-polaroid" title="Editar" alt=""></a></td>
    <td style="text-align:center"><?php echo $nombre_grado; ?></td>
    <td style="text-align:center"><?php echo $nombre_grupo; ?></td>
    <td style="text-align:center"><?php echo $anyo; ?></td>
    <td style="text-align:center"><?php echo $nombre_tipo_jornada; ?></td>
    <td style="text-align:left"><?php echo $nombre_director_grupo; ?></td>
    <td style="text-align:center"><?php echo $fecha_creacion; ?></td>
    <td style="text-align:center"><?php echo $cuenta; ?></td>
    <td  style="text-align:center;"><a href="../admin/eliminar.php?llave=<?php echo $cod_info_asignar_alumno_a_grupo?>&tab=<?php echo $tab ?>&tipo=<?php echo $tipo ?>&campo=<?php echo $campo ?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/eliminar.png" class="img-polaroid" title="Eliminar" alt=""></a></td>
</tr>
<?php } ?>
</table>
</div>
<?php } else { } ?>