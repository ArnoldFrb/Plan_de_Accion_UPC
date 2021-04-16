<?php 
session_start();
require_once "../modelos/Usuario.php";

$usua = new Usuario();

$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$primer_apellido=isset($_POST["primer_apellido"])? limpiarCadena($_POST["primer_apellido"]):"";
$segundo_apellido=isset($_POST["segundo_apellido"])? limpiarCadena($_POST["segundo_apellido"]):"";
$primer_nombre=isset($_POST["primer_nombre"])? limpiarCadena($_POST["primer_nombre"]):"";
$segundo_nombre=isset($_POST["segundo_nombre"])? limpiarCadena($_POST["segundo_nombre"]):"";
$tipo_documento=isset($_POST["tipo_documento"])? limpiarCadena($_POST["tipo_documento"]):"";
$num_documento=isset($_POST["num_documento"])? limpiarCadena($_POST["num_documento"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
$email=isset($_POST["email"])? limpiarCadena($_POST["email"]):"";
$cargo=isset($_POST["cargo"])? limpiarCadena($_POST["cargo"]):"";
$login=isset($_POST["login"])? limpiarCadena($_POST["login"]):"";
$clave=isset($_POST["clave"])? limpiarCadena($_POST["clave"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";

switch ($_GET["op"]) {
	case 'guardaryeditar':

		if (!file_exists($_FILES['imagen']['tmp_name']) || ! is_uploaded_file($_FILES['imagen']['tmp_name']))
		{
			$imagen=$_POST["imagenactual"];
		}
		else
		{
			$ext = explode(".", $_FILES['imagen']['name']);
			if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png") 
			{
				$imagen = round(microtime(true)) . '.' .end($ext);
				move_uploaded_file($_FILES['imagen']['tmp_name'], "../files/usuarios/".$imagen);
			}
		}

		//Hash SHA256 en la contraseña
		$clavehash = hash("SHA256", $clave);

		if (empty($idusuario)) {
			$rspta=$usua->insertar($primer_apellido,$segundo_apellido,$primer_nombre,$segundo_nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$clavehash,$imagen,$_POST['permiso']);
			echo $rspta ? "Usuario registrado" : "No se pudieron registrar todos los datos del usuario";
		}
		else{
			$rspta=$usua->editar($idusuario,$primer_apellido,$segundo_apellido,$primer_nombre,$segundo_nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$clavehash,$imagen,$_POST['permiso']);
			echo $rspta ? "Usuario actualizado" : "Usuario no se pudo actualizar";
		}
		break;

	case 'desactivar':
		$rspta=$usua->desactivar($idusuario);
		echo $rspta ? "Usuario desactivado" : "Usuario no se pudo desactivar";
		break;

	case 'activar':
		$rspta=$usua->activar($idusuario);
		echo $rspta ? "Usuario activado" : "Usuario no se pudo activar";
		break;

	case 'mostrar':
		$rspta=$usua->mostrar($idusuario);
		echo json_encode($rspta);
		break;

	case 'listar':
		$rspta=$usua->listar();
		$data= Array();



		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>($reg->condicion) ? '<button class="btn btn-info" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-danger" onclick="desactivar('.$reg->idusuario.')"><i class="fa fa-close"></i></button>' : '<button class="btn btn-info" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-success" onclick="activar('.$reg->idusuario.')"><i class="fa fa-check-circle"></i></button>',
				"1"=>$reg->primer_apellido.' '.$reg->segundo_apellido.' '.$reg->primer_nombre.' '.$reg->segundo_nombre,
				"2"=>$reg->tipo_documento,
				"3"=>$reg->num_documento,
				"4"=>$reg->direccion,
				"5"=>$reg->telefono,
				"6"=>$reg->email,
				"7"=>$reg->login,
				"8"=>"<img src='../files/usuarios/".$reg->imagen."' height='50px' width='50px'>",
				"9"=>($reg->condicion)? '<span class="label bg-green">Activado</span>' : '<span class="label bg-red">Desactivado</span>'
			);
		}
		$results = array(
			"sEcho"=>1,
			"iTotalRecords"=>count($data),
			"iTotalDisplayRecords"=>count($data),
			"aaData"=>$data);
		echo json_encode($results);
		break;

	case 'permisos':
		require_once "../modelos/Permiso.php";
		$per = new Permiso();
		$rspta = $per->listar();

		//Obtener permisos asignados
		$id = $_GET['id'];
		$marcados = $usua->listarmarcados($id);

		$valores = array();

		while ($per = $marcados->fetch_object()) 
		{
			array_push($valores, $per->idpermiso);
		}

		while ($reg = $rspta->fetch_object()) 
		{
			$sw=in_array($reg->idpermiso, $valores)? 'checked': '';
			echo '<li> <input type="checkbox" '.$sw.' name="permiso[]" value="'.$reg->idpermiso.'">'.$reg->nombre.'</li>';
		}
		break;

	case 'verificar':
		$logina = $_POST['loginA'];
		$clavea = $_POST['claveA'];

		//Hash SHA256 en la contraseña
        $clavehash=hash("SHA256",$clavea);
 
        $rspta=$usua->verificar($logina,$clavehash);

		$fetch = $rspta->fetch_object();

		if (isset($fetch)) 
		{
			//Variables de sesion

			$_SESSION['idusuario']=$fetch->idusuario;
			$_SESSION['nombre']=$fetch->primer_apellido.' '.$fetch->primer_nombre;
			$_SESSION['login']=$fetch->login;
			$_SESSION['imagen']=$fetch->imagen;

			$marcados = $usua->listarmarcados($fetch->idusuario);

			$valores = array();

			while ($per = $marcados->fetch_object()) 
			{
				array_push($valores, $per->idpermiso);
			}

			in_array(1, $valores)?$_SESSION['escritorio']=1:$_SESSION['escritorio']=0;
			in_array(2, $valores)?$_SESSION['recurso']=1:$_SESSION['recurso']=0;
			in_array(3, $valores)?$_SESSION['actividad']=1:$_SESSION['actividad']=0;
			in_array(4, $valores)?$_SESSION['estrategias_programas']=1:$_SESSION['estrategias_programas']=0;
			in_array(5, $valores)?$_SESSION['acceso']=1:$_SESSION['acceso']=0;
			in_array(6, $valores)?$_SESSION['consultars']=1:$_SESSION['consultars']=0;
			in_array(7, $valores)?$_SESSION['consultara']=1:$_SESSION['consultara']=0;
		}

		echo json_encode($fetch);

		break;
	case 'salir':
        //Limpiamos las variables de sesión   
        session_unset();
        //Destruìmos la sesión
        session_destroy();
        //Redireccionamos al login
        header("Location: ../index.php");
 
    	break;
}
?>