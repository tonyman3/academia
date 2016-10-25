<?php
//desarrollado para php 5.5.9
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}

class Conexion{
	public static function conectar(){
		$con=mysql_connect('localhost','root','toor');
		$db=mysql_select_db("academia");
		if(!$con){echo 'sin conexion';exit();}
		if(!$db){echo 'sin base de datos';exit();}
		
		return $con;
	}
}
?>