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
<form name='gps' action='procesar_gps.php' method='post'>
<h1 class='formato1'>INTERFAZ QUE SIMULA EL INGRESO DE DATOS GPS !</h1>
<br>
<table class='borde1' align='center'>
	<tr class='formato2'>
		<td>Línea de Datagrama: <input type='text' name='datagrama_gps' id='foco'></td>
	</tr>
	<tr>
		<td align='center'><input type='submit' value='Enviar' onClick='esperar()'>
						   <input type='reset' value='Limpiar'><br><br><br></td>
	</tr>
	<tr class='formato2'>
		<td align='center'>Borrar los Datos de Posición<br>
		<input type='button' value='Borrar' onClick='borrar()'></td>						   
	</tr>
</table>
<br>
<table align='center'>
	<tr><td align='center'><img id='esperar_img' src='imagenes/mundo2.gif' height='100' width='100'></td></tr>
	<tr><td align='center' class='formato3' id='esperar_txt'>POR FAVOR ESPERE...PROCESANDO</td></tr>
</table>
</form>
<br><br>
<table border='1' align='center'>
	<tr>
		<td>DATOS DE LA RUTA No. 1</td>
		<td>DATOS DE LA RUTA No. 2</td>
	</tr>
	<tr>
		<td><input type='radio' id='1' name='gps' value='$GPWPL,3911.456,N,09634.757,W,ZZZZZZ*59' onClick='copiar()'>$GPWPL,3911.456,N,09634.757,W,ZZZZZZ*59<br>
			<input type='radio' id='2' name='gps' value='$GPRMC,023802,A,3403.396,N,11711.666,W,000.0,033.8,231298,013.6,E*69' onClick='copiar()'>$GPRMC,023802,A,3403.396,N,11711.666,W,000.0,033.8,231298,013.6,E*69<br>
			<input type='radio' id='3' name='gps' value='$GPRMB,A,,,,,,,,,,,,V*71' onClick='copiar()'>$GPRMB,A,,,,,,,,,,,,V*71<br>
			<input type='radio' id='4' name='gps' value='$GPGGA,023810,4.627851906,N,74.15269406,W,1,04,2.3,407.2,M,-30.7,M,,*7F' onClick='copiar()'>$GPGGA,023810,4.627851906,N,74.15269406,W,1,04,2.3,407.2,M,-30.7,M,,*7F<br>
			<input type='radio' id='5' name='gps' value='$GPGGA,023812,4.626982614,N,74.15336579,W,1,04,2.3,406.4,M,-30.7,M,,*7D' onClick='copiar()'>$GPGGA,023812,4.626982614,N,74.15336579,W,1,04,2.3,406.4,M,-30.7,M,,*7D<br>
			<input type='radio' id='6' name='gps' value='$GPGGA,023814,4.626740250,N,74.15358782,W,1,04,2.3,401.1,M,-30.7,M,,*7A' onClick='copiar()'>$GPGGA,023814,4.626740250,N,74.15358782,W,1,04,2.3,401.1,M,-30.7,M,,*7A<br>
			<input type='radio' id='7' name='gps' value='$GPGGA,023808,4.626478817,N,74.15331798,W,1,04,2.3,407.9,M,-30.7,M,,*7D' onClick='copiar()'>$GPGGA,023808,4.626478817,N,74.15331798,W,1,04,2.3,407.9,M,-30.7,M,,*7D<br>
			<input type='radio' id='8' name='gps' value='$GPGGA,023810,4.625874578,N,74.15389214,W,1,04,2.3,407.2,M,-30.7,M,,*7F' onClick='copiar()'>$GPGGA,023810,4.625874578,N,74.15389214,W,1,04,2.3,407.2,M,-30.7,M,,*7F<br>
		<td><input type='radio' id='9' name='gps' value='$GPWPL,3911.456,N,09634.757,W,ZZZZZZ*59' onClick='copiar()'>$GPWPL,3911.456,N,09634.757,W,ZZZZZZ*59<br>
			<input type='radio' id='10' name='gps' value='$GPRMC,023802,A,3403.396,N,11711.666,W,000.0,033.8,231298,013.6,E*69' onClick='copiar()'>$GPRMC,023802,A,3403.396,N,11711.666,W,000.0,033.8,231298,013.6,E*69<br>
			<input type='radio' id='11' name='gps' value='$GPRMB,A,,,,,,,,,,,,V*71' onClick='copiar()'>$GPRMB,A,,,,,,,,,,,,V*71<br>
			<input type='radio' id='12' name='gps' value='$GPGGB,023808,4.612849951,N,74.1308108,W,1,04,2.3,407.2,M,-30.7,M,,*7F' onClick='copiar()'>$GPGGB,023808,4.612849951,N,74.1308108,W,1,04,2.3,407.2,M,-30.7,M,,*7F<br>
			<input type='radio' id='13' name='gps' value='$GPGGB,023810,4.61242326,N,74.13124135,W,1,04,2.3,407.2,M,-30.7,M,,*7F' onClick='copiar()'>$GPGGB,023810,4.61242326,N,74.13124135,W,1,04,2.3,407.2,M,-30.7,M,,*7F<br>
			<input type='radio' id='14' name='gps' value='$GPGGB,023808,4.613070675,N,74.13157673,W,1,04,2.3,407.2,M,-30.7,M,,*7F' onClick='copiar()'>$GPGGB,023808,4.613070675,N,74.13157673,W,1,04,2.3,407.2,M,-30.7,M,,*7F<br>
			<input type='radio' id='15' name='gps' value='$GPGGB,023808,4.613784825,N,74.13189327,W,1,04,2.3,407.2,M,-30.7,M,,*7F' onClick='copiar()'>$GPGGB,023808,4.613784825,N,74.13189327,W,1,04,2.3,407.2,M,-30.7,M,,*7F<br>
			<input type='radio' id='16' name='gps' value='$GPGGB,023810,4.613217775,N,74.13294737,W,1,04,2.3,407.2,M,-30.7,M,,*7F' onClick='copiar()'>$GPGGB,023810,4.613217775,N,74.13294737,W,1,04,2.3,407.2,M,-30.7,M,,*7F<br>
	</tr>	                                                                                                         
	</table>
</body>
</html>