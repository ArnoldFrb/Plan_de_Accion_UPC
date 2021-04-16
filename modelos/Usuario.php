<?php 
//Conexion a la BASE DE DATOS
require "../config/Conexion.php";

Class Usuario
{
	//metodo construtor
	public function __construct()
	{

	}

	//metodo para insertar registros
	public function insertar($primer_apellido,$segundo_apellido,$primer_nombre,$segundo_nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$clave,$imagen,$permisos)
	{
		$sql = "INSERT INTO usuario (primer_apellido,segundo_apellido,primer_nombre,segundo_nombre,tipo_documento,num_documento,direccion,telefono,email,cargo,login,clave,imagen,condicion)
		VALUES ('$primer_apellido','$segundo_apellido','$primer_nombre','$segundo_nombre','$tipo_documento','$num_documento','$direccion','$telefono','$email','$cargo','$login','$clave','$imagen','1')";
		//return ejecutarConsulta($sql);
		$idusuarionew = ejecutarConsulta_retornarID($sql);

		$num_elementos = 0;
		$sw=true;

		while ($num_elementos < count($permisos)) 
		{
			$sql_detalles = "INSERT INTO usuario_permiso (idusuario,idpermiso) VALUES ('$idusuarionew','$permisos[$num_elementos]')";
			ejecutarConsulta($sql_detalles) or $sw = false;

			$num_elementos = $num_elementos + 1;
		}

		return $sw;
	}

	//metodo para editar registros
	public function editar($idusuario,$primer_apellido,$segundo_apellido,$primer_nombre,$segundo_nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$clave,$imagen,$permisos)
	{
		$sql = "UPDATE usuario SET primer_apellido='$primer_apellido',segundo_apellido='$segundo_apellido',primer_nombre='$primer_nombre',segundo_nombre='$segundo_nombre',tipo_documento='$tipo_documento',num_documento='$num_documento',direccion='$direccion',telefono='$telefono',email='$email',cargo='$cargo',login='$login',clave='$clave',imagen='$imagen'
		WHERE idusuario='$idusuario'";
		ejecutarConsulta($sql);

		$sqldel = "DELETE FROM usuario_permiso WHERE idusuario='$idusuario'";
		ejecutarConsulta($sqldel);

		$num_elementos = 0;
		$sw=true;

		while ($num_elementos < count($permisos)) 
		{
			$sql_detalles = "INSERT INTO usuario_permiso (idusuario,idpermiso) VALUES ('$idusuario','$permisos[$num_elementos]')";
			ejecutarConsulta($sql_detalles) or $sw = false;

			$num_elementos = $num_elementos + 1;
		}

		return $sw;
	}

	//metodo para desactivar registros
	public function desactivar($idusuario)
	{
		$sql = "UPDATE usuario SET condicion='0' 
		WHERE idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}

	//metodo para activar registros
	public function activar($idusuario)
	{
		$sql = "UPDATE usuario SET  condicion='1' 
		WHERE idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}

	//metodo para mostrar registros
	public function mostrar($idusuario)
	{
		$sql = "SELECT * FROM usuario WHERE idusuario='$idusuario'";
		return ejecutarConsultaSimpleFila($sql);
	}


	//metodo para listar registros
	public function listar()
	{
		$sql = "SELECT * FROM usuario";
		return ejecutarConsulta($sql);
	}

	//metodo para listar los permisos
	public function listarmarcados($idusuario)
	{
		$sql = "SELECT * FROM usuario_permiso WHERE idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}

	//acceso al sistema
	public function verificar($login,$clave)
	{
		$sql = "SELECT idusuario,primer_apellido,segundo_apellido,primer_nombre,segundo_nombre,tipo_documento,num_documento,direccion,telefono,email,cargo,login,imagen FROM usuario WHERE login = '$login' AND clave = '$clave' AND condicion = '1'";
		return ejecutarConsulta($sql);
	}
}
?>