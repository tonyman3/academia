<?php
require_once('../datos/configuracion_ad.php');
class Configuracion_ln{
	private $_institucion;
	private $_facultad;
	private $_carrera;
	private $_curso;
	private $_aula;
	private $_curricula;
	private $_curricula_curso;
	private $_curso_add;
	private $_tipo_persona;

	public function __construct(){
		$this->_institucion=array();
		$this->_facultad=array();
		$this->_carrera=array();
		$this->_curso=array();
		$this->_aula=array();
		$this->_curricula=array();
		$this->_curricula_curso=array();
		$this->_curso_add=array();
		$this->_tipo_persona=array();
	}
	//---------------Institucion------------------//
	public function insert_institucion($nombre,$sigla,$ruc,$razon,$direccion,$telefono,$representante){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->insert_institucion($nombre,$sigla,$ruc,$razon,$direccion,$telefono,$representante);
		header("Location:configuracion.php?m=1");
	}
	public function update_institucion($nombre,$sigla,$ruc,$razon,$direccion,$telefono,$representante,$id){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->update_institucion($nombre,$sigla,$ruc,$razon,$direccion,$telefono,$representante,$id);
		header("Location:configuracion.php?m=2");
	}
	public function delete_institucion($id){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->delete_institucion($id);
		header("Location:configuracion.php?m=3");
	}
	public function listar_institucion(){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->listar_institucion();
		while($reg=mysql_fetch_assoc($res)){
			$this->_institucion[]=$reg;
		}
		return $this->_institucion;
	}
	//--------------------------------------------------------_//
	//---------------------------faculatades------------------------------//
	public function insert_facultad($nombre,$sigla,$codigo,$id_insti){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->insert_facultad($nombre,$sigla,$codigo,$id_insti);
		header("Location:facultades.php?m=1");
	}
	public function update_facultad($nombre,$sigla,$codigo,$id_insti,$id_facu){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->update_facultad($nombre,$sigla,$codigo,$id_insti,$id_facu);
		header("Location:facultades.php?m=2");
	}
	public function delete_facultad($id_facu){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->delete_facultad($id_facu);
		header("Location:facultades.php?m=3");
	}
	public function listar_facultad(){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->listar_facultad();
		while($reg=mysql_fetch_assoc($res)){
			$this->_facultad[]=$reg;
		}
		return $this->_facultad;
	}
	//-----------------------------------------------------------------_//
	//---------------------------carreras------------------------------//
	public function insert_carrera($nombre,$sigla,$codigo,$id_facu){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->insert_carrera($nombre,$sigla,$codigo,$id_facu);
		header("Location:carreras.php?m=1");
	}
	public function update_carrera($nombre,$sigla,$codigo,$id_facu,$id_carrera){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->update_carrera($nombre,$sigla,$codigo,$id_facu,$id_carrera);
		header("Location:carreras.php?m=2");
	}
	public function delete_carrera($id_carrera){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->delete_carrera($id_carrera);
		header("Location:carreras.php?m=3");
	}
	public function listar_carrera(){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->listar_carrera();
		while($reg=mysql_fetch_assoc($res)){
			$this->_carrera[]=$reg;
		}
		return $this->_carrera;
	}
	//-----------------------------------------------------------------_//
	//---------------------------cursos------------------------------//
	public function insert_curso($nombre,$codigo,$id_carrera){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->insert_curso($nombre,$codigo,$id_carrera);
		header("Location:cursos.php?m=1");
	}
	public function update_curso($nombre,$codigo,$id_carrera,$id_curso){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->update_curso($nombre,$codigo,$id_carrera,$id_curso);
		header("Location:cursos.php?m=2");
	}
	public function delete_curso($id_curso){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->delete_curso($id_curso);
		header("Location:cursos.php?m=3");
	}
	public function listar_curso(){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->listar_curso();
		while($reg=mysql_fetch_assoc($res)){
			$this->_curso[]=$reg;
		}
		return $this->_curso;
	}
	//-----------------------------------------------------------------_//
	//---------------------------aulas------------------------------//
	public function insert_aula($nombre,$codigo,$ubicacion){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->insert_aula($nombre,$codigo,$ubicacion);
		header("Location:aulas.php?m=1");
	}
	public function update_aula($nombre,$codigo,$ubicacion,$id_aula){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->update_aula($nombre,$codigo,$ubicacion,$id_aula);
		header("Location:aulas.php?m=2");
	}
	public function delete_aula($id_aula){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->delete_aula($id_aula);
		header("Location:aulas.php?m=3");
	}
	public function listar_aula(){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->listar_aula();
		while($reg=mysql_fetch_assoc($res)){
			$this->_aula[]=$reg;
		}
		return $this->_aula;
	}
	//-----------------------------------------------------------------_//
	//---------------------------curriculas------------------------------//
	public function insert_curricula($codigo,$anio,$descripcion){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->insert_curricula($codigo,$anio,$descripcion);
		header("Location:curriculas.php?m=1");
	}
	public function update_curricula($codigo,$anio,$descripcion,$id_curricula){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->update_curricula($codigo,$anio,$descripcion,$id_curricula);
		header("Location:curriculas.php?m=2");
	}
	public function delete_curricula($id_curricula){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->delete_curricula($$id_curricula);
		header("Location:curriculas.php?m=3");
	}
	public function listar_curricula(){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->listar_curricula();
		while($reg=mysql_fetch_assoc($res)){
			$this->_curricula[]=$reg;
		}
		return $this->_curricula;
	}
	//-----------------------------------------------------------------_//
	//---------------------------curriculas-cursos-----------------------//
	public function insert_curricula_cursos($id_curricula,$id_curso,$tipo,$credito,$requisito,$ciclo,$hora_teoria,$hora_practica,$curri_cod,$curri_anio){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->insert_curricula_cursos($id_curricula,$id_curso,$tipo,$credito,$requisito,$ciclo,$hora_teoria,$hora_practica);
		header("Location:curricula_cursos.php?m=1&curricula_cod=$curri_cod&curricula_anio=$curri_anio&curricula_id=$id_curricula");
	}
	public function update_curricula_cursos($tipo,$credito,$requisito,$ciclo,$hora_teoria,$hora_practica,$id_curricula_curso,$curri_cod,$curri_anio,$id_curricula){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->update_curricula_cursos($tipo,$credito,$requisito,$ciclo,$hora_teoria,$hora_practica,$id_curricula_curso);
		header("Location:curricula_cursos.php?m=2&curricula_cod=$curri_cod&curricula_anio=$curri_anio&curricula_id=$id_curricula");
	}
	public function delete_curricula_cursos($id_curricula){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->delete_curricula_cursos($id_curricula);
		header("Location:curricula_cursos.php?m=3");
	}
	public function listar_curricula_cursos($id_curricula){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->listar_curricula_cursos($id_curricula);
		while($reg=mysql_fetch_assoc($res)){
			$this->_curricula_curso[]=$reg;
		}
		return $this->_curricula_curso;
	}
			//---------------mostrar curso que falta en curricula------------------//
			public function listar_curso_falta_curricula($id_curricula){
				$confi_ad=new Configuracion_ad();
				$ln=new Configuracion_ln();
				$regis=$ln->listar_curso();
				//print_r($regis);exit();
				for($i=0;$i<sizeof($regis);$i++){
					$con=new Configuracion_ad();
					$ver=$con->verificar_curso_en_curricula($regis[$i]["id_curso"],$id_curricula);
					if(mysql_num_rows($ver)==0){
						$this->_curso_add[]=$regis[$i];
					}
				}
				return $this->_curso_add;
			}
	//-----------------------------------------------------------------_//
	//---------------------------tipo personas----------------------------//
	public function insert_tipo_persona($tipo){
		$confi_ad=new Configuracion_ad();
		$confi_ad->insert_tipo_persona($tipo);
		header("Location:tipo_persona.php?m=1");
	}
	public function update_tipo_persona($tipo,$id_tipo){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->update_tipo_persona($tipo,$id_tipo);
		header("Location:tipo_persona.php?m=2");
	}
	public function delete_tipo_persona($id_tipo){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->delete_tipo_persona($id_tipo);
		header("Location:tipo_persona.php?m=3");
	}
	public function listar_tipo_persona(){
		$confi_ad=new Configuracion_ad();
		$res=$confi_ad->listar_tipo_persona();
		while ($reg=mysql_fetch_assoc($res)) {
			$this->_tipo_persona[]=$reg;
		}
		return $this->_tipo_persona;
	}
	//-----------------------------------------------------------------------//
	//---------------------personas-alumnos-docentes-administrativos--------------------//
	public function insert_persona($nombre,$paterno,$materno,$tipo_documento,$numero_docu,$direccion,$telefono,$correo,$sexo,$fecha_nacimiento,$tipo_persona){
		$confi_ad=new Configuracion_ad();
		$registro=$confi_ad->get_id_tipo_persona($tipo_persona);
		$registro=mysql_fetch_assoc($registro);$id_tipo_persona=$registro["id_tipo_persona"];
		//print_r($id_tipo_persona);exit();
		$id_perso=$confi_ad->insert_persona($nombre,$paterno,$materno,$tipo_documento,$numero_docu,$direccion,$telefono,$correo,$sexo,Configuracion_ln::convert_date($fecha_nacimiento),$id_tipo_persona);
			//crear usuario--y-paswword---
			$usuario=substr($nombre, 0,1)."".$paterno;
			$pasminuscula=strtolower($materno);$pass=md5($pasminuscula);
			$inser_usu=$confi_ad->insert_usuario_password(strtolower($usuario),$pass,$id_perso);
		//header("Location:personas.php?m=1");
			return $id_perso;
	}
	public function insert_persona_docente($nombre,$paterno,$materno,$tipo_documento,$numero_docu,$direccion,$telefono,$correo,$sexo,$fecha_nacimiento,$tipo_persona,$profesion,$grado,$id_carrera,$anio_contrato){
		$confi_ln=new Configuracion_ln();
		$id_persona=$confi_ln->insert_persona($nombre,$paterno,$materno,$tipo_documento,$numero_docu,$direccion,$telefono,$correo,$sexo,$fecha_nacimiento,$tipo_persona);
		//--verificar si existe algun docente
		$confi_ad=new Configuracion_ad();
		$listar_docente=$confi_ad->listar_docente();
		if(mysql_num_rows($listar_docente)==0){
			$confi_ad=new Configuracion_ad();
			$res=$confi_ad->insert_docente_start($id_persona,$id_carrera,$profesion,Configuracion_ln::convert_date($anio_contrato),$grado);
		}else{
			$confi_ad=new Configuracion_ad();
			$registro=$confi_ad->get_codigo_docente();$registro=mysql_fetch_assoc($registro);$codigo_doce=$registro["codigo_docente"];
			$res=$confi_ad->insert_docente($id_persona,$id_carrera,$profesion,Configuracion_ln::convert_date($anio_contrato),$grado,$codigo_doce);
		}
		header("Location:personas.php?m=1");
	}
	public function insert_persona_alumno($nombre,$paterno,$materno,$tipo_documento,$numero_docu,$direccion,$telefono,$correo,$sexo,$fecha_nacimiento,$tipo_persona,$id_carrera,$anio_ingreso,$semestre,$tipo_ingreso,$entidad,$tipo_entidad,$nombre_entidad){
		$confi_ln=new Configuracion_ln();
		$id_persona=$confi_ln->insert_persona($nombre,$paterno,$materno,$tipo_documento,$numero_docu,$direccion,$telefono,$correo,$sexo,$fecha_nacimiento,$tipo_persona);
		$confi_ad=new Configuracion_ad();
		//insert tipo-procedencia
		$id_institu_pro=$confi_ad->insert_institucion_procedencia($entidad,$nombre_entidad,$tipo_entidad);
		//--verificar si existe algun alumno
		$listar_alumno=$confi_ad->listar_alumno();
		if(mysql_num_rows($listar_alumno)==0){
			$confi_ad=new Configuracion_ad();
			$res=$confi_ad->insert_alumnos_start($id_persona,$id_carrera,$anio_ingreso,$semestre,$tipo_ingreso,$id_institu_pro);
		}else{
			$confi_ad=new Configuracion_ad();
			$registro=$confi_ad->get_codigo_alumno();$registro=mysql_fetch_assoc($registro);$codigo_alumno=$registro["codigo_alumno"];
			$res=$confi_ad->insert_alumnos($id_persona,$id_carrera,$anio_ingreso,$semestre,$tipo_ingreso,$codigo_alumno,$id_institu_pro);
		}
		header("Location:personas.php?m=1");
	}

	//-----------script date-datetime-formatear----------//
	public static function convert_date($date){
		$dia=substr($date, 0,2);
		$mes=substr($date, 3,2);
		$year=substr($date, 6);
		$newdate=$year.'-'.$mes.'-'.$dia;
		return $newdate;
	}
}
?>