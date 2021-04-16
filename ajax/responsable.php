<?php 
require_once "../modelos/Responsable.php";

$respon = new Responsable();

$idresponsable=isset($_POST["idresponsable"])? limpiarCadena($_POST["idresponsable"]):"";
$primer_apellido=isset($_POST["primer_apellido"])? limpiarCadena($_POST["primer_apellido"]):"";
$segundo_apellido=isset($_POST["segundo_apellido"])? limpiarCadena($_POST["segundo_apellido"]):"";
$primer_nombre=isset($_POST["primer_nombre"])? limpiarCadena($_POST["primer_nombre"]):"";
$segundo_nombre=isset($_POST["segundo_nombre"])? limpiarCadena($_POST["segundo_nombre"]):"";
$identificacion=isset($_POST["identificacion"])? limpiarCadena($_POST["identificacion"]):"";
$telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
$cargo=isset($_POST["cargo"])? limpiarCadena($_POST["cargo"]):"";
$e_mail=isset($_POST["e_mail"])? limpiarCadena($_POST["e_mail"]):"";
$usuario=isset($_POST["usuario"])? limpiarCadena($_POST["usuario"]):"";
$contraseña=isset($_POST["contraseña"])? limpiarCadena($_POST["contraseña"]):"";

switch ($_GET["op"]) {
	
	case 'guardaryeditar':
		if (empty($idresponsable)) {

			$rspta=$respon->insertar($primer_apellido,$segundo_apellido,$primer_nombre,$segundo_nombre,$identificacion,$telefono,$cargo,$e_mail,$usuario,$contraseña);
			echo $rspta ? "Responsable registrado" : "Responsable no se pudo registrar";
		}
		else{
			$rspta=$respon->editar($idresponsable,$primer_apellido,$segundo_apellido,$primer_nombre,$segundo_nombre,$identificacion,$telefono,$cargo,$e_mail,$usuario,$contraseña);
			echo $rspta ? "Responsable actualizado" : "Responsable no se pudo actualizar";
		}
		break;

	case 'desactivar':
		$rspta=$respon->desactivar($idresponsable);
		echo $rspta ? "Responsable desactivado" : "Responsable no se pudo desactivar";
		break;

	case 'activar':
		$rspta=$respon->activar($idresponsable);
		echo $rspta ? "Responsable activado" : "Responsable no se pudo activar";
		break;

	case 'mostrar':
		$rspta=$respon->mostrar($idresponsable);
		echo json_encode($rspta);
		break;

	case 'validar':
		$rspta=$respon->validar($usuario);
		echo $rspta ? "Este usuario ya existe" : "Usuario correcto";
		break;

	case 'listar':
		$rspta=$respon->listar();
		$data= Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>($reg->condicion) ? '<button class="btn btn-info" onclick="mostrar('.$reg->idresponsable.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-danger" onclick="desactivar('.$reg->idresponsable.')"><i class="fa fa-close"></i></button>' : '<button class="btn btn-info" onclick="mostrar('.$reg->idresponsable.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-success" onclick="activar('.$reg->idresponsable.')"><i class="fa fa-check-circle"></i></button>',
				"1"=>$reg->primer_apellido.' '.$reg->segundo_apellido.' '.$reg->primer_nombre.' '.$reg->segundo_nombre,
				"2"=>$reg->identificacion,
				"3"=>$reg->telefono,
				"4"=>$reg->cargo,
				"5"=>$reg->e_mail,
				"6"=>($reg->condicion)? '<span class="label bg-green">Activo</span>' : '<span class="label bg-red">Innactivado</span>'
			);
		}
		$results = array(
			"sEcho"=>1,
			"iTotalRecords"=>count($data),
			"iTotalDisplayRecords"=>count($data),
			"aaData"=>$data);
		echo json_encode($results);
		break;

}

?>