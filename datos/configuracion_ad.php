<?php
require_once('conexion.php');
class Configuracion_ad{
	//registros de tablas estaticas
	//---------------------institucion--------------------------//
	public function insert_institucion($nombre,$sigla,$ruc,$razon,$direccion,$telefono,$representante){
		$sql="insert into institucion values(null,'$nombre','$sigla','$ruc','$razon','$direccion','$telefono','$representante',1)";
		//echo $sql;exit();	
		$query=mysql_query($sql,Conexion::conectar());
		return $query;	
	}
	public function update_institucion($nombre,$sigla,$ruc,$razon,$direccion,$telefono,$representante,$id){
		$sql="update institucion set nombre='$nombre',sigla='$sigla',ruc='$ruc',razon_social='$razon',direccion='$direccion',telefono='$telefono',representante='$representante' where id_institucion=$id";
		//echo $sql;exit();
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function delete_institucion($id){
		$sql="update table institucion set estado=0 where id_institucion=$id";
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function listar_institucion(){
		$sql="select * from institucion where estado=1";
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	//---------------------------------------------------------------------//
	//---------------------facultades--------------------------------//
	public function insert_facultad($nombre,$sigla,$codigo,$id_insti){
		$sql="insert into facultades values(null,'$nombre','$sigla','$codigo', $id_insti ,1)";
		//echo $sql;exit();
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function update_facultad($nombre,$sigla,$codigo,$id_insti,$id_facu){
		$sql="update facultades set nombre='$nombre',sigla='$sigla',codigo='$codigo',id_institucion=$id_insti where id_facultad=$id_facu";
		//echo $sql;exit();
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function delete_facultad($id_facu){
		$sql="update facultades set estado=0 where id_facultad=$id_facu";
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function listar_facultad(){
		$sql="select t1.id_facultad,t1.id_institucion,t1.nombre,t1.sigla,t1.codigo,t2.sigla as institucion from facultades t1, institucion".
		" t2 where t2.id_institucion=t1.id_institucion and t1.estado=1";
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	//-----------------------------------------------------------//
	//--------------------------carreras---------------------------------//
		public function insert_carrera($nombre,$sigla,$codigo,$id_facu){
		$sql="insert into carreras values(null,'$nombre','$sigla','$codigo', $id_facu ,1)";
		//echo $sql;exit();
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function update_carrera($nombre,$sigla,$codigo,$id_facu,$id_carrera){
		$sql="update carreras set nombre='$nombre',sigla='$sigla',codigo='$codigo',id_facultad=$id_facu where id_carrera=$id_carrera";
		//echo $sql;exit();
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function delete_carrera($id_carrera){
		$sql="update carreras set estado=0 where id_carrera=$id_carrera";
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function listar_carrera(){
		$sql="select t1.id_carrera,t1.id_facultad,t1.nombre,t1.sigla,t1.codigo,t2.sigla as facultad from carreras t1, facultades".
		" t2 where t2.id_facultad=t1.id_facultad and t1.estado=1";
		//echo $sql;exit();
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	//----------------------------------------------------------------------------//
	//--------------------------cursos---------------------------------//
		public function insert_curso($nombre,$codigo,$id_carrera){
		$sql="insert into cursos values(null,'$nombre','$codigo',$id_carrera ,1)";
		//echo $sql;exit();
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function update_curso($nombre,$codigo,$id_carrera,$id_curso){
		$sql="update cursos set nombre='$nombre',codigo='$codigo',id_carrera=$id_carrera where id_curso=$id_curso";
		//echo $sql;exit();
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function delete_curso($id_curso){
		$sql="update cursos set estado=0 where id_curso=$id_curso";
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function listar_curso(){
		$sql="select t1.id_curso,t1.id_carrera,t1.nombre,t1.codigo,t2.nombre as carrera from cursos t1, carreras".
		" t2 where t2.id_carrera=t1.id_carrera and t1.estado=1 order by t1.id_curso desc";
		//echo $sql;exit();
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function listar_curso_id($id_curso){
		$sql="select t1.id_curso,t1.id_carrera,t1.nombre,t1.codigo,t2.nombre as carrera from cursos t1, carreras".
		" t2 where t1.id_curso=$id_curso and t2.id_carrera=t1.id_carrera and t1.estado=1 order by t1.id_curso desc";
	}
	//----------------------------------------------------------------------------//
	//--------------------------aulas---------------------------------//
		public function insert_aula($nombre,$codigo,$ubicacion){
		$sql="insert into aulas values(null,'$nombre','$codigo','$ubicacion',1)";
		//echo $sql;exit();
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function update_aula($nombre,$codigo,$ubicacion,$id_aula){
		$sql="update aulas set nombre='$nombre',codigo='$codigo',ubicacion='$ubicacion' where id_aula=$id_aula";
		//echo $sql;exit();
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function delete_aula($id_aula){
		$sql="update aulas set estado=0 where id_aula=$id_aula";
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function listar_aula(){
		$sql="select t1.id_aula,t1.nombre,t1.codigo,t1.ubicacion from aulas t1".
		" where t1.estado=1";
		//echo $sql;exit();
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	//----------------------------------------------------------------------------//
	//--------------------------curricula---------------------------------//
		public function insert_curricula($codigo,$anio,$descripcion){
		$sql="insert into curriculas values(null,'$codigo','$anio','$descripcion',1)";
		//echo $sql;exit();
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function update_curricula($codigo,$anio,$descripcion,$id_curricula){
		$sql="update curriculas set codigo='$codigo',anio='$anio',descripcion='$descripcion' where id_curricula=$id_curricula";
		//echo $sql;exit();
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function delete_curricula($id_curricula){
		$sql="update curriculas set estado=0 where id_curricula=$id_curricula";
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function listar_curricula(){
		$sql="select t1.id_curricula,t1.codigo,t1.anio,t1.descripcion from curriculas t1".
		" where t1.estado=1";
		//echo $sql;exit();
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	//----------------------------------------------------------------------------//
	//--------------------------curricula-Cursos--------------------------------//
		public function insert_curricula_cursos($id_curricula,$id_curso,$tipo,$credito,$requisito,$ciclo,$hora_teoria,$hora_practica){
		$sql="insert into curricula_cursos values(null,$id_curricula,$id_curso,'$tipo',$credito,'$requisito',$ciclo,$hora_teoria,$hora_practica,1)";
		//echo $sql;exit();
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function update_curricula_cursos($tipo,$credito,$requisito,$ciclo,$hora_teoria,$hora_practica,$id_curricula_curso){
		$sql="update curricula_cursos set tipo='$tipo',credito=$credito,requisito='$requisito',ciclo=$ciclo,hora_teoria=$hora_teoria,hora_practica=$hora_practica".
		" where id_curricula_curso=$id_curricula_curso";
		//echo $sql;exit();
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function delete_curricula_cursos($id_curricula_curso){
		$sql="update curricula_cursos set estado=0 where id_curricula_curso=$id_curricula_curso";
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function listar_curricula_cursos($id_curricula){
		$sql="select t1.id_curricula_curso,t1.id_curricula,t1.id_curso,t2.nombre as curso,t1.tipo,t1.credito,t1.requisito,t1.ciclo,t1.hora_teoria,t1.hora_practica".
		" ,t3.codigo as curricula ".
		" from curricula_cursos t1,cursos t2,curriculas t3 where t2.id_curso=t1.id_curso and t3.id_curricula=t1.id_curricula and t1.estado=1 and ".
		" t2.estado=1 and t1.id_curricula=$id_curricula order by t1.id_curricula_curso desc";
		//echo $sql;exit();
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
				//-----------mostrar cursos para agregar a curricula-----------//
		public function verificar_curso_en_curricula($id_curso,$id_curricula){
			$sql="select * from curricula_cursos where id_curso=$id_curso and id_curricula=$id_curricula";
			//echo $sql,exit();
			$query=mysql_query($sql,Conexion::conectar());
			return $query;
		}
	//----------------------------------------------------------------------------//
	//-----------------------tipo persona-----------------------//
	public function insert_tipo_persona($tipo){
		$sql="insert into tipo_personas values(null,'$tipo',1)";
		//echo $sql;exit();
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function update_tipo_persona($tipo,$id_tipo){
		$sql="update tipo_personas set tipo='$tipo' where id_tipo_persona=$id_tipo";
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function delete_tipo_persona($id_tipo){
		$sql="update tipo_personas set estado=0 where id_tipo_persona=$id_tipo";
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function listar_tipo_persona(){
		$sql="select id_tipo_persona,tipo from tipo_personas where estado=1 order by id_tipo_persona desc";
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
		public function get_id_tipo_persona($name){
			$sql="select id_tipo_persona from tipo_personas where tipo='$name'";
			//echo $sql;exit();
			$query=mysql_query($sql,Conexion::conectar());
			return $query;
		}
	//--------------------------------------------------------------------//
	//----------------personas-alumnos-docentes-administrativos--------------//
	public function insert_persona($nombre,$paterno,$materno,$tipo_documento,$numero_docu,$direccion,$telefono,$correo,$sexo,$fecha_nacimiento,$id_tipo_persona){
		$sql="insert into personas values(null,'$nombre','$paterno','$materno','$tipo_documento','$numero_docu','$direccion','$telefono','$correo','$sexo','$fecha_nacimiento',$id_tipo_persona,1)";
		//echo $sql;exit();
		$query=mysql_query($sql,Conexion::conectar());
		$last_id=mysql_insert_id();
		return $last_id;		
	}
	public function insert_docente_start($id_persona,$id_carrera,$profesion,$anio_inicio,$grado){
		$sql="insert into docentes values(null,$id_persona,$id_carrera,'$profesion','$anio_inicio','$grado',60000,1)";
		//echo $sql;exit();
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
		public function get_codigo_docente(){
			$sql="select max((codigo) + 1) as codigo_docente from docentes";
			$query=mysql_query($sql,Conexion::conectar());
			return $query;
		}
	public function insert_docente($id_persona,$id_carrera,$profesion,$anio_inicio,$grado,$codigo){
		$sql="insert into docentes values(null,$id_persona,$id_carrera,'$profesion','$anio_inicio','$grado',$codigo,1)";
		//echo $sql;exit();
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function insert_alumnos_start($id_persona,$id_carrera,$anio_ingreso,$semestre_ingreso,$tipo_ingreso,$id_insti_proce){
		$sql="insert into alumnos values(null,$id_persona,$id_carrera,'$anio_ingreso','$semestre_ingreso','$tipo_ingreso',20000,$id_insti_proce,1)";
		//echo $sql;exit();
		$query=mysql_query($sql,Conexion::conectar());
		return $query;		
	}
		public function get_codigo_alumno(){
			$sql="select max((codigo) + 1) as codigo_alumno from alumnos";
			$query=mysql_query($sql,Conexion::conectar());
			return $query;
		}
	public function insert_alumnos($id_persona,$id_carrera,$anio_ingreso,$semestre_ingreso,$tipo_ingreso,$codigo,$id_insti_proce){
		$sql="insert into alumnos values(null,$id_persona,$id_persona,'$anio_ingreso','$semestre_ingreso','$tipo_ingreso',$codigo,$id_insti_proce,1)";
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function insert_institucion_procedencia($entidad,$nombre,$tipo){
		$sql="insert into institu_procedencias values(null,'$entidad','$nombre','$tipo')";
		//echo $sql;exit();
		$query=mysql_query($sql,Conexion::conectar());
		$last_id=mysql_insert_id();
		return $last_id;
	}
			//-----------usuario y password--------------//
		public function insert_usuario_password($usuario,$password,$id_persona){
			$sql="insert into usuarios values(null,'$usuario','$password',$id_persona,1)";
			$query=mysql_query($sql,Conexion::conectar());
			return $query;
		}
	public function listar_docente(){
		$sql="select t2.nombre,t2.apaterno,t2.amaterno,t3.nombre as carrera,t1.anio_inicio,t1.grado,t1.codigo ".
		" from docentes t1,personas t2,carreras t3 where t1.id_persona=t2.id_persona and t1.id_carrera=t3.id_carrera ";
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	public function listar_alumno(){
		$sql="select t2.nombre,t2.apaterno,t2.apaterno,t3.nombre as carrera,t1.anio_ingreso,t1.semestre_ingreso,t1.tipo_ingreso,t1.codigo ".
		" from alumnos t1,personas t2,carreras t3 where t1.id_persona=t2.id_persona and t1.id_carrera=t3.id_carrera";
		$query=mysql_query($sql,Conexion::conectar());
		return $query;
	}
	//------------------------------------------------------------------------------------//
}
?>