<?php
include_once('../conexiones/conexione.php');
include_once('../admin/class_php/funcion_cryptor_descryptor_class.php');
include_once('../evitar_mensaje_error/error.php');

date_default_timezone_set("America/Bogota");
//include_once('../admin/fecha_en_espanol.php');
include_once("../session/funciones_admin.php");
//include("../tbl15_notificacion_alerta/mostrar_noficacion_alerta.php");
if (verificar_usuario()){
//print "Bienvenido (a), <strong>".$_SESSION['usuario'].", </strong>al sistema.";
  } else { header("Location:../index.php");
}
$cod_administrador  = $_SESSION['cod_administrador'];
include_once('../admin/01_modulo_permisos.php');

$sql_infos_empresas = "SELECT * FROM tbl15_info_empresa WHERE cod_info_empresa = '1'";
$resultado_infos_empresas = mysqli_query($conectar, $sql_infos_empresas);
$info_empresa_data = mysqli_fetch_assoc($resultado_infos_empresas);

$titulo_emp                                        = $info_empresa_data['titulo'];
$nombre_emp                                        = $info_empresa_data['nombre'];
$eslogan_emp                                       = $info_empresa_data['eslogan'];
$direccion_emp                                     = $info_empresa_data['direccion'];
$ciudad_emp                                        = $info_empresa_data['ciudad'];
$pais_emp                                          = $info_empresa_data['pais'];
$correo_emp                                        = $info_empresa_data['correo'];
$img_cabecera_emp                                  = $info_empresa_data['img_cabecera'];
$telefono_emp                                      = $info_empresa_data['telefono'];
$info_legal_emp                                    = $info_empresa_data['info_legal'];
$logotipo_emp                                      = $info_empresa_data['logotipo'];
$propietario_nombres_apellidos_emp                 = $info_empresa_data['propietario_nombres_apellidos'];
$propietario_nit_emp                               = $info_empresa_data['propietario_nit'];
$nit_empresa_emp                                   = $info_empresa_data['nit_empresa'];
$cabecera_emp                                      = $info_empresa_data['cabecera'];
$icono_emp                                         = $info_empresa_data['icono'];
$desarrollador_emp                                 = $info_empresa_data['desarrollador'];
$pag_desarrollador_emp                             = $info_empresa_data['pag_desarrollador'];
$anyo_emp                                          = $info_empresa_data['anyo'];
$url_pag                                           = $info_empresa_data['url_pag'];
$nombre_font                                       = $info_empresa_data['nombre_font'];
$res_emp                                           = $info_empresa_data['res'];
$res1_emp                                          = $info_empresa_data['res1'];
$res2_emp                                          = $info_empresa_data['res2'];
$departamento_emp                                  = $info_empresa_data['departamento'];
$localidad_emp                                     = $info_empresa_data['localidad'];
$reg_medico_emp                                    = $info_empresa_data['reg_medico'];
$regimen_emp                                       = $info_empresa_data['regimen'];
$version_emp                                       = $info_empresa_data['version'];
$propietario_url_firma_emp                         = $info_empresa_data['propietario_url_firma'];
$fecha_time_emp                                    = $info_empresa_data['fecha_time'];
$licencia_emp                                      = $info_empresa_data['licencia'];
$tamano_font_emp                                   = $info_empresa_data['tamano_font'];
$info_histclinic_emp                               = $info_empresa_data['info_histclinic'];
$info_aptlaboral_emp                               = $info_empresa_data['info_aptlaboral'];
$dia_ini_facturacion_emp                           = $info_empresa_data['dia_ini_facturacion'];
$dia_fin_facturacion_emp                           = $info_empresa_data['dia_fin_facturacion'];
$smtp_correo_host_emp                              = $info_empresa_data['smtp_correo_host'];
$smtp_correo_auth_emp                              = $info_empresa_data['smtp_correo_auth'];
$smtp_correo_username_emp                          = $info_empresa_data['smtp_correo_username'];
$smtp_correo_password_emp                          = $info_empresa_data['smtp_correo_password'];
$smtp_correo_secure_emp                            = $info_empresa_data['smtp_correo_secure'];
$smtp_correo_port_emp                              = $info_empresa_data['smtp_correo_port'];
$nombre_concepto_multi_virtual                     = $info_empresa_data['nombre_concepto_multi_virtual'];
$nombre_tipo_precio_venta                          = $info_empresa_data['nombre_tipo_precio_venta'];
$numero_precio                                     = $info_empresa_data['numero_precio'];
$nombre_tipo_empresa                               = $info_empresa_data['nombre_tipo_empresa'];

