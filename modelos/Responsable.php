<?php 
//Conexion a la BASE DE DATOS
require "../config/Conexion.php";

Class Responsable
{
	//metodo construtor
	public function __construct()
	{

	}

	//metodo para insertar registros
	public function insertar($primer_apellido,$segundo_apellido,$primer_nombre,$segundo_nombre,$identificacion,$telefono,$cargo,$e_mail,$usuario,$contraseña)
	{
		$sql = "INSERT INTO responsable (primer_apellido,segundo_apellido,primer_nombre,segundo_nombre,identificacion,telefono,cargo,e_mail,usuario,contraseña,condicion)
		VALUES ('$primer_apellido','$segundo_apellido','$primer_nombre','$segundo_nombre','$identificacion','$telefono','$cargo','$e_mail','$usuario','$contraseña','1')";
		return ejecutarConsulta($sql);
	}

	//metodo para editar registros
	public function editar($idresponsable,$primer_apellido,$segundo_apellido,$primer_nombre,$segundo_nombre,$identificacion,$telefono,$cargo,$e_mail,$usuario,$contraseña)
	{
		$sql = "UPDATE responsable SET primer_apellido='$primer_apellido',segundo_apellido='$segundo_apellido',primer_nombre='$primer_nombre',segundo_nombre='$segundo_nombre',identificacion='$identificacion',telefono='$telefono',cargo='$cargo',e_mail='$e_mail',usuario='$usuario',contraseña='$contraseña'
		WHERE idresponsable='$idresponsable'";
		return ejecutarConsulta($sql);
	}

	//metodo para desactivar registros
	public function desactivar($idresponsable)
	{
		$sql = "UPDATE responsable SET condicion='0' 
		WHERE idresponsable='$idresponsable'";
		return ejecutarConsulta($sql);
	}

	//metodo para activar registros
	public function activar($idresponsable)
	{
		$sql = "UPDATE responsable SET  condicion='1' 
		WHERE idresponsable='$idresponsable'";
		return ejecutarConsulta($sql);
	}

	//metodo para mostrar registros
	public function mostrar($idresponsable)
	{
		$sql = "SELECT * FROM responsable WHERE idresponsable='$idresponsable'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//metodo para listar registros
	public function listar()
	{
		$sql = "SELECT * FROM responsable";
		return ejecutarConsulta($sql);
	}

	//metodo para validar registros
	public function validar($usuario)
	{
		$sql = "SELECT CASE WHEN usuario='$usuario' THEN '1' ELSE '0' END FROM responsable WHERE usuario='$usuario'";
		return ejecutarConsulta($sql);
	}
} 
?>