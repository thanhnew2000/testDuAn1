<?php require "./commont/connect.php" ?>	
<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Giáo viên</title>
	<link rel="stylesheet" href="css.css">
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<script src="public/js/jquery-3.4.1.slim.min.js"></script>
	<script src="public/js/popper.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>

</head>
<!-- div.header2 -->
    <?php include_once '_share/client/header.php' ?>
<!-- hết div.header2 -->


</br>

<body style="width:100%;margin: auto;background: #eef1f2">
	
		<div class="container" style="width:1200px">
		<div class="row">
			<img src="image/giaovien.jpg" style="width:100%;height:500px">
		</br>	</br>	
		<div style="margin-bottom: 10px;margin-top:10px ">
			<form action="" method="POST" accept-charset="utf-8">
				
			
			
			<select  class="btn btn-info" name="chonmon">
				<option value="">Chọn Môn</option>
				<?php 
		$sqlsubcategory2="select * from subcategory where id_category=2 ";
		$querysubcategory2=$conn->prepare($sqlsubcategory2);
		$querysubcategory2->execute();
		$rowsubcategory2= $querysubcategory2->fetchAll(PDO::FETCH_ASSOC);
				 ?>

				<?php foreach ($rowsubcategory2 as $value): ?>
					
				
				<option value="<?php echo $value['name_subcategory'] ?>"><?php echo $value['name_subcategory'] ?></option>
					<?php endforeach ?>
				
			</select>
			<button type="submit" class="btn btn-info">Tìm</button>
		
		</form>
			</div>
			<div class="bodygv">
			

<?php if (!isset($_POST['chonmon'])){ ?>
	

			<?php foreach ($rowteacher as  $value){ ?>
				<?php $id=$value['id_teacher']; ?>
				<div class="boxgiaovien">
					<div>
					  <img src="image/logo.png" style="width:50px;position: absolute;">
					<img src="public/images/teacher/<?php echo teacher($id)['image']; ?>" style="width:100%;height:230px">
					</div>
					<p style="font-size:14px;text-align: center; margin-top: 7px"><span style="color: #007bff;font-weight: bold;">
						<?php if ((teacher($id)['gender'])==2){echo 'Cô:';}
						else{echo 'Thầy:';} ?>
							
					
						<?php echo teacher($id)['name']; ?>
							
				
					</p>
			
					<div style="font-size:12px;width:240px;text-align: center;margin-left: 5px">
						<?php  $thongtin=substr(teacher($id)['infomation'],0,350) ?>
						<?php echo  $thongtin.'...'; ?>
					</div>
					<p><p class="gachchan"></p><a href="chitietgiaovien.php?idgiaovien=<?php echo teacher($id)['id_teacher'] ?>" style="font-size: 14px;float: right;margin-right: 10px">Xem thêm</a></p>
					</br>

				</div>
			<?php } ?>
<?php }else if (isset($_POST['chonmon'])){
		$namemon=$_POST['chonmon'];
		$sqlgiaovien2="select * from teacher where specialize like '%$namemon%' ";
		$querygv2=$conn->prepare($sqlgiaovien2);
		$querygv2->execute();
		$rowgv2= $querygv2->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rowgv2 as  $value){
				$id=$value['id_teacher']; ?>
				<div class="boxgiaovien">
					<div>
					  <img src="image/logo.png" style="width:50px;position: absolute;">
					<img src="public/images/teacher/<?php echo teacher($id)['image']; ?>" style="width:100%;height:230px">
					</div>
					<p style="font-size:14px;text-align: center; margin-top: 7px"><span style="color: #007bff;font-weight: bold;">
						<?php if ((teacher($id)['gender'])==2){echo 'Cô:';}
						else{echo 'Thầy:';} ?>
							
					
						<?php echo teacher($id)['name']; ?>
							
				
					</p>
			
					<div style="font-size:12px;width:240px;text-align: center;margin-left: 5px">
						<?php  $thongtin=substr(teacher($id)['infomation'],0,350) ?>
						<?php echo  $thongtin.'...'; ?>
					</div>
					<p><p class="gachchan"></p><a href="chitietgiaovien.php?idgiaovien=<?php echo teacher($id)['id_teacher'] ?>" style="font-size: 14px;float: right;margin-right: 10px">Xem thêm</a></p>
					</br>

				</div>



<?php }} ?>				




			</div>
			
		</div>
		</div>
<div style="height:50px"></div>

		


















<!-- div.header2 -->
    <?php include_once '_share/client/footer.php' ?>
<!-- hết div.header2 -->


</body>
</html>