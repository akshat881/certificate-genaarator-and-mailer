<html>
    <head>
    <title>kito</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <style>
        body{
         background: radial-gradient(#653d84, #332042);
        }
     </style>
    </head>
<body>
<?php
include'db.php';
require('fpdf/fpdf.php');

//error_reporting(0);
$name=$_POST['name'];
$email=$_POST['email'];
if(isset($_POST['submit']))
{
    $s="SELECT * FROM users WHERE email='$email'"; 

    $n=mysqli_query($con,$s);
    $p=mysqli_num_rows($n);

    if($p){
        while($row = mysqli_fetch_array($n)){ 

            header('Content-type: image/jpeg');
        $font=realpath('BalsamiqSans-Regular.ttf');
        $image=imagecreatefromjpeg("certificate1.jpg");
        $color=imagecolorallocate($image,30,28,27);
        imagettftext($image, 18, 0, 30, 2450, $color,$font, $date);
        $date=$row['tokken'];
        imagettftext($image, 100, 0, 1400, 1200, $color,$font, $name);
        $file_path="certificat/".$date.".jpg";
        $file_path_pdf="certificat/".$date.".pdf";
        imagejpeg($image,$file_path);  
        imagedestroy($image);

        $pdf=new FPDF('L','mm','A5');
        $pdf->AddPage();
        $pdf->Image($file_path,0,0,210,150);
        $pdf->Output($file_path_pdf,"F");
        }
        

        $to = $email; 
        
        
        $from = 'infocbs869@gmail.com'; 
        $fromName = 'kito'; 
        
        
        $subject = 'your certificate';  
    
        $file = $file_path_pdf; 
        
        
        $htmlContent = 
        '<h3>congrats</h3>'.$name;

        
        
        
        $headers = "From: $fromName"." <".$from.">"; 
        
    
        $semi_rand = md5(time());  
        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
        
        
        $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
        
        
        $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
        "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  
        
        
        if(!empty($file) > 0){ 
            if(is_file($file)){ 
                $message .= "--{$mime_boundary}\n"; 
                $fp =    @fopen($file,"rb"); 
                $data =  @fread($fp,filesize($file)); 
        
                @fclose($fp); 
                $data = chunk_split(base64_encode($data)); 
                $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .  
                "Content-Description: ".basename($file)."\n" . 
                "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .  
                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
            } 
        } 
        $message .= "--{$mime_boundary}--"; 
        $returnpath = "-f" . $from; 
        $mail = @mail($to, $subject, $message, $headers, $returnpath);  
        header('Location: alert.html');
    }

    
    
  else{
    echo "<script> 
    Swal.fire({
        title: 'user dosent exist',
        icon: 'error',
       
        confirmButtonColor: '#3085d6',
    
        confirmButtonText: 'ok'
      }).then((result) => {
        if (result.isConfirmed) {
         document.location='index.php'; 
        }
      })
    
    </script>";
  }
    
}
?>
</body>
</html> 