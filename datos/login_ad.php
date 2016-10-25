<?php
require_once('conexion.php');
class Login_ad{
	public function login($user,$pass){
		$consul="select t1.id_persona,t1.apaterno as paterno,t1.amaterno,t1.tipo_documento,t1.numero_documento,t1.direccion,t1.telefono,t1.correo,t1.sexo,t1.fnacimiento,".
				"t3.usuario,t2.tipo".
				" from personas as t1, tipo_personas as t2, usuarios as t3 where t2.id_tipo_persona=t1.id_tipo_persona and t1.estado=1".
				" and t3.id_persona=t1.id_persona and t3.usuario='$user' and t3.password='$pass' and t3.estado=1";
				//echo $consul;exit();
		$query=mysql_query($consul,Conexion::conectar());
		return $query;
	}
}
?>