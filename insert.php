<?php
include 'db.php';

if(isset($_POST['submit']))
{
    $uploadfile=$_FILES['uploadfile']['tmp_name'];

require 'PHPExcel/Classes/PHPExcel.php';
require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';

$objExcel=PHPExcel_IOFactory::load($uploadfile);
foreach($objExcel->getWorksheetIterator() as $worksheet)
{
	$highestrow=$worksheet->getHighestRow();

	for($row=0;$row<=$highestrow;$row++)
	{
		$name=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
		$email=$worksheet->getCellByColumnAndRow(1,$row)->getValue();

			$insertqry="INSERT INTO `users`( `name`, `email`) VALUES ('$name','$email')";
			$insertres=mysqli_query($con,$insertqry);
		
	}
}
}
?>