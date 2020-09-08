<?php  require "./commont/connect.php" ;?>	
<?php session_start(); 
if (isset($_POST['diem'])){
		$diem=$_POST['diem'];
		$iduser=$_POST['iduser'];
		$idtest=$_POST['idtest'];

			$sqlluuketqua="INSERT INTO result_test VALUES ('','$iduser','$idtest','$diem')";
  			$connketqua->exec($sqlluuketqua);
  			header("location: ketquade.php?ketqua");
} ?>	
	
