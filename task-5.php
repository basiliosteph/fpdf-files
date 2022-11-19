<?php

require "vendor/autoload.php";

use Fpdf\Fpdf;

$pdf = new Fpdf();
$pdf->AddFont('Montserrat', '', 'Montserrat-VariableFont_wght.php');
$pdf->AddFont('Oswald', '', 'Oswald-VariableFont_wght.php');
$pdf->AddFont('Kanit', '', 'Kanit-Regular.php');

$pdf->AddPage();
$pdf->SetFont('Montserrat', '', 30);
$pdf->Write(15, '"Id rather bend than break."');
$pdf->Ln(15);
$pdf->SetFont('Montserrat', '', 18);
$pdf->Write(10, '-EXO Kai');
$pdf->Ln(30);

$pdf->SetFont('Oswald', '', 30);
$pdf->Write(15, '"Being bad at something is the first step to becoming better."');
$pdf->Ln(15);
$pdf->SetFont('Oswald', '', 18);
$pdf->Write(10, '-Issa');
$pdf->Ln(30);

$pdf->SetFont('Kanit', '', 30);
$pdf->Write(15, '"It is during our darkest moments that we must focus to see the light."');
$pdf->Ln(15);
$pdf->SetFont('Kanit', '', 18);
$pdf->Write(10, '-Aristotle');
$pdf->Ln(30);

$pdf->Output();
?>