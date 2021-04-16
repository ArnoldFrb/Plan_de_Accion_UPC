<?php 
//Conexion a la BASE DE DATOS
require "../config/Conexion.php";

Class Permiso
{
	//metodo construtor
	public function __construct()
	{

	}

	//metodo para listar registros
	public function listar()
	{
		$sql = "SELECT * FROM permiso";
		return ejecutarConsulta($sql);
	}
}
?>