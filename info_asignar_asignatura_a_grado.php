<?php
$datos_data_info_factura = "SELECT * FROM tbl15_info_asignar_asignatura_a_grado WHERE (cuenta = '$cuenta_actual') AND (cod_caja_virtual = '$cod_caja_virtual') AND (nombre_estado_factura = 'ABIERTA')";
$consulta_data_info_factura = mysqli_query($conectar, $datos_data_info_factura);
$data_info_factura = mysqli_fetch_assoc($consulta_data_info_factura);
$factura_ocupada = mysqli_num_rows($consulta_data_info_factura);

$cod_info_asignar_asignatura_a_grado    = $data_info_factura['cod_info_asignar_asignatura_a_grado'];
$cod_grado                              = $data_info_factura['cod_grado'];
$anyo                                   = $data_info_factura['anyo'];
$cuenta                                 = $data_info_factura['cuenta'];
$cod_administrador                      = $data_info_factura['cod_administrador'];
$fecha_creacion                         = $data_info_factura['fecha_creacion'];
$fecha_modificacion                     = $data_info_factura['fecha_modificacion'];

$cod_info_factura_strpad                = str_pad($cod_info_asignar_asignatura_a_grado, 6, "0", STR_PAD_LEFT);

$sql_user_vendedor = "SELECT nombres, apellidos FROM tbl15_administrador WHERE (cod_administrador = '$cod_administrador')";
$consulta_user_vendedor = mysqli_query($conectar, $sql_user_vendedor);
$matriz_user_vendedor = mysqli_fetch_assoc($consulta_user_vendedor);

$nombres_vendedor            = $matriz_user_vendedor['nombres'].' '.$matriz_user_vendedor['apellidos'];

$sql_grupo = "SELECT * FROM tbl15_grado WHERE (cod_grado = '$cod_grado')";
$consulta_grupo = mysqli_query($conectar, $sql_grupo);
$matriz_grupo = mysqli_fetch_assoc($consulta_grupo);

$nombre_grado                = $matriz_grupo['nombre_grado'];
$nombre_grado_letra          = $matriz_grupo['nombre_grado_letra'];

$tab                         = 'tbl15_asignar_asignatura_a_grado_temporal';
$tipo                        = 'eliminar';
$campo                       = 'cod_grado_alumno_temporal';
?>

<script language="javascript">
$(document).ready(function(){
    $("#cod_grado").on('change', function () {
            var valor = $(this).val();
            var campo = "cod_grado";
            var tipo_ajax = "tbl15_info_asignar_asignatura_a_grado";
            $.post("guardar_info_factura_asignar_asignatura_a_grado_temporal_ajax.php", { valor:valor, campo:campo, tipo_ajax:tipo_ajax, id:<?php echo $cod_info_asignar_asignatura_a_grado; ?> }, function(data){
                $("#modelo").html(data);
        });
   });
});
</script>

<script language="javascript">
$(document).ready(function(){
    $("#anyo").on('change', function () {
            var valor = $(this).val();
            var campo = "anyo";
            var tipo_ajax = "tbl15_info_asignar_asignatura_a_grado";
            $.post("guardar_info_factura_asignar_asignatura_a_grado_temporal_ajax.php", { valor:valor, campo:campo, tipo_ajax:tipo_ajax, id:<?php echo $cod_info_asignar_asignatura_a_grado; ?> }, function(data){
                $("#modelo").html(data);
        });
   });
});
</script>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<form method="post" name="formulario" action="../admin/venta_asignar_asignatura_a_grado_reg.php">
    <table class="table table-striped" border="1" cellspacing="0" cellpadding="20">
      <tr>
        <th style="text-align:right;">Grado:</th>
        <th style="text-align:left;"><?php echo $nombre_grado ?></th>
        <th style="text-align:right;">Año:</th>
        <th style="text-align:left;">
            <select name="anyo" id="anyo" class="" data-show-subtext="true" data-live-search="true" style="width: 190px;" tabindex="1" required>
                <?php if (isset($anyo)) { echo "<option value='' >...</option>"; } else { echo "<option value='' selected ></option>"; }
                $consulta2_sql = "SELECT cod_tabla_anyo, nombre_tabla_anyo FROM tbl15_tabla_anyo";
                $consulta2 = mysqli_query($conectar, $consulta2_sql);
                while ($datos2 = mysqli_fetch_assoc($consulta2)) {
                if(isset($anyo) AND $anyo == $datos2['nombre_tabla_anyo']) {
                $seleccionado = "selected"; } else { $seleccionado = ""; }
                $codigo = $datos2['nombre_tabla_anyo'];
                $nombre = $datos2['nombre_tabla_anyo'];
                echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?>
            </select>
        </th>
  
        <th style="text-align:center;">Guardar</th>
        <th style="text-align:center;"><input type="image" src="../imagenes/guardar.png" name="vender" value="Guardar" /></th>

      </tr>
        <?php $pagina ='facturacion_asignar_asignatura_a_grado.php'; ?>
        <input type="hidden" name="cod_info_asignar_asignatura_a_grado" value="<?php echo $cod_info_asignar_asignatura_a_grado ?>" size="10">
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
