<?php
use setasign\Fpdi\Fpdi;
require_once('../custom/fpdf/fpdf.php');
require_once('../custom/fpdi/autoload.php');


// Source file and watermark config 
$file = '../storage/42069/nutz.pdf'; 
$text_image = '../img/watermarkMCT.png'; 
 
// Set source PDF file 
$pdf = new Fpdi(); 
if(file_exists("./".$file)){ 
    $pagecount = $pdf->setSourceFile($file); 
}else{ 
    die('Source PDF not found!'); 
} 
 
// Add watermark image to PDF pages 
for($i=1;$i<=$pagecount;$i++){ 
    $tpl = $pdf->importPage($i); 
    $size = $pdf->getTemplateSize($tpl); 
    $pdf->addPage(); 
    $pdf->useTemplate($tpl, 1, 1, $size['width'], $size['height'], TRUE); 
     
    //Put the watermark 
    $xxx_final = ($size['width']-165); 
    $yyy_final = ($size['height']-220); 
    $pdf->Image($text_image, $xxx_final, $yyy_final, 0, 0, 'png'); 
} 
 
// Output PDF with watermark 
//$pdf->Output();
$pdf->Output('F', '../storage/42069/nutz1.pdf');
?>