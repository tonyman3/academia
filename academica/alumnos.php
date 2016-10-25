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
<body onload="class_active_menu_head();">
	<div class="container-fluid">
	<?php include('../menu_head.php');?>
		<div class="contenido">
			<div class="col-md-2">	
					<div class="sidebar">
						<ul class="nav nav-pills nav-stacked">
							<li><a href="../academica/academica.php" data-toggle="tooltip" data-placement="right" title="Alumnos">Matriculas</a></li>
							<li class="active"><a href="../academica/alumnos.php" data-toggle="tooltip" data-placement="right" title="Alumnoa">Alumnos</a></li>
							<li><a href="carreras.php" data-toggle="tooltip" data-placement="right" title="Docentes">Docentes</a></li>
							<li><a href="cursos.php" data-toggle="tooltip" data-placement="right" title="Horarios">Horarios</a></li>
							<li><a href="aulas.php" data-toggle="tooltip" data-placement="right" title="Aulas">Aulas</a></li>
							<li><a href="curriculas.php" data-toggle="tooltip" data-placement="right" title="Currículas">Curriculas</a></li>
							
							<hr>
							<li><a href="tipo_persona.php">Calendario Académico</a></li>
							<li><a href="personas.php">Periodo</a></li>
						</ul>
					</div>
			</div>
			<div class="col-md-10">
				<div class="side">
					<h1>Alumnos</h1>
				</div>
			</div>
		</div>
	</div>
</body>
</html>