<?php require_once '../commont/connect.php';
require_once 'Classes/PHPExcel.php';


if (isset($_POST['guifile'])) {
	$file=$_FILES['file']['tmp_name'];

	$objReader = PHPExcel_IOFactory::createReaderForFile($file);
	$objReader->setLoadSheetsOnly('Sheet1');
	$objExcel=$objReader->load($file);
	$sheetData=$objExcel->getActiveSheet()->toArray('null',true,true,true);
	

	$highestRow=$objExcel->setActiveSheetIndex()->getHighestRow();

	for ($row = 2; $row <=$highestRow ; $row++) {

		$name=$sheetData[$row]['A'];
		$image=$sheetData[$row]['B'];
		$a=$sheetData[$row]['C'];
		$b=$sheetData[$row]['D'];
		$c=$sheetData[$row]['E'];
		$d=$sheetData[$row]['F'];
		$answer=$sheetData[$row]['G'];
		$level=$sheetData[$row]['H'];
		$idsub=$sheetData[$row]['I'];

		$sqlthem="INSERT INTO question VALUES ('','$name','','$a','$b','$c','$d','$answer','$level','$idsub')";
		$conn->exec($sqlthem);
		
		header('Location: cauhoi.php');
	}
}




 ?>