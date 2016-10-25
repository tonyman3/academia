<?php
include("../seguridad.php");
	require_once('../logica/configuracion_ln.php');
	$conln=new Configuracion_ln();
	$reg=$conln->listar_curricula();
	//print_r($reg);exit();

	if(isset($_POST["guardar"])){
		$confi=new Configuracion_ln();
		$reg=$confi->insert_curricula($_POST['codigo'],$_POST['anio'],$_POST['descripcion']);
	}
	if(isset($_POST["actualizar"])){
		//print_r($_POST);exit();
		$confi=new Configuracion_ln();
		$confi->update_curricula($_POST["codigo"],$_POST["anio"],$_POST["descripcion"],$_POST["id_curricula"]);
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
							<li ><a href="cursos.php" data-toggle="tooltip" data-placement="right" title="Cursos">Cursos</a></li>
							<li><a href="aulas.php" data-toggle="tooltip" data-placement="right" title="Aulas">Aulas</a></li>
							<li  class="active"><a href="curriculas.php" data-toggle="tooltip" data-placement="right" title="Currículas">Curriculas</a></li>
							
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


						<h1 class="titulo">CURRICULAS</h1>
						<?php $total=count($reg);

						if($total>0){?>
						<table class="table table-bordered table-condensed">
							<thead>
								<th>Descripcion</th><th>Año</th><th>Código</th><th>Cursos</th><th>A</th><th>E</th>
							</thead>
							<tbody>
								<?php
									for($i=0;$i<sizeof($reg);$i++){
										?>
									<tr>
										<td><?php echo $reg[$i]['descripcion']?></td>
										<td><?php echo $reg[$i]['anio']?></td>
										<td><?php echo $reg[$i]['codigo']?></td>
										<td><a href="curricula_cursos.php?curricula_cod=<?php echo $reg[$i]['codigo'];?>&curricula_anio=<?php echo $reg[$i]['anio']?>&curricula_id=<?php echo $reg[$i]['id_curricula']?>" data-toggle="tooltip" data-placement="top" title="Ver los cursos de esta curricula">ver cursos</a></td>
										<td><a href="#myModal<?php echo $i?>" data-toggle="modal"><img src="../img/lapiz.png" alt="lapiz" data-toggle="tooltip" data-placement="left" title="Actualizar"></a></td>
										<td><a href=""><img src="../img/papelera.png" alt="papelera" data-toggle="tooltip" data-placement="right" title="Eliminar"></a></td>
									</tr>

									<!--modal de actualizar-->
									<div class="modal fade" id="myModal<?php echo $i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										        <h4 class="modal-title" id="myModalLabel">ACTUALIZAR CURRICULA</h4>
										      </div>
										      <div class="modal-body modal-cuerpo">
										     <form action="" method="post" class="form-horizontal">
										  			<div class="form-group">
										  				<label for="" class="col-md-2">Descripcion</label>
														<div class="col-md-10">
										  				<textarea name="descripcion" class="form-control"><?php echo $reg[$i]["descripcion"]?></textarea>
										  				</div>
										  			</div><br><br><br>
										  			<div class="form-group">
											  			<label for="" class="col-md-2">Año</label>
														<div class="col-md-10">
											  			<input type="text" class="form-control" value="<?php echo $reg[$i]["anio"]?>" name="anio" required>
											  			</div>
										  			</div><br><br>
										  			<div class="form-group">
											  			<label for="" class="col-md-2">Código</label>
														<div class="col-md-10">
											  			<input type="text" class="form-control" value="<?php echo $reg[$i]["codigo"]?>" name="codigo" required>
											  			</div>
										  			</div><br><br>
					  							</div>
										      <div class="modal-footer">
										      	<input type="hidden" name="id_curricula" value="<?php echo $reg[$i]["id_curricula"];?>">
										      	
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
						<?php }else{echo "<p>Sin registro, por favor agregue curricula</p>";}?>
						<input type="button" name="agregar" value="AGREGAR CURRICULA" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
						
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
										        <h4 class="modal-title" id="myModalLabel">AGREGAR CURRICULA</h4>
										      </div>
										      <div class="modal-body modal-cuerpo">
										     <form action="" method="post" class="form-horizontal">
										  			<div class="form-group">
										  				<label for="" class="col-md-2">Descripcion</label>
										  				<div class="col-md-10">
														<textarea class="form-control" name="descripcion" placeholder="Agregue una descripcion resumida" autofocus></textarea>
														</div>
										  			</div><br>
										  			<div class="form-group">
										  				<label for="" class="col-md-2">Año</label>
														<div class="col-md-10">
										  				<input type="text" class="form-control" name="anio" required placeholder="ejem:1990">
										  				</div>
										  			</div><br>
										  			<div class="form-group">
										  				<label for="" class="col-md-2">Código</label>
														<div class="col-md-10">
										  				<input type="text" class="form-control" name="codigo" required >
										  				</div>
										  			</div>							  												  		
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