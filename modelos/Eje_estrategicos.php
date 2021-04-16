<?php 
//Conexion a la BASE DE DATOS
require "../config/Conexion.php";

Class Eje_estrategico
{
	//metodo construtor
	public function __construct()
	{

	}

	//metodo para insertar registros
	public function insertar($eje_estrategico,$estrategia)
	{
		$sql = "INSERT INTO eje_estrategico (eje_estrategico,estrategia)
		VALUES ('$eje_estrategico','$estrategia')";
		return ejecutarConsulta($sql);
	}

	//metodo para editar registros
	public function editar($ideje_estrategico,$eje_estrategico,$estrategia)
	{
		$sql = "UPDATE eje_estrategico SET eje_estrategico='$eje_estrategico',estrategia='$estrategia' 
		WHERE ideje_estrategico='$ideje_estrategico'";
		return ejecutarConsulta($sql);
	}

	//metodo para desactivar registros
	public function desactivar($ideje_estrategico)
	{
		$sql = "UPDATE eje_estrategico SET condicion='0' 
		WHERE ideje_estrategico='$ideje_estrategico'";
		return ejecutarConsulta($sql);
	}

	//metodo para activar registros
	public function activar($ideje_estrategico)
	{
		$sql = "UPDATE eje_estrategico SET  condicion='1' 
		WHERE ideje_estrategico='$ideje_estrategico'";
		return ejecutarConsulta($sql);
	}

	//metodo para mostrar registros
	public function mostrar($ideje_estrategico)
	{
		$sql = "SELECT * FROM eje_estrategico WHERE ideje_estrategico='$ideje_estrategico'";
		return ejecutarConsultaSimpleFila($sql);
	}


	//metodo para listar registros
	public function listar()
	{
		$sql = "SELECT * FROM eje_estrategico";
		return ejecutarConsulta($sql);
	}

	//metodo para listar registros en el select
	public function select()
	{
		$sql = "SELECT * FROM eje_estrategico WHERE condicion='1'";
		return ejecutarConsulta($sql);
	}
}
?>