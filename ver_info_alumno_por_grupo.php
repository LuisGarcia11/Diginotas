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


$sql_alumno_a_grupo = "SELECT * FROM tbl15_asignar_alumno_a_grupo WHERE (cod_info_asignar_alumno_a_grupo = '$cod_info_asignar_alumno_a_grupo') GROUP BY cod_asignatura";
$consulta_alumno_a_grupo = mysqli_query($conectar, $sql_alumno_a_grupo);
$data_alumno_a_grupoa = mysqli_fetch_assoc($consulta_alumno_a_grupo);

$cod_docente                            = $data_alumno_a_grupoa['cod_docente'];


$sql_docente = "SELECT identificacion_docente, nombre1_docente, nombre2_docente, apellido1_docente, apellido2_docente FROM tbl15_docente WHERE (cod_docente = '$cod_docente')";
$consulta_docente = mysqli_query($conectar, $sql_docente);
$datos_docente = mysqli_fetch_assoc($consulta_docente);

$nombre_docente              = $datos_docente['nombre1_docente'].' '.$datos_docente['nombre2_docente'].' '.$datos_docente['apellido1_docente'].' '.$datos_docente['apellido2_docente'];



$sql_director_grupo = "SELECT identificacion_docente, nombre1_docente, nombre2_docente, apellido1_docente, apellido2_docente FROM tbl15_docente WHERE (cod_docente = '$cod_director_grupo')";
$consulta_director_grupo = mysqli_query($conectar, $sql_director_grupo);
$datos_director_grupo = mysqli_fetch_assoc($consulta_director_grupo);

$nombre_director_grupo                       = $datos_director_grupo['nombre1_docente'].' '.$datos_director_grupo['nombre2_docente'].' '.$datos_director_grupo['apellido1_docente'].' '.$datos_director_grupo['apellido2_docente'];


$sql_tipo_jornada = "SELECT * FROM tbl15_tipo_jornada WHERE (cod_tipo_jornada = '$cod_tipo_jornada')";
$consulta_tipo_jornada = mysqli_query($conectar, $sql_tipo_jornada);
$datos_tipo_jornada = mysqli_fetch_assoc($consulta_tipo_jornada);

$nombre_tipo_jornada                         = $datos_tipo_jornada['nombre_tipo_jornada'];

$sql_tipo_jornada = "SELECT * FROM tbl15_asignatura WHERE (cod_asignatura = '$cod_asignatura')";
$consulta_tipo_jornada = mysqli_query($conectar, $sql_tipo_jornada);
$datos_tipo_jornada = mysqli_fetch_assoc($consulta_tipo_jornada);

$nombre_asignatura                         = $datos_tipo_jornada['nombre_asignatura'];
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

