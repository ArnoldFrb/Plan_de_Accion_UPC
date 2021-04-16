<?php 
//Conexion a la BASE DE DATOS
require "../config/Conexion.php";

Class Recursos
{
	//metodo construtor
	public function __construct()
	{

	}

	//metodo para insertar registros
	public function insertar($recurso_humano,$recurso_fisico,$recurso_financiero)
	{
		$sql = "INSERT INTO recursos (recurso_humano,recurso_fisico,recurso_financiero,condicion)
		VALUES ('$recurso_humano','$recurso_fisico','$recurso_financiero','1')";
		return ejecutarConsulta($sql);
	}

	//metodo para editar registros
	public function editar($idrecurso,$recurso_humano,$recurso_fisico,$recurso_financiero)
	{
		$sql = "UPDATE recursos SET recurso_humano='$recurso_humano',recurso_fisico='$recurso_fisico',recurso_financiero='$recurso_financiero' 
		WHERE idrecurso='$idrecurso'";
		return ejecutarConsulta($sql);
	}

	//metodo para desactivar registros
	public function desactivar($idrecurso)
	{
		$sql = "UPDATE recursos SET condicion='0' 
		WHERE idrecurso='$idrecurso'";
		return ejecutarConsulta($sql);
	}

	//metodo para activar registros
	public function activar($idrecurso)
	{
		$sql = "UPDATE recursos SET  condicion='1' 
		WHERE idrecurso='$idrecurso'";
		return ejecutarConsulta($sql);
	}

	//metodo para mostrar registros
	public function mostrar($idrecurso)
	{
		$sql = "SELECT * FROM recursos WHERE idrecurso='$idrecurso'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//metodo para listar registros
	public function listar()
	{
		$sql = "SELECT * FROM recursos";
		return ejecutarConsulta($sql);
	}

	//metodo para listar registros en el select
	public function select()
	{
		$sql = "SELECT * FROM recursos WHERE condicion='1'";
		return ejecutarConsulta($sql);
	}
}
?>