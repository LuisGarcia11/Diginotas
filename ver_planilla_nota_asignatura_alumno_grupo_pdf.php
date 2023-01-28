<?php ob_start();?>
<?php
date_default_timezone_set("America/Bogota");
require_once('../conexiones/conexione.php');
include_once('../admin/class_php/fecha_en_espanol_mes.php');
include_once('../admin/class_php/fecha_en_espanol_mes_anyo.php');
include_once('../admin/class_php/numeros_a_letras_funcion.php');

$sql_info_empresa = "SELECT * FROM tbl15_info_empresa WHERE cod_info_empresa = '1'";
$resultado_info_empresa = mysqli_query($conectar, $sql_info_empresa);
$info_empresa_data = mysqli_fetch_assoc($resultado_info_empresa);

$titulo_emp                        = $info_empresa_data['titulo'];
$nombre_emp                        = $info_empresa_data['nombre'];
$eslogan_emp                       = $info_empresa_data['eslogan'];
$direccion_emp                     = $info_empresa_data['direccion'];
$ciudad_emp                        = $info_empresa_data['ciudad'];
$pais_emp                          = $info_empresa_data['pais'];
$correo_emp                        = $info_empresa_data['correo'];
$img_cabecera_emp                  = $info_empresa_data['img_cabecera'];
$telefono_emp                      = $info_empresa_data['telefono'];
$info_legal_emp                    = $info_empresa_data['info_legal'];
$logotipo_emp                      = $info_empresa_data['logotipo'];
$propietario_nombres_apellidos_emp = $info_empresa_data['propietario_nombres_apellidos'];
$propietario_nit_emp               = $info_empresa_data['propietario_nit'];
$nit_empresa_emp                   = $info_empresa_data['nit_empresa'];
$cabecera_emp                      = $info_empresa_data['cabecera'];
$icono_emp                         = $info_empresa_data['icono'];
$desarrollador_emp                 = $info_empresa_data['desarrollador'];
$anyo_emp                          = $info_empresa_data['anyo'];
$url_pag                           = $info_empresa_data['url_pag'];
$nombre_font_emp                   = $info_empresa_data['nombre_font'];
$tamano_font_emp                   = $info_empresa_data['tamano_font'];
$tamano_font_factura_emp           = $info_empresa_data['tamano_font_aptlab'];
$tamano_font_factura_emp           = $info_empresa_data['tamano_font_factura'];
$res_emp                           = $info_empresa_data['res'];
$res1_emp                          = $info_empresa_data['res1'];
$res2_emp                          = $info_empresa_data['res2'];
$fecha_res_emp                     = $info_empresa_data['fecha_res'];
$departamento_emp                  = $info_empresa_data['departamento'];
$localidad_emp                     = $info_empresa_data['localidad'];
$reg_medico_emp                    = $info_empresa_data['reg_medico'];
$regimen_emp                       = $info_empresa_data['regimen'];
$version_emp                       = $info_empresa_data['version'];
$propietario_url_firma_emp         = $info_empresa_data['propietario_url_firma'];
$fecha_time_emp                    = $info_empresa_data['fecha_time'];
$licencia_emp                      = $info_empresa_data['licencia'];
$info_histclinic_emp               = $info_empresa_data['info_histclinic'];
$info_aptlaboral_emp               = $info_empresa_data['info_aptlaboral'];
$pag_desarrollador_emp             = $info_empresa_data['pag_desarrollador'];
$correo_desarrollador_emp          = $info_empresa_data['correo_desarrollador'];
$url_pag_emp                       = $info_empresa_data['url_pag'];


$serguridad_pagina                 = 1; 
$cod_info_asignar_alumno_a_grupo   = intval($_GET['cod_info_asignar_alumno_a_grupo']);
$cod_asignatura                    = intval($_GET['cod_asignatura']);
$nombre_periodo                    = addslashes($_GET['nombre_periodo']);

$datos_data_info_factura = "SELECT * FROM tbl15_info_asignar_alumno_a_grupo WHERE (cod_info_asignar_alumno_a_grupo = '$cod_info_asignar_alumno_a_grupo')";
$consulta_data_info_factura = mysqli_query($conectar, $datos_data_info_factura);
$data_info_factura = mysqli_fetch_assoc($consulta_data_info_factura);
$factura_ocupada = mysqli_num_rows($consulta_data_info_factura);

