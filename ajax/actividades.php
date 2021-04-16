<?php 
//activar almacenamiento e el buffer
ob_start();
session_start();
require_once "../modelos/Actividades.php";

$actividad = new Actividades();

$idactividades=isset($_POST["idactividades"])? limpiarCadena($_POST["idactividades"]):"";
$codigo=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";
$iniciativas_est=isset($_POST["iniciativas_est"])? limpiarCadena($_POST["iniciativas_est"]):"";
$meta=isset($_POST["meta"])? limpiarCadena($_POST["meta"]):"";
$tiempo_duracion=isset($_POST["tiempo_duracion"])? limpiarCadena($_POST["tiempo_duracion"]):"";
$tiempo_unidad=isset($_POST["tiempo_unidad"])? limpiarCadena($_POST["tiempo_unidad"]):"";
$indicador_rendimiento=isset($_POST["indicador_rendimiento"])? limpiarCadena($_POST["indicador_rendimiento"]):"";
$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$idprograma=isset($_POST["idprograma"])? limpiarCadena($_POST["idprograma"]):"";
$ideje_estrategico=isset($_POST["ideje_estrategico"])? limpiarCadena($_POST["ideje_estrategico"]):"";
$idrecursos=isset($_POST["idrecursos"])? limpiarCadena($_POST["idrecursos"]):"";

switch ($_GET["op"]) {
	case 'guardaryeditar':
		if (empty($idactividades)) {
			$rspta=$actividad->insertar($codigo,$iniciativas_est,$meta,$tiempo_duracion,$tiempo_unidad,$indicador_rendimiento,$_SESSION['idusuario'],$idprograma,$ideje_estrategico,$idrecursos);
			echo $rspta ? "Actividad registrado" : "Actividad no se pudo registrar";
		}
		else{
			$rspta=$actividad->editar($idactividades,$codigo,$iniciativas_est,$meta,$tiempo_duracion,$tiempo_unidad,$indicador_rendimiento,$_SESSION['idusuario'],$idprograma,$ideje_estrategico,$idrecursos);
			echo $rspta ? "Actividad actualizado" : "Actividad no se pudo actualizar";
		}
		break;

	case 'desactivar':
		$rspta=$actividad->desactivar($idactividades);
		echo $rspta ? "Actividad desactivado" : "Actividad no se pudo desactivar";
		break;

	case 'activar':
		$rspta=$actividad->activar($idactividades);
		echo $rspta ? "Actividad activado" : "Actividad no se pudo activar";
		break;

	case 'mostrar':
		$rspta=$actividad->mostrar($idactividades);
		echo json_encode($rspta);
		break;

	case 'listar':
		$rspta=$actividad->listar();
		$data= Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>($reg->condicion_A) ? '<button class="btn btn-info" onclick="mostrar('.$reg->idactividades.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-danger" onclick="desactivar('.$reg->idactividades.')"><i class="fa fa-close"></i></button>' : '<button class="btn btn-info" onclick="mostrar('.$reg->idactividades.')"><i class="fa fa-pencil"></i></button>'.' <button class="btn btn-success" onclick="activar('.$reg->idactividades.')"><i class="fa fa-check-circle"></i></button>',
				"1"=>$reg->eje_estrategico,
				"2"=>$reg->estrategia,
				"3"=>$reg->programa,
				"4"=>$reg->codigo,
				"5"=>$reg->iniciativas_est,
				"6"=>$reg->meta,
				"7"=>$reg->recurso_humano,
				"8"=>$reg->recurso_fisico,
				"9"=>$reg->recurso_financiero,
				"10"=>$reg->primer_apellido.' '.$reg->segundo_apellido.' '.$reg->primer_nombre.' '.$reg->segundo_nombre,
				"11"=>$reg->cargo,
				"12"=>$reg->tiempo_duracion,
				"13"=>$reg->tiempo_unidad,
				"14"=>$reg->indicador_rendimiento,
				"15"=>($reg->condicion_A) ? '<span class="label bg-green">Activado</span>' : '<span class="label bg-red">Desactivado</span>'
			);
		}
		$results = array(
			"sEcho"=>1,
			"iTotalRecords"=>count($data),
			"iTotalDisplayRecords"=>count($data),
			"aaData"=>$data);
		echo json_encode($results);
		break;

	case 'selectEjeEstrategico':
		require_once "../modelos/Eje_estrategicos.php";
		$Eje = new Eje_estrategico();

		$rspta=$Eje->select();

		while ($reg=$rspta->fetch_object()) {
			echo '<option value='.$reg->ideje_estrategico.'>'.$reg->eje_estrategico.' --- '.$reg->estrategia.'</option>';
		}
		break;

	case 'selectRecursos':
		require_once "../modelos/Recursos.php";
		$Recur = new Recursos();

		$rspta=$Recur->select();

		while ($reg=$rspta->fetch_object()) {
			echo '<option value='.$reg->idrecurso.'>'.$reg->recurso_humano.' '.$reg->recurso_financiero.' '.$reg->recurso_fisico.'</option>';
		}
		break;

	case 'selectPrograma':
		require_once "../modelos/Programa.php";
		$Prog = new Programa();

		$rspta=$Prog->select();

		while ($reg=$rspta->fetch_object()) {
			echo '<option value='.$reg->idprograma.'>'.$reg->programa.'</option>';
		}
		break;
}

?>