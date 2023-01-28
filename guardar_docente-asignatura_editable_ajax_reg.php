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
$cuenta_actual           = DAXCRYPTOR::descriptardax($_SESSION['usuario_cryp']);


$valor_intro                           = addslashes($_GET['valor']);
$campo                                 = addslashes($_GET['campo']);
$cod_asignar_alumno_a_grupo            = addslashes($_GET['id']);

if ($campo == 'cod_docente') {

$cod_docente = addslashes($valor_intro);

$data_sql = ("UPDATE tbl15_asignar_alumno_a_grupo SET cod_docente = '$cod_docente' WHERE cod_asignar_alumno_a_grupo = '$cod_asignar_alumno_a_grupo'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}
elseif ($campo == 'precio_venta_producto2') {

$precio_venta_producto2 = addslashes($valor_intro);

$data_sql = ("UPDATE tbl15_producto SET precio_venta_producto2 = '$precio_venta_producto2' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}
elseif ($campo == 'precio_venta_producto3') {

$precio_venta_producto3 = addslashes($valor_intro);

$data_sql = ("UPDATE tbl15_producto SET precio_venta_producto3 = '$precio_venta_producto3' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}
elseif ($campo == 'precio_venta_producto4') {

$precio_venta_producto4 = addslashes($valor_intro);

$data_sql = ("UPDATE tbl15_producto SET precio_venta_producto4 = '$precio_venta_producto4' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}
elseif ($campo == 'precio_venta_producto5') {

$precio_venta_producto5 = addslashes($valor_intro);

$data_sql = ("UPDATE tbl15_producto SET precio_venta_producto5 = '$precio_venta_producto5' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}

elseif ($campo == 'fecha_vencimiento') {

$fecha_vencimiento    = addslashes($valor_intro);
$fecha_vencimiento1   = $fecha_vencimiento;

$data_sql = ("UPDATE tbl15_producto SET fecha_vencimiento = '$fecha_vencimiento', fecha_vencimiento1 = '$fecha_vencimiento1' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

$agreg = "INSERT INTO tbl15_historial_fecha_vencimiento (cod_producto_barra, fecha_vencimiento) VALUES ('$cod_producto_barra', '$fecha_vencimiento')";
$resultado_sql1 = mysqli_query($conectar, $agreg) or die(mysqli_error($conectar));
//$sql_histo_vencimiento = "SELECT MAX(cod_historial_fecha_vencimiento) AS cod_historial_fecha_vencimiento FROM tbl15_historial_fecha_vencimiento WHERE cod_producto_barra = '$cod_producto_barra'";
//$consulta_histo_vencimiento = mysqli_query($conectar, $sql_histo_vencimiento) or die(mysqli_error($conectar));
//$datos_histo_vencimiento = mysqli_fetch_assoc($consulta_histo_vencimiento);

//$cod_historial_fecha_vencimiento = $datos_histo_vencimiento['cod_historial_fecha_vencimiento'];

//$data_sql = ("UPDATE tbl15_historial_fecha_vencimiento SET fecha_vencimiento = '$fecha_vencimiento' WHERE cod_historial_fecha_vencimiento = '$cod_historial_fecha_vencimiento'");
//$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}

elseif ($campo == 'fecha_vencimiento1') {

$fecha_vencimiento    = addslashes($valor_intro);
$fecha_vencimiento1   = $fecha_vencimiento;

$data_sql = ("UPDATE tbl15_producto SET fecha_vencimiento = '$fecha_vencimiento', fecha_vencimiento1 = '$fecha_vencimiento1' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

$agreg = "INSERT INTO tbl15_historial_fecha_vencimiento (cod_producto_barra, fecha_vencimiento) VALUES ('$cod_producto_barra', '$fecha_vencimiento')";
$resultado_sql1 = mysqli_query($conectar, $agreg) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}

elseif ($campo == 'lote_vencimiento') {

$lote_vencimiento     = addslashes($valor_intro);
$vencimiento_lote1    = addslashes($lote_vencimiento);

$data_sql = ("UPDATE tbl15_producto SET lote_vencimiento = '$lote_vencimiento', vencimiento_lote1 = '$vencimiento_lote1' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}

elseif ($campo == 'vencimiento_lote1') {

$lote_vencimiento     = addslashes($valor_intro);
$vencimiento_lote1    = addslashes($valor_intro);

$data_sql = ("UPDATE tbl15_producto SET lote_vencimiento = '$lote_vencimiento', vencimiento_lote1 = '$vencimiento_lote1' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

$agreg = "INSERT INTO tbl15_historial_fecha_vencimiento (cod_producto_barra, fecha_vencimiento) VALUES ('$cod_producto_barra', '$fecha_vencimiento1')";
$resultado_sql1 = mysqli_query($conectar, $agreg) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}

elseif ($campo == 'iva_ptj') {

$iva_ptj = addslashes($valor_intro);

$data_sql = ("UPDATE tbl15_producto SET iva_ptj = '$iva_ptj' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}
elseif ($campo == 'comision_ptj') {

$comision_ptj = addslashes($valor_intro);

$data_sql = ("UPDATE tbl15_producto SET comision_ptj = '$comision_ptj' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}
elseif ($campo == 'nombre_tipo_producto') {

$cod_productos_frag = explode('-', $_GET['id']);
$cod_producto = $cod_productos_frag[1];

$nombre_tipo_producto = addslashes($valor_intro);

$data_sql = ("UPDATE tbl15_producto SET nombre_tipo_producto = '$nombre_tipo_producto' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}

elseif ($campo == 'nombre_tipo_unidad_medida') {

$cod_productos_frag = explode('-', $_GET['id']);
$cod_producto = $cod_productos_frag[1];

$nombre_tipo_unidad_medida = addslashes($valor_intro);

$data_sql = ("UPDATE tbl15_producto SET nombre_tipo_unidad_medida = '$nombre_tipo_unidad_medida' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}

elseif ($campo == 'unidad_medida_peso') {

$cod_productos_frag = explode('-', $_GET['id']);
$cod_producto = $cod_productos_frag[1];

$unidad_medida_peso = addslashes($valor_intro);

$data_sql = ("UPDATE tbl15_producto SET unidad_medida_peso = '$unidad_medida_peso' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}

elseif ($campo == 'nombre_estado') {

$cod_productos_frag = explode('-', $_GET['id']);
$cod_producto = $cod_productos_frag[1];

$nombre_estado = addslashes($valor_intro);

$data_sql = ("UPDATE tbl15_producto SET nombre_estado = '$nombre_estado' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}

elseif ($campo == 'cod_origen_produccion') {

$cod_productos_frag = explode('-', $_GET['id']);
$cod_producto = $cod_productos_frag[1];

$cod_origen_produccion = intval($valor_intro);

$data_sql = ("UPDATE tbl15_producto SET cod_origen_produccion = '$cod_origen_produccion' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}

elseif ($campo == 'cod_promocion') {

$cod_productos_frag = explode('-', $_GET['id']);
$cod_producto = $cod_productos_frag[1];

$cod_promocion = intval($valor_intro);

$sql_datos_promocion = "SELECT nombre_promocion, nombre_promocion_ing FROM tbl15_promocion WHERE (cod_promocion = '$cod_promocion')";
$resultado_datos_promocion = mysqli_query($conectar, $sql_datos_promocion);
$info_datos_promocion = mysqli_fetch_assoc($resultado_datos_promocion);

$nombre_promocion             = $info_datos_promocion['nombre_promocion']; 
$nombre_promocion_ing         = $info_datos_promocion['nombre_promocion_ing']; 

$data_sql = ("UPDATE tbl15_producto SET nombre_promocion = '$nombre_promocion', nombre_promocion_ing = '$nombre_promocion_ing' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}

elseif ($campo == 'cod_dependencia') {

$cod_productos_frag = explode('-', $_GET['id']);
$cod_producto = $cod_productos_frag[1];

$cod_dependencia = intval($valor_intro);

$data_sql = ("UPDATE tbl15_producto SET cod_dependencia = '$cod_dependencia' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}

elseif ($campo == 'cod_dependencia_sub') {

$cod_productos_frag = explode('-', $_GET['id']);
$cod_producto = $cod_productos_frag[1];

$cod_dependencia_sub = intval($valor_intro);

$data_sql = ("UPDATE tbl15_producto SET cod_dependencia_sub = '$cod_dependencia_sub' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}

elseif ($campo == 'cod_categoria') {

$cod_productos_frag = explode('-', $_GET['id']);
$cod_producto = $cod_productos_frag[1];

$cod_categoria = intval($valor_intro);

$data_sql = ("UPDATE tbl15_producto SET cod_categoria = '$cod_categoria' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}

elseif ($campo == 'cod_marca') {

$cod_productos_frag = explode('-', $_GET['id']);
$cod_producto = $cod_productos_frag[1];

$cod_marca = intval($valor_intro);

$data_sql = ("UPDATE tbl15_producto SET cod_marca = '$cod_marca' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}

elseif ($campo == 'cod_estado_peso') {

$cod_productos_frag = explode('-', $_GET['id']);
$cod_producto = $cod_productos_frag[1];

$cod_estado_peso = intval($valor_intro);

$data_sql = ("UPDATE tbl15_producto SET cod_estado_peso = '$cod_estado_peso' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}

elseif ($campo == 'cod_tipo_producto_cocina') {

$cod_productos_frag = explode('-', $_GET['id']);
$cod_producto = $cod_productos_frag[1];

$cod_tipo_producto_cocina = intval($valor_intro);

$data_sql = ("UPDATE tbl15_producto SET cod_tipo_producto_cocina = '$cod_tipo_producto_cocina' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}

elseif ($campo == 'cod_opcion_descontable_inv') {

$cod_productos_frag = explode('-', $_GET['id']);
$cod_producto = $cod_productos_frag[1];

$cod_opcion_descontable_inv = intval($valor_intro);

$data_sql = ("UPDATE tbl15_producto SET cod_opcion_descontable_inv = '$cod_opcion_descontable_inv' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}

elseif ($campo == 'nombre_tipo_precio_venta') {

$cod_productos_frag = explode('-', $_GET['id']);
$cod_producto = $cod_productos_frag[1];

$nombre_tipo_precio_venta = addslashes($valor_intro);

$data_sql = ("UPDATE tbl15_producto SET nombre_tipo_precio_venta = '$nombre_tipo_precio_venta' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}

elseif ($campo == 'nombre_tipo_producto') {

$cod_productos_frag = explode('-', $_GET['id']);
$cod_producto = $cod_productos_frag[1];

$nombre_tipo_producto = intval($valor_intro);

$data_sql = ("UPDATE tbl15_producto SET nombre_tipo_producto = '$nombre_tipo_producto' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}

elseif ($campo == 'fecha_mantenimiento') {

$fecha_mantenimiento = addslashes($valor_intro);

$data_sql = ("UPDATE tbl15_producto SET fecha_mantenimiento = '$fecha_mantenimiento' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

$agreg = "INSERT INTO tbl15_historial_fecha_mantenimiento (cod_producto_barra, fecha_mantenimiento) VALUES ('$cod_producto_barra', '$fecha_mantenimiento')";
$resultado_sql1 = mysqli_query($conectar, $agreg) or die(mysqli_error($conectar));

//$sql_histo_mantemimiento = "SELECT MAX(cod_historial_fecha_mantenimiento) AS cod_historial_fecha_mantenimiento FROM tbl15_historial_fecha_mantenimiento WHERE cod_producto_barra = '$cod_producto_barra'";
//$consulta_histo_mantemimiento = mysqli_query($conectar, $sql_histo_mantemimiento) or die(mysqli_error($conectar));
//$datos_histo_mantemimiento = mysqli_fetch_assoc($consulta_histo_mantemimiento);

//$cod_historial_fecha_mantenimiento = $datos_histo_mantemimiento['cod_historial_fecha_mantenimiento'];

//$data_sql = ("UPDATE tbl15_historial_fecha_mantenimiento SET fecha_mantenimiento = '$fecha_mantenimiento' WHERE cod_historial_fecha_mantenimiento = '$cod_historial_fecha_mantenimiento'");
//$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}

else {

$$valor_intro     = addslashes($valor_intro);

$data_sql = ("UPDATE tbl15_producto SET $campo = '$valor_intro' WHERE cod_producto = '$cod_producto'");
$exec_data = mysqli_query($conectar, $data_sql) or die(mysqli_error($conectar));

if (mysqli_affected_rows($conectar) > 0) { echo "AFECTADO SI"; } else { echo "AFECTADO NO"; }
}
?>