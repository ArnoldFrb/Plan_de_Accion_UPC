<?php 
require_once "../modelos/Programa.php";

$program = new Programa();

$idprograma=isset($_POST["idprograma"])? limpiarCadena($_POST["idprograma"]):"";
$programa=isset($_POST["programa"])? limpiarCadena($_POST["programa"]):"";

switch ($_GET["op"]) {
	case 'guardaryeditar':
		if (empty($idprograma)) {
			$rspta=$program->insertar($programa);
			echo $rspta ? "Eje programa registrado" : "Eje programa no se pudo registrar";
		}
		else{
			$rspta=$program->editar($idprograma,$programa);
			echo $rspta ? "Eje programa actualizado" : "Eje programa no se pudo actualizar";
		}
		break;

	case 'desactivar':
		$rspta=$program->desactivar($idprograma);
		echo $rspta ? "Recursos desactivado" : "Recurso no se pudo desactivar";
		break;

	case 'activar':
		$rspta=$program->activar($idprograma);
		echo $rspta ? "Recursos activado" : "Recurso no se pudo activar";
		break;

	case 'mostrar':
		$rspta=$program->mostrar($idprograma);
		echo json_encode($rspta);
		break;

	case 'listar':
		$rspta=$program->listar();
		$data= Array();



		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>($reg->condicion) ? '<button class="btn btn-info" onclick="mostrar('.$reg->idprograma.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-danger" onclick="desactivar('.$reg->idprograma.')"><i class="fa fa-close"></i></button>' : '<button class="btn btn-info" onclick="mostrar('.$reg->idprograma.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-success" onclick="activar('.$reg->idprograma.')"><i class="fa fa-check-circle"></i></button>',
				"1"=>$reg->programa,
				"2"=>($reg->condicion)? '<span class="label bg-green">Activado</span>' : '<span class="label bg-red">Desactivado</span>'
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