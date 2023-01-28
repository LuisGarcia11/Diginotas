<?php
$datos_data_info_factura = "SELECT * FROM tbl15_info_asignar_alumno_a_grupo WHERE (cuenta = '$cuenta_actual') AND (cod_caja_virtual = '$cod_caja_virtual') AND (nombre_estado_factura = 'ABIERTA')";
$consulta_data_info_factura = mysqli_query($conectar, $datos_data_info_factura);
$data_info_factura = mysqli_fetch_assoc($consulta_data_info_factura);
$factura_ocupada = mysqli_num_rows($consulta_data_info_factura);

$cod_info_asignar_alumno_a_grupo        = $data_info_factura['cod_info_asignar_alumno_a_grupo'];
$cod_grado                              = $data_info_factura['cod_grado'];
$anyo                                   = $data_info_factura['anyo'];
$nombre_grado                           = $data_info_factura['nombre_grado'];
$nombre_grupo                           = $data_info_factura['nombre_grupo'];
$cuenta                                 = $data_info_factura['cuenta'];
$cod_administrador                      = $data_info_factura['cod_administrador'];
$fecha_creacion                         = $data_info_factura['fecha_creacion'];
$fecha_modificacion                     = $data_info_factura['fecha_modificacion'];
$cod_director_grupo                     = $data_info_factura['cod_director_grupo'];
$cod_tipo_jornada                       = $data_info_factura['cod_tipo_jornada'];

$cod_info_factura_strpad                = str_pad($cod_info_asignar_alumno_a_grupo, 6, "0", STR_PAD_LEFT);

$sql_user_vendedor = "SELECT nombres, apellidos FROM tbl15_administrador WHERE (cod_administrador = '$cod_administrador')";
$consulta_user_vendedor = mysqli_query($conectar, $sql_user_vendedor);
$matriz_user_vendedor = mysqli_fetch_assoc($consulta_user_vendedor);

$nombres_vendedor            = $matriz_user_vendedor['nombres'].' '.$matriz_user_vendedor['apellidos'];

$tab                         = 'tbl15_asignar_alumno_a_grupo_temporal';
$tipo                        = 'eliminar';
$campo                       = 'cod_grado_alumno_temporal';

$sql_total_reg_alumno_a_grupo = "SELECT * FROM tbl15_asignar_alumno_a_grupo_temporal WHERE (cuenta = '$cuenta_actual') AND (cod_caja_virtual = '$cod_caja_virtual')";
$consulta_total_reg_alumno_a_grupo = mysqli_query($conectar, $sql_total_reg_alumno_a_grupo);
$data_total_reg_alumno_a_grupoa = mysqli_fetch_assoc($consulta_total_reg_alumno_a_grupo);
$total_reg_alumno_a_grupo = mysqli_num_rows($consulta_total_reg_alumno_a_grupo);
?>

<script language="javascript">
$(document).ready(function(){
    $("#cod_director_grupo").on('change', function () {
            var valor = $(this).val();
            var campo = "cod_director_grupo";
            var tipo_ajax = "tbl15_info_asignar_alumno_a_grupo";
            $.post("guardar_info_factura_asignar_alumno_a_grupo_temporal_ajax.php", { valor:valor, campo:campo, tipo_ajax:tipo_ajax, id:<?php echo $cod_info_asignar_alumno_a_grupo; ?> }, function(data){
                $("#modelo").html(data);
        });
   });
});
</script>

