<?php $serguridad_pagina = 1; ?>
<?php $nombre_pagina = "Editar Docentes"; ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<?php include_once('../admin/01_modulo_diseno_superior.php'); ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
<?php include_once('../admin/02_modulo_estilo_css.php'); ?>
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
</head>
<body id="pageBody">
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php include_once('../seguridad/seguridad_diseno_plantillas.php'); ?>
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php $pagina = addslashes($_GET['pagina']); ?>
<div id="contentOuterSeparator"></div>
<div class="container">
<div class="divPanel page-content">
<div class="breadcrumbs"><a href="<?php echo $pagina; ?>"><h4>Modificar Datos del Docente</h4></a></div>
<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
$pagina_local                    = $_SERVER['PHP_SELF']; 
$cod_docente                      = intval($_GET['cod_docente']);

$mostrar_datos_sql = "SELECT * FROM tbl15_docente WHERE cod_docente = '$cod_docente'";
$consulta = mysqli_query($conectar, $mostrar_datos_sql) or die(mysqli_error($conectar));
$matriz_consulta = mysqli_fetch_assoc($consulta);

$identificacion_docente           = $matriz_consulta['identificacion_docente'];
$nombre_tipo_identificacion      = $matriz_consulta['nombre_tipo_identificacion'];
$nombre1_docente                  = $matriz_consulta['nombre1_docente'];
$nombre2_docente                  = $matriz_consulta['nombre2_docente'];
$apellido1_docente                = $matriz_consulta['apellido1_docente'];
$apellido2_docente                = $matriz_consulta['apellido2_docente'];
$fecha_nac_docente                = $matriz_consulta['fecha_nac_docente'];
$direccion_docente                = $matriz_consulta['direccion_docente'];
$telefono1_docente                = $matriz_consulta['telefono1_docente'];
$cod_tipo_jornada                = $matriz_consulta['cod_tipo_jornada'];
$correo_docente                   = $matriz_consulta['correo_docente'];
$cod_sexo                        = $matriz_consulta['cod_sexo'];
$nombre_acudiente_docente         = $matriz_consulta['nombre_acudiente_docente'];
$telefono_acudiente_docente       = $matriz_consulta['telefono_acudiente_docente'];
$cod_estado                      = $matriz_consulta['cod_estado'];
$url_img_docente_orig             = $matriz_consulta['url_img_docente_orig'];
$url_img_docente_min              = $matriz_consulta['url_img_docente_min'];
$cod_grupo                           = $matriz_consulta['cod_grupo'];

