<?php 
require_once "../modelos/Seguimiento.php";

$segui = new Seguimiento();

$idseguimiento=isset($_POST["idseguimiento"])? limpiarCadena($_POST["idseguimiento"]):"";
$seguimiento=isset($_POST["seguimiento"])? limpiarCadena($_POST["seguimiento"]):"";
$porcentaje_avance_tiempo=isset($_POST["porcentaje_avance_tiempo"])? limpiarCadena($_POST["porcentaje_avance_tiempo"]):"";
$porcentaje_avance_actividad=isset($_POST["porcentaje_avance_actividad"])? limpiarCadena($_POST["porcentaje_avance_actividad"]):"";
$acciones_correctivas=isset($_POST["acciones_correctivas"])? limpiarCadena($_POST["acciones_correctivas"]):"";
$idactividades=isset($_POST["idactividades"])? limpiarCadena($_POST["idactividades"]):"";

switch ($_GET["op"]) {
	case 'guardaryeditar':
		if (empty($idseguimiento)) {
			$rspta=$segui->insertar($seguimiento,$porcentaje_avance_tiempo,$porcentaje_avance_actividad,$acciones_correctivas,$idactividades);
			echo $rspta ? "Seguimiento registrado" : "Seguimiento no se pudo registrar";
		}
		else{
			$rspta=$segui->editar($idseguimiento,$seguimiento,$porcentaje_avance_tiempo,$porcentaje_avance_actividad,$acciones_correctivas,$idactividades);
			echo $rspta ? "Seguimiento actualizado" : "Seguimiento no se pudo actualizar";
		}
		break;

	case 'desactivar':
		$rspta=$segui->desactivar($idseguimiento);
		echo $rspta ? "Seguimiento desactivado" : "Seguimiento no se pudo desactivar";
		break;

	case 'activar':
		$rspta=$segui->activar($idseguimiento);
		echo $rspta ? "Seguimiento activado" : "Seguimiento no se pudo activar";
		break;

	case 'mostrar':
		$rspta=$segui->mostrar($idseguimiento);
		echo json_encode($rspta);
		break;

	case 'listar':
		$rspta=$segui->listar();
		$data= Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>($reg->condicion_S) ? '<button class="btn btn-info" onclick="mostrar('.$reg->idseguimiento.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-danger" onclick="desactivar('.$reg->idseguimiento.')"><i class="fa fa-close"></i></button>' : '<button class="btn btn-info" onclick="mostrar('.$reg->idseguimiento.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-success" onclick="activar('.$reg->idseguimiento.')"><i class="fa fa-check-circle"></i></button>',
				"1"=>$reg->seguimiento,
				"2"=>$reg->porcentaje_avance_tiempo,
				"3"=>$reg->porcentaje_avance_actividad,
				"4"=>$reg->acciones_correctivas,				
				"5"=>$reg->codigo,
				"6"=>$reg->iniciativas_est,
				"7"=>$reg->meta,
				"8"=>($reg->condicion_S)? '<span class="label bg-green">Activado</span>' : '<span class="label bg-red">Desactivado</span>'
			);
		}
		$results = array(
			"sEcho"=>1,
			"iTotalRecords"=>count($data),
			"iTotalDisplayRecords"=>count($data),
			"aaData"=>$data);
		echo json_encode($results);
		break;

		case 'selectActividad':
		require_once "../modelos/Actividades.php";
		$act = new Actividades();

		$rspta=$act->select();

		while ($reg=$rspta->fetch_object()) {
			echo '<option value='.$reg->idactividades.'>'.$reg->codigo.' '.$reg->iniciativas_est.'</option>';
		}
		break;
}

?>