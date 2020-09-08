<?php require "./commont/connect.php" 	;
 session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Chia sẻ</title>
		<link rel="stylesheet" href="css.css">
		<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<script src="public/js/jquery-3.4.1.slim.min.js"></script>
	<script src="public/js/popper.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
	
</head>
<?php if (isset($_SESSION['account']['id'])){
	$iduser=$_SESSION['account']['id'];
} ?>
<?php if (isset($_POST['ndchiase'])) {
	$time=date('Y-m-d H:i:s');
	$iduser=$_SESSION['account']['id'];
	$noidung=$_POST['ndchiase'];

	$sqlthemchiase = "INSERT INTO share VALUES ('','$iduser','$noidung','0','$time')";
 	$conn->exec($sqlthemchiase);?>
	<script type="text/javascript">alert('Gửi thành công')</script>

	
<?php } ?>
<body>

	<!-- div.header2 -->
    <?php include_once '_share/client/header.php' ?>
<!-- hết div.header2 -->
</br>
		<div style="background-image: url(image/5.jpg);width:100%;height:200px;">
				<div style="background-image: url(image/Untitled-1.png);width:100%;height:200px;">
	
				<p style=" color: white;line-height:200px;text-align:center;font-size: 25px">
					Góc chia sẻ
				</p>
			</div>
		</div>


		<?php 

		$sqlchiase="select * from share where status='1' or status='2' order by id_share desc limit 5  ";
		$querychiase=$conn->prepare($sqlchiase);
		$querychiase->execute();
		$rowchiase=$querychiase->fetchAll(PDO::FETCH_ASSOC);


		 ?>

		<div class="row" style="width:1347px;margin: auto">
			<div class="col-md-5 offset-md-1">
				<p style="font-weight: bold;font-size: 20px;">Các chia sẻ</p>
				<div>

			<?php foreach ($rowchiase as $value){ $idnguoidung=$value['id_user'];?>
			
			
					<div style="width:100%;background: none;margin-top: 5px">
						<img src="public/images/user/<?php echo users($idnguoidung)['image'] ?>" alt="" style="width:80px;height:70px;border-radius: 100%;float: left;">
						<p style="margin-left: 100px;height:10px;font-weight: bold"><?php echo users($idnguoidung)['name'] ?></p>
						<p style="margin-left: 100px;font-size: 14px"><?php echo $value['content'] ?></p>
						<p style="height:1px;background:gray;width:100%;margin-top: 25px"></p>
					</div>

				<?php }  ?>









				</div>
			</div>
			<div class="col-md-5">
				<form action="" method="POST" accept-charset="utf-8">
					
				
				
				<p style="font-weight: bold;font-size: 20px">Nội dung chia sẻ</p>
			
		
				<p style="margin-top:20px">Nội dung</p>
				<textarea rows="5" name="ndchiase" class="form-control" ></textarea> 
				<button type="submit" class="btn btn-info" style="float: right;margin-top: 10px">Gửi chia sẻ</button>
			</form>
			</div>
		</div>








</body>
</html>