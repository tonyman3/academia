<?php
if(isset($_POST["guardar"]) and $_POST["guardar"]=="si"){
	require_once("logica/login_ln.php");
	$login=new Login_ln();
	$consultar=$login->login($_POST["usuario"],$_POST["pass"]);
}
if(isset($_GET['m']) and $_GET['m']==1){
?>
<div class="error">
		<div class="alert alert-danger alert-dismissible" role="alert">
		 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		 <strong>ERROR!</strong> Usuario y clave incorrectas
		</div>
</div>
<?php
}if(isset($_GET['m']) and $_GET['m']==7){
	?>
<div class="error">
		<div class="alert alert-danger alert-dismissible" role="alert">
		 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		 <strong>ERROR!</strong> Debe iniciar sessión
		</div>
</div>
	<?php
}
?>
<!DOCTYPE HTML>
<html lang="es" xml:lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Logueo</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script type="text/javascript" src="js/jquery.1.11.2.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body class="body-login">
	<div class="login">
		
			<img src="img/logo.png" class="logo">
		
	<form action="" method="post">

  		<div class="form-group">
  			<input type="text" class="form-control" name="usuario" placeholder="Usuario" required autofocus>
  		</div>
  		<div class="form-group">
  			<input type="password" class="form-control" placeholder="Clave" name="pass" required>
  		</div>
  		<div class="form-group">
  			<input type="submit" class="btn btn-primary btn-block" name="login" value="Ingresar" required class="">
  			<input type="hidden" name="guardar" value="si">
  		</div>
	</form> 
	</div>

</body>
</html>
