<?php 
/*
programado por:
Guillermo Antonio Toro Bayona
Ing. Catastral y Geodesta
Especialista en SIG
*/
session_start();
session_destroy();
include ("header.php");

?>
</head>
<body onLoad='iniciar();iniciar_ppal();foco()' class='cuerpo1'>
<br><br>
<form name='ingreso' action='procesar_autenticacion.php' method='post'>
<h1 class='formato1'>SISTEMA DE INFORMACIÓN GEOGRÁFICA PARA EL SEGUIMIENTO DE RUTAS ESCOLARES</h1>
<br><br>
<table align='center' class='borde1'>
	<tr>
		<td class='formato2'>Usuario:</td><td><input type='text' name='usuario' id='foco'></td>
	</tr>
	<tr>
		<td class='formato2'>Contraseña:</td><td><input type='password' name='contrasenia'></td>
	</tr>
</table>
<br>
<table align='center'>
	<tr>
		<td align='center'><input type='submit' value='Ingresar' onClick='esperar()'>
						   <input type='reset' value='Limpiar'></td>
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