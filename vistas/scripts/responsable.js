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
	$("#idresponsable").val("");
	$("#primer_apellido").val("");
	$("#segundo_apellido").val("");
	$("#primer_nombre").val("");
	$("#segundo_nombre").val("");
	$("#identificacion").val("");
	$("#telefono").val("");
	$("#cargo").val("");
	$("#e_mail").val("");
	$("#usuario").val("");
	$("#contraseña").val("");
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
			url: '../ajax/responsable.php?op=listar',
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
		url: "../ajax/responsable.php?op=guardaryeditar",
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
function mostrar(idresponsable)
{
	$.post("../ajax/responsable.php?op=mostrar",{idresponsable : idresponsable}, function(data, status)
	{
		data = JSON.parse(data);
		mostrarform(true);

		$("#primer_apellido").val(data.primer_apellido);
		$("#segundo_apellido").val(data.segundo_apellido);
		$("#primer_nombre").val(data.primer_nombre);
		$("#segundo_nombre").val(data.segundo_nombre);
		$("#identificacion").val(data.identificacion);
		$("#telefono").val(data.telefono);
		$("#cargo").val(data.cargo);
		$("#e_mail").val(data.e_mail);
		$("#contraseña").val(data.contraseña);
		$("#idresponsable").val(data.idresponsable);
	})
}

//funcion desactivar
function desactivar(idresponsable)
{
	bootbox.confirm("¿Esta seguro de desactivar el responsable?", function(result){
		if (result) 
		{
			$.post("../ajax/responsable.php?op=desactivar",{idresponsable : idresponsable}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

//funcion desactivar
function activar(idresponsable)
{
	bootbox.confirm("¿Esta seguro de activar el responsable?", function(result){
		if (result) 
		{
			$.post("../ajax/responsable.php?op=activar",{idresponsable : idresponsable}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

//funcion validar
function validar(usuario)
{

	$.ajax({
		url: "../ajax/responsable.php?op=validar",
		type : "POST",
		data: {usuario : usuario},
		contentType: false,
		processData: false,

		success: function(datos)
		{
			alert(datos);
			tabla.ajax.reload();
		}
	});
}

init();