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

$opcion=$_POST["opcion_visualizar"];
$placa=strtoupper($_POST["ruta"]);


if($placa==''){
	echo "<script>alert('INGRESE UNA PLACA PARA CONSULTAR')</script>";
	echo "<script>window.location='consultar_posicion.php'</script>";
	exit;
}
if($placa!='BHK956' && $placa!='BWD354'){
	echo "<script>alert('PLACA NO VALIDA PARA CONSULTAR')</script>";
	echo "<script>window.location='consultar_posicion.php'</script>";
	exit;
}

if($placa=='BHK956'){
	$mapa='gpgga';
}
if($placa=='BWD354'){
	$mapa='gpggb';
}
if($opcion=='ultima_posicion'){
	require_once ("conexion_DAO.php");
	conectar_bd();
	$sql="select p.gid,p.longitud,p.latitud from posicion p,vehiculo v where v.id_vehiculo=p.id_vehiculo and v.placa='$placa' order by gid desc";
	$postgres_resultado=pg_Exec($sql) or die ("NO SE PUDO CONSULTAR EL ESTUDIANTE EN LA BASE DE DATOS"); 
	$resultado_matriz=pg_Fetch_Array($postgres_resultado); 
	pg_close();
	$longitud=$resultado_matriz[1];
	$latitud=$resultado_matriz[2];	
	echo "<script>window.location='../../kamap/?map=$mapa&cps=$longitud,$latitud,2000&layers=IMAGEN,INFORMACION PREDIAL,VIAS,POSICION'</script>";//

}
if($opcion=='recorrido_completo'){
	echo "<script>window.location='../../kamap/?map=$mapa'</script>";
}
		
?>