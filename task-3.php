<?php

require "vendor/autoload.php";

use Fpdf\Fpdf;

class PDF extends Fpdf
{
    // Page Header
    function Header()
    {
        global $title;

        $this->SetFont('Arial', 'B', 15);
        $w = $this->GetStringWidth($title)+6;
        $this->SetX((210-$w)/2);
        $this->SetDrawColor(98, 7, 8);
        $this->SetFillColor(220, 220, 220);
        $this->SetTextColor(56, 7, 10);
        $this->SetLineWidth(0.2);
        $this->Cell($w, 9, $title, 1, 1, 'C', true);
        $this->Ln(10);
    }

    // Page Footer
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->SetTextColor(128);
        $this->Cell(0, 10, 'Page '.$this->PageNo(), 0, 0, 'C');
    }

    // Page Title
    function ChapterTitle($num, $label)
    {
        $this->SetFont('Arial', 'B', 16);
        $this->SetFillColor(220, 170, 150);
        $this->Cell(0, 6, "Chapter $num: $label", 0, 1, 'L', true);
        $this->Ln(4);
    }

    // Page Body
    function ChapterBody($file)
    {
        $txt = file_get_contents($file);
        $this->SetFont('Times', '', 12);
        $this->MultiCell(0, 5, $txt);
        $this->Ln();
        $this->SetFont('', 'I');
        $this->Cell(0, 5, '(end of excerpt)');
    }

    // Print Chapter
    function PrintChapter($num, $title, $file)
    {
        $this->AddPage();
        $this->ChapterTitle($num, $title);
        $this->ChapterBody($file);
    }
}

$pdf = new PDF();
$title = 'Patriot Games';
$pdf->SetTitle($title);
$pdf->SetAuthor('Tom Clancy');
$pdf->PrintChapter(1, 'A Sunny Day in Londontown', 'chapter-1.txt');
$pdf->PrintChapter(2, 'Cops and Royals', 'chapter-2.txt');
$pdf->PrintChapter(3, 'Flowers and Families', 'chapter-3.txt');
$pdf->PrintChapter(4, 'Players', 'chapter-4.txt');
$pdf->PrintChapter(5, 'Perqs and Plots', 'chapter-5.txt');
$pdf->PrintChapter(6, 'Trials and Troubles', 'chapter-6.txt');
$pdf->PrintChapter(7, 'Speedbird Home', 'chapter-7.txt');
$pdf->PrintChapter(8, 'Information', 'chapter-8.txt');
$pdf->PrintChapter(9, 'A Day for Celebration', 'chapter-9.txt');
$pdf->PrintChapter(10,'Plans and Threats', 'chapter-10.txt');
$pdf->Output();