<?php $serguridad_pagina = 1; ?>
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
<div id="contentOuterSeparator"></div>
<div class="container">
<div class="divPanel page-content">

<div class="breadcrumbs"><a href="#">Guardando...</a> <img src="../imagenes/popup_ajax_loader.gif" class="img-polaroid" alt=""></div>

<div class="row-fluid">
 <!--Edit Main Content Area here-->
<div class="span12" id="divMain">
<!-- ***************************************************************************************************************************** -->
<!-- 1******************************************************* INICIO MODULO PRINCIPAL *********************************************** -->
<!-- ***************************************************************************************************************************** -->
<?php
if ((isset($_POST["ins_edit"])) && ($_POST["ins_edit"] == "formulario_insert_edit")) {

if (isset($_POST['cod_alumno']) <> '') { $cod_alumno = intval($_POST['cod_alumno']); } else { $cod_alumno = ''; }
if (isset($_POST['identificacion_alumno']) <> '') { $identificacion_alumno = mysqli_real_escape_string($conectar, ($_POST['identificacion_alumno'])); } else { $identificacion_alumno = ''; }
if (isset($_POST['nombre_tipo_identificacion']) <> '') { $nombre_tipo_identificacion = mysqli_real_escape_string($conectar, ($_POST['nombre_tipo_identificacion'])); } else { $nombre_tipo_identificacion = ''; }
if (isset($_POST['nombre1_alumno']) <> '') { $nombre1_alumno = mysqli_real_escape_string($conectar, ($_POST['nombre1_alumno'])); } else { $nombre1_alumno = ''; }
if (isset($_POST['und_alumno']) <> '') { $und_alumno = mysqli_real_escape_string($conectar, ($_POST['und_alumno'])); } else { $und_alumno = ''; }
if (isset($_POST['nombre2_alumno']) <> '') { $nombre2_alumno = mysqli_real_escape_string($conectar, ($_POST['nombre2_alumno'])); } else { $nombre2_alumno = ''; }
if (isset($_POST['apellido1_alumno']) <> '') { $apellido1_alumno = mysqli_real_escape_string($conectar, ($_POST['apellido1_alumno'])); } else { $apellido1_alumno = ''; }
if (isset($_POST['apellido2_alumno']) <> '') { $apellido2_alumno = mysqli_real_escape_string($conectar, ($_POST['apellido2_alumno'])); } else { $apellido2_alumno = ''; }
if (isset($_POST['fecha_nac_alumno']) <> '') { $fecha_nac_alumno = mysqli_real_escape_string($conectar, ($_POST['fecha_nac_alumno'])); } else { $fecha_nac_alumno = ''; }
if (isset($_POST['direccion_alumno']) <> '') { $direccion_alumno = mysqli_real_escape_string($conectar, ($_POST['direccion_alumno'])); } else { $direccion_alumno = ''; }
if (isset($_POST['telefono1_alumno']) <> '') { $telefono1_alumno = mysqli_real_escape_string($conectar, ($_POST['telefono1_alumno'])); } else { $telefono1_alumno = ''; }
if (isset($_POST['cod_tipo_jornada']) <> '') { $cod_tipo_jornada = mysqli_real_escape_string($conectar, ($_POST['cod_tipo_jornada'])); } else { $cod_tipo_jornada = ''; }
if (isset($_POST['correo_alumno']) <> '') { $correo_alumno = mysqli_real_escape_string($conectar, ($_POST['correo_alumno'])); } else { $correo_alumno = ''; }
if (isset($_POST['cod_sexo']) <> '') { $cod_sexo = mysqli_real_escape_string($conectar, ($_POST['cod_sexo'])); } else { $cod_sexo = ''; }
if (isset($_POST['nombre_acudiente_alumno']) <> '') { $nombre_acudiente_alumno = mysqli_real_escape_string($conectar, ($_POST['nombre_acudiente_alumno'])); } else { $nombre_acudiente_alumno = ''; }
if (isset($_POST['telefono_acudiente_alumno']) <> '') { $telefono_acudiente_alumno = mysqli_real_escape_string($conectar, ($_POST['telefono_acudiente_alumno'])); } else { $telefono_acudiente_alumno = ''; }
if (isset($_POST['cod_estado']) <> '') { $cod_estado = mysqli_real_escape_string($conectar, ($_POST['cod_estado'])); } else { $cod_estado = ''; }
 
$sql_data = sprintf("UPDATE tbl15_alumno SET identificacion_alumno = '$identificacion_alumno', nombre_tipo_identificacion = '$nombre_tipo_identificacion', 
nombre1_alumno = UPPER('$nombre1_alumno'), nombre2_alumno = UPPER('$nombre2_alumno'), apellido1_alumno = UPPER('$apellido1_alumno'), 
apellido2_alumno = UPPER('$apellido2_alumno'), fecha_nac_alumno = '$fecha_nac_alumno', direccion_alumno = '$direccion_alumno', 
telefono1_alumno = '$telefono1_alumno', cod_tipo_jornada = '$cod_tipo_jornada', correo_alumno = '$correo_alumno', cod_sexo = '$cod_sexo', 
nombre_acudiente_alumno = UPPER('$nombre_acudiente_alumno'), telefono_acudiente_alumno = '$telefono_acudiente_alumno', cod_estado = '$cod_estado' 
WHERE cod_alumno = '$cod_alumno'");
$exec_data = mysqli_query($conectar, $sql_data) or die(mysqli_error($conectar));

$pagina                       = addslashes($_POST['pagina']);
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>">
<?php } else { ?>
<META HTTP-EQUIV="REFRESH" CONTENT="0; <?php echo $pagina?>">
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
</body>
</html>