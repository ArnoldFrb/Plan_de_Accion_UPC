var tabla;

function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);
	})
}

//funcion limpiar
function limpiar()
{
	$("#ideje_estrategico").val("");
	$("#eje_estrategico").val("");
	$("#estrategia").val("");
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
			url: '../ajax/eje_estrategicos.php?op=listar',
			type : "get",
			dataType : "json",
			error: function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy": true,
		"iDisplayLength": 5,//paginacion
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
		url: "../ajax/eje_estrategicos.php?op=guardaryeditar",
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

//funcion eliminar
function eliminar(ideje_estrategico)
{

	$.ajax({
		url: "../ajax/eje_estrategicos.php?op=eliminar",
		type : "POST",
		data: {ideje_estrategico : ideje_estrategico},

		success: function(datos)
		{
			alert(datos);
			tabla.ajax.reload();
		}
	});
	limpiar();
}

//funcion mostrar datos a modificar
function mostrar(ideje_estrategico)
{
	$.post("../ajax/eje_estrategicos.php?op=mostrar",{ideje_estrategico : ideje_estrategico}, function(data, status)
	{
		data = JSON.parse(data);
		mostrarform(true);

		
		$("#eje_estrategico").val(data.eje_estrategico);
		$("#estrategia").val(data.estrategia);
		$("#ideje_estrategico").val(data.ideje_estrategico);
	})
}


//funcion desactivar
function desactivar(ideje_estrategico)
{
	bootbox.confirm("¿Esta seguro de desactivar los eje estrategicos?", function(result){
		if (result) 
		{
			$.post("../ajax/eje_estrategicos.php?op=desactivar",{ideje_estrategico : ideje_estrategico}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

//funcion desactivar
function activar(ideje_estrategico)
{
	bootbox.confirm("¿Esta seguro de activar los eje estrategicos?", function(result){
		if (result) 
		{
			$.post("../ajax/eje_estrategicos.php?op=activar",{ideje_estrategico : ideje_estrategico}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

init();