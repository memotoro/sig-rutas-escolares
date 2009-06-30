<?php
/*
programado por:
Guillermo Antonio Toro Bayona
Ing. Catastral y Geodesta
Especialista en SIG
*/
session_start();
$_SESSION['usr']=$_POST["usuario"];
$_SESSION['psw']=$_POST["contrasenia"];
if($_SESSION['usr']=='' || $_SESSION['psw']==''){
	echo "<script>alert('NO TIENE PERMISO PARA VISITAR ESTA PÁGINA')</script>";
	echo "<script>window.location='index.php'</script>";
	exit;
}

require_once ("conexion_DAO.php");

$usuario=$_POST["usuario"];
$contrasenia=$_POST["contrasenia"];
conectar_bd();
$sql="select nombre,contrasenia from usuario where nombre='$usuario' and contrasenia='$contrasenia'";
$postgres_resultado=pg_Exec($sql) or die ("NO SE PUDO CONSULTAR LOS USUARIOS DE LA BASE DE DATOS"); 
$resultado_matriz=pg_Fetch_Array($postgres_resultado); 
pg_close();

if($resultado_matriz==0){
	echo "<script>alert('USUARIO O CLAVE INCORRECTOS')</script>";
	echo "<script>window.location='index.php'</script>";
	exit;
}
else{
	echo "<script>window.location='menu_principal.php'</script>";

}
		
?>