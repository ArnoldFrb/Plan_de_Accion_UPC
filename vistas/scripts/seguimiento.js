var tabla;

function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);
	})

	//carga datos al select Responsable
	$.post("../ajax/seguimiento.php?op=selectActividad", function(r)
	{
		$("#idactividades").html(r);
		$('#idactividades').selectpicker('refresh');
	});
}

//funcion limpiar
function limpiar()
{
	$("#idseguimiento").val("");
	$("#seguimiento").val("");
	$("#porcentaje_avance_tiempo").val("");
	$("#porcentaje_avance_actividad").val("");
	$("#acciones_correctivas").val("");
	$("#idactividades").val("");
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
			url: '../ajax/seguimiento.php?op=listar',
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
		url: "../ajax/seguimiento.php?op=guardaryeditar",
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
function mostrar(idseguimiento)
{
	$.post("../ajax/seguimiento.php?op=mostrar",{idseguimiento : idseguimiento}, function(data, status)
	{
		data = JSON.parse(data);
		mostrarform(true);

		$("#seguimiento").val(data.seguimiento);
		$("#porcentaje_avance_tiempo").val(data.porcentaje_avance_tiempo);
		$("#porcentaje_avance_actividad").val(data.porcentaje_avance_actividad);
		$("#acciones_correctivas").val(data.acciones_correctivas);
		$("#idactividades").val(data.idactividades);
		$('#idactividades').selectpicker('refresh');
		$("#idseguimiento").val(data.idseguimiento);
	})
}

//funcion desactivar
function desactivar(idseguimiento)
{
	bootbox.confirm("¿Esta seguro de desactivar el seguimiento?", function(result){
		if (result) 
		{
			$.post("../ajax/seguimiento.php?op=desactivar",{idseguimiento : idseguimiento}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

//funcion desactivar
function activar(idseguimiento)
{
	bootbox.confirm("¿Esta seguro de activar el seguimiento?", function(result){
		if (result) 
		{
			$.post("../ajax/seguimiento.php?op=activar",{idseguimiento : idseguimiento}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}


init();