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
$cod_grupo                          = addslashes($_POST['cod_grupo']);
$cod_asignatura                     = addslashes($_POST['cod_asignatura']);
$cod_periodo                        = addslashes($_POST['cod_periodo']);
$cuenta                             = addslashes($_POST['cuenta']);
$pagina                             = addslashes($_POST['pagina']);

if($cod_grupo <> NULL) {
$mostrar_datos_sql = "SELECT * FROM tbl15_grupo_alumno WHERE (cod_grupo = '$cod_grupo') AND (cod_asignatura = '$cod_asignatura') ORDER BY cod_grupo_alumno DESC";
$consulta = mysqli_query($conectar, $mostrar_datos_sql) or die(mysqli_error($conectar));
$total_resultados = mysqli_num_rows($consulta);
}
if ($total_resultados <> 0) {
?>
<br>
<div class="table-responsive">

<table <table class="table table-hover" border="" cellspacing="0" cellpadding="0">
<thead>
	<tr>
		<th style="text-align:center;">#</th>
		<th style="text-align:center;">Alumno</th>
        <?php if ($cod_periodo == '1') { ?>
		<th style="text-align:center;">Nota P1</th>
        <?php } elseif ($cod_periodo == '2') { ?>
		<th style="text-align:center;">Nota P2</th>
        <?php } elseif ($cod_periodo == '3') { ?>
		<th style="text-align:center;">Nota P3</th>
        <?php } else { ?>
		<th style="text-align:center;">Nota P1</th>
		<?php } ?>
		<th style="text-align:center;">Fallas</th>
        <th style="text-align:center;">Observacion</th>
	</tr>
</thead>
<tbody>
<?php
$incre = 0;

$sql_grupo_alumno_temporal = "SELECT * FROM tbl15_grupo_alumno WHERE (cod_grupo = '$cod_grupo') AND (cod_asignatura = '$cod_asignatura') ORDER BY cod_grupo_alumno DESC";
$consulta_grupo_alumno_temporal = mysqli_query($conectar, $sql_grupo_alumno_temporal);
while ($datos_grupo_alumno_temporal = mysqli_fetch_assoc($consulta_grupo_alumno_temporal)) {

$cod_grupo_alumno                       = $datos_grupo_alumno_temporal['cod_grupo_alumno'];
$cod_grupo                              = $datos_grupo_alumno_temporal['cod_grupo'];
$cod_asignatura                         = $datos_grupo_alumno_temporal['cod_asignatura'];
$cod_alumno                             = $datos_grupo_alumno_temporal['cod_alumno'];
$cod_docente                            = $datos_grupo_alumno_temporal['cod_docente'];
$cod_info_grupo_alumno                  = $datos_grupo_alumno_temporal['cod_info_grupo_alumno'];

$nota1_alumno                           = $datos_grupo_alumno_temporal['nota1_alumno'];
$nota2_alumno                           = $datos_grupo_alumno_temporal['nota2_alumno'];
$nota3_alumno                           = $datos_grupo_alumno_temporal['nota3_alumno'];
$nota4_alumno                           = $datos_grupo_alumno_temporal['nota4_alumno'];
$falla_alumno                           = $datos_grupo_alumno_temporal['falla_alumno'];
//$cod_periodo                            = $datos_grupo_alumno_temporal['cod_periodo'];
$observacion                            = $datos_grupo_alumno_temporal['observacion'];


$obtener_entidad = "SELECT * FROM tbl15_alumno WHERE cod_alumno = '".($cod_alumno)."'";
$consultar_entidad = mysqli_query($conectar, $obtener_entidad) or die(mysqli_error($conectar));
$info_entidad = mysqli_fetch_assoc($consultar_entidad);

$nombre_tipo_identificacion     = $info_entidad['nombre_tipo_identificacion'];
$identificacion_alumno          = $info_entidad['identificacion_alumno'];
$nombre1_alumno                 = $info_entidad['nombre1_alumno'];
$nombre2_alumno                 = $info_entidad['nombre2_alumno'];
$apellido1_alumno               = $info_entidad['apellido1_alumno'];
$apellido2_alumno               = $info_entidad['apellido2_alumno'];
$nombres_alumno                 = $nombre1_alumno.' '.$nombre2_alumno.' '.$apellido1_alumno.' '.$apellido2_alumno;
$incre++;
?>
	<tr>
        <td style="text-align:center;"><?php echo $incre ?></td>
        <td style="text-align:center;"><?php echo $nombres_alumno ?></td>
        <?php if ($cod_periodo == '1') { ?>
    	<td style="text-align:center;"><input name="nota1_alumno" type="number" id="nota1_alumno<?php echo $incre;?>" class="<?php echo $cod_grupo_alumno;?>" value="<?php echo $nota1_alumno;?>" step="any" min=0 max=5 oninput="validity.valid||(value='');" style="width: 70px;" onChange="guardar_nota(<?php echo $cod_grupo_alumno;?>, 'nota1_alumno', $(this).attr('value'));"/></td>
        <?php } elseif ($cod_periodo == '2') { ?>
    	<td style="text-align:center;"><input name="nota2_alumno" type="number" id="nota2_alumno<?php echo $incre;?>" class="<?php echo $cod_grupo_alumno;?>" value="<?php echo $nota2_alumno;?>" step="any" min=0 max=5 oninput="validity.valid||(value='');" style="width: 70px;" onChange="guardar_nota(<?php echo $cod_grupo_alumno;?>, 'nota2_alumno', $(this).attr('value'));"/></td>
        <?php } elseif ($cod_periodo == '3') { ?>
    	<td style="text-align:center;"><input name="nota3_alumno" type="number" id="nota3_alumno<?php echo $incre;?>" class="<?php echo $cod_grupo_alumno;?>" value="<?php echo $nota3_alumno;?>" step="any" min=0 max=5 oninput="validity.valid||(value='');" style="width: 70px;" onChange="guardar_nota(<?php echo $cod_grupo_alumno;?>, 'nota3_alumno', $(this).attr('value'));"/></td>
        <?php } else { ?>
    	<td style="text-align:center;"><input name="nota1_alumno" type="number" id="nota1_alumno<?php echo $incre;?>" class="<?php echo $cod_grupo_alumno;?>" value="<?php echo $nota1_alumno;?>" step="any" min=0 max=5 oninput="validity.valid||(value='');" style="width: 70px;" onChange="guardar_nota(<?php echo $cod_grupo_alumno;?>, 'nota1_alumno', $(this).attr('value'));"/></td>
		<?php } ?>
        <td style="text-align:center;"><input name="falla_alumno" type="number" id="falla_alumno<?php echo $incre;?>" class="<?php echo $cod_grupo_alumno;?>" value="<?php echo $falla_alumno;?>" step="any" min=0 style="width: 70px;" /></td>
        <td style="text-align:center;"><input name="observacion" type="text" id="observacion<?php echo $incre;?>" class="<?php echo $cod_grupo_alumno;?>" value="<?php echo $observacion;?>" style="width: 300px;" /></td>
	</tr>
<?php } ?>
</tbody>
</table>
</div>

<?php } else { } ?>