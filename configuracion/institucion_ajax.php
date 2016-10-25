<?php
require_once('../logica/configuracion_ln.php');
	$conln=new Configuracion_ln();
	$reg=$conln->listar_institucion();
	//print_r($reg);exit();
	$tot=sizeof($reg);
	for($i=0;$i<$tot;$i++){
		echo $reg[$i]['nombre']."<br>";
		echo "RUC: ".$reg[$i]['ruc']."<br>";
		echo "Telf.".$reg[$i]['telefono'];
	}
?>
