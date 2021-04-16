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
	$("#idprograma").val("");
	$("#programa").val("");
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
			url: '../ajax/programa.php?op=listar',
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
		url: "../ajax/programa.php?op=guardaryeditar",
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
function eliminar(idprograma)
{

	$.ajax({
		url: "../ajax/programa.php?op=eliminar",
		type : "POST",
		data: {idprograma : idprograma},

		success: function(datos)
		{
			alert(datos);
			tabla.ajax.reload();
		}
	});
	limpiar();
}

//funcion mostrar datos a modificar
function mostrar(idprograma)
{
	$.post("../ajax/programa.php?op=mostrar",{idprograma : idprograma}, function(data, status)
	{
		data = JSON.parse(data);
		mostrarform(true);

		
		$("#programa").val(data.programa);		
		$("#idprograma").val(data.idprograma);
	})
}

//funcion desactivar
function desactivar(idprograma)
{
	bootbox.confirm("¿Esta seguro de desactivar los programa?", function(result){
		if (result) 
		{
			$.post("../ajax/programa.php?op=desactivar",{idprograma : idprograma}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

//funcion desactivar
function activar(idprograma)
{
	bootbox.confirm("¿Esta seguro de activar los programa?", function(result){
		if (result) 
		{
			$.post("../ajax/programa.php?op=activar",{idprograma : idprograma}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}


init();