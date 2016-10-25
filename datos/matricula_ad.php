<?php
require_conexion('conexion.php');
class Matricula_ad{
	//crud tipo_personas
	public function registrar_tipo_personas($tipo){
		$sql="insert into tipo_personas values(null,'$tipo',1)";
		$query=mysqli_query(Conexion::conectar(),$sql);
		return $query;
	}
	public function update_tipo_personas($tipo,$id_tipo){
		$sql="update tipo_personas set tipo='tipo' where id_tipo_persona=$id_tipo";
		$query=mysqli_query(Conexion::conectar(),$sql);
		return $query;
	}
	public function listar_tipo_personas(){
		$sql="select * from tipo_personas where estado=1";
		$query=mysqli_query(Conexion::conectar(),$sql);
		return $query;
	}
	public function delete_tipo_personas($id_tipo){
		$sql="update tipo_personas set estado=0 where id_tipo_persona=$id_tipo";
		$query=mysqli_query(Conexion::conectar(),$sql);
	}
}
?>