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
<form name='consultas' action='procesar_consultar.php' method='post'>
<h3 align='center' class='formato1'>SELECCIONE LA OPCIÓN DE CONSULTA !</h3>
<br><br>
<table align='center' class='borde1'>
	<tr class='formato2'>
		<td><input type='radio' name='opcion_consulta' value='codigo' onClick='desactivar(2)'>Consultar por Código de Estudiante<br><br>
		    <input type='radio' name='opcion_consulta' value='nombre_completo' onClick='desactivar(2)'>Consultar por Nombre Completo del Estudiante<br><br></td>
	<tr class='formato2'>
		<td align='center'>Ingrese el Valor a Consultar:<br><br>
		<input type='text' name='valor_consulta' id='1' disabled='true' align='center'></td>
	</tr>
</table>
<br>
<table align='center'>
	<tr>
		<td align='center'><input type='submit' value='Consultar' disabled='true' id='2' onClick='esperar()'></td>
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