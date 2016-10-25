<?php
include("../seguridad.php");
	require_once('../logica/configuracion_ln.php');
	$conln=new Configuracion_ln();
	//$reg=$conln->listar_tipo_persona();
	//print_r($reg);exit();

	if(isset($_POST["grabar"]) and $_POST["tipo_persona"]=="ALUMNO"){
		//print_r($_POST);exit();
		$conln=new Configuracion_ln();
		$res=$conln->insert_persona_alumno($_POST["nombre"],$_POST["apaterno"],$_POST["amaterno"],$_POST["documento"],$_POST["numero"],$_POST["direccion"],$_POST["telefono"],$_POST["correo"],$_POST["sexo"],$_POST["fnacimiento"],$_POST["tipo_persona"],$_POST["alumno_de"],$_POST["anio_ingreso"],$_POST["semestre_ingreso"],$_POST["tipo_ingreso"],$_POST["entidad"],$_POST["tipo_entidad"],$_POST["nombre_entidad"]);		
	}
	if(isset($_POST["grabar"]) and $_POST["tipo_persona"]=="DOCENTE"){
		//print_r($_POST);exit();
		$conln=new Configuracion_ln();
		$res=$conln->insert_persona_docente($_POST["nombre"],$_POST["apaterno"],$_POST["amaterno"],$_POST["documento"],$_POST["numero"],$_POST["direccion"],$_POST["telefono"],$_POST["correo"],$_POST["sexo"],$_POST["fnacimiento"],$_POST["tipo_persona"],$_POST["profesion"],$_POST["grado"],$_POST["docente_de"],$_POST["anio_contrato"]);		
	}
	if(isset($_POST["grabar"]) and $_POST["tipo_persona"]!="DOCENTE" and $_POST["tipo_persona"]!="ALUMNO"){
		//print_r($_POST);exit();
		$conln=new Configuracion_ln();
		$res=$conln->insert_persona($_POST["nombre"],$_POST["apaterno"],$_POST["amaterno"],$_POST["documento"],$_POST["numero"],$_POST["direccion"],$_POST["telefono"],$_POST["correo"],$_POST["sexo"],$_POST["fnacimiento"],$_POST["tipo_persona"]);		
		header("Location:personas.php?m=1");
	}

	if(isset($_POST["actualizar"])){
		//print_r($_POST);exit();
		$confi=new Configuracion_ln();
		$confi->update_tipo_persona($_POST["tipo"],$_POST["id_tipo_persona"]);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<script type="text/javascript" src="../js/jquery.1.11.2.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/funciones.js"></script>
</head>
<body>
	<div class="container-fluid">
		
		<?php include ('../menu_head.php');?>
			
			<!--menu bar-->	

			<div class="contenido">
				<div class="col-md-2">	
					<div class="sidebar">
						<ul class="nav nav-pills nav-stacked">
							<li><a href="configuracion.php" data-toggle="tooltip" data-placement="right" title="Institución">Institución</a></li>
							<li><a href="facultades.php" data-toggle="tooltip" data-placement="right" title="Facultades">Facultades</a></li>
							<li><a href="carreras.php" data-toggle="tooltip" data-placement="right" title="Carreras">Carreras</a></li>
							<li><a href="cursos.php" data-toggle="tooltip" data-placement="right" title="Cursos">Cursos</a></li>
							<li><a href="aulas.php" data-toggle="tooltip" data-placement="right" title="Aulas">Aulas</a></li>
							<li><a href="curriculas.php" data-toggle="tooltip" data-placement="right" title="Currículas">Curriculas</a></li>
							
							<hr>
							<li><a href="tipo_persona.php">Config. Personas</a></li>
							<li  class="active"><a href="personas.php">Personas</a></li>
						</ul>
					</div>
				</div>	

				<div class="col-md-10">
					<div class="side">
					<!--mensajes de alertas-->
						<?php 
							if(isset($_GET["m"]) and $_GET["m"]==1){
								?>
								<div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  								<strong>Bien!</strong> Datos registrados exitosamente.
								</div>
								<?php 
							}
							if(isset($_GET["m"]) and $_GET["m"]==2){
								?>
								<div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  								<strong>Bien!</strong> Datos actualizados exitosamente.
								</div>	
								<?php 
							}
						?>


						<h1 class="titulo">PERSONAS</h1>

					<form action="" method="post" class="form-horizontal">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Nombre</label>
							<div class="col-sm-8">
								<input type="text" name="nombre" placeholder="nombre" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Apellido P</label>
							<div class="col-sm-8">
								<input type="text" name="apaterno" placeholder="apellido paterno" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Apellido M</label>
							<div class="col-sm-8">
								<input type="text" name="amaterno" placeholder="apellido materno" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Tipo Documento</label>
							<div class="col-sm-3">
							<select name="documento" id="" class="form-control">
								<option value="DNI">DNI</option>
								<option value="D_EXTRANJERO">DOCUMENTO EXTRANJERO</option>
								<option value="OTRO">OTRO</option>
							</select>
							</div>
							<label for="" class="control-label col-sm-1">Numero</label>
							<div class="col-sm-4">
								<input type="number" name="numero" class="form-control" placeholder="numero de documento">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Dirección</label>
							<div class="col-sm-8">
								<textarea name="direccion" id="" cols="30" rows="3" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label col-sm-2">Teléfono</label>
							<div class="col-sm-4">
								<input type="text" name="telefono" class="form-control">
							</div>
							<label for="" class="control-label col-sm-1">Sexo</label>
							<div class="col-sm-3">
								<select name="sexo" id="" class="cols-sm-1 form-control">
									<option value="M">MASCULINO</option>
									<option value="F">FEMENINO</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label col-sm-2">Correo</label>
							<div class="col-sm-4">
								<input type="mail" name="correo" class="form-control">
							</div>
							<label for="" class="control-label col-sm-1">Fecha Nacimiento</label>
							<div class="col-sm-3">
								<input type="date" name="fnacimiento" class="form-control" placeholder="dd-mm-aaaa">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label col-sm-2">Tipo de Persona</label>
							<div class="col-sm-4">
							<select name="tipo_persona" id="esto" class="form-control" onChange="tipo_personas(this.value)">
								<?php $conln=new Configuracion_ln(); $res=$conln->listar_tipo_persona();
									for($i=0;$i<sizeof($res);$i++){
										?>
									<option value="<?php echo $res[$i]["tipo"]?>" id="valor"><?php echo $res[$i]["tipo"]?></option>
										<?php
									}
								?>
							</select>
							</div>
						</div>
							<!--div oculto - input de docentes -->
							<div id="docente" style="display:none">
								<div class="form-group">
									<label for="" class="control-label col-sm-2">Profesión</label>
									<div class="col-sm-6">
									<input type="text" name="profesion" class="form-control" placeholder="ingeniero,etc">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="control-label col-sm-2">Grado</label>
									<div class="col-sm-5">
									<input type="text" name="grado" class="form-control" placeholder="ejemplo:titulado..">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="control-label col-sm-2">Docente de</label>
									<div class="col-sm-5">
									<select name="docente_de" id="" class="form-control">
										<?php $conln=new Configuracion_ln();$res=$conln->listar_carrera();
											for($i=0;$i<sizeof($res);$i++){
												?>
											<option value="<?php echo $res[$i]["id_carrera"]?>"><?php echo $res[$i]["nombre"]?></option>
												<?php
											}
										?>
									</select>
									</div>
								</div>
								<div class="form-group">
									<label for="" class="control-label col-sm-2">Año contrato</label>
									<div class="col-sm-4">
									<input type="date" name="anio_contrato" class="form-control" placeholder="dd-mm-aaaa">
									</div>
								</div>
							</div>

							<!--div oculto - input de alumnos -->
							<div id="alumno" style="display:none">
								<div class="form-group">
									<label for="" class="control-label col-sm-2">Alumno de</label>
									<div class="col-sm-8">
									<select name="alumno_de" id="" class="form-control">
										<?php $conln=new Configuracion_ln();$res=$conln->listar_carrera();
											for($i=0;$i<sizeof($res);$i++){
												?>
											<option value="<?php echo $res[$i]["id_carrera"]?>"><?php echo $res[$i]["nombre"]?></option>
												<?php
											}
										?>
									</select>
									</div>
								</div>
								<div class="form-group">
									<label for="" class="control-label col-sm-2">Año ingreso</label>
									<div class="col-sm-2">
									<input type="number" name="anio_ingreso" class="form-control" placeholder="2017">
									</div>
									<label for="" class="control-label col-sm-2">Semestre</label>
									<div class="col-sm-2">
										<select name="semestre_ingreso" id="" class="form-control">
											<option value="1">1</option>
											<option value="2">2</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="" class="control-label col-sm-2">Tipo Ingreso</label>
									<div class="col-sm-8">
									<select name="tipo_ingreso" id="" class="form-control">
										<option value="PRE">PRE-UNIVERSIDAD</option>
										<option value="ORDINARIO">EXAMEN ORDINARIO</option>
										<option value="EXTRA-ORDINARIO">EXAMEN EXTRA-ORDINARIO</option>
									</select>
									</div>
								</div>
								
								<div class="form-group">
									<label for="" class="control-label col-sm-2">Entidad de Procedencia</label>
									<div class="col-sm-2">
									<select name="entidad" id="" class="form-control">
										<option value="COLEGIO">COLEGIO</option>
										<option value="UNIVERSIDAD">UNIVERSIDAD</option>
										<option value="OTRO">OTRO</option>
									</select>
									</div>
									<label for="" class="control-label col-sm-2">Tipo de entidad</label>
									<div class="col-sm-2">
										<select name="tipo_entidad" id="" class="form-control">
											<option value="NACIONAL">NACIONAL</option>
											<option value="PRIVADA">PRIVADA</option>
											<option value="PARROQUIAL">PARROQUIAL</option>
										</select>
									</div>
									
									
								</div>
								<div class="form-group">
									<label for="" class="control-label col-sm-2">Nombre</label>
									<div class="col-sm-6">
										<input type="text" name="nombre_entidad" class="form-control" placeholder="nombre de la entidad">
									</div>
								</div>
							</div>
							
						<br>
						<div class="form-group">
							<div class="col-sm-2 col-md-offset-2">
								<input type="submit" name="grabar" value="GUARDAR" class="btn btn-primary">
							</div>
						</div>
					</form>


						<?php $total=count($reg);

						if($total>0){?>
						<table class="table table-bordered table-condensed">
							<thead>
								<th>Tipo de Personas</th><th>A</th><th>E</th>
							</thead>
							<tbody>
								<?php
									for($i=0;$i<sizeof($reg);$i++){
										?>
									<tr>
										<td><?php echo $reg[$i]['tipo']?></td>
										<td><a href="#myModal<?php echo $i?>" data-toggle="modal"><img src="img/lapiz.png" alt="lapiz" data-toggle="tooltip" data-placement="left" title="Actualizar"></a></td>
										<td><a href=""><img src="img/papelera.png" alt="papelera" data-toggle="tooltip" data-placement="right" title="Eliminar"></a></td>
									</tr>

									<!--modal de actualizar-->
									<div class="modal fade" id="myModal<?php echo $i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										        <h4 class="modal-title" id="myModalLabel">ACTUALIZAR TIPO PERSONA</h4>
										      </div>
										      <div class="modal-body modal-cuerpo">
										     <form action="" method="post" class="form-horizontal">
										  			<div class="form-group">
										  				<label for="" class="col-md-2">Tipo</label>
														<div class="col-md-10">
										  				<input type="text" class="form-control" value="<?php echo $reg[$i]["tipo"]?>" id="tipo" name="tipo" autofocus required >
										  				</div>
										  			</div><br><br>
										  											  												  		
										      </div>
										      <div class="modal-footer">
										      	<input type="hidden" name="id_tipo_persona" value="<?php echo $reg[$i]["id_tipo_persona"];?>">
										      	
										        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
										        <button type="submit" name="actualizar" class="btn btn-primary">GUARDAR CAMBIOS</button>
										      </div>
										      </form>	
										    </div>
										  </div>
										</div>
								</div>
									
										<?php
									}
								?>
							</tbody>
						</table>
						<?php }else{echo "<p>Sin registro, por favor agregue Tipo de Personas</p>";}?>
						<input type="button" name="agregar" value="AGREGAR TIPO PERSONA" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
						
						<!--autofocus modal agregar nuevo institucion-->
							<script>
								$(document).on('shown.bs.modal', '.modal', function() {
  								$(this).find('[autofocus]').focus();
								});
							</script>
						<!--modal agregar facultad-->
							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										        <h4 class="modal-title" id="myModalLabel">Agregar Tipo Persona</h4>
										      </div>
										      <div class="modal-body modal-cuerpo">
										     <form action="" method="post" class="form-horizontal">
										  			<div class="form-group">
										  				<label for="" class="col-md-2">Tipo</label>
														<div class="col-md-10">
										  				<input type="text" class="form-control" id="nombre" name="tipo" autofocus required >
										  				</div>
										  			</div><br>
										  									  												  		
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
										        <button type="submit" name="guardar" class="btn btn-primary">AGREGAR</button>
										      </div>
										      </form>	
										    </div>
										  </div>
										</div>
								</div>

					</div>
				</div>
			</div>
		
	</div>
</body>
</html>