$cod_grado                              = $data_info_factura['cod_grado'];
$nombre_grupo                           = $data_info_factura['nombre_grupo'];
$anyo                                   = $data_info_factura['anyo'];
$cuenta                                 = $data_info_factura['cuenta'];
$cod_administrador                      = $data_info_factura['cod_administrador'];
$fecha_creacion                         = $data_info_factura['fecha_creacion'];
$fecha_modificacion                     = $data_info_factura['fecha_modificacion'];
$cod_director_grupo                     = $data_info_factura['cod_director_grupo'];
$cod_tipo_jornada                       = $data_info_factura['cod_tipo_jornada'];

$sql_total_reg_alumno_a_grupo = "SELECT * FROM tbl15_asignar_alumno_a_grupo WHERE (cod_info_asignar_alumno_a_grupo = '$cod_info_asignar_alumno_a_grupo') AND (cod_asignatura = '$cod_asignatura') GROUP BY cod_alumno";
$consulta_total_reg_alumno_a_grupo = mysqli_query($conectar, $sql_total_reg_alumno_a_grupo);
$data_total_reg_alumno_a_grupoa = mysqli_fetch_assoc($consulta_total_reg_alumno_a_grupo);
$total_reg_alumno_a_grupo = mysqli_num_rows($consulta_total_reg_alumno_a_grupo);


$sql_alumno_a_grupo = "SELECT * FROM tbl15_asignar_alumno_a_grupo WHERE (cod_info_asignar_alumno_a_grupo = '$cod_info_asignar_alumno_a_grupo') AND (cod_asignatura = '$cod_asignatura') GROUP BY cod_asignatura";
$consulta_alumno_a_grupo = mysqli_query($conectar, $sql_alumno_a_grupo);
$data_alumno_a_grupoa = mysqli_fetch_assoc($consulta_alumno_a_grupo);

$cod_docente                            = $data_alumno_a_grupoa['cod_docente'];


$sql_docente = "SELECT identificacion_docente, nombre1_docente, nombre2_docente, apellido1_docente, apellido2_docente FROM tbl15_docente WHERE (cod_docente = '$cod_docente')";
$consulta_docente = mysqli_query($conectar, $sql_docente);
$datos_docente = mysqli_fetch_assoc($consulta_docente);

$nombre_docente              = $datos_docente['nombre1_docente'].' '.$datos_docente['nombre2_docente'].' '.$datos_docente['apellido1_docente'].' '.$datos_docente['apellido2_docente'];


$sql_director_grupo = "SELECT identificacion_docente, nombre1_docente, nombre2_docente, apellido1_docente, apellido2_docente FROM tbl15_docente WHERE (cod_docente = '$cod_director_grupo')";
$consulta_director_grupo = mysqli_query($conectar, $sql_director_grupo);
$datos_director_grupo = mysqli_fetch_assoc($consulta_director_grupo);

$nombre_director_grupo                       = $datos_director_grupo['nombre1_docente'].' '.$datos_director_grupo['nombre2_docente'].' '.$datos_director_grupo['apellido1_docente'].' '.$datos_director_grupo['apellido2_docente'];


$sql_tipo_jornada = "SELECT * FROM tbl15_tipo_jornada WHERE (cod_tipo_jornada = '$cod_tipo_jornada')";
$consulta_tipo_jornada = mysqli_query($conectar, $sql_tipo_jornada);
$datos_tipo_jornada = mysqli_fetch_assoc($consulta_tipo_jornada);

$nombre_tipo_jornada                         = $datos_tipo_jornada['nombre_tipo_jornada'];

$sql_tipo_jornada = "SELECT * FROM tbl15_asignatura WHERE (cod_asignatura = '$cod_asignatura')";
$consulta_tipo_jornada = mysqli_query($conectar, $sql_tipo_jornada);
$datos_tipo_jornada = mysqli_fetch_assoc($consulta_tipo_jornada);

$nombre_asignatura                         = $datos_tipo_jornada['nombre_asignatura'];

include_once('mpdf/mpdf.php');
$margen_izq = '10';
$margen_der = '10';
$margen_inf_encabezado = '25';
$margen_sup_encabezado = '10';
$posicion_sup_encabezado = '10';
$posicion_inf_encabezado = '2';

