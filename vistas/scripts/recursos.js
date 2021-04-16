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
	$("#idrecurso").val("");
	$("#recurso_humano").val("");
	$("#recurso_fisico").val("");
	$("#recurso_financiero").val("");
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
			url: '../ajax/recursos.php?op=listar',
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
		url: "../ajax/recursos.php?op=guardaryeditar",
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
function mostrar(idrecurso)
{
	$.post("../ajax/recursos.php?op=mostrar",{idrecurso : idrecurso}, function(data, status)
	{
		data = JSON.parse(data);
		mostrarform(true);

		$("#recurso_humano").val(data.recurso_humano);
		$("#recurso_fisico").val(data.recurso_fisico);
		$("#recurso_financiero").val(data.recurso_financiero);
		$("#idrecurso").val(data.idrecurso);
	})
}

//funcion desactivar
function desactivar(idrecurso)
{
	bootbox.confirm("¿Esta seguro de desactivar los recursos?", function(result){
		if (result) 
		{
			$.post("../ajax/recursos.php?op=desactivar",{idrecurso : idrecurso}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

//funcion desactivar
function activar(idrecurso)
{
	bootbox.confirm("¿Esta seguro de activar los recursos?", function(result){
		if (result) 
		{
			$.post("../ajax/recursos.php?op=activar",{idrecurso : idrecurso}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}


init();