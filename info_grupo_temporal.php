<?php if ($total_datos <> 0) { ?>

<?php
$datos_data_info_factura = "SELECT * FROM tbl15_info_grupo_alumno WHERE (cuenta = '$cuenta_actual') AND (cod_caja_virtual = '$cod_caja_virtual')";
$consulta_data_info_factura = mysqli_query($conectar, $datos_data_info_factura);
$data_info_factura = mysqli_fetch_assoc($consulta_data_info_factura);
$factura_ocupada = mysqli_num_rows($consulta_data_info_factura);

$cod_info_grupo_alumno          = $data_info_factura['cod_info_grupo_alumno'];
$cod_grupo                      = $data_info_factura['cod_grupo'];
$cod_asignatura                 = $data_info_factura['cod_asignatura'];
$cod_alumno                     = $data_info_factura['cod_alumno'];
$cod_docente                    = $data_info_factura['cod_docente'];
$cuenta                         = $data_info_factura['cuenta'];
$cod_administrador              = $data_info_factura['cod_administrador'];
$ini_hora                       = $data_info_factura['ini_hora'];
$fin_hora                       = $data_info_factura['fin_hora'];
$fecha_creacion                 = $data_info_factura['fecha_creacion'];
$fecha_modificacion             = $data_info_factura['fecha_modificacion'];

$cod_info_factura_strpad        = str_pad($cod_info_grupo_alumno, 6, "0", STR_PAD_LEFT);

$sql_user_vendedor = "SELECT nombres, apellidos FROM tbl15_administrador WHERE (cod_administrador = '$cod_administrador')";
$consulta_user_vendedor = mysqli_query($conectar, $sql_user_vendedor);
$matriz_user_vendedor = mysqli_fetch_assoc($consulta_user_vendedor);

$nombres_vendedor            = $matriz_user_vendedor['nombres'].' '.$matriz_user_vendedor['apellidos'];

$sql_grupo = "SELECT nombre_grupo FROM tbl15_grupo WHERE (cod_grupo = '$cod_grupo')";
$consulta_grupo = mysqli_query($conectar, $sql_grupo);
$matriz_grupo = mysqli_fetch_assoc($consulta_grupo);

$nombre_grupo                = $matriz_grupo['nombre_grupo'];

$tab                         = 'tbl15_grupo_alumno_temporal';
$tipo                        = 'eliminar';
$campo                       = 'cod_grupo_alumno_temporal';
?>

<script language="javascript">
$(document).ready(function(){
    $("#cod_grupo").on('change', function () {
            var valor = $(this).val();
            var campo = "cod_grupo";
            var tipo_ajax = "tbl15_info_grupo_alumno";
            $.post("guardar_info_factura_grupo_temporal_ajax.php", { valor:valor, campo:campo, tipo_ajax:tipo_ajax, id:<?php echo $cod_info_grupo_alumno; ?> }, function(data){
                $("#modelo").html(data);
        });
   });
});
</script>

<script language="javascript">
$(document).ready(function(){
    $("#cod_asignatura").on('change', function () {
            var valor = $(this).val();
            var campo = "cod_asignatura";
            var tipo_ajax = "tbl15_info_grupo_alumno";
            $.post("guardar_info_factura_grupo_temporal_ajax.php", { valor:valor, campo:campo, tipo_ajax:tipo_ajax, id:<?php echo $cod_info_grupo_alumno; ?> }, function(data){
                $("#modelo").html(data);
        });
   });
});
</script>

<script language="javascript">
$(document).ready(function(){
    $("#cod_docente").on('change', function () {
            var valor = $(this).val();
            var campo = "cod_docente";
            var tipo_ajax = "tbl15_info_grupo_alumno";
            $.post("guardar_info_factura_grupo_temporal_ajax.php", { valor:valor, campo:campo, tipo_ajax:tipo_ajax, id:<?php echo $cod_info_grupo_alumno; ?> }, function(data){
                $("#modelo").html(data);
        });
   });
});
</script>

<script language="javascript">
$(document).ready(function(){
    $("#ini_hora").on('change', function () {
            var valor = $(this).val();
            var campo = "ini_hora";
            var tipo_ajax = "tbl15_info_grupo_alumno";
            $.post("guardar_info_factura_grupo_temporal_ajax.php", { valor:valor, campo:campo, tipo_ajax:tipo_ajax, id:<?php echo $cod_info_grupo_alumno; ?> }, function(data){
                $("#modelo").html(data);
        });
   });
});
</script>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<form method="post" name="formulario" action="../admin/venta_grupo_reg.php">
    <table class="table table-striped" border="1" cellspacing="0" cellpadding="20">
      <tr>
        <th style="text-align:right;">Grupo:</th>
        <th style="text-align:left;"><?php echo $nombre_grupo ?></th>
        <th style="text-align:right;">Asignatura:</th>
        <th style="text-align:left;">
            <select name="cod_asignatura" id="cod_asignatura" class="chosen-select" data-show-subtext="true" data-live-search="true" style="width: 190px;" tabindex="1" required>
                <?php if (isset($cod_asignatura)) { echo "<option value='' >...</option>"; } else { echo "<option value='' selected ></option>"; }
                $consulta2_sql = "SELECT nombre_asignatura, cod_asignatura FROM tbl15_asignatura";
                $consulta2 = mysqli_query($conectar, $consulta2_sql);
                while ($datos2 = mysqli_fetch_assoc($consulta2)) {
                if(isset($cod_asignatura) AND $cod_asignatura == $datos2['cod_asignatura']) {
                $seleccionado = "selected"; } else { $seleccionado = ""; }
                $codigo = $datos2['cod_asignatura'];
                $nombre = $datos2['nombre_asignatura'];
                echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?>
            </select>
        </th>
        <th style="text-align:center;">Crear Grupo</th>
      </tr>
      <tr>
        <th style="text-align:right;">Docente:</th>
        <th style="text-align:left;">
            <select name="cod_docente" id="cod_docente" class="chosen-select" data-show-subtext="true" data-live-search="true" style="width: 190px;" tabindex="1" required>
                <?php if (isset($cod_asignatura)) { echo "<option value='' >...</option>"; } else { echo "<option value='' selected ></option>"; }
                $consulta2_sql = "SELECT nombre1_docente, nombre2_docente, apellido1_docente, apellido2_docente, cod_docente FROM tbl15_docente";
                $consulta2 = mysqli_query($conectar, $consulta2_sql);
                while ($datos2 = mysqli_fetch_assoc($consulta2)) {
                if(isset($cod_docente) AND $cod_docente == $datos2['cod_docente']) {
                $seleccionado = "selected"; } else { $seleccionado = ""; }
                $codigo = $datos2['cod_docente'];
                $nombre = $datos2['nombre1_docente'].' '.$datos2['nombre2_docente'].' '.$datos2['apellido1_docente'].' '.$datos2['apellido2_docente'];
                echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?>
            </select>
        </th>
        <th style="text-align:right;">Horaraio:</th>
        <th style="text-align:left;"><input name="ini_hora" id="ini_hora" type="time" value="<?php echo $ini_hora ?>" style="width: 110px;" required/></th>
        <th style="text-align:center;"><input type="image" src="../imagenes/guardar.png" name="vender" value="Guardar" /></th>
      </tr>

        <?php 
        $sql_temporal = "SELECT cod_grupo_alumno_temporal FROM tbl15_grupo_alumno_temporal WHERE (cuenta = '$cuenta_actual') AND (cod_caja_virtual = '$cod_caja_virtual')";
        $consulta_temporal = mysqli_query($conectar, $sql_temporal);
        $total_datos = mysqli_num_rows($consulta_temporal);
        while ($datos_temporal = mysqli_fetch_assoc($consulta_temporal)) { ?>
        <input type="hidden" name="cod_grupo_alumno_temporal[]" value="<?php echo $datos_temporal['cod_grupo_alumno_temporal']; ?>">
        <?php } ?>

        <?php $pagina ='facturacion_grupo_temporal.php'; ?>
        <input type="hidden" name="cod_info_grupo_alumno" value="<?php echo $cod_info_grupo_alumno ?>" size="10">
        <input type="hidden" name="cod_grupo" value="<?php echo $cod_grupo ?>" size="10">
        <input type="hidden" name="total_datos" value="<?php echo $total_datos; ?>" size="4">
        <input type="hidden" name="pagina" value="<?php echo $pagina_local?>" size="15">
        <input type="hidden" name="flete" value="0" size="15">
        <input type="hidden" name="verificacion_envio" value="1" size="15">
        <input type="hidden" name="cod_estado_vacuna" value="0" size="15">
        </tr>
    </table>
</form>

<?php } else { } ?>

