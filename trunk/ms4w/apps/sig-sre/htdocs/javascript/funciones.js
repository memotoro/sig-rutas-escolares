/*
programado por:
Guillermo Antonio Toro Bayona
Ing. Catastral y Geodesta
Especialista en SIG
*/
function iniciar(){
	document.getElementById('esperar_img').style.visibility='hidden';
	document.getElementById('esperar_txt').style.visibility='hidden';
}

function iniciar_ppal(){
	document.getElementById('menu').style.visibility='hidden';
	document.getElementById('salir').style.visibility='hidden';
}

function esperar(){
	document.getElementById('esperar_img').style.visibility='visible';
	document.getElementById('esperar_txt').style.visibility='visible';
}

function foco(){
    document.getElementById('foco').focus();
}

function desactivar(numero){
for(i=1;i<=numero;i++){
	document.getElementById(i).disabled=false;
}
}

function copiar(){
	var i=1;
	document.getElementById('foco').value='';
	for(i=1;i<=16;i++){
		if(document.getElementById(i).checked==true){
			document.getElementById('foco').value=document.getElementById(i).value;
		}
	}
}

function borrar(){
var respuesta;
	respuesta=confirm("ESTO ELEMINARÁ TODOS LAS POSICIONES DE LA BASE DE DATOS \n\n¿DESEA CONTINUAR?");
	if(respuesta==true)
		window.location='procesar_borrar.php'
}