$titulo_doc_pdf                    = 'PLANILLA_NOTAS_ASIGNATURA_ESTUDIANTE'.'_'.$nombre_grupo.'_'.$anyo;
$autor_doc_pdf                     = 'PLANILLA_NOTAS_ASIGNATURA_ESTUDIANTE'.str_pad($cod_info_grupo_alumno, 4, "0", STR_PAD_LEFT).'_'.$nombre_grupo.'_'.$anyo;
$creador_doc_pdf                   = 'PLANILLA_NOTAS_ASIGNATURA_ESTUDIANTE'.str_pad($cod_info_grupo_alumno, 4, "0", STR_PAD_LEFT).'_'.$nombre_grupo.'_'.$anyo;
$tema_doc_pdf                      = 'PLANILLA_NOTAS_ASIGNATURA_ESTUDIANTE'.str_pad($cod_info_grupo_alumno, 4, "0", STR_PAD_LEFT).'_'.$nombre_grupo.'_'.$anyo;
$palabras_claves_doc_pdf           = 'PLANILLA_NOTAS_ASIGNATURA_ESTUDIANTE'.str_pad($cod_info_grupo_alumno, 4, "0", STR_PAD_LEFT).'_'.$nombre_grupo.'_'.$anyo;
$cod_info_grupo_alumno_strpad      = str_pad($cod_info_grupo_alumno, 6, "0", STR_PAD_LEFT);
$cod_info_factura_strpad           = str_pad($cod_info_grupo_alumno, 6, "0", STR_PAD_LEFT);
$nombres_completos                 = "PLANILLA_NOTAS_ASIGNATURA_ESTUDIANTE";
//$mpdf = new mPDF('c','Legal');
$mpdf = new mPDF('en-GB-x','A4','','',$margen_izq, $margen_der, $margen_inf_encabezado, $margen_sup_encabezado, $posicion_sup_encabezado, $posicion_inf_encabezado);
$mpdf->mirrorMargins = 1; // Use different Odd/Even headers and footers and mirror margins

$header = '
<table align="center" border="0" cellpadding="0" cellspacing="0" style="font-family:mono; font-size:20pt; width:100%">
  <tr>
    <td style="text-align:center" rowspan="6" width="800"><img src="../imagenes/img_planilla_estudiantes.jpg" class="img img-responsive" style="width:800px;"></td>
  </tr>
</table>
';
$headerE = '
<table align="center" border="0" cellpadding="0" cellspacing="0" style="font-family:mono; font-size:20pt; width:100%">
  <tr>
    <td style="text-align:center" rowspan="6" width="800"><img src="../imagenes/img_planilla_estudiantes.jpg" class="img img-responsive" style="width:800px;"></td>
  </tr>
</table>
';
$footer = '
';
$footerE = '
';
$mpdf->SetHTMLHeader(($header));
$mpdf->SetHTMLHeader(($headerE),'E');
$mpdf->SetHTMLFooter(($footer));
$mpdf->SetHTMLFooter(($footerE),'E');

$codigoHTML = '
<!DOCTYPE html>
<html lang="es">
<head>
<title></title>
<meta charset="utf-8" />
</head>

