<?php
define('FPDF_FONTPATH','./');
require('../fpdf.php');

$pdf=new FPDF();
$pdf->AddFont('impact','','impact.php');
$pdf->AddPage();
$pdf->SetFont('impact','',35);
$pdf->Cell(0,10,'Enjoy new IMPACT!');

$pdf->AddFont('comic','','comic.php');
$pdf->SetFont('impact','',35);
$pdf->Cell(0,10,'Enjoy new COMIC!');
$pdf->Output();
?>
