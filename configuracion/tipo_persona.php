<?php
include("../seguridad.php");
	require_once('../logica/configuracion_ln.php');
	$conln=new Configuracion_ln();
	$reg=$conln->listar_tipo_persona();
	//print_r($reg);exit();

	if(isset($_POST["guardar"])){
		$confi=new Configuracion_ln();
		$reg=$confi->insert_tipo_persona($_POST['tipo']);
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
							<li  class="active"><a href="tipo_persona.php">Config. Personas</a></li>
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


						<h1 class="titulo">TIPOS DE PERSONAS</h1>
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
										<td><a href="#myModal<?php echo $i?>" data-toggle="modal"><img src="../img/lapiz.png" alt="lapiz" data-toggle="tooltip" data-placement="left" title="Actualizar"></a></td>
										<td><a href=""><img src="../img/papelera.png" alt="papelera" data-toggle="tooltip" data-placement="right" title="Eliminar"></a></td>
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