<?php
include("seguridad.php");
	require_once('logica/configuracion_ln.php');
	$conln=new Configuracion_ln();
	$reg=$conln->listar_institucion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script type="text/javascript" src="js/jquery.1.11.2.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
</head>
<body>
	<div class="container-fluid">
		
		<?php include ('menu_head.php');?>
			
			<!--menu bar-->	

			<div class="contenido">
				<div class="col-md-2">	
					<div class="sidebar">
						<ul class="nav nav-pills nav-stacked">
							<li><a href="configuracion.php" data-toggle="tooltip" data-placement="right" title="Institución">Institución</a></li>
							<li><a href="facultades.php" data-toggle="tooltip" data-placement="right" title="Facultades">Facultades</a></li>
							<li><a href="carreras.php" data-toggle="tooltip" data-placement="right" title="Carreras">Carreras</a></li>
							<li><a href="cursos.php" data-toggle="tooltip" data-placement="right" title="Cursos">Cursos</a></li>
							<li class="active"><a href="calendario_academico.php" data-toggle="tooltip" data-placement="right" title="Calendario Académico">Calendario Académico</a></li>
							<li><a href="periodo_semestral.php" data-toggle="tooltip" data-placement="right" title="Periodo Semestral">Periodo Semestral</a></li>
							<li><a href="curriculas.php" data-toggle="tooltip" data-placement="right" title="Currículas">Curriculas</a></li>
							<li><a href="aulas.php" data-toggle="tooltip" data-placement="right" title="Aulas">Aulas</a></li>
							<hr>
							<li><a href="tipo_persona.php">Config. Personas</a></li>
							<li><a href="usuarios">Usuarios</a></li>
						</ul>
					</div>
				</div>	

				<div class="col-md-10">
					<div class="side">
						<h1 class="titulo">CALENDARIO ACADÉMICO</h1>
						<?php
							
								echo "calendario";
							?>
					</div>
				</div>
			</div>
		
	</div>
</body>
</html>