<?php 
require_once "../modelos/Eje_estrategicos.php";

$eje = new Eje_estrategico();

$ideje_estrategico=isset($_POST["ideje_estrategico"])? limpiarCadena($_POST["ideje_estrategico"]):"";
$estrategia=isset($_POST["estrategia"])? limpiarCadena($_POST["estrategia"]):"";
$eje_estrategico=isset($_POST["eje_estrategico"])? limpiarCadena($_POST["eje_estrategico"]):"";

switch ($_GET["op"]) {
	case 'guardaryeditar':
		if (empty($ideje_estrategico)) {
			$rspta=$eje->insertar($eje_estrategico,$estrategia);
			echo $rspta ? "Eje estrategico registrado" : "Eje estrategico no se pudo registrar";
		}
		else{
			$rspta=$eje->editar($ideje_estrategico,$eje_estrategico,$estrategia);
			echo $rspta ? "Eje estrategico actualizado" : "Eje estrategico no se pudo actualizar";
		}
		break;

	case 'desactivar':
		$rspta=$eje->desactivar($ideje_estrategico);
		echo $rspta ? "Recursos desactivado" : "Recurso no se pudo desactivar";
		break;

	case 'activar':
		$rspta=$eje->activar($ideje_estrategico);
		echo $rspta ? "Recursos activado" : "Recurso no se pudo activar";
		break;

	case 'mostrar':
		$rspta=$eje->mostrar($ideje_estrategico);
		echo json_encode($rspta);
		break;

	case 'listar':
		$rspta=$eje->listar();
		$data= Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>($reg->condicion) ? '<button class="btn btn-info" onclick="mostrar('.$reg->ideje_estrategico.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-danger" onclick="desactivar('.$reg->ideje_estrategico.')"><i class="fa fa-close"></i></button>' : '<button class="btn btn-info" onclick="mostrar('.$reg->ideje_estrategico.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-success" onclick="activar('.$reg->ideje_estrategico.')"><i class="fa fa-check-circle"></i></button>',
				"1"=>$reg->eje_estrategico,
				"2"=>$reg->estrategia,
				"3"=>($reg->condicion)? '<span class="label bg-green">Activado</span>' : '<span class="label bg-red">Desactivado</span>'
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