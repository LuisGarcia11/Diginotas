<?php $serguridad_pagina = 1; ?>
<?php $nombre_pagina = "Editar Usuarios"; ?>
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
 <!--<div class="container">-->
<div class="divPanel page-content">
<div class="breadcrumbs"><a href="<?php echo $pagina; ?>"><h4>Editar Usuario</h4></a></div>
<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
$cod_administrador             = intval($_GET['cod_administrador']);
$pagina                        = addslashes($_GET['pagina']);

$mostrar_datos_sql = "SELECT * FROM tbl15_administrador WHERE cod_administrador = '$cod_administrador'";
$consulta = mysqli_query($conectar, $mostrar_datos_sql) or die(mysqli_error($conectar));
$matriz_consulta = mysqli_fetch_assoc($consulta);

$nombres                                                             = $matriz_consulta['nombres'];
$apellidos                                                           = $matriz_consulta['apellidos'];
$cuenta                                                              = $matriz_consulta['cuenta'];
$correo                                                              = $matriz_consulta['correo'];
$cod_seguridad                                                       = $matriz_consulta['cod_seguridad'];
$nombre_sexo                                                         = $matriz_consulta['nombre_sexo'];
$telefono                                                            = $matriz_consulta['telefono'];
$cod_tipo_historia_clinica                                           = $matriz_consulta['cod_tipo_historia_clinica'];
$url_img_firma_prof_min                                              = $matriz_consulta['url_img_firma_prof_min'];
$url_img_firma_prof_ori                                              = $matriz_consulta['url_img_firma_prof_ori'];
$reg_medico                                                          = $matriz_consulta['reg_medico'];
$licencia                                                            = $matriz_consulta['licencia'];
$tarjeta_profesional                                                 = $matriz_consulta['tarjeta_profesional'];
$especialidad                                                        = $matriz_consulta['especialidad'];
$especialidad2                                                       = $matriz_consulta['especialidad2'];
$universidad                                                         = $matriz_consulta['universidad'];
$nombre_maquina                                                      = $matriz_consulta['nombre_maquina'];
$nombre_impresora                                                    = $matriz_consulta['nombre_impresora'];
$cod_caja                                                            = $matriz_consulta['cod_caja'];
$total_base_cierre_caja                                              = $matriz_consulta['total_base_cierre_caja'];
$cod_dependencia_user                                                = $matriz_consulta['cod_dependencia_user'];
$nombre_tipo_precio_venta_predet_user                                = $matriz_consulta['nombre_tipo_precio_venta_predet_user'];
$numero_precio_user                                                  = $matriz_consulta['numero_precio_user'];
$cod_tipo_aplicacion                                                 = $matriz_consulta['cod_tipo_aplicacion'];
$cod_origen_produccion_user                                          = $matriz_consulta['cod_origen_produccion_user'];

if ($nombre_maquina == '') {
$nombre_maquina               = gethostname();
} else {
$nombre_maquina               = $matriz_consulta['nombre_maquina'];
}
?>
<form name="formulario_edicion" accept-charset="utf-8" method="post" action="../admin/edit_usuario_reg.php">
<fieldset>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table border="1" class="table table-responsive">
	<thead>
		<tr>
			<th style="text-align:center">NOMBRES</th>
			<th style="text-align:center">APELLIDOS</th>
			<th style="text-align:center">USUARIO</th>
			<th style="text-align:center">CAJA</th>
			<th style="text-align:center">TIPO DE ROL</th>
			<th style="text-align:center">PROFESIONAL</th>
			<th style="text-align:center">REG</th>
			<th style="text-align:center">DEPENDENCIA</th>
			<th style="text-align:center">ORIGEN PRODUCCION</th>
			<th style="text-align:center">PRECIO PREDETERMINADO</th>
			<th style="text-align:center">NUM PRECIO</th>
		</tr></thead>
    <tbody>
    	<tr>
