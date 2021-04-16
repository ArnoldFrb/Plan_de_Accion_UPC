<?php 
//Conexion a la BASE DE DATOS
require "../config/Conexion.php";

Class Actividades
{
	//metodo construtor
	public function __construct()
	{

	}

	//metodo para insertar registros
	public function insertar($codigo,$iniciativas_est,$meta,$tiempo_duracion,$tiempo_unidad,$indicador_rendimiento,$idusuario,$idprograma,$ideje_estrategico,$idrecursos)
	{
		$sql = "INSERT INTO actividades (codigo,iniciativas_est,meta,tiempo_duracion,tiempo_unidad,indicador_rendimiento,idusuario,idprograma,ideje_estrategico,idrecursos)
		VALUES ('$codigo','$iniciativas_est','$meta','$tiempo_duracion','$tiempo_unidad','$indicador_rendimiento','$idusuario','$idprograma','$ideje_estrategico','$idrecursos')";
		return ejecutarConsulta($sql);
	}

	//metodo para editar registros
	public function editar($idactividades,$codigo,$iniciativas_est,$meta,$tiempo_duracion,$tiempo_unidad,$indicador_rendimiento,$idusuario,$idprograma,$ideje_estrategico,$idrecursos)
	{
		$sql = "UPDATE actividades SET codigo='$codigo', iniciativas_est='$iniciativas_est',meta='$meta',tiempo_duracion='$tiempo_duracion',tiempo_unidad='$tiempo_unidad',indicador_rendimiento='$indicador_rendimiento',idusuario='$idusuario',idprograma='$idprograma',ideje_estrategico='$ideje_estrategico',idrecursos='$idrecursos' 
		WHERE idactividades='$idactividades'";
		return ejecutarConsulta($sql);
	}

	//metodo para desactivar registros
	public function desactivar($idactividades)
	{
		$sql = "UPDATE actividades SET condicion_A='0' 
		WHERE idactividades='$idactividades'";
		return ejecutarConsulta($sql);
	}

	//metodo para activar registros
	public function activar($idactividades)
	{
		$sql = "UPDATE actividades SET  condicion_A='1' 
		WHERE idactividades='$idactividades'";
		return ejecutarConsulta($sql);
	}

	//metodo para mostrar registros
	public function mostrar($idactividades)
	{
		$sql = "SELECT * FROM actividades WHERE idactividades='$idactividades'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//metodo para listar registros
	public function listar()
	{
		$sql = "SELECT * FROM actividades INNER JOIN usuario ON actividades.idusuario=usuario.idusuario INNER JOIN eje_estrategico ON actividades.ideje_estrategico=eje_estrategico.ideje_estrategico INNER JOIN programa ON programa.idprograma=actividades.idprograma INNER JOIN recursos ON recursos.idrecurso=actividades.idrecursos";
		return ejecutarConsulta($sql);

	}

	public function select()
	{
		$sql = "SELECT * FROM actividades WHERE condicion_A='1'";
		return ejecutarConsulta($sql);
	}
}
?>