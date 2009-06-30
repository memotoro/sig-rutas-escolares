<?php 
/*
programado por:
Guillermo Antonio Toro Bayona
Ing. Catastral y Geodesta
Especialista en SIG
*/
$datagrama=$_POST["datagrama_gps"];
$cadena=substr($datagrama,0,6);

if($datagrama==''){
	echo "<script>alert('NO HA ENVIADO NINGUN MENSAJE')</script>";
	echo "<script>window.location='gps.php'</script>";
	exit;
}


require_once ("conexion_DAO.php");

if($cadena=='$GPGGA' || $cadena=='$GPGGB'){
	$tokenizer = strtok($datagrama,",");
	$contador=1;
	while($tokenizer!=FALSE){
		if($contador==1){
			$serial_gps=$tokenizer;
		}
		if($contador==3){
			$latitud=$tokenizer;
		}
		if($contador==4){
			$norte_sur=$tokenizer;
		}
		if($contador==5){
			$longitud=$tokenizer;
		}
		if($contador==6){
			$este_oeste=$tokenizer;
		}		
		$tokenizer = strtok(",");
		$contador++;
	}
	if($norte_sur=='S'){
	$latitud*=-1;
	}
	if($este_oeste=='W'){
	$longitud*=-1;
	}	
	if($serial_gps=='$GPGGA'){
	$vehiculo=1;
	}	
	if($serial_gps=='$GPGGB'){
	$vehiculo=2;
	}	
	$fecha=date('Y-m-d H:m:s');
	conectar_bd();
	$sql="insert into posicion (latitud,longitud,fecha,serial_gps,id_vehiculo,the_geom) values ('".$latitud."','".$longitud."','".$fecha."','".$serial_gps."','".$vehiculo."',GeometryFromText('POINT(".$longitud." ".$latitud.")',4326))";
	$postgres_resultado=pg_Exec($sql) or die ("NO SE PUDO ALMACENAR LAS COORDENADAS EN LA BASE DE DATOS"); 
	pg_close();
	//echo "<script>alert('EL DATO SE HA ALMACENADO CORRECTAMENTE ')</script>";
	echo "<script>window.location='gps.php'</script>";

}
else{
	echo "<script>alert('EL MENSAJE  RECIBIDO NO ES UN TIPO DE MENSAJE PERMITIDO')</script>";
	echo "<script>window.location='gps.php'</script>";
	exit;
	}

?>