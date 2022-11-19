<?php

require "vendor/autoload.php";

use Fpdf\Fpdf;

$pdf = new Fpdf('P', 'mm', 'Legal');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 30);
$pdf->Cell(0.1, 20, 'Stephanie Diaz Basilio', 0);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(0.1, 45, 'Bachelor of Science in Information Technology', 0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0.1, 65, 'basilio.stephanie@auf.edu.ph', 0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0.1, 85, '18-0515-388', 0);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Output();

?>