<?php
$datos_data_info_factura = "SELECT * FROM tbl15_info_asignar_alumno_a_grupo WHERE (cod_info_asignar_alumno_a_grupo = '$cod_info_asignar_alumno_a_grupo')";
$consulta_data_info_factura = mysqli_query($conectar, $datos_data_info_factura);
$data_info_factura = mysqli_fetch_assoc($consulta_data_info_factura);
$factura_ocupada = mysqli_num_rows($consulta_data_info_factura);

$cod_info_asignar_alumno_a_grupo        = $data_info_factura['cod_info_asignar_alumno_a_grupo'];
$cod_grado                              = $data_info_factura['cod_grado'];
$nombre_grupo                           = $data_info_factura['nombre_grupo'];
$anyo                                   = $data_info_factura['anyo'];
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

$sql_grupo = "SELECT * FROM tbl15_grado WHERE (cod_grado = '$cod_grado')";
$consulta_grupo = mysqli_query($conectar, $sql_grupo);
$matriz_grupo = mysqli_fetch_assoc($consulta_grupo);

$nombre_grado                = $matriz_grupo['nombre_grado'];
$nombre_grado_letra          = $matriz_grupo['nombre_grado_letra'];

$tab                         = 'tbl15_asignar_alumno_a_grupo';
$tipo                        = 'eliminar';
$campo                       = 'cod_grado_alumno_temporal';

$sql_total_reg_alumno_a_grupo = "SELECT * FROM tbl15_asignar_alumno_a_grupo WHERE (cod_info_asignar_alumno_a_grupo = '$cod_info_asignar_alumno_a_grupo') GROUP BY cod_alumno";
$consulta_total_reg_alumno_a_grupo = mysqli_query($conectar, $sql_total_reg_alumno_a_grupo);
$data_total_reg_alumno_a_grupoa = mysqli_fetch_assoc($consulta_total_reg_alumno_a_grupo);
$total_reg_alumno_a_grupo = mysqli_num_rows($consulta_total_reg_alumno_a_grupo);

$sql_director_grupo = "SELECT identificacion_docente, nombre1_docente, nombre2_docente, apellido1_docente, apellido2_docente FROM tbl15_docente WHERE (cod_docente = '$cod_director_grupo')";
$consulta_director_grupo = mysqli_query($conectar, $sql_director_grupo);
$datos_director_grupo = mysqli_fetch_assoc($consulta_director_grupo);

$nombre_director_grupo                       = $datos_director_grupo['nombre1_docente'].' '.$datos_director_grupo['nombre2_docente'].' '.$datos_director_grupo['apellido1_docente'].' '.$datos_director_grupo['apellido2_docente'];


$sql_tipo_jornada = "SELECT * FROM tbl15_tipo_jornada WHERE (cod_tipo_jornada = '$cod_tipo_jornada')";
$consulta_tipo_jornada = mysqli_query($conectar, $sql_tipo_jornada);
$datos_tipo_jornada = mysqli_fetch_assoc($consulta_tipo_jornada);

$nombre_tipo_jornada                         = $datos_tipo_jornada['nombre_tipo_jornada'];
?>

<script language="javascript">
$(document).ready(function(){
    $("#cod_director_grupo").on('change', function () {
            var valor = $(this).val();
            var campo = "cod_director_grupo";
            var tipo_ajax = "tbl15_info_asignar_alumno_a_grupo";
            $.post("edit_guardar_info_factura_asignar_alumno_a_grupo_ajax.php", { valor:valor, campo:campo, tipo_ajax:tipo_ajax, id:<?php echo $cod_info_asignar_alumno_a_grupo; ?> }, function(data){
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
            $.post("edit_guardar_info_factura_asignar_alumno_a_grupo_ajax.php", { valor:valor, campo:campo, tipo_ajax:tipo_ajax, id:<?php echo $cod_info_asignar_alumno_a_grupo; ?> }, function(data){
                $("#modelo").html(data);
        });
   });
});
</script>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <table class="table table-striped" border="1" cellspacing="0" cellpadding="20">
      <tr>
        <th style="text-align:right;">Grupo:</th>
        <th style="text-align:left;"><?php echo $nombre_grupo ?></th>

        <th style="text-align:right;">Año:</th>
        <th style="text-align:left;"><?php echo $anyo ?></th>

        <th style="text-align:right;">Director de Grupo:</th>
        <th style="text-align:left;"><?php echo $nombre_director_grupo ?></th>

        <th style="text-align:right;">Jornada:</th>
        <th style="text-align:left;"><?php echo $nombre_tipo_jornada ?></th>

        <th style="text-align:right;">Total Estudiantes:</th>
        <th style="text-align:left;"><?php echo $total_reg_alumno_a_grupo ?></th>

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
