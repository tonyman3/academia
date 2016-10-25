<?php
include("../seguridad.php");
	require_once('../logica/configuracion_ln.php');
	$conln=new Configuracion_ln();
	$reg=$conln->listar_institucion();

	if(isset($_POST["actualizar"])){
		$con=new Configuracion_ln();
		$reg=$con->update_institucion($_POST["nombre"],$_POST["sigla"],$_POST["ruc"],$_POST["razon"],$_POST["direccion"],$_POST["telefono"],$_POST["representante"],$_POST["id_inst"]);
	}
	if(isset($_POST["guardar"])){
		$con=new Configuracion_ln();
		$reg=$con->insert_institucion($_POST["nombre"],$_POST["sigla"],$_POST["ruc"],$_POST["razon"],$_POST["direccion"],$_POST["telefono"],$_POST["representante"]);
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
							<li class="active"><a href="configuracion.php" data-toggle="tooltip" data-placement="right" title="Institución">Institución</a></li>
							<li><a href="facultades.php" data-toggle="tooltip" data-placement="right" title="Facultades">Facultades</a></li>
							<li><a href="carreras.php" data-toggle="tooltip" data-placement="right" title="Carreras">Carreras</a></li>
							<li><a href="cursos.php" data-toggle="tooltip" data-placement="right" title="Cursos">Cursos</a></li>
							<li><a href="aulas.php" data-toggle="tooltip" data-placement="right" title="Aulas">Aulas</a></li>
							<li><a href="curriculas.php" data-toggle="tooltip" data-placement="right" title="Currículas">Curriculas</a></li>
							
							<hr>
							<li><a href="tipo_persona.php">Config. Personas</a></li>
							<li><a href="personas.php">Personas</a></li>
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

						<h1 class="titulo">INSTITUCIÓN</h1>
						<?php
							
								//print_r($reg);exit();
								$tot=sizeof($reg);
								?>
									<table class="table table-bordered">
								<?php
								for($i=0;$i<$tot;$i++){
									?>
										<tr><td>Entidad:</td><td><?php echo $reg[$i]['nombre']?></td></tr>
										<tr><td>Sigla:</td><td><?php echo $reg[$i]['sigla']?></td></tr>
										<tr><td>RUC:</td><td><?php echo $reg[$i]['ruc']?></td></tr>
										<tr>
											<td>Razon Social:</td><td><?php echo $reg[$i]['razon_social']?></td>
										</tr>
										<tr><td>Dirección:</td><td><?php echo $reg[$i]['direccion']?></td></tr>
										<tr><td>Teléfono:</td><td><?php echo $reg[$i]['telefono']?></td></tr>
										<tr><td>Representante:</td><td><?php echo $reg[$i]['representante']?></td></tr>

										<!--Modal de actualizar-->
										<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										        <h4 class="modal-title" id="myModalLabel">Actualizar Datos</h4>
										      </div>
										      <div class="modal-body modal-cuerpo">
										     <form action="" method="post" class="form-horizontal">
										  			<div class="form-group">
										  				<label for="" class="col-md-2">Entidad</label>
														<div class="col-md-10">
										  				<input type="text" class="form-control" name="nombre" value="<?php echo $reg[$i]["nombre"]?>">
										  				</div>
										  			</div><br><br>
										  			<div class="form-group">
										  				<label for="" class="col-md-2">Sigla</label>
														<div class="col-md-10">
										  				<input type="text" class="form-control" name="sigla" value="<?php echo $reg[$i]["sigla"]?>">
										  				</div>
										  			</div><br><br>
										  			<div class="form-group">
											  			<label for="" class="col-md-2">RUC</label>
														<div class="col-md-10">
											  			<input type="text" class="form-control" name="ruc" value="<?php echo $reg[$i]["ruc"]?>">
											  			</div>
										  			</div><br><br>
										  			<div class="form-group">
											  			<label for="" class="col-md-2">Razón Social</label>
														<div class="col-md-10">
											  			<input type="text" class="form-control" name="razon" value="<?php echo $reg[$i]["razon_social"]?>">
											  			</div>
										  			</div><br><br>
										  			<div class="form-group">
											  			<label for="" class="col-md-2">Dirección</label>
														<div class="col-md-10">
											  			<input type="text" class="form-control" name="direccion" value="<?php echo $reg[$i]["direccion"]?>">
											  			</div>
										  			</div><br><br>
										  			<div class="form-group">
											  			<label for="" class="col-md-2">Teléfono</label>
														<div class="col-md-10">
											  			<input type="text" class="form-control" name="telefono" value="<?php echo $reg[$i]["telefono"]?>">
											  			</div>
										  			</div><br><br>
										  			<div class="form-group">
											  			<label for="" class="col-md-2">Represen.</label>
														<div class="col-md-10">
											  			<input type="text" class="form-control" name="representante" value="<?php echo $reg[$i]["representante"]?>">
											  			</div>
										  			</div><br>
										  												  		
										      </div>
										      <div class="modal-footer">
										      	<input type="hidden" name="id_inst" value="<?php echo $reg[$i]["id_institucion"]?>">
										        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
										        <button type="submit" name="actualizar" class="btn btn-primary">Guardar cambios</button>
										      </div>
										      </form>	
										    </div>
										  </div>
										</div>

									<?php
								}
							?>
							</table>
							<div id="botones">
								<?php if($tot>0){
									?>
									<input type="button" disabled class="btn btn-primary" name="nuevo" value="AGREGAR INSTITUCION">
									<?php
								}else{
									?>
									<input type="button" data-toggle="modal" data-target="#myModalNuevo" class="btn btn-primary" name="nuevo" value="Crear Nuevo">		
									<?php
								}?>
								
								<input type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" name="actualizar" value="Actualizar">
							</div>
							<!--autofocus modal agregar nuevo institucion-->
							<script>
								$(document).on('shown.bs.modal', '.modal', function() {
  								$(this).find('[autofocus]').focus();
								});
							</script>
							<div class="modal fade" id="myModalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										        <h4 class="modal-title" id="myModalLabel">Agregar Institución</h4>
										      </div>
										      <div class="modal-body modal-cuerpo">
										     <form action="" method="post" class="form-horizontal">
										  			<div class="form-group">
										  				<label for="" class="col-md-2">Entidad</label>
														<div class="col-md-10">
										  				<input type="text" class="form-control" id="nombre" name="nombre" autofocus required >
										  				</div>
										  			</div><br>
										  			<div class="form-group">
										  				<label for="" class="col-md-2">Sigla</label>
														<div class="col-md-10">
										  				<input type="text" class="form-control" id="nombre" name="sigla" autofocus required >
										  				</div>
										  			</div><br>
										  			<div class="form-group">
											  			<label for="" class="col-md-2">RUC</label>
														<div class="col-md-10">
											  			<input type="text" class="form-control" name="ruc" required>
											  			</div>
										  			</div><br>
										  			<div class="form-group">
											  			<label for="" class="col-md-2">Razón Social</label>
														<div class="col-md-10">
											  			<input type="text" class="form-control" name="razon" required>
											  			</div>
										  			</div><br>
										  			<div class="form-group">
											  			<label for="" class="col-md-2">Dirección</label>
														<div class="col-md-10">
											  			<input type="text" class="form-control" name="direccion" required>
											  			</div>
										  			</div><br>
										  			<div class="form-group">
											  			<label for="" class="col-md-2">Teléfono</label>
														<div class="col-md-10">
											  			<input type="text" class="form-control" name="telefono" required>
											  			</div>
										  			</div><br>
										  			<div class="form-group">
											  			<label for="" class="col-md-2">Represen.</label>
														<div class="col-md-10">
											  			<input type="text" class="form-control" name="representante" required>
											  			</div>
										  			</div>
										  		
										  		
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
										        <button type="submit" name="guardar" class="btn btn-primary">GUARDAR</button>
										      </div>
										      </form>	
										    </div>
										  </div>
										</div>
								</div>
				</div>
			</div>
		
	</div>
</body>
</html>