$dias_vencimiento_producto_alerta                  = $info_empresa_data['dias_vencimiento_producto_alerta'];
$cod_estado_fecha_vencimiento_global               = $info_empresa_data['cod_estado_fecha_vencimiento_global'];
$cod_estado_ptj_comision_global                    = $info_empresa_data['cod_estado_ptj_comision_global'];
$cod_estado_impoconsumo_global                     = $info_empresa_data['cod_estado_impoconsumo_global'];
$cod_estado_dto1_global                            = $info_empresa_data['cod_estado_dto1_global'];
$cod_estado_dto2_global                            = $info_empresa_data['cod_estado_dto2_global'];
$cod_estado_preventa_global                        = $info_empresa_data['cod_estado_preventa_global'];
$cod_estado_propina_global                         = $info_empresa_data['cod_estado_propina_global'];
$cod_estado_img_impimir_factura_global             = $info_empresa_data['cod_estado_img_impimir_factura_global'];
$url_encuesta_experiencia_compra                   = $info_empresa_data['url_encuesta_experiencia_compra'];
$cod_estado_encuesta_experiencia_compra_global     = $info_empresa_data['cod_estado_encuesta_experiencia_compra_global'];
$cod_estado_codif_precio_compra_global             = $info_empresa_data['cod_estado_codif_precio_compra_global'];
$cod_estado_codif_precio_venta_global              = $info_empresa_data['cod_estado_codif_precio_venta_global'];
$cod_estado_inventario_bodega_global               = $info_empresa_data['cod_estado_inventario_bodega_global'];
$cod_estado_sticker_barras_global                  = $info_empresa_data['cod_estado_sticker_barras_global'];

$cod_estado_modulo_contabilidad_global             = $info_empresa_data['cod_estado_modulo_contabilidad_global'];
$cod_estado_modulo_cotizacion_global               = $info_empresa_data['cod_estado_modulo_cotizacion_global'];
$nombre_operador_factura_electronica               = $info_empresa_data['nombre_operador_factura_electronica'];
$cod_estado_producto_consumo_global                = $info_empresa_data['cod_estado_producto_consumo_global'];
$cod_estado_compra_caja_global                     = $info_empresa_data['cod_estado_compra_caja_global'];
$nombre_tipo_impresora_zebra_ticket                = $info_empresa_data['nombre_tipo_impresora_zebra_ticket'];
$cod_estado_cuenta_cobrar_global                   = $info_empresa_data['cod_estado_cuenta_cobrar_global'];
$cod_estado_cuenta_pagar_global                    = $info_empresa_data['cod_estado_cuenta_pagar_global'];
$cod_estado_egreso_global                          = $info_empresa_data['cod_estado_egreso_global'];
$cod_estado_usuario_global                         = $info_empresa_data['cod_estado_usuario_global'];
$cod_estado_dependencia_global                     = $info_empresa_data['cod_estado_dependencia_global'];
$cod_estado_numero_letra_global                    = $info_empresa_data['cod_estado_numero_letra_global'];
$cod_estado_resolucion_factura_global              = $info_empresa_data['cod_estado_resolucion_factura_global'];
$cod_estado_cita_global                            = $info_empresa_data['cod_estado_cita_global'];
$cod_estado_factura_compra_global                  = $info_empresa_data['cod_estado_factura_compra_global'];

