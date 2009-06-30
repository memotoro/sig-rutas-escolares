<?php
/*
programado por:
Guillermo Antonio Toro Bayona
Ing. Catastral y Geodesta
Especialista en SIG
*/
require_once ("config_DAO.php");

function conectar_bd(){
	global $puerto_pg,$bd_pg,$servidor_pg,$usuario_pg,$contrasenia_pg; 
	$conexion=pg_connect("port=".$puerto_pg." dbname=".$bd_pg." host=".$servidor_pg." user=".$usuario_pg." password=".$contrasenia_pg);
	if($conexion==0){
		die("ERROR AL CONECTARSE CON LA BASE DE DATOS");
		exit;
	}
}

?>