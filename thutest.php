<?php require "./commont/connect.php" ?>	

<?php if (isset($_POST['abc'])){
	if ($_POST['abc']=="") {
		echo 'ko';
		
	}else {
		echo 'co';
	}
 }  ?>

<form action="" method="POST" accept-charset="utf-8">
	<input type="text" name="abc">
	<button type="submit">Gui</button>

</form>

