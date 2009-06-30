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
	exit;
}


define('FPDF_FONTPATH','font/');
require('fpdf.php');


for($i=0;$i<=13;$i++){
$datos[$i]=$_POST["$i"];
}

$pdf=new FPDF('P','mm','Letter');
$pdf->Open();
$pdf->AddPage();
$pdf->SetTitle('IMPRESION DE CONSULTA DE ESTUDIANTES');

$pdf->SetFont('Arial','B',20);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(128,0,0);
$pdf->SetLineWidth(.3);
$pdf->Rect(5,5,205,30);
$pdf->Cell(200,10,'REPORTE DE CONSULTA',0,1,'C',0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(200,5,'Sistema de Información Geográfica para el Seguimiento de Rutas Escolares',0,1,'C',0);
$pdf->Cell(200,5,'Colegio XXX',0,1,'C',0);
$pdf->Cell(80,10,'',0,1);

$pdf->SetFont('Arial','B',16);
$pdf->SetFillColor(255,255,160);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(128,0,0);
$pdf->SetLineWidth(.3);
$pdf->Rect(5,35,205,90);
$pdf->Rect(135,50,60,60);$pdf->Rect(139,54,52,52);$pdf->Rect(139.5,54.5,51,51);
$pdf->Line(10,85,110,85);
$pdf->Cell(100,10,'DATOS DEL ESTUDIANTE',1,1,'L',1);
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(218,254,226);
$pdf->SetTextColor(0);
$pdf->Cell(40,10,'Nombre del Estudiante',1,0,'L',1);
$pdf->Cell(60,10,$datos[0],1,1,'L',1);
$pdf->Cell(40,10,'Código del Estudiante',1,0,'L',1);
$pdf->Cell(60,10,$datos[1],1,1,'L',1);
$pdf->Cell(40,10,'Edad',1,0,'L',1);
$pdf->Cell(60,10,$datos[2]." (Años)",1,1,'L',1);
$pdf->Image("./fotos/estudiantes/".$datos[1].".jpg",140,55,50,50);
$pdf->Cell(80,10,'',0,1);

$pdf->SetFont('Arial','B',16);
$pdf->SetFillColor(255,255,160);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(128,0,0);
$pdf->SetLineWidth(.3);
$pdf->Cell(100,10,'DATOS DEL ACUDIENTE',1,1,'L',1);
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(218,254,226);
$pdf->SetTextColor(0);
$pdf->Cell(40,10,'Nombre del Acudiente',1,0,'L',1);
$pdf->Cell(60,10,$datos[3],1,1,'L',1);
$pdf->Cell(40,10,'Cedula',1,0,'L',1);
$pdf->Cell(60,10,$datos[4],1,1,'L',1);
$pdf->Cell(80,10,'',0,1);

$pdf->SetFont('Arial','B',16);
$pdf->SetFillColor(255,255,160);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(128,0,0);
$pdf->SetLineWidth(.3);
$pdf->Rect(5,125,205,150);
$pdf->Rect(125,130,80,60);$pdf->Rect(129,134,72,52);$pdf->Rect(129.5,134.5,71,51);
$pdf->Line(10,195,205,195);
$pdf->Cell(100,10,'DATOS DE LA RUTA',1,1,'L',1);
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(218,254,226);
$pdf->SetTextColor(0);
$pdf->Cell(40,10,'Placa de la Ruta',1,0,'L',1);
$pdf->Cell(60,10,$datos[5],1,1,'L',1);
$pdf->Cell(40,10,'Modelo del Vehiculo',1,0,'L',1);
$pdf->Cell(60,10,"Año ".$datos[6],1,1,'L',1);
$pdf->Cell(40,10,'Capacidad del Vehiculo',1,0,'L',1);
$pdf->Cell(60,10,$datos[7]." Estudiantes",1,1,'L',1);
$pdf->Cell(40,10,'Número de Recorrido',1,0,'L',1);
$pdf->Cell(60,10,$datos[8],1,1,'L',1);
$pdf->Cell(40,10,'Serial de GPS',1,0,'L',1);
$pdf->Cell(60,10,$datos[9],1,1,'L',1);
$pdf->Image("./fotos/rutas/".$datos[5].".jpg",130,135,70,50);
$pdf->Cell(80,10,'',0,1);

$pdf->SetFont('Arial','B',16);
$pdf->SetFillColor(255,255,160);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(128,0,0);
$pdf->SetLineWidth(.3);
$pdf->Rect(140,200,50,50);
$pdf->Line(10,255,205,255);
$pdf->Cell(100,10,'DATOS DEL CONDUCTOR',1,1,'L',1);
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(218,254,226);
$pdf->SetTextColor(0);
$pdf->Cell(40,10,'Nombre del Conductor',1,0,'L',1);
$pdf->Cell(60,10,$datos[10],1,1,'L',1);
$pdf->Cell(40,10,'Cedula',1,0,'L',1);
$pdf->Cell(60,10,$datos[11],1,1,'L',1);
$pdf->Cell(40,10,'Edad',1,0,'L',1);
$pdf->Cell(60,10,$datos[12],1,1,'L',1);
$pdf->Cell(40,10,'Número de Pase',1,0,'L',1);
$pdf->Cell(60,10,$datos[13],1,1,'L',1);
$pdf->Image("./fotos/conductores/".$datos[11].".jpg",145,205,40,40);
$pdf->Cell(80,5,'',0,1);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(200,4,'Reporte de Consulta para Fines Informativos',0,1,'C',0);

$pdf->Output();
		
?>