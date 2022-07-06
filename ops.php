<?php 
include('fpdf/fpdf.php');
header('Content-type: image/jpeg');
$font=realpath('BalsamiqSans-Regular.ttf');
 $image=imagecreatefromjpeg("certificate1.jpg");
 $color=imagecolorallocate($image,30,28,27);
 $date="fjehfkjfh43434324guehgiu5tu5hu5htiu578ey3g";
 imagettftext($image, 18, 0, 30, 2450, $color,$font, $date);
 $name="AKSHAT RANJAN";
 imagettftext($image, 100, 0, 1400, 1200, $color,$font, $name);
 $file_path="certificat/".$date.".jpg";
 $file_path_pdf="certificat/".$date.".pdf";
 imagejpeg($image,$file_path_pdf);
imagedestroy($image);

echo "<script> 
alert('done');
</script>";
//  $pdf=new FPDF('L','mm','A5');
//  $pdf->AddPage();
//   $pdf->Image($file_path,0,0,210,150);
//  $pdf->Output($file_path_pdf,"F");
 

//$name = text to be added, $x= x cordinate, $y = y coordinate, $a = alignment , $f= Font Name, $t = Bold / Italic, $s = Font Size, $r = Red, $g = Green Font color, $b = Blue Font Color
// function AddText($pdf, $text, $x, $y, $a, $f, $t, $s, $r, $g, $b) {
//     $pdf->SetFont($f,$t,$s);	
//     $pdf->SetXY($x,$y);
//     $pdf->SetTextColor($r,$g,$b);
//     $pdf->Cell(0,25,$text,0,0,$a);	
//     }
    
//     //Create A 4 Landscape page
//     $pdf = new FPDF('L','mm','A5');
//     $pdf->AddPage();
//    // $pdf->AddFont('BalsamiqSans','',14);
//     $pdf->SetFont('Arial','',14);
//     $pdf->SetCreator('Haneef Puttur');
//     // Add background image for PDF
//     $pdf->Image('certificate1.jpg',0,0,210,148);	
    
//     //Add a Name to the certificate
    
//     AddText($pdf,ucwords('Mahammad Haneef'), 20,58, 'C', 'Helvetica','',18,30,28,27);
    
//     $pdf->Output();
?>