<script language="javascript">
$(document).ready(function(){
    $("#cod_tipo_jornada").on('change', function () {
            var valor = $(this).val();
            var campo = "cod_tipo_jornada";
            var tipo_ajax = "tbl15_info_asignar_alumno_a_grupo";
            $.post("guardar_info_factura_asignar_alumno_a_grupo_temporal_ajax.php", { valor:valor, campo:campo, tipo_ajax:tipo_ajax, id:<?php echo $cod_info_asignar_alumno_a_grupo; ?> }, function(data){
                $("#modelo").html(data);
        });
   });
});
</script>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<form method="post" name="formulario" action="../admin/venta_asignar_alumno_a_grupo_reg.php">
    <table class="table table-striped" border="1" cellspacing="0" cellpadding="20">
      <tr>
        <th style="text-align:right;">Grado:</th>
        <th style="text-align:left;"><?php echo $nombre_grado ?></th>

        <th style="text-align:right;">Grupo:</th>
        <th style="text-align:left;"><?php echo $nombre_grupo ?></th>

        <th style="text-align:right;">Año:</th>
        <th style="text-align:left;"><?php echo $anyo ?></th>
  
        <th style="text-align:right;">Director de Grupo:</th>
        <th style="text-align:left;">
            <select name="cod_director_grupo" id="cod_director_grupo" class="chosen-select" data-show-subtext="true" data-live-search="true" style="width: 190px;" tabindex="1" required>
                <?php if (isset($cod_director_grupo)) { echo "<option value='' >...</option>"; } else { echo "<option value='' selected ></option>"; }
                $consulta2_sql = "SELECT cod_docente, nombre1_docente, nombre2_docente, apellido1_docente, apellido2_docente FROM tbl15_docente";
                $consulta2 = mysqli_query($conectar, $consulta2_sql);
                while ($datos2 = mysqli_fetch_assoc($consulta2)) {
                if(isset($cod_director_grupo) AND $cod_director_grupo == $datos2['cod_docente']) {
                $seleccionado = "selected"; } else { $seleccionado = ""; }
                $codigo = $datos2['cod_docente'];
                $nombre = $datos2['nombre1_docente'].' '.$datos2['nombre2_docente'].' '.$datos2['apellido1_docente'].' '.$datos2['apellido2_docente'];
                echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?>
            </select>
        </th>
        <th style="text-align:right;">Jornada:</th>
        <th style="text-align:left;">
            <select name="cod_tipo_jornada" id="cod_tipo_jornada" class="chosen-select" data-show-subtext="true" data-live-search="true" style="width: 190px;" tabindex="1" required>
                <?php if (isset($cod_tipo_jornada)) { echo "<option value='' >...</option>"; } else { echo "<option value='' selected ></option>"; }
                $consulta2_sql = "SELECT nombre_tipo_jornada, cod_tipo_jornada FROM tbl15_tipo_jornada";
                $consulta2 = mysqli_query($conectar, $consulta2_sql);
                while ($datos2 = mysqli_fetch_assoc($consulta2)) {
                if(isset($cod_tipo_jornada) AND $cod_tipo_jornada == $datos2['cod_tipo_jornada']) {
                $seleccionado = "selected"; } else { $seleccionado = ""; }
                $codigo = $datos2['cod_tipo_jornada'];
                $nombre = $datos2['nombre_tipo_jornada'];
                echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?>
            </select>
        </th>

        <th style="text-align:right;">Total Estudiantes:</th>
        <th style="text-align:left;"><?php echo $total_reg_alumno_a_grupo ?></th>

<?php if ($total_datos <> 0) { ?>
        <th style="text-align:right;">Guardar</th>
        <th style="text-align:left;"><input type="image" src="../imagenes/guardar.png" name="vender" value="Guardar" /></th>
<?php } ?>

      </tr>
        <?php $pagina ='facturacion_asignar_alumno_a_grupo.php'; ?>
        <input type="hidden" name="cod_info_asignar_alumno_a_grupo" value="<?php echo $cod_info_asignar_alumno_a_grupo ?>" size="10">
        <input type="hidden" name="cod_caja_virtual" value="<?php echo $cod_caja_virtual ?>" size="10">
        <input type="hidden" name="cuenta" value="<?php echo $cuenta ?>" size="10">

        <input type="hidden" name="cod_grado" value="<?php echo $cod_grado ?>" size="10">
        <input type="hidden" name="total_datos" value="<?php echo $total_datos; ?>" size="4">
        <input type="hidden" name="pagina" value="<?php echo $pagina_local?>" size="15">
        <input type="hidden" name="flete" value="0" size="15">
        <input type="hidden" name="verificacion_envio" value="1" size="15">
        <input type="hidden" name="cod_estado_vacuna" value="0" size="15">
        </tr>
    </table>
</form>
