<?php

require "vendor/autoload.php";

use Fpdf\Fpdf;

class PDF extends Fpdf
{
    // Page Header
    function Header()
    {
        // AUF Logo
        $this->image('image/auf.png', 10, 6, 30);
        $this->SetFont('Arial', 'B', 25);
        $this->Cell(80);
        $this->Cell(50, 40, 'Angeles University Foundation', 0, 0, 'C');
        $this->Ln(20);
        $this->SetFont('Arial', 'B', 20);
        $this->Cell(210, 40, 'Brief History of the University', 0, 0, 'C');
        $this->Ln(10);
    }

    // Page Footer
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page' . $this->PageNo().'/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF('P', 'mm', 'Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(30);
$pdf->Multicell(0, 5, 'Angeles University Foundation, a non-stock, non-profit educational institution, was established on May 25, 1962 by Mr. Agustin P. Angeles, Dr. Barbara Y. Angeles, and family. In less than nine years, the Institution was granted University status on April 16, 1971 by the Department of Education, Culture and Sports.

On December 4, 1975, the University was converted to a non-stock, non-profit educational foundation -- the Angeles couple and their children executed a Deed of Donation relinquishing their ownership. AUF was incorporated under Republic Act No. 6055, otherwise known as the Foundation Law, and became a tax-exempt institution approved by the Philippine government. All donations and bequests given to the AUF are tax deductible.

On February 14, 1978, AUF was converted to a Catholic University. As the first Catholic university in Central Luzon, AUF ensures not only professional success but total development which is anchored on Christian education that is holistic, integrated and formative. On February 20, 1990, the five-storey, 125-bed AUF Medical Center was inaugurated which now serves as a private teaching, training and research hospital, the first ever in Central Luzon.');
$pdf->Output();
