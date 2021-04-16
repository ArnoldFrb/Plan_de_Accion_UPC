<?php 
//Conexion a la BASE DE DATOS
require "../config/Conexion.php";

Class Programa
{
	//metodo construtor
	public function __construct()
	{

	}

	//metodo para insertar registros
	public function insertar($programa)
	{
		$sql = "INSERT INTO programa (programa)
		VALUES ('$programa')";
		return ejecutarConsulta($sql);
	}

	//metodo para editar registros
	public function editar($idprograma,$programa)
	{
		$sql = "UPDATE programa SET programa='$programa'
		WHERE idprograma='$idprograma'";
		return ejecutarConsulta($sql);
	}

	//metodo para desactivar registros
	public function desactivar($idprograma)
	{
		$sql = "UPDATE programa SET condicion='0' 
		WHERE idprograma='$idprograma'";
		return ejecutarConsulta($sql);
	}

	//metodo para activar registros
	public function activar($idprograma)
	{
		$sql = "UPDATE programa SET  condicion='1' 
		WHERE idprograma='$idprograma'";
		return ejecutarConsulta($sql);
	}

	//metodo para mostrar registros
	public function mostrar($idprograma)
	{
		$sql = "SELECT * FROM programa WHERE idprograma='$idprograma'";
		return ejecutarConsultaSimpleFila($sql);
	}


	//metodo para listar registros
	public function listar()
	{
		$sql = "SELECT * FROM programa";
		return ejecutarConsulta($sql);
	}

	//metodo para listar registros en el select
	public function select()
	{
		$sql = "SELECT * FROM programa WHERE condicion='1'";
		return ejecutarConsulta($sql);
	}
}
?>