<td><input type="text" name="nombres" value="<?php echo ($nombres) ?>"  class="input-block-level" required/></td>
<td><input type="text" name="apellidos" value="<?php echo ($apellidos) ?>"  class="input-block-level" required/></td>
<td><input type="text" name="cuenta" value="<?php echo ($cuenta) ?>"  class="input-block-level" required/></td>
<td><input type="number" name="cod_caja" value="<?php echo ($cod_caja) ?>"  class="input-block-level" required/></td>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<td><select name="cod_seguridad" class="selectpicker" data-show-subtext="true" data-live-search="true" style="width: 150px;" required>
<?php if (isset($cod_seguridad)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_seguridad, nombre_seguridad FROM tbl15_seguridad WHERE (cod_estado = '1') ORDER BY cod_seguridad ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_seguridad) and $cod_seguridad == $datos2['cod_seguridad']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_seguridad'];
$nombre = $datos2['nombre_seguridad'];
echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?></select></td>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->	
<td><select name="cod_tipo_historia_clinica" class="selectpicker" data-show-subtext="true" data-live-search="true" style="width: 150px;" required>
<?php if (isset($cod_tipo_historia_clinica)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_tipo_historia_clinica, nombre_tipo_historia_clinica FROM tbl15_tipo_historia_clinica ORDER BY cod_tipo_historia_clinica ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_tipo_historia_clinica) and $cod_tipo_historia_clinica == $datos2['cod_tipo_historia_clinica']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_tipo_historia_clinica'];
$nombre = $datos2['nombre_tipo_historia_clinica'];
echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?></select></td>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<td><input type="text" name="reg_medico" value="<?php echo ($reg_medico) ?>"  class="input-block-level"/></td>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<td><select name="cod_dependencia_user" class="selectpicker" data-show-subtext="true" data-live-search="true" style="width: 150px;" required>
<?php if (isset($cod_dependencia_user)) { echo "<option value='' >Selecione</option>"; } else { echo "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_dependencia, nombre_dependencia FROM tbl15_dependencia ORDER BY cod_dependencia ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_dependencia_user) and $cod_dependencia_user == $datos2['cod_dependencia']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_dependencia'];
$nombre = $datos2['nombre_dependencia'];
echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?></select></td>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<td><select name="cod_origen_produccion_user" class="selectpicker" data-show-subtext="true" data-live-search="true" style="width: 150px;" required>
<?php if (isset($cod_origen_produccion_user)) { echo "<option value='' >Selecione</option>"; } else { echo "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_origen_produccion, nombre_origen_produccion FROM tbl15_origen_produccion ORDER BY cod_origen_produccion ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_origen_produccion_user) and $cod_origen_produccion_user == $datos2['cod_origen_produccion']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_origen_produccion'];
$nombre = $datos2['nombre_origen_produccion'];
echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?></select></td>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<td><select name="nombre_tipo_precio_venta_predet_user" class="selectpicker" data-show-subtext="true" data-live-search="true" style="width: 130px;" required>
<?php if (isset($nombre_tipo_precio_venta_predet_user)) { echo "<option value='' >Selecione</option>"; } else { echo "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_tipo_precio_venta, nombre_tipo_precio_venta FROM tbl15_tipo_precio_venta ORDER BY cod_tipo_precio_venta ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($nombre_tipo_precio_venta_predet_user) and $nombre_tipo_precio_venta_predet_user == $datos2['nombre_tipo_precio_venta']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['nombre_tipo_precio_venta'];
$nombre = $datos2['nombre_tipo_precio_venta'];
echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?></select></td>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<td><input type="number" name="numero_precio_user" value="<?php echo ($numero_precio_user) ?>"  class="input-block-level" required/></td>
    	</tr>
    	</tbody>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table border="1" class="table table-responsive">
	<thead>
		<tr>
			<th style="text-align:center">TIPO APP</th>
			<th style="text-align:center">CORREO</th>
			<th style="text-align:center">TELEFONO</th>
			<th style="text-align:center">MAQUINA</th>
			<th style="text-align:center">IMPRESORA</th>
			<th style="text-align:center">BASE CAJA CIERE</th>
			<th style="text-align:center">CAMBIAR CONTRASEÑA</th>
			<th style="text-align:center">FIRMA</th>
			<th style="text-align:center">CAMBIAR FIRMA</th>
			<?php if ($cod_estado_tipo_roles_editar == '1') { ?>
			<th style="text-align:center">PERMISOS PERSONALIZADOS</th>
			<th style="text-align:center">PERMISOS POR TIPO DE ROL</th>
			<?php } ?>
		</tr></thead>
    <tbody>
    	<tr>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<td><select name="cod_tipo_aplicacion" class="selectpicker" data-show-subtext="true" data-live-search="true" style="width: 150px;" required>
<?php if (isset($cod_tipo_aplicacion)) { echo "<option value='' >Selecione</option>";
} else { echo  "<option value='' selected >Selecione</option>"; }
$consulta2_sql = ("SELECT cod_tipo_aplicacion, nombre_tipo_aplicacion FROM tbl15_tipo_aplicacion WHERE (cod_estado = '1') ORDER BY cod_tipo_aplicacion ASC");
$consulta2 = mysqli_query($conectar, $consulta2_sql);
while ($datos2 = mysqli_fetch_assoc($consulta2)) {
if(isset($cod_tipo_aplicacion) and $cod_tipo_aplicacion == $datos2['cod_tipo_aplicacion']) {
$seleccionado = "selected"; } else { $seleccionado = ""; }
$codigo = $datos2['cod_tipo_aplicacion'];
$nombre = $datos2['nombre_tipo_aplicacion'];
echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?></select></td>

<td><input type="text" name="correo" value="<?php echo ($correo) ?>" class="input-block-level"/></td>
<td><input type="text" name="telefono" value="<?php echo ($telefono) ?>" class="input-block-level"/></td>
<td><input type="text" name="nombre_maquina" value="<?php echo ($nombre_maquina) ?>" class="input-block-level"/></td>
<td><input type="text" name="nombre_impresora" value="<?php echo ($nombre_impresora) ?>" class="input-block-level"/></td>
<td><input type="number" name="total_base_cierre_caja" value="<?php echo ($total_base_cierre_caja) ?>" class="input-block-level"/></td>
<td style="text-align:center"><a href="../admin/cambiar_contrasena.php?cod_administrador=<?php echo $cod_administrador; ?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/contrasena.png" alt="cambiar contrase&ntilde;a"></a></td>
<td style="text-align:center"><img src="<?php echo $url_img_firma_prof_min ?>"></td>
<td style="text-align:center"><a href="../admin/edit_cargar_firma_usuario.php?cod_administrador=<?php echo $cod_administrador; ?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/cambiar_firma_usuario.png" alt="cambiar contrase&ntilde;a"></a></td>
<?php if ($cod_estado_tipo_roles_editar == '1') { ?>
<td style="text-align:center"><a href="../admin/edit_permiso_usuario.php?cod_administrador=<?php echo $cod_administrador; ?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/permisos_usuarios.png" alt=""></a></td>
<td style="text-align:center"><a href="../admin/asinar_permiso_seguridad_usuario_reg.php?cod_administrador=<?php echo $cod_administrador; ?>&pagina=<?php echo $pagina ?>"><img src="../imagenes/asignar_permisos_usuarios.png" alt=""></a></td>
<?php } ?>
    	</tr>
    	</tbody>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<hr>
<input type="hidden" name="cod_administrador" value="<?php echo $cod_administrador ?>"/>
<input type="hidden" name="pagina" value="<?php echo $pagina ?>"/>
<input type="hidden" name="ins_edit" value="formulario_insert_edit">

<div class="actions"><td><input type="submit" value="Actualizar Información" name="submit" id="submitButton" class="btn btn-info pull-center" title="Click aqui para enviar" /></td></div>
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
 <!--</div>-->
<!-- 1******************************************************* MODULO FOOTER *********************************************** -->
<?php include_once('../admin/04_modulo_footer.php'); ?>
<!-- 1******************************************************* MODULO FOOTER *********************************************** -->
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->
<?php include_once('../admin/05_modulo_js.php'); ?>
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->
</body>
</html>