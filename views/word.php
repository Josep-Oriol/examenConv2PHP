<?php
require('vendor/autoload.php');

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

$phpWord = new PhpWord();

$section = $phpWord->addSection();
$section->addTitle("Cursos Matriculados", 1);

$tabla = $section->addTable();

$tabla->addRow();
$tabla->addCell(2000)->addText("Nombre");
$tabla->addCell(2000)->addText("Horas");
$tabla->addCell(2000)->addText("Precio");
$totalHoras = 0;
$totalPrecio = 0;

foreach($cursosUsuario as $curso){
    $tabla->addRow();
    $tabla->addCell(2000)->addText($curso['nombre']); 
    $tabla->addCell(2000)->addText($curso['horas']); 
    $tabla->addCell(2000)->addText($curso['precio']); 

    $totalHoras += $curso[1];
    $totalPrecio += $curso[2];
}

$tabla->addRow();
$tabla->addCell(2000)->addText("Total");
$tabla->addCell(2000)->addText($totalHoras . " Horas totales");
$tabla->addCell(2000)->addText($totalPrecio . " Precio total");


$file = 'documento.docx';
$phpWord->save($file, 'Word2007');


header("Content-Description: File Transfer");
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Disposition: attachment;filename="' . basename($file) . '"');
header("Content-Transfer-Encoding: binary");
header("Content-Length: " . filesize($file));
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');

readfile($file);

// Eliminar el archivo del servidor después de enviarlo
unlink($file);

exit;