$cod_estado_modulo_producto_global                 = $info_empresa_data['cod_estado_modulo_producto_global'];
$cod_estado_modulo_facturacion_global              = $info_empresa_data['cod_estado_modulo_facturacion_global'];
$cod_estado_modulo_venta_global                    = $info_empresa_data['cod_estado_modulo_venta_global'];
$cod_estado_modulo_tercero_global                  = $info_empresa_data['cod_estado_modulo_tercero_global'];
$cod_estado_modulo_cuenta_global                   = $info_empresa_data['cod_estado_modulo_cuenta_global'];
$cod_estado_modulo_reporte_global                  = $info_empresa_data['cod_estado_modulo_reporte_global'];
$cod_estado_modulo_admin_global                    = $info_empresa_data['cod_estado_modulo_admin_global'];
$cod_estado_pyg_global                             = $info_empresa_data['cod_estado_pyg_global'];
$cod_estado_balance_global                         = $info_empresa_data['cod_estado_balance_global'];
$cod_estado_mov_contable_global                    = $info_empresa_data['cod_estado_mov_contable_global'];
$cod_estado_ganancia_ptj_global                    = $info_empresa_data['cod_estado_ganancia_ptj_global'];
$cod_estado_modulo_orden_produccion_global         = $info_empresa_data['cod_estado_modulo_orden_produccion_global'];
$cod_estado_comentario_venta_global                = $info_empresa_data['cod_estado_comentario_venta_global'];
$cod_estado_envio_sms_global                       = $info_empresa_data['cod_estado_envio_sms_global'];
$cod_estado_envio_correo_global                    = $info_empresa_data['cod_estado_envio_correo_global'];
$cod_estado_ordenamiento_alfabetico_venta_global   = $info_empresa_data['cod_estado_ordenamiento_alfabetico_venta_global'];

$cod_estado_nocodif_precio_compra_sticker_global   = $info_empresa_data['cod_estado_nocodif_precio_compra_sticker_global'];
$cod_estado_nocodif_precio_venta_sticker_global    = $info_empresa_data['cod_estado_nocodif_precio_venta_sticker_global'];
$cod_estado_nombre_empresa_sticker_global          = $info_empresa_data['cod_estado_nombre_empresa_sticker_global'];
$cod_estado_fecha_compra_sticker_global            = $info_empresa_data['cod_estado_fecha_compra_sticker_global'];
$cod_estado_cod_tercero_sticker_global             = $info_empresa_data['cod_estado_cod_tercero_sticker_global'];
$cod_estado_url_pagina_sticker_global              = $info_empresa_data['cod_estado_url_pagina_sticker_global'];
$cod_estado_nombre_desarrollador_sticker_global    = $info_empresa_data['cod_estado_nombre_desarrollador_sticker_global'];
$cod_estado_qr_sticker_global                      = $info_empresa_data['cod_estado_qr_sticker_global'];
$nombre_empresa_sticker                            = $info_empresa_data['nombre_empresa_sticker'];
$nombre_buscar_por                                 = $info_empresa_data['nombre_buscar_por'];

$cod_estado_img_producto_global                    = $info_empresa_data['cod_estado_img_producto_global'];
$cod_estado_fecha_mantenimiento_global             = $info_empresa_data['cod_estado_fecha_mantenimiento_global'];
$cod_estado_animal_global                          = $info_empresa_data['cod_estado_animal_global'];
$cod_estado_producto_serial_global                 = $info_empresa_data['cod_estado_producto_serial_global'];
$cod_estado_venta_prod_en_cero_global              = $info_empresa_data['cod_estado_venta_prod_en_cero_global'];
$dias_prenes_parto                                 = $info_empresa_data['dias_prenes_parto'];
$cod_estado_habilitar_tercero_por_usuario_global   = $info_empresa_data['cod_estado_habilitar_tercero_por_usuario_global'];
$nombre_tipo_componente                            = $info_empresa_data['nombre_tipo_componente'];
$cod_estado_subproducto_global                     = $info_empresa_data['cod_estado_subproducto_global'];
$cod_estado_nuevo_inventario_global                = $info_empresa_data['cod_estado_nuevo_inventario_global'];
$cod_estado_auditoria_global                       = $info_empresa_data['cod_estado_auditoria_global'];
$cod_estado_cierre_caja_global                     = $info_empresa_data['cod_estado_cierre_caja_global'];
$cod_estado_observacion_tercero_venta_global       = $info_empresa_data['cod_estado_observacion_tercero_venta_global'];

