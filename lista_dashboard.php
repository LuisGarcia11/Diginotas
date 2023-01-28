<?php $serguridad_pagina = 1; ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<?php include_once('../admin/01_modulo_diseno_superior.php'); ?>
<!-- 1******************************************************* MODULO SUPERIOR *********************************************** -->
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
<?php include_once('../admin/02_modulo_estilo_css.php'); ?>
<link href="../estilo_css/fondo_login.css" rel="stylesheet">
<!-- 1******************************************************* MODULO DE PLANTILLAS CSS *********************************************** -->
</head>
<body id="pageBody">
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php include_once('../seguridad/seguridad_diseno_plantillas.php'); ?>
<!-- 1******************************************************* MODULO MENU DE NAVEGACION *********************************************** -->
<?php //$pagina = addslashes($_GET['pagina']); ?>
<div class="imagen_fondo_login"></div>
<div class="container-fluid h-100  content">

<div id="contentOuterSeparator"></div>
<div class="container">
<div class="divPanel page-content">

<div class="breadcrumbs">
<div class="logito"><h3>Sistema de control de notas<h3></div>
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
//-----------------------------------------------------------------------------------------------------------------//
if (($cod_estado_habilitar_tercero_por_usuario_global == '1')) {

    if ($cod_seguridad == '1') {
        $condicional_consulta_tercero = ''; 
        $condicional_consulta_tercero_rel = '';
        $condicional_consulta_cuenta_cobrar = '';
    } else { 
        $condicional_consulta_tercero = 'AND cod_administrador = "'.$cod_administrador.'"';
        $condicional_consulta_tercero_rel = 'WHERE cod_administrador = "'.$cod_administrador.'"';
        $condicional_consulta_cuenta_cobrar = 'WHERE cod_administrador = "'.$cod_administrador.'"';
    }

} else { 
$condicional_consulta_tercero = ''; 
$condicional_consulta_tercero_rel = '';
$condicional_consulta_cuenta_cobrar = '';
}
//-----------------------------------------------------------------------------------------------------------------//
?>
<div class="table-responsive">
<table class="table table-striped">
<thead>
<tr>
<th style="text-align:center"><a href="../admin/lista_alumno.php?pagina=<?php echo $pagina ?>"><img src="../imagenes/gestion_alumno_btn.png" class="img-polaroid" title="Estudiantes" alt=""></a></th>
<th style="text-align:center"><a href="../admin/lista_docente.php?pagina=<?php echo $pagina ?>"><img src="../imagenes/gestion_docente_btn.png" class="img-polaroid" title="Docentes" alt=""></a></th>
<th style="text-align:center"><a href="../admin/lista_asignar_alumno_a_grupo.php?pagina=<?php echo $pagina ?>"><img src="../imagenes/gestion_curso_btn.png" class="img-polaroid" title="Grupos" alt=""></a></th>
</tr>
<tr>
<th style="text-align:center"><a href="../admin/lista_asignatura.php?pagina=<?php echo $pagina ?>"><img src="../imagenes/gestion_asignatura_btn.png" class="img-polaroid" title="Asignaturas" alt=""></a></th>
<th style="text-align:center"><a href="../admin/lista_asignar_alumno_a_grupo.php?pagina=<?php echo $pagina ?>"><img src="../imagenes/asignaciones_btn.png" class="img-polaroid" title="Asignaciones" alt=""></a></th>
<th style="text-align:center"><a href="../admin/lista_asignar_alumno_a_grupo.php?pagina=<?php echo $pagina ?>"><img src="../imagenes/registrar_nota_btn.png" class="img-polaroid" title="Notas" alt=""></a></th>
</tr>
</thead>
</table>
</div>
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
</div>
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->
<?php include_once('../admin/05_modulo_js.php'); ?>
<!-- 1******************************************************* MODULO PLANTILLA JS *********************************************** -->
</body>
</html>