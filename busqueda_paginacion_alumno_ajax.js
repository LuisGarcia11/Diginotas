$(document).ready(function(){
	load(1);
});

function load(page){
	var busqueda_ajax = $("#busqueda_ajax").val();
	var tabla = $("#tabla").val();
	$("#loader").fadeIn('slow');
	$.ajax({
		url:'../admin/busqueda_paginacion_alumno_ajax.php?action=ajax&page='+page+'&busqueda_ajax='+busqueda_ajax+'&tabla='+tabla,
		beforeSend: function(objeto){
			$('#loader').html('<img src="../imagenes/ajax-loader.gif"> Cargando...');
		},
		success:function(data){
			$(".outer_div").html(data).fadeIn('slow');
			$('#loader').html('');
		}
	})
}

function eliminar (id){
	var busqueda_ajax = $("#busqueda_ajax").val();
	var tabla = $("#tabla").val();
	if (confirm("Advertencia\n¿Esta seguro que desea Inactivar el estudiante?")){	
		$.ajax({
		type: "GET",
		url: "../admin/busqueda_paginacion_alumno_ajax.php",
		data: "id="+id+'&busqueda_ajax='+busqueda_ajax+'&tabla='+tabla,
		beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		},
		success: function(datos){
			$("#resultados").html(datos);
			load(1);
		}
		});
	}
}