$cod_estado_alerta_fecha_nac_global                          = $info_empresa_data['cod_estado_alerta_fecha_nac_global'];
$cod_estado_categoria_global                                 = $info_empresa_data['cod_estado_categoria_global'];
$cod_estado_peso_producto_global                             = $info_empresa_data['cod_estado_peso_producto_global'];
$cod_estado_estante_producto_global                          = $info_empresa_data['cod_estado_estante_producto_global'];
$dias_fecha_cumpleanos                                       = $info_empresa_data['dias_fecha_cumpleanos'];
$cod_estado_devolucion_btn_verde_global                      = $info_empresa_data['cod_estado_devolucion_btn_verde_global'];
$nombre_tipo_producto_predef                                 = $info_empresa_data['nombre_tipo_producto_predef'];
$cod_estado_plan_separe_global                               = $info_empresa_data['cod_estado_plan_separe_global'];
$cod_estado_admin_global                                     = $info_empresa_data['cod_estado_admin_global'];
$cod_estado_prodcuto_mantenimiento_global                    = $info_empresa_data['cod_estado_prodcuto_mantenimiento_global'];
$cod_estado_eliminar_global                                  = $info_empresa_data['cod_estado_eliminar_global'];
$cod_estado_soporte_factura_compra_global                    = $info_empresa_data['cod_estado_soporte_factura_compra_global'];
$cod_estado_observacion_factura_compra_global                = $info_empresa_data['cod_estado_observacion_factura_compra_global'];
$cod_estado_venta_precio_min_venta_global                    = $info_empresa_data['cod_estado_venta_precio_min_venta_global'];

$nombre_tipo_cobro_parqueo                                   = $info_empresa_data['nombre_tipo_cobro_parqueo'];
$costo_parqueo                                               = $info_empresa_data['costo_parqueo'];
$nombre_tipo_cobro_hotel                                     = $info_empresa_data['nombre_tipo_cobro_hotel'];
$costo_hotel                                                 = $info_empresa_data['costo_hotel'];
$cod_estado_parqueo_hotel_global                             = $info_empresa_data['cod_estado_parqueo_hotel_global'];
$cod_estado_hotel_global                                     = $info_empresa_data['cod_estado_hotel_global'];
$cod_estado_parqueo_global                                   = $info_empresa_data['cod_estado_parqueo_global'];

$cod_estado_plan_accion_correcion_global                     = $info_empresa_data['cod_estado_plan_accion_correcion_global'];

$cod_estado_modal_tercero_nombre_tipo_tercero_global         = $info_empresa_data['cod_estado_modal_tercero_nombre_tipo_tercero_global'];
$cod_estado_modal_tercero_nombre_tipo_identificacion_global  = $info_empresa_data['cod_estado_modal_tercero_nombre_tipo_identificacion_global'];
$cod_estado_modal_tercero_nombre_sino_global                 = $info_empresa_data['cod_estado_modal_tercero_nombre_sino_global'];
$cod_estado_modal_tercero_identificacion_tercero_global      = $info_empresa_data['cod_estado_modal_tercero_identificacion_tercero_global'];
$cod_estado_modal_tercero_digito_tercero_global              = $info_empresa_data['cod_estado_modal_tercero_digito_tercero_global'];
$cod_estado_modal_tercero_nombre1_tercero_global             = $info_empresa_data['cod_estado_modal_tercero_nombre1_tercero_global'];
$cod_estado_modal_tercero_nombre2_tercero_global             = $info_empresa_data['cod_estado_modal_tercero_nombre2_tercero_global'];
$cod_estado_modal_tercero_apellido1_tercero_global           = $info_empresa_data['cod_estado_modal_tercero_apellido1_tercero_global'];
$cod_estado_modal_tercero_apellido2_tercero_global           = $info_empresa_data['cod_estado_modal_tercero_apellido2_tercero_global'];
$cod_estado_modal_tercero_fecha_nac_tercero_global           = $info_empresa_data['cod_estado_modal_tercero_fecha_nac_tercero_global'];
$cod_estado_modal_tercero_nombre_tipo_cliente_global         = $info_empresa_data['cod_estado_modal_tercero_nombre_tipo_cliente_global'];
$cod_estado_modal_tercero_nombre_tipo_regimen_global         = $info_empresa_data['cod_estado_modal_tercero_nombre_tipo_regimen_global'];
$cod_estado_modal_tercero_nombre_tipo_impuesto_global        = $info_empresa_data['cod_estado_modal_tercero_nombre_tipo_impuesto_global'];
$cod_estado_modal_tercero_nombre_pais_global                 = $info_empresa_data['cod_estado_modal_tercero_nombre_pais_global'];
$cod_estado_modal_tercero_nombre_departamento_global         = $info_empresa_data['cod_estado_modal_tercero_nombre_departamento_global'];
$cod_estado_modal_tercero_nombre_ciudad_global               = $info_empresa_data['cod_estado_modal_tercero_nombre_ciudad_global'];
$cod_estado_modal_tercero_direccion_tercero_global           = $info_empresa_data['cod_estado_modal_tercero_direccion_tercero_global'];
$cod_estado_modal_tercero_telefono1_tercero_global           = $info_empresa_data['cod_estado_modal_tercero_telefono1_tercero_global'];
$cod_estado_modal_tercero_correo_tercero_global              = $info_empresa_data['cod_estado_modal_tercero_correo_tercero_global'];
$cod_estado_modal_tercero_fax_tercero_global                 = $info_empresa_data['cod_estado_modal_tercero_fax_tercero_global'];
$cod_estado_cocina_global                                    = $info_empresa_data['cod_estado_cocina_global'];

