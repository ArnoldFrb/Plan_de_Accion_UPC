var tabla;

function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);
	})

	//carga datos al select Eje estrategico
	$.post("../ajax/actividades.php?op=selectEjeEstrategico", function(r)
	{
		$("#ideje_estrategico").html(r);
		$('#ideje_estrategico').selectpicker('refresh');
	});

	//carga datos al select Eje estrategico
	$.post("../ajax/actividades.php?op=selectRecursos", function(r)
	{
		$("#idrecursos").html(r);
		$('#idrecursos').selectpicker('refresh');
	});

	//carga datos al select Eje estrategico
	$.post("../ajax/actividades.php?op=selectPrograma", function(r)
	{
		$("#idprograma").html(r);
		$('#idprograma').selectpicker('refresh');
	});
}

//funcion limpiar
function limpiar()
{
	$("#idactividades").val("");
	$("#codigo").val("");
	$("#iniciativas_est").val("");
	$("#meta").val("");
	$("#tiempo_duracion").val("");
	$("#tiempo_unidad").val("");
	$("#indicador_rendimiento").val("");
	$("#idusuario").val("");
	$("#idprograma").val("");
	$("#ideje_estrategico").val("");
	$("#idrecursos").val("");
}

//funcion mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag) 
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
	}
}

//funcion cancelar form
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

//funcion listar
function listar()
{
	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,
		"aServerSide": true,
		dom: 'Bfrtip',
		buttons: [
		'copyHtml5',
		'excelHtml5',
		'csvHtml5',
		'pdf'
		],
		"ajax":
		{
			url: '../ajax/actividades.php?op=listar',
			type : "get",
			dataType : "json",
			error: function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy": true,
		"iDisplayLength": 1,//paginacion
		"order": [[0, "desc"]]
	}).DataTable();
}

//funcion guardar o editar
function guardaryeditar(e)
{
	e.preventDefault();
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);


	$.ajax({
		url: "../ajax/actividades.php?op=guardaryeditar",
		type : "POST",
		data: formData,
		contentType: false,
		processData: false,

		success: function(datos)
		{
			alert(datos);
			mostrarform(false);
			tabla.ajax.reload();
		}
	});
	limpiar();
}

//funcion mostrar datos a modificar
function mostrar(idactividades)
{
	$.post("../ajax/actividades.php?op=mostrar",{idactividades : idactividades}, function(data, status)
	{
		data = JSON.parse(data);
		mostrarform(true);

		$("#iniciativas_est").val(data.iniciativas_est);
		$("#codigo").val(data.codigo);
		$("#meta").val(data.meta);
		$("#tiempo_duracion").val(data.tiempo_duracion);
		$("#tiempo_unidad").val(data.tiempo_unidad);
		$("#indicador_rendimiento").val(data.indicador_rendimiento);
		$("#idusuario").val(data.idusuario);
		$("#idprograma").val(data.idprograma);
		$("#ideje_estrategico").val(data.ideje_estrategico);
		$("#idrecursos").val(data.idrecursos);
		$("#idactividades").val(data.idactividades);
	})
}

//funcion desactivar
function desactivar(idactividades)
{
	bootbox.confirm("¿Esta seguro de desactivar la actividad?", function(result){
		if (result) 
		{
			$.post("../ajax/actividades.php?op=desactivar",{idactividades : idactividades}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

//funcion desactivar
function activar(idactividades)
{
	bootbox.confirm("¿Esta seguro de activar la actividad?", function(result){
		if (result) 
		{
			$.post("../ajax/actividades.php?op=activar",{idactividades : idactividades}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}


init();