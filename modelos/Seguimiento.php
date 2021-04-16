<?php
//Conexion a la BASE DE DATOS
require "../config/Conexion.php";

Class Seguimiento
{
	//metodo construtor
	public function __construct()
	{

	}

	//metodo para insertar registros
	public function insertar($seguimiento,$porcentaje_avance_tiempo,$porcentaje_avance_actividad,$acciones_correctivas,$idactividades)
	{
		$sql = "INSERT INTO seguimiento (seguimiento,porcentaje_avance_tiempo,porcentaje_avance_actividad,acciones_correctivas,idactividades,condicion_S)
		VALUES ('$seguimiento','$porcentaje_avance_tiempo','$porcentaje_avance_actividad','$acciones_correctivas','$idactividades','1')";
		return ejecutarConsulta($sql);
	}

	//metodo para editar registros
	public function editar($idseguimiento,$seguimiento,$porcentaje_avance_tiempo,$porcentaje_avance_actividad,$acciones_correctivas,$idactividades)
	{
		$sql = "UPDATE seguimiento SET seguimiento='$seguimiento',porcentaje_avance_tiempo='$porcentaje_avance_tiempo',porcentaje_avance_actividad='$porcentaje_avance_actividad',acciones_correctivas='$acciones_correctivas',idactividades='$idactividades' 
		WHERE idseguimiento='$idseguimiento'";
		return ejecutarConsulta($sql);
	}

	//metodo para desactivar registros
	public function desactivar($idseguimiento)
	{
		$sql = "UPDATE seguimiento SET condicion_S='0' 
		WHERE idseguimiento='$idseguimiento'";
		return ejecutarConsulta($sql);
	}

	//metodo para activar registros
	public function activar($idseguimiento)
	{
		$sql = "UPDATE seguimiento SET  condicion_S='1' 
		WHERE idseguimiento='$idseguimiento'";
		return ejecutarConsulta($sql);
	}

	//metodo para mostrar registros
	public function mostrar($idseguimiento)
	{
		$sql = "SELECT * FROM seguimiento WHERE idseguimiento='$idseguimiento'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//metodo para listar registros
	public function listar()
	{
		$sql = "SELECT * FROM seguimiento INNER JOIN actividades ON seguimiento.idactividades=actividades.idactividades";
		return ejecutarConsulta($sql);
	}

	//metodo para listar registros en el select
	public function select()
	{
		$sql = "SELECT * FROM seguimiento WHERE condicion_S='1'";
		return ejecutarConsulta($sql);
	}
}
?>