if ($url_img_docente_min == '') {
$url_img_docente_orig        = '../imagenes/img_no_disponible_grand.png';
$url_img_docente_min         = '../imagenes/img_no_disponible_grand.png';
} else {
$url_img_docente_orig        = $matriz_consulta['url_img_docente_orig'];
$url_img_docente_min         = $matriz_consulta['url_img_docente_min'];
}
?>
<form name="formulario_edicion" accept-charset="utf-8" method="post" action="../admin/edit_docente_reg.php">
<fieldset>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table border="1" class="table table-responsive">
    <thead>
        <tr>
            <th style="text-align:right">Num Doc Docente:</th>
            <td style="text-align:left"><input class="input-block-level" name="identificacion_docente" id="identificacion_docente" type="number" value="<?php echo $identificacion_docente; ?>" size="30" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required /></td>
        </tr>
        <tr>
            <th style="text-align:right">Tipo Doc:</th>
            <td style="text-align:left">
                <select name="nombre_tipo_identificacion" id="nombre_tipo_identificacion" class="selectpicker" data-show-subtext="true" data-live-search="true" style="width: 200px;" required>
                    <?php if (isset($cod_opcion_descontable_inv)) { echo ""; } else { echo ""; }
                    $consulta2_sql = ("SELECT nombre_tipo_identificacion FROM tbl15_tipo_identificacion ORDER BY nombre_tipo_identificacion ASC");
                    $consulta2 = mysqli_query($conectar, $consulta2_sql);
                    while ($datos2 = mysqli_fetch_assoc($consulta2)) {
                    if(isset($nombre_tipo_identificacion) and $nombre_tipo_identificacion == $datos2['nombre_tipo_identificacion']) {
                    $seleccionado = "selected"; } else { $seleccionado = ""; }
                    $codigo = $datos2['nombre_tipo_identificacion'];
                    $nombre = $datos2['nombre_tipo_identificacion'];
                    echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?>
                </select>
            </td>
        </tr>
        <tr>
            <th style="text-align:right">Nombre 1:</th>
            <td style="text-align:left"><input class="input-block-level" name="nombre1_docente" id="nombre1_docente" type="text" value="<?php echo $nombre1_docente; ?>" size="30" required /></td>
        </tr>
        <tr>
            <th style="text-align:right">Nombre 2:</th>
            <td style="text-align:left"><input class="input-block-level" name="nombre2_docente" id="nombre2_docente" type="text" value="<?php echo $nombre2_docente; ?>" size="30" required /></td>
        </tr>
        <tr>
            <th style="text-align:right">Apellido 1:</th>
            <td style="text-align:left"><input class="input-block-level" name="apellido1_docente" id="apellido1_docente" type="text" value="<?php echo $apellido1_docente; ?>" size="30" required /></td>
        </tr>
        <tr>
            <th style="text-align:right">Apellido 2:</th>
            <td style="text-align:left"><input class="input-block-level" name="apellido2_docente" id="apellido2_docente" type="text" value="<?php echo $apellido2_docente; ?>" size="30" required /></td>
        </tr>
        <tr>
            <th style="text-align:right">Fecha Nac:</th>
            <td style="text-align:left"><input class="input-block-level" name="fecha_nac_docente" id="fecha_nac_docente" type="date" value="<?php echo $fecha_nac_docente; ?>" size="30" required /></td>
        </tr>
        <tr>
            <th style="text-align:right">Direccion:</th>
            <td style="text-align:left"><input class="input-block-level" name="direccion_docente" id="direccion_docente" type="text" value="<?php echo $direccion_docente; ?>" size="30" required /></td>
        </tr>
        <tr>
            <th style="text-align:right">Telefono:</th>
            <td style="text-align:left"><input class="input-block-level" name="telefono1_docente" id="telefono1_docente" type="number" value="<?php echo $telefono1_docente; ?>" size="30" required /></td>
        </tr>

        <tr>
            <th style="text-align:right">Direccion de Grupo:</th>
            <td style="text-align:left">
                <select name="cod_grupo" id="cod_grupo" class="selectpicker" data-show-subtext="true" data-live-search="true" style="width: 200px;" required>
                    <?php if (isset($cod_grupo)) { echo ""; } else { echo ""; }
                    $consulta2_sql = ("SELECT cod_grupo, nombre_grupo FROM tbl15_grupo ORDER BY nombre_grupo ASC");
                    $consulta2 = mysqli_query($conectar, $consulta2_sql);
                    while ($datos2 = mysqli_fetch_assoc($consulta2)) {
                    if(isset($cod_grupo) and $cod_grupo == $datos2['cod_grupo']) {
                    $seleccionado = "selected"; } else { $seleccionado = ""; }
                    $codigo = $datos2['cod_grupo'];
                    $nombre = $datos2['nombre_grupo'];
                    echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?>
                </select>
            </td>
        </tr>
        <tr>
            <th style="text-align:right">Foto Examinar:</th>
            <td style="text-align:left">
            <?php if ($cod_estado_img_producto_global == '1') { ?>
            <a href="../admin/lista_docente_imagen.php?cod_docente=<?php echo $cod_docente ?>&pagina=<?php echo $pagina_local ?>"><img src="<?php echo $url_img_docente_min ?>" class="img-polaroid" widht="30px" alt=""></a>
            <?php } ?>
            </td>
        </tr>
    </thead>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<hr>
<input type="hidden" name="cod_docente" value="<?php echo $cod_docente ?>"/>
<input type="hidden" name="pagina" value="<?php echo $pagina ?>"/>
<input type="hidden" name="ins_edit" value="formulario_insert_edit">

<div class="actions"><td><input type="submit" value="Actualizar Información" name="submit" id="submitButton" class="btn btn-success" title="Click aqui para enviar" /></td></div>
</fieldset>
</form>
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* FIN MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
</div>
<!--End Main Content Area-->
</div>
<div id="footerInnerSeparator"></div>
</div>
</div>
<!-- 1******************************************************* MODULO FOOTER *********************************************** -->
<?php include_once('../admin/04_modulo_footer.php'); ?>
<!-- 1******************************************************* MODULO FOOTER *********************************************** -->
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->
<?php include_once('../admin/05_modulo_js.php'); ?>
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->
</body>
</html>