$cod_estado_cajas_sobre_global                               = $info_empresa_data['cod_estado_cajas_sobre_global'];
$cod_estado_und_sobre_global                                 = $info_empresa_data['cod_estado_und_sobre_global'];

$cod_estado_meses_garantia_global                            = $info_empresa_data['cod_estado_meses_garantia_global'];
$cod_estado_marca_global                                     = $info_empresa_data['cod_estado_marca_global'];
$cod_estado_proveedor_global                                 = $info_empresa_data['cod_estado_proveedor_global'];
$cod_estado_archivo_adjunto_global                           = $info_empresa_data['cod_estado_archivo_adjunto_global'];

$pagina_complt            = $_SERVER['PHP_SELF'];
$fragm                    = explode("/", $pagina_complt);
$ultimo                   = end($fragm);
$total_elementos          = count($fragm) - 1;
$concatenador             = '';
foreach ($fragm as $key => $element) { if ($key <> $total_elementos) { $concatenador .= $element."/"; } }

$pagina                   = $concatenador."lista_alumno.php";
//---------------------------------------------------------------------------------------------------------------------------------//
$cuenta_actual      = DAXCRYPTOR::descriptardax($_SESSION['usuario_cryp']);
$cod_seguridad_des  = DAXCRYPTOR::descriptardax($_SESSION['cs_cryp']);

