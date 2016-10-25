<?php
include("../seguridad.php");
	require_once('../logica/configuracion_ln.php');
	$conln=new Configuracion_ln();
	$reg=$conln->listar_curricula_cursos($_GET["curricula_id"]);
	//print_r($reg);exit();

	//listar curso disponible
	$conln2=new Configuracion_ln();
	$curso_dis=$conln2->listar_curso_falta_curricula($_GET["curricula_id"]);
	//print_r($curso_dis);exit();

	if(isset($_POST["agregar"])){
		//print_r($_POST);exit();
		$confi=new Configuracion_ln();
		$reg=$confi->insert_curricula_cursos($_POST["curricula_id"],$_POST["id_curso"],$_POST["tipo"],$_POST["credito"],$_POST["requisito"],$_POST["ciclo"],$_POST["h-teoria"],$_POST["h-practica"],$_POST["curricula_cod"],$_POST["curricula_anio"]);
	}
	if(isset($_POST["actualizar"])){
		//print_r($_POST);exit();
		$confi=new Configuracion_ln();
		$confi->update_curricula_cursos($_POST["tipo"],$_POST["credito"],$_POST["requisito"],$_POST["ciclo"],$_POST["h-teoria"],$_POST["h-practica"],$_POST["id_curricula_curso"],$_POST["curricula_cod"],$_POST["curricula_anio"],$_POST["curricula_id"]);
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

						<a href="curriculas.php" data-toggle="tooltip" data-placement="right" title="Regresar atrás">Regresar</a>
						<h1 class="titulo">CURSOS EN LA CURRICULA:&nbsp;<?php echo $_GET['curricula_cod'].'-'.$_GET['curricula_anio']?></h1>
						<?php $total=count($reg);

						if($total>0){?>
						<table class="table table-bordered table-condensed">
							<thead>
								<th>Currícula</th><th>Curso</th><th>Tipo</th><th>Créditos</th><th>Requisito</th><th>ciclo</th><th>Hrs-T</th><th>Hrs-P</th><th>A</th><th>E</th>
							</thead>
							<tbody>
								<?php
									for($i=0;$i<sizeof($reg);$i++){
										?>
									<tr>
										<td><?php echo $reg[$i]['curricula']?></td>
										<td><?php echo $reg[$i]['curso']?></td>
										<td><?php echo $reg[$i]['tipo']?></td>
										<td><?php echo $reg[$i]['credito']?></td>
										<td><?php echo $reg[$i]['requisito']?></td>
										<td><?php echo $reg[$i]['ciclo']?></td>
										<td><?php echo $reg[$i]['hora_teoria']?></td>
										<td><?php echo $reg[$i]['hora_practica']?></td>
										<td><a href="#ModalAc<?php echo $i?>" data-toggle="modal"><img src="../img/lapiz.png" alt="lapiz" data-toggle="tooltip" data-placement="right" title="Actualizar"></a></td>
										<td><a href=""><img src="../img/papelera.png" alt="papelera" data-toggle="tooltip" data-placement="right" title="Eliminar"></a></td>
									</tr>

									<!--modal de actualizar-->
									<div class="modal fade" id="ModalAc<?php echo $i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										        <h4 class="modal-title" id="myModalLabel">ACTUALIZAR LOS CURSOS EN LA CURRICULA</h4>
										      </div>
										      <div class="modal-body modal-cuerpo">
										     <form action="" method="post" class="form-horizontal">
												  			<div class="form-group">
												  				<label for="" class="col-md-2">Currícula</label>
												  				<div class="col-md-10">
																<input type="text" class="form-control" disabled value="<?php echo $_GET['curricula_cod']."-".$_GET['curricula_anio']?>">
																
																</div>
												  			</div><br><br>
												  			<div class="form-group">
												  				<label for="" class="col-md-2">Curso</label>
																<div class="col-md-10">
												  				<input type="text" class="form-control" value="<?php echo $reg[$i]["curso"]?>" disabled>
												  				</div>
												  			</div><br><br>
												  			<div class="form-group">
												  				<label for="" class="col-md-2">Tipo</label>
																<div class="col-md-10">
												  				<select name="tipo" id="" class="form-control">
												  					<?php $obli="OBLIGATORIO";$elec="ELECTIVO";
												  					if($reg[$i]["tipo"]==$obli){
												  						?><option value="<?php echo $reg[$i]["tipo"]?>" selected><?php echo $reg[$i]["tipo"]?></option>
												  						<option value="<?php echo $elec?>"><?php echo $elec?></option><?php
												  					}else{
												  						?>
																		<option value="<?php echo $elec?>" selected><?php echo $elec?></option>
																		<option value="<?php echo $obli?>"><?php echo $obli?></option>
												  						<?php
												  					}?>
												  				</select>
												  				</div>
												  			</div><br><br>
												  			<div class="form-group">
												  				<label for="" class="col-md-2">Créditos</label>
																<div class="col-md-10">
												  				<input type="number" name="credito" class="form-control" required value="<?php echo $reg[$i]["credito"]?>">
												  				</div>
												  			</div><br><br>
												  			<div class="form-group">
												  				<label for="" class="col-md-2">Requisito</label>
																<div class="col-md-10">
												  				<input type="text" name="requisito" class="form-control" placeholder="codigo del curso: MTM-10,MTN-21" value="<?php echo $reg[$i]["requisito"]?>">
												  				</div>
												  			</div><br><br>
												  			<div class="form-group">
												  				<label for="" class="col-md-2">Ciclo</label>
																<div class="col-md-10">
												  				<input type="number" name="ciclo" class="form-control" required placeholder="1" value="<?php echo $reg[$i]["ciclo"]?>">
												  				</div>
												  			</div><br><br>
												  			<div class="form-group">
												  				<label for="" class="col-md-2">Horas Teoría</label>
																<div class="col-md-10">
												  				<input type="number" name="h-teoria" class="form-control" required placeholder="1" value="<?php echo $reg[$i]["hora_teoria"]?>">
												  				</div>
												  			</div><br><br>
												  			<div class="form-group">
												  				<label for="" class="col-md-2">Horas Práctica</label>
																<div class="col-md-10">
												  				<input type="number" name="h-practica" class="form-control" required placeholder="1" value="<?php echo $reg[$i]["hora_practica"]?>">
												  				</div>
												  			</div><br><br>
												      </div>
												      <div class="modal-footer">
												      	<input type="hidden" name="id_curricula_curso" value="<?php echo $reg[$i]["id_curricula_curso"]?>">
												      	<input type="hidden" class="form-control" name="curricula_cod" value="<?php echo $_GET['curricula_cod']?>">
														<input type="hidden" class="form-control" name="curricula_anio" value="<?php echo $_GET['curricula_anio']?>">
														<input type="hidden" class="form-control" name="curricula_id" value="<?php echo $_GET['curricula_id']?>">
												        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
												        <button type="submit" name="actualizar" class="btn btn-primary">ACTUALIZAR</button>
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
						<?php }else{echo "<p style='color:#7F2222'>Aún no hay cursos en esta currícula, por favor agregue los cursos</p>";}?>
						<hr style="">
						<?php if(sizeof($curso_dis)>0){?>
						<p style="color:#008814">Cursos Disponibles.</p>
						<table class="table table-hover table-bordered table-condensed">
							<thead>
								<th>N.</th>
								<th>Curso</th>
								<th>Código</th>
								<th>Carrera</th>
								<th>Op</th>
							</thead>
							<tbody>
								<?php 
									for($i=0;$i<sizeof($curso_dis);$i++){
										?>
									<tr>
										<td><?php echo $i+1;?></td>
										<td><?php echo $curso_dis[$i]["nombre"]?></td>
										<td><?php echo $curso_dis[$i]["codigo"]?></td>
										<td><?php echo $curso_dis[$i]["carrera"];?></td>
										<td><a href="#" data-toggle="modal" data-target="#ModalAg<?php echo $i?>"><span data-toggle="tooltip" data-placement="left" title="Agregar este curso a currícula">Agregar</span></a></td>
									</tr>
										<!--modal agregar-->
									<div class="modal fade" id="ModalAg<?php echo $i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
												  <div class="modal-dialog" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												        <h4 class="modal-title" id="myModalLabel">AGREGAR CURSO A CURRICULA</h4>
												      </div>
												      <div class="modal-body modal-cuerpo">
												     <form action="" method="post" class="form-horizontal">
												  			<div class="form-group">
												  				<label for="" class="col-md-2">Currícula</label>
												  				<div class="col-md-10">
																<input type="text" class="form-control" disabled value="<?php echo $_GET['curricula_cod']."-".$_GET['curricula_anio']?>">
																<input type="hidden" class="form-control" name="curricula_cod" value="<?php echo $_GET['curricula_cod']?>">
																<input type="hidden" class="form-control" name="curricula_anio" value="<?php echo $_GET['curricula_anio']?>">
																<input type="hidden" class="form-control" name="curricula_id" value="<?php echo $_GET['curricula_id']?>">
																</div>
												  			</div><br><br>
												  			<div class="form-group">
												  				<label for="" class="col-md-2">Curso</label>
																<div class="col-md-10">
												  				<input type="text" class="form-control" value="<?php echo $curso_dis[$i]["nombre"]?>" disabled>
												  				<input type="hidden" class="form-control" name="id_curso" value="<?php echo $curso_dis[$i]["id_curso"]?>">
												  				</div>
												  			</div><br><br>
												  			<div class="form-group">
												  				<label for="" class="col-md-2">Tipo</label>
																<div class="col-md-10">
												  				<select name="tipo" id="" class="form-control">
												  					<option value="OBLIGATORIO">OBLIGATORIO</option>
												  					<option value="ELECTIVO">ELECTIVO</option>
												  				</select>
												  				</div>
												  			</div><br><br>
												  			<div class="form-group">
												  				<label for="" class="col-md-2">Créditos</label>
																<div class="col-md-10">
												  				<input type="number" name="credito" class="form-control" required placeholder="4">
												  				</div>
												  			</div><br><br>
												  			<div class="form-group">
												  				<label for="" class="col-md-2">Requisito</label>
																<div class="col-md-10">
												  				<input type="text" name="requisito" class="form-control" placeholder="codigo del curso: MTM-10,MTN-21">
												  				</div>
												  			</div><br><br>
												  			<div class="form-group">
												  				<label for="" class="col-md-2">Ciclo</label>
																<div class="col-md-10">
												  				<input type="number" name="ciclo" class="form-control" required placeholder="1">
												  				</div>
												  			</div><br><br>
												  			<div class="form-group">
												  				<label for="" class="col-md-2">Horas Teoría</label>
																<div class="col-md-10">
												  				<input type="number" name="h-teoria" class="form-control" required placeholder="1">
												  				</div>
												  			</div><br><br>
												  			<div class="form-group">
												  				<label for="" class="col-md-2">Horas Práctica</label>
																<div class="col-md-10">
												  				<input type="number" name="h-practica" class="form-control" required placeholder="1">
												  				</div>
												  			</div><br><br>
												      </div>
												      <div class="modal-footer">
												        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
												        <button type="submit" name="agregar" class="btn btn-primary">AGREGAR</button>
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
						<?php }else{?> <p style="color:#7F2222">Sin cursos disponible</p> <?php }?>
						
						
						<!--autofocus modal agregar nuevo institucion-->
							<script>
								$(document).on('shown.bs.modal', '.modal', function() {
  								$(this).find('[autofocus]').focus();
								});
							</script>
					

					</div>
				</div>
			</div>
		
	</div>
</body>
</html>