<body>
<style type="text/css"> 
#centrar { margin-right:auto; margin-left:auto; width: 30%; } 
.Estilo1 { color: #FF0000; font-weight: bold; }
.Estilo2 { color: #FF0000}
</style>
';

$codigoHTML.='
        <table align="center" border="0" cellpadding="0" cellspacing="0" style="font-family:mono; font-size:15pt; width:100%">
          <tr>
            <td style="text-align:center" width="125" valign="top"><strong>Reporte de Calificaciones Por Asignatura</strong></td>
           </tr>
        </table>
        ';

$codigoHTML.='
        <hr>
        ';

$codigoHTML.='
        <table align="center" border="0" cellpadding="0" cellspacing="0" style="font-family:mono; font-size:'.$tamano_font_factura_emp.'pt; width:100%">
          <tr>
            <td style="text-align:center" width="125" valign="top"><strong>Grupo</strong></td>
            <td style="text-align:center" width="125" valign="top"><strong>Asignatura</strong></td>
            <td style="text-align:center" width="125" valign="top"><strong>Jornada</strong></td>
            <td style="text-align:center" width="125" valign="top"><strong>Año Lectivo</strong></td>
            <td style="text-align:center" width="125" valign="top"><strong>Dir. Grupo</strong></td>
           </tr>
          <tr>
            <td style="text-align:center" width="125" valign="top">'.$nombre_grupo.'</td>
            <td style="text-align:center" width="125" valign="top">'.$nombre_asignatura.'</td>
            <td style="text-align:center" width="125" valign="top">'.$nombre_tipo_jornada.'</td>
            <td style="text-align:center" width="125" valign="top">'.$anyo.'</td>
            <td style="text-align:center" width="125" valign="top">'.$nombre_director_grupo.'</td>
           </tr>
        </table>
        ';

$codigoHTML.='<hr>';

$codigoHTML.='
        <table align="center" border="1" cellpadding="0" cellspacing="0" style="font-family:mono; font-size:'.$tamano_font_factura_emp.'pt; width:100%">
          <tr>
            <td style="text-align:center" width="50" valign="top"><strong>N°</strong></td>
            <td style="text-align:center" width="100" valign="top"><strong>Documento</strong></td>
            <td style="text-align:center" width="350" valign="top"><strong>Nombres y Apellidos</strong></td>
           ';

if ($nombre_periodo == '1') {
  $codigoHTML.='<td style="text-align:center" width="50" valign="top"><strong>1P</strong></td>';
}
elseif ($nombre_periodo == '2') {
  $codigoHTML.='<td style="text-align:center" width="50" valign="top"><strong>2P</strong></td>';
}
elseif ($nombre_periodo == '3') {
  $codigoHTML.='<td style="text-align:center" width="50" valign="top"><strong>3P</strong></td>';
}
elseif ($nombre_periodo == '4') {
  $codigoHTML.='<td style="text-align:center" width="50" valign="top"><strong>4P</strong></td>';
}
else {
  $codigoHTML.='<td style="text-align:center" width="50" valign="top"><strong>1P</strong></td>';
  $codigoHTML.='<td style="text-align:center" width="50" valign="top"><strong>1P</strong></td>';
  $codigoHTML.='<td style="text-align:center" width="50" valign="top"><strong>3P</strong></td>';
  $codigoHTML.='<td style="text-align:center" width="50" valign="top"><strong>4P</strong></td>';
  $codigoHTML.='<td style="text-align:center" width="50" valign="top"><strong>Def</strong></td>';
  $codigoHTML.='<td style="text-align:center" width="50" valign="top"><strong>Desempeño</strong></td>';
}
$codigoHTML.='</tr>';

$numero = 0;

$sql_asignar_alumno_a_grupo = "SELECT * FROM tbl15_asignar_alumno_a_grupo WHERE (cod_info_asignar_alumno_a_grupo = '$cod_info_asignar_alumno_a_grupo') AND (cod_asignatura = '$cod_asignatura') 
GROUP BY cod_alumno ORDER BY cod_asignar_alumno_a_grupo DESC";
$consulta_asignar_alumno_a_grupo = mysqli_query($conectar, $sql_asignar_alumno_a_grupo);
while ($datos_asignar_alumno_a_grupo = mysqli_fetch_assoc($consulta_asignar_alumno_a_grupo)) {

$cod_asignar_alumno_a_grupo                      = $datos_asignar_alumno_a_grupo['cod_asignar_alumno_a_grupo'];
$cod_info_asignar_alumno_a_grupo                 = $datos_asignar_alumno_a_grupo['cod_info_asignar_alumno_a_grupo'];
$cod_alumno                                      = $datos_asignar_alumno_a_grupo['cod_alumno'];
$nota_periodo1                                   = $datos_asignar_alumno_a_grupo['nota_periodo1'];
$nota_periodo2                                   = $datos_asignar_alumno_a_grupo['nota_periodo2'];
$nota_periodo3                                   = $datos_asignar_alumno_a_grupo['nota_periodo3'];
$nota_periodo4                                   = $datos_asignar_alumno_a_grupo['nota_periodo4'];
$falla_alumno                                    = $datos_asignar_alumno_a_grupo['falla_alumno'];
$nota_final                                      = round((($nota_periodo1 + $nota_periodo2 + $nota_periodo3 + $nota_periodo4) / 4), 2);

if (($nota_final >= 0) && ($nota_final < 3)) {
  $desenpeno_final = 'BAJO';
} 
elseif (($nota_final >= 3) && ($nota_final < 4)) {
  $desenpeno_final = 'BASICO';
} 
elseif (($nota_final >= 4) && ($nota_final < 5)) {
  $desenpeno_final = 'ALTO';
} 
else {
  $desenpeno_final = 'SUPERIOR';
}





$obtener_entidad = "SELECT * FROM tbl15_alumno WHERE cod_alumno = '".($cod_alumno)."'";
$consultar_entidad = mysqli_query($conectar, $obtener_entidad) or die(mysqli_error($conectar));
$info_entidad = mysqli_fetch_assoc($consultar_entidad);

$nombre_tipo_identificacion     = $info_entidad['nombre_tipo_identificacion'];
$identificacion_alumno          = $info_entidad['identificacion_alumno'];
$nombre1_alumno                 = $info_entidad['nombre1_alumno'];
$nombre2_alumno                 = $info_entidad['nombre2_alumno'];
$apellido1_alumno               = $info_entidad['apellido1_alumno'];
$apellido2_alumno               = $info_entidad['apellido2_alumno'];
$nombres_alumno                 = $nombre1_alumno.' '.$nombre2_alumno;
$apellidos_alumno               = $apellido1_alumno.' '.$apellido2_alumno;
$nombres_apellidos_alumno       = $nombres_alumno.' '.$apellidos_alumno;

$numero++;

$codigoHTML.='
          <tr>
            <td style="text-align:center" width="50" valign="top">'.$numero.'</td>
            <td style="text-align:left" width="100" valign="top">'.$identificacion_alumno.'</td>
            <td style="text-align:left" width="350" valign="top">'.$nombres_apellidos_alumno.'</td>
           ';

if ($nombre_periodo == '1') {
  $codigoHTML.='<td style="text-align:center" width="50" valign="top">'.$nota_periodo1.'</td>';
}
elseif ($nombre_periodo == '2') {
  $codigoHTML.='<td style="text-align:center" width="50" valign="top">'.$nota_periodo2.'</td>';
}
elseif ($nombre_periodo == '3') {
  $codigoHTML.='<td style="text-align:center" width="50" valign="top">'.$nota_periodo3.'</td>';
}
elseif ($nombre_periodo == '4') {
  $codigoHTML.='<td style="text-align:center" width="50" valign="top">'.$nota_periodo4.'</td>';
}
else {
  $codigoHTML.='<td style="text-align:center" width="50" valign="top">'.$nota_periodo1.'</td>';
  $codigoHTML.='<td style="text-align:center" width="50" valign="top">'.$nota_periodo2.'</td>';
  $codigoHTML.='<td style="text-align:center" width="50" valign="top">'.$nota_periodo3.'</td>';
  $codigoHTML.='<td style="text-align:center" width="50" valign="top">'.$nota_periodo4.'</td>';
  $codigoHTML.='<td style="text-align:center" width="50" valign="top">'.$nota_final.'</td>';
  $codigoHTML.='<td style="text-align:center" width="50" valign="top">'.$desenpeno_final.'</td>';
}
$codigoHTML.='</tr>';
}


$codigoHTML.='</table>';



$codigoHTML.='
</body>
</html>
';
$mpdf->WriteHTML(($codigoHTML));
$mpdf->SetTitle($titulo_doc_pdf);
$mpdf->SetAuthor($autor_doc_pdf);
$mpdf->SetCreator($autor_doc_pdf);
$mpdf->SetSubject($tema_doc_pdf);
$mpdf->SetKeywords($palabras_claves_doc_pdf);
$ruta = '../pdfs/';
$nombre_archivo = 'PLANILLA_NOTAS_ASIGNATURA_ESTUDIANTE'.'_'.$nombre_grupo.'_'.$anyo.'.pdf';
$mpdf->Output($nombre_archivo, 'I');
exit;
/*
$mpdf->WriteHTML('<tocpagebreak sheet-size="A4-L" toc-sheet-size="A5" toc-preHTML="This ToC should print on an A5 sheet" />');
$mpdf->WriteHTML('<tocentry content="A4 landscape" /><p>This page appears just after the ToC and should print on an A4 (landscape) sheet</p>');
$mpdf->WriteHTML('<pagebreak sheet-size="A5-L" />');
$mpdf->WriteHTML('<tocentry content="A5 landscape" /><p>This should print on an A5 (landscape) sheet</p>');
$mpdf->WriteHTML('<pagebreak sheet-size="Letter" />');
$mpdf->WriteHTML('<tocentry content="Letter portrait" /><p>This should print on an Letter sheet</p>');
$mpdf->WriteHTML('<pagebreak sheet-size="150mm 150mm" />');
$mpdf->WriteHTML('<tocentry content="150mm square" /><p>This should print on a sheet 150mm x 150mm</p>');
$mpdf->WriteHTML('<pagebreak sheet-size="11.69in 8.27in" />');
*/
?>
<?php ob_end_flush(); ?>