<?php $serguridad_pagina = 1; ?>
<?php $nombre_pagina = "Editar Asignaturas"; ?>
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
<div class="breadcrumbs"><a href="<?php echo $pagina; ?>"><h4>Editar asignatura</h4></a></div>
<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
$pagina_local                    = $_SERVER['PHP_SELF']; 
$cod_asignatura                      = intval($_GET['cod_asignatura']);

$mostrar_datos_sql = "SELECT * FROM tbl15_asignatura WHERE cod_asignatura = '$cod_asignatura'";
$consulta = mysqli_query($conectar, $mostrar_datos_sql) or die(mysqli_error($conectar));
$matriz_consulta = mysqli_fetch_assoc($consulta);

$identificacion_asignatura           = $matriz_consulta['identificacion_asignatura'];
$nombre_asignatura                   = $matriz_consulta['nombre_asignatura'];
$cod_tipo_asignatura                 = $matriz_consulta['cod_tipo_asignatura'];
$cod_estado                          = $matriz_consulta['cod_estado'];
?>
<form name="formulario_edicion" accept-charset="utf-8" method="post" action="../admin/edit_asignatura_reg.php">
<fieldset>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table border="1" class="table table-responsive">
    <thead>
        <tr>
            <th style="text-align:right">Id Asig</th>
            <td style="text-align:left"><input class="input-block-level" name="identificacion_asignatura" id="identificacion_asignatura" type="text" value="<?php echo $identificacion_asignatura; ?>" size="30" required /></td>
        </tr>
        <tr>
        <tr>
            <th style="text-align:right">Nombre</th>
            <td style="text-align:left"><input class="input-block-level" name="nombre_asignatura" id="nombre_asignatura" type="text" value="<?php echo $nombre_asignatura; ?>" size="30" required /></td>
        </tr>

        <tr>
            <th style="text-align:right">Tipo</th>
            <td style="text-align:left">
                <select name="cod_tipo_asignatura" id="cod_tipo_asignatura" class="selectpicker" data-show-subtext="true" data-live-search="true" style="width: 200px;" required>
                    <?php if (isset($cod_tipo_asignatura)) { echo ""; } else { echo ""; }
                    $consulta2_sql = ("SELECT cod_tipo_asignatura, nombre_tipo_asignatura FROM tbl15_tipo_asignatura ORDER BY cod_tipo_asignatura ASC");
                    $consulta2 = mysqli_query($conectar, $consulta2_sql);
                    while ($datos2 = mysqli_fetch_assoc($consulta2)) {
                    if(isset($cod_tipo_asignatura) and $cod_tipo_asignatura == $datos2['cod_tipo_asignatura']) {
                    $seleccionado = "selected"; } else { $seleccionado = ""; }
                    $codigo = $datos2['cod_tipo_asignatura'];
                    $nombre = $datos2['nombre_tipo_asignatura'];
                    echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?>
                </select>
            </td>
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

    </thead>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<hr>
<input type="hidden" name="cod_asignatura" value="<?php echo $cod_asignatura ?>"/>
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