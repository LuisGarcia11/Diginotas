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

if (isset($_POST['cod_docente']) <> '') { $cod_docente = intval($_POST['cod_docente']); } else { $cod_docente = ''; }
if (isset($_POST['identificacion_docente']) <> '') { $identificacion_docente = mysqli_real_escape_string($conectar, ($_POST['identificacion_docente'])); } else { $identificacion_docente = ''; }
if (isset($_POST['nombre_tipo_identificacion']) <> '') { $nombre_tipo_identificacion = mysqli_real_escape_string($conectar, ($_POST['nombre_tipo_identificacion'])); } else { $nombre_tipo_identificacion = ''; }
if (isset($_POST['nombre1_docente']) <> '') { $nombre1_docente = mysqli_real_escape_string($conectar, ($_POST['nombre1_docente'])); } else { $nombre1_docente = ''; }
if (isset($_POST['und_docente']) <> '') { $und_docente = mysqli_real_escape_string($conectar, ($_POST['und_docente'])); } else { $und_docente = ''; }
if (isset($_POST['nombre2_docente']) <> '') { $nombre2_docente = mysqli_real_escape_string($conectar, ($_POST['nombre2_docente'])); } else { $nombre2_docente = ''; }
if (isset($_POST['apellido1_docente']) <> '') { $apellido1_docente = mysqli_real_escape_string($conectar, ($_POST['apellido1_docente'])); } else { $apellido1_docente = ''; }
if (isset($_POST['apellido2_docente']) <> '') { $apellido2_docente = mysqli_real_escape_string($conectar, ($_POST['apellido2_docente'])); } else { $apellido2_docente = ''; }
if (isset($_POST['fecha_nac_docente']) <> '') { $fecha_nac_docente = mysqli_real_escape_string($conectar, ($_POST['fecha_nac_docente'])); } else { $fecha_nac_docente = ''; }
if (isset($_POST['direccion_docente']) <> '') { $direccion_docente = mysqli_real_escape_string($conectar, ($_POST['direccion_docente'])); } else { $direccion_docente = ''; }
if (isset($_POST['telefono1_docente']) <> '') { $telefono1_docente = mysqli_real_escape_string($conectar, ($_POST['telefono1_docente'])); } else { $telefono1_docente = ''; }
if (isset($_POST['cod_tipo_jornada']) <> '') { $cod_tipo_jornada = mysqli_real_escape_string($conectar, ($_POST['cod_tipo_jornada'])); } else { $cod_tipo_jornada = ''; }
if (isset($_POST['correo_docente']) <> '') { $correo_docente = mysqli_real_escape_string($conectar, ($_POST['correo_docente'])); } else { $correo_docente = ''; }
if (isset($_POST['cod_sexo']) <> '') { $cod_sexo = mysqli_real_escape_string($conectar, ($_POST['cod_sexo'])); } else { $cod_sexo = ''; }
if (isset($_POST['nombre_acudiente_docente']) <> '') { $nombre_acudiente_docente = mysqli_real_escape_string($conectar, ($_POST['nombre_acudiente_docente'])); } else { $nombre_acudiente_docente = ''; }
if (isset($_POST['telefono_acudiente_docente']) <> '') { $telefono_acudiente_docente = mysqli_real_escape_string($conectar, ($_POST['telefono_acudiente_docente'])); } else { $telefono_acudiente_docente = ''; }
if (isset($_POST['cod_estado']) <> '') { $cod_estado = mysqli_real_escape_string($conectar, ($_POST['cod_estado'])); } else { $cod_estado = ''; }
 
$sql_data = sprintf("UPDATE tbl15_docente SET identificacion_docente = '$identificacion_docente', nombre_tipo_identificacion = '$nombre_tipo_identificacion', 
nombre1_docente = UPPER('$nombre1_docente'), nombre2_docente = UPPER('$nombre2_docente'), apellido1_docente = UPPER('$apellido1_docente'), 
apellido2_docente = UPPER('$apellido2_docente'), fecha_nac_docente = '$fecha_nac_docente', direccion_docente = '$direccion_docente', 
telefono1_docente = '$telefono1_docente', cod_tipo_jornada = '$cod_tipo_jornada', correo_docente = '$correo_docente', cod_sexo = '$cod_sexo', 
nombre_acudiente_docente = UPPER('$nombre_acudiente_docente'), telefono_acudiente_docente = '$telefono_acudiente_docente', cod_estado = '$cod_estado' 
WHERE cod_docente = '$cod_docente'");
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