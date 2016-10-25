<?php
require_once("datos/login_ad.php");
class Login_ln{
	public function login($user,$pass){
		if(empty($user)||empty($pass)){
			header("location:../index.php");
			exit();
		}
		$login_ad=new Login_ad();
		$res=$login_ad->login(strip_tags($user),md5($pass));
		if(mysql_fetch_row($res)>0){
			$login_ad=new Login_ad();
			$res=$login_ad->login(strip_tags($user),md5($pass));
			$reg=mysql_fetch_array($res);
			//print_r($reg);exit();
			$_SESSION['aut']=1;
			$_SESSION["id_persona"]=$reg["id_persona"];
			//$_SESSION["nombre"]=$reg["nombre"];
			$_SESSION["apaterno"]=$reg["paterno"];
			$_SESSION["amaterno"]=$reg["amaterno"];
			$_SESSION["tipo"]=$reg["tipo"];
			//print_r($_SESSION);exit();
			if ($_SESSION["tipo"]=="SISTEMAS") {
				header("Location:configuracion/configuracion.php");
			}elseif ($_SESSION["tipo"]=="ACADEMICA") {
				header("Location:academica/academica.php");
			}
			
		}else{
			header("Location:index.php?m=1");
		}
	}
}
?>