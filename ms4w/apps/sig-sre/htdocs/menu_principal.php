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
include ("header.php");

?>
</head>
<body onLoad='iniciar()' class='cuerpo1'>
<br><br>
<form name='menu' action='procesar_menu.php' method='post'>
<h3 class='formato1'>SELECCIONE LA OPCIÓN DESEADA !</h3>
<br><br>
<table class='borde1' align='center'>
	<tr class='formato2'>
		<td><input type='radio' name='opcion_menu' value='consulta_alfanumerica' onClick='desactivar(1)'>Consultar Información sobre la Ruta Escolar y el Estudiante<br><br>
		    <input type='radio' name='opcion_menu' value='consulta_geografica' onClick='desactivar(1)'>Visualizar la Posicion de la Ruta Escolar<br><br></td>
	<tr>
	<tr>
		<td align='center'><input type='submit' value='Aceptar' id='1' disabled='true' onClick='esperar()'></td>
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