<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script type="text/javascript" src="js/jquery.1.11.2.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
	<div class="container-fluid">
	<div>
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentacion"><a href="configuracion.php" aria-controls="configu" role="tab">Confuguración</a></li>
			<li role="presentation"><a href="admision.php"  role="tab">Admisión</a></li>
			<li role="presentation" class="active"><a href="matricula.php" aria-controls="matricula" role="tab">Matriculas</a></li>
		 	<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Docentes</a></li>
			<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Horarios</a></li>
			<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Asistencia de Alumnos</a></li>
			<li role="presentation"><a href="#evaluaciones" aria-controls="evaluaciones" role="tab" data-toggle="tab">Evaluaciones</a></li>
			<img class="logo-derecha" src="img/logo.png" alt="logo" height="40">
		</ul>
			
			<div class="contenido">	
				<!--menu lateral-->
				<div class="col-md-2">
					<a href="tipo_persona.php">Alumnos</a><br>
					<a href="tipo_documento.php">Matricular</a>
				</div>
				<!--cuerpo-->
				<div class="col-md-10">
					cuerpo
				</div>
			</div>
	</div> 
</body>
</html>