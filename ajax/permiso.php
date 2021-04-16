<?php 
require_once "../modelos/Permiso.php";

$perm = new Permiso();

switch ($_GET["op"]) {

	case 'listar':
		$rspta=$perm->listar();
		$data= Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>$reg->nombre
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