$cod_seguridad_codif = ($cod_seguridad_des);
$frag1 = str_split($cod_seguridad_codif);
$numero_de_digitos1 = $frag1[0];
if ($numero_de_digitos1 == 1) { $cod_seguridad = $frag1[5]; } 
if ($numero_de_digitos1 == 2) { $cod_seguridad = $frag1[5].$frag1[6]; } 
if ($numero_de_digitos1 == 3) { $cod_seguridad = $frag1[5].$frag1[6].$frag1[7]; } 
if ($numero_de_digitos1 == 4) { $cod_seguridad = $frag1[5].$frag1[6].$frag1[7].$frag1[8]; } 
if ($numero_de_digitos1 == 5) { $cod_seguridad = $frag1[5].$frag1[6].$frag1[7].$frag1[8].$frag1[9]; } 
if ($numero_de_digitos1 == 6) { $cod_seguridad = $frag1[5].$frag1[6].$frag1[7].$frag1[8].$frag1[9].$frag1[10]; } 
if ($numero_de_digitos1 == 7) { $cod_seguridad = $frag1[5].$frag1[6].$frag1[7].$frag1[8].$frag1[9].$frag1[10].$frag1[11]; }
if ($numero_de_digitos1 == 8) { $cod_seguridad = $frag1[5].$frag1[6].$frag1[7].$frag1[8].$frag1[9].$frag1[10].$frag1[11].$frag1[12]; }
if ($numero_de_digitos1 == 9) { $cod_seguridad = $frag1[5].$frag1[6].$frag1[7].$frag1[8].$frag1[9].$frag1[10].$frag1[11].$frag1[12].$frag1[13]; }
//---------------------------------------------------------------------------------------------------------------------------------//
    $action = (isset($_REQUEST['action']) && $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';

if($action == 'ajax') {
    $busqueda_ajax           = mysqli_real_escape_string($conectar,(strip_tags($_REQUEST['busqueda_ajax'], ENT_QUOTES)));
    $tabla                   = mysqli_real_escape_string($conectar,(strip_tags($_REQUEST['tabla'], ENT_QUOTES)));
}
/* ----------------------------------------------------------------------------------------------------------------------- */
/* ----------------------------------------------------------------------------------------------------------------------- */
 if (isset($_GET['id'])){
$id                  = intval($_GET['id']);
$tabla               = addslashes($_GET['tabla']);

$sql_consulta = mysqli_query($conectar, "SELECT * FROM tbl15_alumno WHERE cod_alumno = '".$id."'");
$count = mysqli_num_rows($sql_consulta);
$datos_consulta = mysqli_fetch_array($sql_consulta);

$identificacion_alumno        = $datos_consulta['identificacion_alumno'];
$nombre1_alumno               = $datos_consulta['nombre1_alumno'].' '.$datos_consulta['nombre2_alumno'].' '.$datos_consulta['apellido1_alumno'].' '.$datos_consulta['apellido2_alumno'];
$cod_estado                   = $datos_consulta['cod_estado'];

if ($cod_estado == '1') { $cod_estado = '2'; } else{ $cod_estado = '1'; }

            if ($eliminar_registro = mysqli_query($conectar,"UPDATE tbl15_alumno SET cod_estado = '$cod_estado' WHERE cod_alumno = '".$id."'")) { ?>

            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Aviso!</strong> Datos modificados exitosamente. (<?php echo $nombre1_alumno ;?>)
            </div>
    <?php 
        } else {
    ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
            </div>
<?php
        } //end else
    } //end if
/* ----------------------------------------------------------------------------------------------------------------------- */
/* ----------------------------------------------------------------------------------------------------------------------- */
    if($action == 'ajax') {
// escaping, additionally removing everything that could be (html/javascript-) code
     $sTable = "tbl15_alumno";

     $aColumns = array('identificacion_alumno', 'nombre1_alumno'); //Columnas de busqueda

     $sWhere = "";
    if ( $_GET['busqueda_ajax'] != "" ) {
        $sWhere = "WHERE (";
        for ( $i=0 ; $i<count($aColumns) ; $i++ ) {
            $sWhere .= $aColumns[$i]." LIKE '%".$busqueda_ajax."%' OR ";
        }
        $sWhere = substr_replace( $sWhere, "", -3 );
        $sWhere .= ')';
    }
if ($_GET['busqueda_ajax'] == "") {
    $sWhere.=" ORDER BY cod_alumno DESC";
} else {
    $sWhere.=" ORDER BY cod_alumno DESC";
}
include_once('../ajax/pagination.php'); //include pagination file
    //pagination variables
    $page               = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
    $per_page           = 10; //how much records you want to show
    $adjacents          = 4; //gap between pages after number of adjacents
    $registro_inicio             = ($page - 1) * $per_page;
    //Count the total number of row in your table*/
    $count_query        = mysqli_query($conectar, "SELECT count(*) AS numrows FROM $sTable $sWhere");
    $row                = mysqli_fetch_array($count_query);
    $numrows            = $row['numrows'];
    $total_pages        = ceil($numrows/$per_page);
    $reload             = '../admin/lista_alumno.php';
    //loop through fetched data
    if ($numrows>0) { ?>
<table class="table table-striped jambo_table bulk_action">
<thead>
<tr class="headings">
    <th style="text-align:center" class="column-title">Num Doc Estudiante</th>
    <th style="text-align:center" class="column-title">Tipo Doc</th>
    <th style="text-align:center" class="column-title">Nombres</th>
    <th style="text-align:center" class="column-title">Apellidos</th>
    <th style="text-align:center" class="column-title">Edad</th>
    <th style="text-align:center" class="column-title">Fecha Nac</th>
    <th style="text-align:center" class="column-title">Dirección</th>
    <th style="text-align:center" class="column-title">Teléfono</th>
    <th style="text-align:center" class="column-title">Jornada</th>
    <th style="text-align:center" class="column-title">E-mail</th>
    <th style="text-align:center" class="column-title">Género</th>
    <th style="text-align:center" class="column-title">Nombre Acu</th>
    <th style="text-align:center" class="column-title">Telefono Acu</th>

    <?php if ($cod_estado_prod_url_img_producto_orig == '1') { ?>
    <th style="text-align:center" class="column-title">Foto</th>
    <?php } ?>

    <?php if ($cod_estado_prod_editar == '1') { ?>
    <th style="text-align:center" class="column-title">Modificar</th>
    <?php } ?>

    <?php if ($cod_estado_prod_eliminar == '1') { ?>
    <th style="text-align:center" class="column-title">Estado</th>
    <?php } ?>
</tr>
</thead>
<tbody>
<?php
$fecha_hoy                          = time();
//main query to fetch the data
$sql_consulta = "SELECT * FROM $sTable $sWhere LIMIT $registro_inicio,$per_page";
$query_consulta = mysqli_query($conectar, $sql_consulta);
while ($datos_consulta = mysqli_fetch_array($query_consulta)) {

$cod_alumno                         = $datos_consulta['cod_alumno'];
$nombre_tipo_identificacion         = $datos_consulta['nombre_tipo_identificacion'];
$identificacion_alumno              = $datos_consulta['identificacion_alumno'];
$nombre1_alumno                     = $datos_consulta['nombre1_alumno'];
$nombre2_alumno                     = $datos_consulta['nombre2_alumno'];
$apellido1_alumno                   = $datos_consulta['apellido1_alumno'];
$apellido2_alumno                   = $datos_consulta['apellido2_alumno'];
$fecha_nac_alumno                   = $datos_consulta['fecha_nac_alumno'];
$direccion_alumno                   = $datos_consulta['direccion_alumno'];
$telefono1_alumno                   = $datos_consulta['telefono1_alumno'];
$correo_alumno                      = $datos_consulta['correo_alumno'];
$nombre_acudiente_alumno            = $datos_consulta['nombre_acudiente_alumno'];
$telefono_acudiente_alumno          = $datos_consulta['telefono_acudiente_alumno'];
$url_img_alumno_min                 = $datos_consulta['url_img_alumno_min'];
$url_img_alumno_orig                = $datos_consulta['url_img_alumno_orig'];
$cod_tipo_jornada                   = $datos_consulta['cod_tipo_jornada'];
$cod_estado                         = $datos_consulta['cod_estado'];
$cod_sexo                           = $datos_consulta['cod_sexo'];

$sql_tipo_jornada = "SELECT nombre_tipo_jornada FROM tbl15_tipo_jornada WHERE (cod_tipo_jornada = '$cod_tipo_jornada')";
$query_tipo_jornada = mysqli_query($conectar, $sql_tipo_jornada);
$datos_tipo_jornada = mysqli_fetch_array($query_tipo_jornada);

$nombre_tipo_jornada                = $datos_tipo_jornada['nombre_tipo_jornada'];

$sql_estado = "SELECT nombre_estado FROM tbl15_estado WHERE (cod_estado = '$cod_estado')";
$query_estado = mysqli_query($conectar, $sql_estado);
$datos_estado = mysqli_fetch_array($query_estado);

$nombre_estado                      = $datos_estado['nombre_estado'];

$sql_sexo = "SELECT nombre_sexo FROM tbl15_sexo WHERE (cod_sexo = '$cod_sexo')";
$query_sexo = mysqli_query($conectar, $sql_sexo);
$datos_sexo = mysqli_fetch_array($query_sexo);

$nombre_sexo 	                    = $datos_sexo['nombre_sexo'];

$diferencia_edad                    = abs($fecha_hoy - strtotime($fecha_nac_alumno));
$edad_anyo                          = floor($diferencia_edad / (365*60*60*24));

if ($cod_estado == '1') { $color_estado = '../imagenes/correcto_verde.png'; } else { $color_estado = '../imagenes/correcto_rojo.png'; }
?>
<tr class="even pointer">
    <td style="text-align:left"><?php echo $identificacion_alumno; ?></td>
    <td style="text-align:center"><?php echo $nombre_tipo_identificacion; ?></td>
    <td style="text-align:left"><?php echo $nombre1_alumno.' '.$nombre2_alumno; ?></td>
    <td style="text-align:left"><?php echo $apellido1_alumno.' '.$apellido2_alumno; ?></td>
    <td style="text-align:center"><?php echo $edad_anyo; ?></td>
    <td style="text-align:center"><?php echo $fecha_nac_alumno; ?></td>
    <td style="text-align:center"><?php echo $direccion_alumno; ?></td>
    <td style="text-align:center"><?php echo $telefono1_alumno; ?></td>
    <td style="text-align:center"><?php echo $nombre_tipo_jornada; ?></td>
    <td style="text-align:center"><?php echo $correo_alumno; ?></td>
    <td style="text-align:center"><?php echo $nombre_sexo; ?></td>
    <td style="text-align:center"><?php echo $nombre_acudiente_alumno; ?></td>
    <td style="text-align:center"><?php echo $telefono_acudiente_alumno; ?></td>

    <?php if ($cod_estado_prod_url_img_producto_orig == '1') { ?>
    <td style="text-align:center"><a href="../admin/lista_alumno_imagen.php?cod_alumno=<?php echo $cod_alumno?>&pagina=<?php echo $pagina ?>"><img src="<?php echo $color_estado ?>" width="50%" class="img-rounded" title="Estado" alt=""></a></td>
    <?php } ?>

    <?php if ($cod_estado_prod_editar == '1') { ?>
    <td style="text-align:center"><a href="../admin/edit_alumno.php?cod_alumno=<?php echo $cod_alumno?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/editar.png" class="img-polaroid" title="Editar" alt=""></a></td>
    <?php } ?>

    <?php if ($cod_estado_prod_eliminar == '1') { ?>
    <td style="text-align:center"><a href="#" class='' title='Borrar' onclick="eliminar('<?php echo $cod_alumno; ?>')"><img src="<?php echo $color_estado ?>" title="Cambiar Estado"><?php echo $nombre_estado;?></a></span></td>
    <?php } ?>

    <input type="hidden" value="<?php echo $cod_alumno;?>" id="cod_alumno<?php echo $cod_alumno;?>">
    <input type="hidden" value="<?php echo $identificacion_alumno;?>" id="identificacion_alumno<?php echo $cod_alumno;?>">
    <input type="hidden" value="<?php echo $nombre1_alumno;?>" id="nombre1_alumno<?php echo $cod_alumno;?>">
    <input type="hidden" value="<?php echo $nombre2_alumno;?>" id="nombre2_alumno<?php echo $cod_alumno;?>">
    <input type="hidden" value="<?php echo $apellido1_alumno;?>" id="apellido1_alumno<?php echo $cod_alumno;?>">
    <input type="hidden" value="<?php echo $apellido2_alumno;?>" id="apellido2_alumno<?php echo $cod_alumno;?>">
    <input type="hidden" value="<?php echo $edad_anyo;?>" id="edad_anyo<?php echo $cod_alumno;?>">
    <input type="hidden" value="<?php echo $fecha_nac_alumno;?>" id="fecha_nac_alumno<?php echo $cod_alumno;?>">
    <input type="hidden" value="<?php echo $direccion_alumno;?>" id="direccion_alumno<?php echo $cod_alumno;?>">
    <input type="hidden" value="<?php echo $telefono1_alumno;?>" id="telefono1_alumno<?php echo $cod_alumno;?>">
    <input type="hidden" value="<?php echo $cod_tipo_jornada;?>" id="cod_tipo_jornada<?php echo $cod_alumno;?>">
    <input type="hidden" value="<?php echo $correo_alumno;?>" id="correo_alumno<?php echo $cod_alumno;?>">
    <input type="hidden" value="<?php echo $cod_sexo;?>" id="cod_sexo<?php echo $cod_alumno;?>">
    <input type="hidden" value="<?php echo $nombre_acudiente_alumno;?>" id="nombre_acudiente_alumno<?php echo $cod_alumno;?>">
    <input type="hidden" value="<?php echo $telefono_acudiente_alumno;?>" id="telefono_acudiente_alumno<?php echo $cod_alumno;?>">
    <input type="hidden" value="<?php echo $cod_estado;?>" id="cod_estado<?php echo $cod_alumno;?>">
</tr>
<?php } //end while ?>
<tr>
<td colspan=6><span class="pull-right"><?php echo paginate($reload, $page, $total_pages, $adjacents);?></span></td>
</tr>
</table>
            </div>
            <?php } else { ?> 
            <div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Aviso!</strong> No hay datos para mostrar</div>
        <?php    
        }
    }
?>