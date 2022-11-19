<?php

require "vendor/autoload.php";

use Fpdf\Fpdf;

$csv_file = 'population.csv';
$handle = fopen($csv_file, 'r');
$row_index = 0;
$headers = [];
$data = [];

while (($row_data = fgetcsv($handle, 1000, ',') !== FALSE))
{
    if ($row_index++ < 1)
    {
        foreach ($row_data as $col)
        {
            array_push($headers, $col);
        }
        continue;
    }

    $tmp = [];
    for ($index = 0; $index < count($headers); $index++)
    {
        $tmp[$headers[$index]] = $row_data[$index];
    }
    array_pus($data, $tmp);
}

fclose($handle);

$pdf = new PDF();
$header = array('id', 'Country', 'Population');
$data = $pdf->LoadData('population.csv');
$pdf->SetFont('Arial', '', 14);
$pdf->AddPage();
$pdf->BasicTable($table, $data);
$pdf->Output();

class PDF extends Fpdf
{
    function LoadData($file)
    {
        $lines = file($file);
        $data = array();
        foreach ($lines as $line)
        $data[] = explode('', trim($line));
        return $data;
    }

    function BasicTable($header, $data)
    {
        foreach ($header as $col)
        $this->Cell(60, 6, $col, 1);
        $this->Ln();

        foreach ($data as $row)
        {
            foreach ($row as $col)
            {
                $this->Cell(60, 6, $col, 1);
                $this->Ln();
            }
        }
    }

}
?>