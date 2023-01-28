<?php $serguridad_pagina = 1; ?>
<?php $nombre_pagina = "Modificar Estudiante"; ?>
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
<div class="breadcrumbs"><a href="<?php echo $pagina; ?>"><h4>Modificar Estudiante</h4></a></div>
<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
$pagina_local                    = $_SERVER['PHP_SELF']; 
$cod_alumno                      = intval($_GET['cod_alumno']);

$mostrar_datos_sql = "SELECT * FROM tbl15_alumno WHERE cod_alumno = '$cod_alumno'";
$consulta = mysqli_query($conectar, $mostrar_datos_sql) or die(mysqli_error($conectar));
$matriz_consulta = mysqli_fetch_assoc($consulta);

$identificacion_alumno           = $matriz_consulta['identificacion_alumno'];
$nombre_tipo_identificacion      = $matriz_consulta['nombre_tipo_identificacion'];
$nombre1_alumno                  = $matriz_consulta['nombre1_alumno'];
$nombre2_alumno                  = $matriz_consulta['nombre2_alumno'];
$apellido1_alumno                = $matriz_consulta['apellido1_alumno'];
$apellido2_alumno                = $matriz_consulta['apellido2_alumno'];
$fecha_nac_alumno                = $matriz_consulta['fecha_nac_alumno'];
$direccion_alumno                = $matriz_consulta['direccion_alumno'];
$telefono1_alumno                = $matriz_consulta['telefono1_alumno'];
$cod_tipo_jornada                = $matriz_consulta['cod_tipo_jornada'];
$correo_alumno                   = $matriz_consulta['correo_alumno'];
$cod_sexo                        = $matriz_consulta['cod_sexo'];
$nombre_acudiente_alumno         = $matriz_consulta['nombre_acudiente_alumno'];
$telefono_acudiente_alumno       = $matriz_consulta['telefono_acudiente_alumno'];
$cod_estado                      = $matriz_consulta['cod_estado'];
$url_img_alumno_orig             = $matriz_consulta['url_img_alumno_orig'];
$url_img_alumno_min              = $matriz_consulta['url_img_alumno_min'];

