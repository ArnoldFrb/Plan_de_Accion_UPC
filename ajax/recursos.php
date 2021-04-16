<?php 
require_once "../modelos/Recursos.php";

$recurso = new Recursos();

$idrecurso=isset($_POST["idrecurso"])? limpiarCadena($_POST["idrecurso"]):"";
$recurso_humano=isset($_POST["recurso_humano"])? limpiarCadena($_POST["recurso_humano"]):"";
$recurso_fisico=isset($_POST["recurso_fisico"])? limpiarCadena($_POST["recurso_fisico"]):"";
$recurso_financiero=isset($_POST["recurso_financiero"])? limpiarCadena($_POST["recurso_financiero"]):"";

switch ($_GET["op"]) {
	case 'guardaryeditar':
		if (empty($idrecurso)) {
			$rspta=$recurso->insertar($recurso_humano,$recurso_fisico,$recurso_financiero);
			echo $rspta ? "Recursos registrado" : "Recurso no se pudo registrar";
		}
		else{
			$rspta=$recurso->editar($idrecurso,$recurso_humano,$recurso_fisico,$recurso_financiero);
			echo $rspta ? "Recursos actualizado" : "Recurso no se pudo actualizar";
		}
		break;

	case 'desactivar':
		$rspta=$recurso->desactivar($idrecurso);
		echo $rspta ? "Recursos desactivado" : "Recurso no se pudo desactivar";
		break;

	case 'activar':
		$rspta=$recurso->activar($idrecurso);
		echo $rspta ? "Recursos activado" : "Recurso no se pudo activar";
		break;

	case 'mostrar':
		$rspta=$recurso->mostrar($idrecurso);
		echo json_encode($rspta);
		break;

	case 'listar':
		$rspta=$recurso->listar();
		$data= Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>($reg->condicion) ? '<button class="btn btn-info" onclick="mostrar('.$reg->idrecurso.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-danger" onclick="desactivar('.$reg->idrecurso.')"><i class="fa fa-close"></i></button>' : '<button class="btn btn-info" onclick="mostrar('.$reg->idrecurso.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-success" onclick="activar('.$reg->idrecurso.')"><i class="fa fa-check-circle"></i></button>',
				"1"=>$reg->recurso_humano,
				"2"=>$reg->recurso_fisico,
				"3"=>$reg->recurso_financiero,
				"4"=>($reg->condicion)? '<span class="label bg-green">Activado</span>' : '<span class="label bg-red">Desactivado</span>'
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