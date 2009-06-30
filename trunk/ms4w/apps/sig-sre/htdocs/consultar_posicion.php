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

$placa=$_POST['placa'];
include ("header.php");

?>
</head>
<body onLoad='iniciar();foco()' class='cuerpo1'>
<br><br>
<form name='visualizar' action='procesar_visualizar.php' method='post'>
<h3 align='center' class='formato1'>CONSULTE Y OBSERVE LA POSICIÓN DE LA RUTA ESCOLAR !</h3>
<br><br>
<table class='borde1' align='center'>
	<tr class='formato2'>
			<td align='center'>Placa de la Ruta    <input type='text' name='ruta' value='<?php echo $placa;?>' id='foco'><br><br><br></td>
	<tr class='formato2'>
			<td><input type='radio' name='opcion_visualizar' value='ultima_posicion' onClick='desactivar(1)'>Visualizar la Última Posición de la Ruta<br><br>
				<input type='radio' name='opcion_visualizar' value='recorrido_completo' onClick='desactivar(1)'>Visualizar el Recorrido Completo de la Ruta<br><br></td>				
	<tr>
		<td align='center'><input type='submit' value='Ir al Visor' id='1' disabled='true' onClick='esperar()'></td>
	</tr>
</table>
<br><br><br>
<table align='center'>
	<tr><td align='center'><img id='esperar_img' src='imagenes/mundo1.gif' height='120' width='100'></td></tr>
	<tr><td align='center' class='formato3' id='esperar_txt'>POR FAVOR ESPERE...PROCESANDO</td></tr>
</table>
</form>
</body>
</html>