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

require_once ("conexion_DAO.php");

$campo=$_POST["opcion_consulta"];
$consultar=$_POST["valor_consulta"];

if($consultar==''){
	echo "<script>alert('INGRESE UN DATO DE ESTUDIANTE PARA CONSULTAR')</script>";
	echo "<script>window.location='consultar_informacion.php'</script>";
	exit;
}

conectar_bd();
$sql="select e.nombre_completo,e.codigo,e.edad,e.nombre_acudiente,e.cedula_acudiente,v.placa,v.modelo,v.capacidad,v.num_recorrido,v.serial_gps,c.nombre_conductor,c.cedula,c.edad,c.n_pase from estudiante e,vehiculo v,conductor c where $campo='$consultar' and e.id_vehiculo=v.id_vehiculo and c.id_vehiculo=v.id_vehiculo";
$postgres_resultado=pg_Exec($sql) or die ("NO SE PUDO CONSULTAR EL ESTUDIANTE EN LA BASE DE DATOS"); 
$resultado_matriz=pg_Fetch_Array($postgres_resultado); 
pg_close();

if($resultado_matriz==0){
	echo "<script>alert('NO HAY UN ESTUDIANTE RELACIONADO CON EL DATO INGRESADO')</script>";
	echo "<script>window.location='consultar_informacion.php'</script>";
	exit;
}
else{
include ("header.php");
?>
</head>
<body class='cuerpo1'>
<h3 align='center' class='formato1'>DATOS DEL ESTUDIANTE</h3>
<table class='borde1' align='center'>
<tr class='formato2'>
	<td>
		<table border='1' align='center'>
			<tr><td>Nombre del Estudiante:</td><td><?php echo $resultado_matriz[0];?></td></tr>
			<tr><td>Código del Estudiante:</td><td><?php echo $resultado_matriz[1];?></td></tr>
			<tr><td>Edad:</td><td><?php echo $resultado_matriz[2];?></td></tr>
		</table>
	</td>
	<td align='center'>
	<?php echo "<img src='./fotos/estudiantes/".$resultado_matriz[1].".jpg' height='150' width='140' >";?>
	</td>
</tr>
</table>
<h3 align='center' class='formato1'>DATOS DEL VEHICULO Y CONDUCTOR</h3>
<table class='borde1' align='center'>	
<tr class='formato2'>
	<td>
		<table align='center'>	
		<tr>
			<td>
				<table border='1' align='center'>	
					<tr><td>Placa de la Ruta:</td><td><?php echo $resultado_matriz[5];?></td></tr>
					<tr><td>Modelo del Vehiculo:</td><td><?php echo $resultado_matriz[6];?></td></tr>
					<tr><td>Capacidad del Vehiculo:</td><td><?php echo $resultado_matriz[7];?></td></tr>
					<tr><td>Número de Recorrido:</td><td><?php echo $resultado_matriz[8];?></td></tr>
					<tr><td>Serial de GPS:</td><td><?php echo $resultado_matriz[9];?></td></tr>
				</table>
			</td>
			<td align='center'>
				<?php echo "<img src='./fotos/rutas/".$resultado_matriz[5].".jpg' height='250' width='330'>";?>
			</td>
		</tr>
		</table>
	</td>
	<td>
		<table align='center'>	
		<tr>
			<td>
				<table border='1' align='center'>	
					<tr><td>Nombre del Conductor:</td><td><?php echo $resultado_matriz[10];?></td></tr>
					<tr><td>Número de Cédula:</td><td><?php echo $resultado_matriz[11];?></td></tr>
					<tr><td>Edad:</td><td><?php echo $resultado_matriz[12];?></td></tr>
					<tr><td>Número de Pase:</td><td><?php echo $resultado_matriz[13];?></td></tr>
				</table>
			</td>	
			<td align='center'>
				<?php echo "<img src='./fotos/conductores/".$resultado_matriz[11].".jpg' height='150' width='140'>";?>
			</td>
		</tr>
		</table>
	</td>
</tr>
</table>
<br><br>
<table align='center'> 
<tr class='formato2'>
	<td>
	<form name='imprimir' action='imprimir_pdf.php' method='post'>
	<table align='center' class='borde1'> 
		<tr><td align='center'>Imprimir Reporte de Consulta<br>
	<input type='submit' value='Imprimir'></td></tr>
	<?php
		for($i=0;$i<=13;$i++){
		echo "<input type='hidden' value='$resultado_matriz[$i]' name='$i'>";
		}
	?>
	</table>
	</form>
	</td>
	<td>
	<form name='visualizar' action='consultar_posicion.php' method='post'> 
	<table align='center' class='borde1'>	
		<tr><td align='center'>Visualizar Posición de la Ruta Escolar<br>
		<input type='submit' value='Visualizar'>
		<input type='hidden' name='placa' value='<?php echo $resultado_matriz[5]?>'></td></tr>
	</table>
	</form>
	</td>
</tr>
<?php
}
?>
</body>
</html>