<?php
$tab                         = 'tbl15_grupo_alumno_temporal';
$tipo                        = 'eliminar';
$campo                       = 'cod_grupo_alumno_temporal';
?>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<form method="post" name="formulario" action="../admin/venta_grupo_reg.php">
    <table class="table table-striped" border="1" cellspacing="0" cellpadding="20">
      <tr>
        <th style="text-align:right;">Grupo:</th>
        <th style="text-align:left;">
            <select name="cod_grupo" id="cod_grupo" class="chosen-select" data-show-subtext="true" data-live-search="true" style="width: 190px;" onchange="hacer_busqueda()" tabindex="1" required>
                <?php if (isset($cod_grupo)) { echo "<option value='' >...</option>"; } else { echo "<option value='' selected ></option>"; }
                $consulta2_sql = "SELECT cod_grupo, nombre_grupo FROM tbl15_grupo WHERE (cod_estado = '1')";
                $consulta2 = mysqli_query($conectar, $consulta2_sql);
                while ($datos2 = mysqli_fetch_assoc($consulta2)) {
                if(isset($cod_grupo) AND $cod_grupo == $datos2['cod_grupo']) {
                $seleccionado = "selected"; } else { $seleccionado = ""; }
                $codigo = $datos2['cod_grupo'];
                $nombre = $datos2['nombre_grupo'];
                echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?>
            </select>
        </th>
     </tr>
     <tr>
        <th style="text-align:right;">Asignatura:</th>
        <th style="text-align:left;">
            <select name="cod_asignatura" id="cod_asignatura" class="chosen-select" data-show-subtext="true" data-live-search="true" style="width: 190px;" onchange="hacer_busqueda()">
                <?php if (isset($cod_asignatura)) { echo "<option value='' >...</option>"; } else { echo "<option value='' selected ></option>"; }
                $consulta2_sql = "SELECT nombre_asignatura, cod_asignatura FROM tbl15_asignatura";
                $consulta2 = mysqli_query($conectar, $consulta2_sql);
                while ($datos2 = mysqli_fetch_assoc($consulta2)) {
                if(isset($cod_asignatura) AND $cod_asignatura == $datos2['cod_asignatura']) {
                $seleccionado = "selected"; } else { $seleccionado = ""; }
                $codigo = $datos2['cod_asignatura'];
                $nombre = $datos2['nombre_asignatura'];
                echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?>
            </select>
        </th>
      </tr>
     <tr>
        <th style="text-align:right;">Periodo:</th>
        <th style="text-align:left;">
            <select name="cod_periodo" id="cod_periodo" class="chosen-select" data-show-subtext="true" data-live-search="true" style="width: 190px;" onchange="hacer_busqueda()">
                <?php if (isset($cod_periodo)) { echo "<option value='' >...</option>"; } else { echo "<option value='' selected ></option>"; }
                $consulta2_sql = "SELECT cod_periodo, nombre_periodo FROM tbl15_periodo";
                $consulta2 = mysqli_query($conectar, $consulta2_sql);
                while ($datos2 = mysqli_fetch_assoc($consulta2)) {
                if(isset($cod_periodo) AND $cod_periodo == $datos2['cod_periodo']) {
                $seleccionado = "selected"; } else { $seleccionado = ""; }
                $codigo = $datos2['cod_periodo'];
                $nombre = $datos2['nombre_periodo'];
                echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?>
            </select>
        </th>
      </tr>
      <tr>
        <th style="text-align:right;">Docente:</th>
        <th style="text-align:left;">
            <select name="cod_docente" id="cod_docente" class="chosen-select" data-show-subtext="true" data-live-search="true" style="width: 190px;"s>
                <?php if (isset($cod_asignatura)) { echo "<option value='' >...</option>"; } else { echo "<option value='' selected ></option>"; }
                $consulta2_sql = "SELECT nombre1_docente, nombre2_docente, apellido1_docente, apellido2_docente, cod_docente FROM tbl15_docente";
                $consulta2 = mysqli_query($conectar, $consulta2_sql);
                while ($datos2 = mysqli_fetch_assoc($consulta2)) {
                if(isset($cod_docente) AND $cod_docente == $datos2['cod_docente']) {
                $seleccionado = "selected"; } else { $seleccionado = ""; }
                $codigo = $datos2['cod_docente'];
                $nombre = $datos2['nombre1_docente'].' '.$datos2['nombre2_docente'].' '.$datos2['apellido1_docente'].' '.$datos2['apellido2_docente'];
                echo "<option value='".$codigo."' $seleccionado >".$nombre."</option>"; } ?>
            </select>
        </th>
      </tr>
        </tr>
    </table>
</form>