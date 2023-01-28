<?php $serguridad_pagina = 1; ?>
<?php $nombre_pagina = "Registrar Alumnos"; ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<?php include_once('../admin/01_modulo_diseno_superior.php'); ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
<?php include_once('../admin/02_modulo_estilo_css.php'); ?>
<script src="../js/jquery.min.js" type="text/javascript"></script> 
<link rel="stylesheet" href="../estilo_css/jquery-ui.css">
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
</head>
<body id="pageBody">
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php include_once('../seguridad/seguridad_diseno_plantillas.php'); ?>
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php //$pagina = addslashes($_GET['pagina']); ?>
<div id="contentOuterSeparator"></div>
<div class="container">
<div class="divPanel page-content">

<div class="breadcrumbs">
<!--<a class="btn btn-info" href="../admin/menu_lista.php">Lista de Productos</a>-->
<a class="btn btn-success" href="#">Registrar Datos del Estudiante</a>
</div>

<hr>
<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php 
$pagina = $_SERVER['PHP_SELF']; 
?>

<?php if ($cod_estado_prod_reg_producto == '1') { ?>
<form name="formulario_insersion" method="post" enctype="multipart/form-data" action="../admin/reg_alumno_reg.php">
<fieldset>
<table border="1" class="table table-responsive">
	<thead>
		<tr>
			<th style="text-align:center" id="mensaje_verificacion_producto">.</th>
    	</tr>
	</thead>
</table>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table border="1" class="table table-responsive">
	<thead>
		<tr>
			<th style="text-align:right">Num Doc Estudiante</th>
			<td style="text-align:left"><input class="input-block-level" name="identificacion_alumno" id="identificacion_alumno" type="number" value="" size="30" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required /></td>
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
			<td style="text-align:left"><input class="input-block-level" name="nombre1_alumno" id="nombre1_alumno" type="text" value="" size="30" required /></td>
		</tr>
    	<tr>
			<th style="text-align:right">Nombre 2</th>
			<td style="text-align:left"><input class="input-block-level" name="nombre2_alumno" id="nombre2_alumno" type="text" value="" size="30" required /></td>
		</tr>
    	<tr>
			<th style="text-align:right">Apellido 1</th>
			<td style="text-align:left"><input class="input-block-level" name="apellido1_alumno" id="apellido1_alumno" type="text" value="" size="30" required /></td>
		</tr>
    	<tr>
			<th style="text-align:right">Apellido 2</th>
			<td style="text-align:left"><input class="input-block-level" name="apellido2_alumno" id="apellido2_alumno" type="text" value="" size="30" required /></td>
		</tr>
    	<tr>
			<th style="text-align:right">Fecha Nac</th>
			<td style="text-align:left"><input class="input-block-level" name="fecha_nac_alumno" id="fecha_nac_alumno" type="date" value="" size="30" required /></td>
		</tr>
    	<tr>
			<th style="text-align:right">Dirección</th>
			<td style="text-align:left"><input class="input-block-level" name="direccion_alumno" id="direccion_alumno" type="text" value="" size="30" required /></td>
		</tr>
    	<tr>
			<th style="text-align:right">Teléfono</th>
			<td style="text-align:left"><input class="input-block-level" name="telefono1_alumno" id="telefono1_alumno" type="number" value="" size="30" required /></td>
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
			<td style="text-align:left"><input class="input-block-level" name="correo_alumno" id="correo_alumno" type="text" value="" size="30" /></td>
		</tr>
    	<tr>
			<th style="text-align:right">Género</th>
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
			<td style="text-align:left"><input class="input-block-level" name="nombre_acudiente_alumno" id="nombre_acudiente_alumno" type="text" value="" size="30" required /></td>
		</tr>
    	<tr>
			<th style="text-align:right">Telefono Acu</th>
			<td style="text-align:left"><input class="input-block-level" name="telefono_acudiente_alumno" id="telefono_acudiente_alumno" type="number" value="" size="30" required /></td>
		</tr>
    	<tr>
			<th style="text-align:right">Foto</th>
			<td style="text-align:left">
			<input type="file" name="url_img1" id="url_img1" multiple accept="image/*" style="display:none" onchange="handleFiles(this.files)"/><a href="#" class="btn btn-default" id="archivo_selecionado">Examinar</a>
			<div id="vista_archivo">
			</td>
		</tr>
	</thead>
</table>
</fieldset>
</div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<input id="estilo_css" name="estilo_css" type="hidden" value="azul_verdoso.css">
<input type="hidden" name="pagina" value="<?php echo $pagina ?>">
<input type="hidden" name="insersion" value="formulario_de_insersion">
<hr>
<div class="actions">
<input type="submit" value="Registrar información" name="submit" id="submitButton" class="btn btn-success" title="Click aqui para enviar" />
</div>
</fieldset>
</form>
<?php } ?>
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
<script src="js/jquery-ui.js"></script>


<script language="javascript">
$(document).ready(function(){
    $("#identificacion_alumno").on('change', function () {
            var identificacion_alumno = $(this).val();
            var campo = "identificacion_alumno";
            var tipo_ajax = "tbl15_producto";
            $.post("verificar_existencia_alumno_ajax.php", { identificacion_alumno:identificacion_alumno, campo:campo, tipo_ajax:tipo_ajax }, function(data){
                $("#mensaje_verificacion_producto").html(data);
        });
   });
});
</script>


<?php if ($cod_estado_img_producto_global == '1') { ?>
<script language="JavaScript">
window.URL = window.URL || window.webkitURL;

var archivo_selecionado = document.getElementById("archivo_selecionado"),
    url_img1 = document.getElementById("url_img1"),
    vista_archivo = document.getElementById("vista_archivo");

archivo_selecionado.addEventListener("click", function (e) {
  if (url_img1) {
    url_img1.click();
  }
  e.preventDefault(); // prevent navigation to "#"
}, false);

function handleFiles(files) {
  if (!files.length) {
    vista_archivo.innerHTML = "<p>No files selected!</p>";
  } else {
    vista_archivo.innerHTML = "";
    var list = document.createElement("ul");
    vista_archivo.appendChild(list);
    for (var i = 0; i < files.length; i++) {
      var li = document.createElement("li");
      list.appendChild(li);
      
      var img = document.createElement("img");
      img.src = window.URL.createObjectURL(files[i]);
      img.height = 60;
      img.onload = function() {
        window.URL.revokeObjectURL(this.src);
      }
      li.appendChild(img);
      var info = document.createElement("span");
      li.appendChild(info);
    }
  }
}
</script>
<?php } ?>

</body>
</html>