<script language="javascript">
$(document).ready(function(){
    $("input").on('change', function () {
        var valor = $(this).val();
        var campo = $(this).attr("name");
        var tipo_ajax = "tbl15_asignar_alumno_a_grupo";
        var id = $(this).attr("class");
        var cod_seguridad = <?php echo $cod_seguridad;?>;
        var pagina_local = "<?php echo $pagina_local;?>";
        var foco = '';

        var nombre_campo_incre = $(this).attr("id");
        let framentador_nombre = nombre_campo_incre.split("und_venta");
        var nombre_campo = framentador_nombre[0];
        var increm = framentador_nombre[1];

        var datos_url_ajax = 'valor='+valor+'&'+'campo='+campo+'&'+'tipo_ajax='+tipo_ajax+'&'+'id='+id+'&'+'foco='+foco+'&'+'nombre_campo_incre='+nombre_campo_incre;

        $.ajax({
            type: "POST",
            url: "../admin/guardar_info_factura_asignar_alumno_a_grupo_ajax.php",
            data: datos_url_ajax,
            //dataType: 'json',
            beforeSend: function(objeto){
                $('#loader').html('<img src="../imagenes/ajax-loader.gif"> Cargando...');
            },
            success:function(respuesta){
                var und_venta = respuesta.und_venta;
                var und_caja_sobre = respuesta.und_caja_sobre;
                var total_venta = respuesta.total_venta;
                var total_venta_producto = respuesta.total_venta_producto;
                var incre = respuesta.incre;
                var ok_ajax = respuesta.ok_ajax;
                var nota_final = respuesta.nota_final;

                $("#nota_final_"+incre).html(nota_final);
                //$("#total_venta").html(total_venta);
                //$("#div_und_caja_sobre"+incre).html(und_venta);
                //$("#total_venta_producto"+incre).html(total_venta_producto);
                //$("#und_venta"+incre).val(und_venta);
                //$("#error_identificacion_repetida").html(respuesta);

            }
        });
    });
});
</script>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <table class="table table-striped" border="1" cellspacing="0" cellpadding="20">
      <tr>
        <th style="text-align:center;">Grupo:</th>
        <th style="text-align:center;">Año:</th>
        <th style="text-align:center;">Jornada:</th>
        <th style="text-align:center;">Director de Grupo:</th>
        <th style="text-align:center;">Total Estudiantes:</th>
        <th style="text-align:center;">Imprimir Planilla Estudiantes:</th>
        <th style="text-align:center;">Imprimir Notas:</th>
      </tr>
      <tr>
        <th style="text-align:center;"><?php echo $nombre_grupo ?></th>
        <th style="text-align:center;"><?php echo $anyo ?></th>
        <th style="text-align:center;"><?php echo $nombre_tipo_jornada ?></th>
        <th style="text-align:center;"><?php echo $nombre_director_grupo ?></th>
        <th style="text-align:center;"><?php echo $total_reg_alumno_a_grupo ?></th>
        <th style="text-align:center;"><a href="../admin/ver_planilla_alumno_grupo_pdf.php?cod_info_asignar_alumno_a_grupo=<?php echo $cod_info_asignar_alumno_a_grupo?>&pagina=<?php echo $pagina ?>" target="_blank"><img src="../imagenes/planilla_pdf.png" class="img-polaroid" alt=""></a></td>
        
        <th style="text-align:center;">Periodo:
            <select name="nombre_periodo" id="nombre_periodo" class="" data-show-subtext="true" data-live-search="true" style="width: 50px;">
            <?php if (isset($nombre_periodo)) { echo "<option value='' >Selecione</option>"; } else { echo  "<option value='' selected >Selecione</option>"; }
            $sql_consulta2 = "SELECT cod_periodo, nombre_periodo FROM tbl15_periodo";
            $consulta2 = mysqli_query($conectar, $sql_consulta2);
            while ($datos2 = mysqli_fetch_assoc($consulta2)) {
            if(isset($nombre_periodo) and $nombre_periodo == $datos2['nombre_periodo']) {
            $seleccionado = "selected";
            } else { $seleccionado = ""; }
            $codigo = $datos2['nombre_periodo'];
            $nombre = $datos2['nombre_periodo'];
            echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?>
            </select>
            <a id="url_modif" target="_blank"><img src="../imagenes/planilla_pdf.png"></a>
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

<script>  
$(document).ready(function(){ 

$("#nombre_periodo").change(function(){ 
var cod_info_asignar_alumno_a_grupo = <?php echo $cod_info_asignar_alumno_a_grupo ?>;
var cod_asignatura = <?php echo $cod_asignatura ?>;

//var url_parameter = $("#url_modif").attr("href");
var url_parameter = "../admin/ver_planilla_nota_asignatura_alumno_grupo_pdf.php";

var nombre_periodo = $(this).val();
var reem_nombre_periodo = '';
var frag_url = url_parameter.split('&');
var total_nombre_periodo_text = frag_url[2]; 
//reem_nombre_periodo = url_parameter.replace(total_nombre_periodo_text,'nombre_periodo='+nombre_periodo);

reem_nombre_periodo = url_parameter+'?cod_info_asignar_alumno_a_grupo='+cod_info_asignar_alumno_a_grupo+'&cod_asignatura='+cod_asignatura+'&nombre_periodo='+nombre_periodo;
$("#url_modif").attr("href", reem_nombre_periodo);
});

});
</script>