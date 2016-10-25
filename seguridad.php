<?php
	//print_r($_SESSION["aut"]);exit();
session_start();
	if($_SESSION['aut']!=1){
		//echo "es uno";exit();
		header("Location:../index.php?m=7");
	}
?>