if ($url_img_alumno_min == '') {
$url_img_alumno_orig        = '../imagenes/img_no_disponible_grand.png';
$url_img_alumno_min         = '../imagenes/img_no_disponible_grand.png';
} else {
$url_img_alumno_orig        = $matriz_consulta['url_img_alumno_orig'];
$url_img_alumno_min         = $matriz_consulta['url_img_alumno_min'];
}
?>
<form name="formulario_edicion" accept-charset="utf-8" method="post" action="../admin/edit_alumno_reg.php">
<fieldset>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table border="1" class="table table-responsive">
    <thead>
        <tr>
            <th style="text-align:right">Num Doc Estudiante</th>
            <td style="text-align:left"><input class="input-block-level" name="identificacion_alumno" id="identificacion_alumno" type="number" value="<?php echo $identificacion_alumno; ?>" size="30" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required /></td>
        </tr>
        <tr>
            <th style="text-align:right">Tipo Doc</th>
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
            <th style="text-align:right">Nombre 1</th>
            <td style="text-align:left"><input class="input-block-level" name="nombre1_alumno" id="nombre1_alumno" type="text" value="<?php echo $nombre1_alumno; ?>" size="30" required /></td>
        </tr>
        <tr>
            <th style="text-align:right">Nombre 2</th>
            <td style="text-align:left"><input class="input-block-level" name="nombre2_alumno" id="nombre2_alumno" type="text" value="<?php echo $nombre2_alumno; ?>" size="30" required /></td>
        </tr>
        <tr>
            <th style="text-align:right">Apellido 1</th>
            <td style="text-align:left"><input class="input-block-level" name="apellido1_alumno" id="apellido1_alumno" type="text" value="<?php echo $apellido1_alumno; ?>" size="30" required /></td>
        </tr>
        <tr>
            <th style="text-align:right">Apellido 2</th>
            <td style="text-align:left"><input class="input-block-level" name="apellido2_alumno" id="apellido2_alumno" type="text" value="<?php echo $apellido2_alumno; ?>" size="30" required /></td>
        </tr>
        <tr>
            <th style="text-align:right">Fecha Nac</th>
            <td style="text-align:left"><input class="input-block-level" name="fecha_nac_alumno" id="fecha_nac_alumno" type="date" value="<?php echo $fecha_nac_alumno; ?>" size="30" required /></td>
        </tr>
        <tr>
            <th style="text-align:right">Direccion</th>
            <td style="text-align:left"><input class="input-block-level" name="direccion_alumno" id="direccion_alumno" type="text" value="<?php echo $direccion_alumno; ?>" size="30" required /></td>
        </tr>
        <tr>
            <th style="text-align:right">Telefono</th>
            <td style="text-align:left"><input class="input-block-level" name="telefono1_alumno" id="telefono1_alumno" type="number" value="<?php echo $telefono1_alumno; ?>" size="30" required /></td>
        </tr>
        <tr>
            <th style="text-align:right">Jornada</th>
            <td style="text-align:left">
                <select name="cod_tipo_jornada" id="cod_tipo_jornada" class="selectpicker" data-show-subtext="true" data-live-search="true" style="width: 200px;" required>
                    <?php if (isset($cod_tipo_jornada)) { echo ""; } else { echo ""; }
                    $consulta2_sql = ("SELECT cod_tipo_jornada, nombre_tipo_jornada FROM tbl15_tipo_jornada ORDER BY cod_tipo_jornada ASC");
                    $consulta2 = mysqli_query($conectar, $consulta2_sql);
                    while ($datos2 = mysqli_fetch_assoc($consulta2)) {
                    if(isset($cod_tipo_jornada) and $cod_tipo_jornada == $datos2['cod_tipo_jornada']) {
                    $seleccionado = "selected"; } else { $seleccionado = ""; }
                    $codigo = $datos2['cod_tipo_jornada'];
                    $nombre = $datos2['nombre_tipo_jornada'];
                    echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?>
                </select>
            </td>
        </tr>
        <tr>
            <th style="text-align:right">E-mail</th>
            <td style="text-align:left"><input class="input-block-level" name="correo_alumno" id="correo_alumno" type="text" value="<?php echo $correo_alumno; ?>" size="30" /></td>
        </tr>
        <tr>
            <th style="text-align:right">Genero</th>
            <td style="text-align:left">
                <select name="cod_sexo" id="cod_sexo" class="selectpicker" data-show-subtext="true" data-live-search="true" style="width: 200px;" required>
                    <?php if (isset($cod_sexo)) { echo ""; } else { echo ""; }
                    $consulta2_sql = ("SELECT cod_sexo, nombre_sexo FROM tbl15_sexo ORDER BY cod_sexo ASC");
                    $consulta2 = mysqli_query($conectar, $consulta2_sql);
                    while ($datos2 = mysqli_fetch_assoc($consulta2)) {
                    if(isset($cod_sexo) and $cod_sexo == $datos2['cod_sexo']) {
                    $seleccionado = "selected"; } else { $seleccionado = ""; }
                    $codigo = $datos2['cod_sexo'];
                    $nombre = $datos2['nombre_sexo'];
                    echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?>
                </select>
            </td>
        </tr>
        <tr>
            <th style="text-align:right">Nombre Acu</th>
            <td style="text-align:left"><input class="input-block-level" name="nombre_acudiente_alumno" id="nombre_acudiente_alumno" type="text" value="<?php echo $nombre_acudiente_alumno; ?>" size="30" required /></td>
        </tr>
        <tr>
            <th style="text-align:right">Telefono Acu</th>
            <td style="text-align:left"><input class="input-block-level" name="telefono_acudiente_alumno" id="telefono_acudiente_alumno" type="number" value="<?php echo $telefono_acudiente_alumno; ?>" size="30" required /></td>
        </tr>
        <tr>
            <th style="text-align:right">Estado</th>
            <td style="text-align:left">
                <select name="cod_estado" id="cod_estado" class="selectpicker" data-show-subtext="true" data-live-search="true" style="width: 200px;" required>
                    <?php if (isset($cod_estado)) { echo ""; } else { echo ""; }
                    $consulta2_sql = ("SELECT cod_estado, nombre_estado FROM tbl15_estado ORDER BY cod_estado ASC");
                    $consulta2 = mysqli_query($conectar, $consulta2_sql);
                    while ($datos2 = mysqli_fetch_assoc($consulta2)) {
                    if(isset($cod_estado) and $cod_estado == $datos2['cod_estado']) {
                    $seleccionado = "selected"; } else { $seleccionado = ""; }
                    $codigo = $datos2['cod_estado'];
                    $nombre = $datos2['nombre_estado'];
                    echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?>
                </select>
            </td>
        </tr>
        <tr>
            <th style="text-align:right">Foto Examinar</th>
            <td style="text-align:left">
            <?php if ($cod_estado_img_producto_global == '1') { ?>
            <a href="../admin/lista_alumno_imagen.php?cod_alumno=<?php echo $cod_alumno ?>&pagina=<?php echo $pagina_local ?>"><img src="<?php echo $url_img_alumno_min ?>" class="img-polaroid" widht="30px" alt=""></a>
            <?php } ?>
            </td>
        </tr>
    </thead>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<hr>
<input type="hidden" name="cod_alumno" value="<?php echo $cod_alumno ?>"/>
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