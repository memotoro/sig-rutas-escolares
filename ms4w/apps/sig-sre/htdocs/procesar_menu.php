<?php
/*
programado por:
Guillermo Antonio Toro Bayona
Ing. Catastral y Geodesta
Especialista en SIG
*/
session_start();
if($_SESSION['usr']=='' || $_SESSION['psw']==''){
	echo "<script>alert('NO TIENE PERMISO PARA VISITAR ESTA PÁGINA')</script>";
	echo "<script>window.location='index.php'</script>";
	exit;
}

$opcion=$_POST["opcion_menu"];

if($opcion=='consulta_alfanumerica'){
	echo "<script>window.location='consultar_informacion.php'</script>";
}
if($opcion=='consulta_geografica'){
	echo "<script>window.location='consultar_posicion.php'</script>";
}
		
?>