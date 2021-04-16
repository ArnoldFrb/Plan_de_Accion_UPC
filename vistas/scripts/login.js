$("#frmAcceso").on('submit',function(e)
{
	e.preventDefault();
    loginA=$("#loginA").val();
    claveA=$("#claveA").val();

	$.post("../ajax/usuario.php?op=verificar",
	{"loginA":loginA,"claveA":claveA},
	function(data)
	{
		if (data != "null") 
		{
			$(location).attr("href","recursos.php");
		}
		else
		{
			bootbox.alert("Usuario y/o Password incorrectos");
		}
	});
})