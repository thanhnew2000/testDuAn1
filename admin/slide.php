<?php require "../commont/connect.php" ?>	
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="cssadmin.css">
	<link rel="stylesheet" href="../public/css/bootstrap.min.css">

	<script src="../public/js/jquery-3.4.1.slim.min.js"></script>
	<script src="../public/js/popper.min.js"></script>
	<script src="../public/js/jquery-3.4.1.min.js"></script>
	<script src="../public/js/bootstrap.min.js"></script>


</head>
<?php if (isset($_POST['soanh'])) {
			upload('capnhapanh','../public/images/advert/');
		$id=$_POST['soanh'];
		$linkanh=$_POST['linkanh'];
		$capnhapanh=$_FILES['capnhapanh']['name'];
			if ($capnhapanh=="") {
			$splanhso="UPDATE slide_advert SET link='$linkanh' WHERE id='$id' ";
			$conn->exec($splanhso);
			header('location: slide.php');
			}else{
			$splanhso="UPDATE slide_advert SET link='$linkanh',image='$capnhapanh' WHERE id='$id' ";
			$conn->exec($splanhso);
			header('location: slide.php');}

}else if (isset($_POST['tieude1'])) {
		upload('anhbia1','../public/images/advert/');
	$tieude=$_POST['tieude1'];
	$anhbia=$_FILES['anhbia1']['name'];
			if ($anhbia=="") {
			$splanhbia="UPDATE slide_advert SET title='$tieude' WHERE id='1' ";
			$conn->exec($splanhbia);
			header('location: slide.php');
			}else {
			$splanhbia="UPDATE slide_advert SET title='$tieude',image='$anhbia' WHERE id='1' ";
			$conn->exec($splanhbia);
			header('location: slide.php');
			}

	
} ?>



<body>
	<div class="w-100">
		<div class="row " style="width: 100%;height:800px">

<!--  MENU -->
 <?php include_once '../_share/admin/menu.php' ?>
 <!-- HẾT MENU -->
		
		<div class="col-md-10" style="background: #ddd">
	
<!--  HEADER -->
 <?php include_once '../_share/admin/header.php' ?>
 <!-- HẾT HEADER -->
			<div class="bodyad">

				<div class="thanbody">
				<p style="font-size: 20px;width:1000px;height:50px;background: white;line-height: 50px;padding-left: 10px;border-radius: 10px;color:#17a2b8;font-weight: bold">QUẢN LÍ SLIDE - QUẢNG CÁO
					
				</p>

				<div class="noidung">
					<p style="margin-left: 10px;font-weight: bold">ẢNH BÌA</p>
					<div style="width:100%;height: 300px;background:none">

						<img  src="../public/images/advert/<?php echo slide_advert(1)['image'] ?>"  data-toggle="modal" data-target="#anh1" alt="" style="width:1030px;height: 300px;position: absolute;">
						<p style="position: relative;padding-top: 100px;margin-left: 50px;font-size: 2rem;width:950px">
						<?php echo slide_advert(1)['title'] ?></p>
					</div>

					<div style="width:100%;height: 420px;background:none;margin-top: 50px">
						<p style="margin-left: 10px;font-weight: bold">QUẢNG CÁO</p>

						<div style="float: left;">
							<img src="../public/images/advert/<?php echo slide_advert(2)['image'] ?>" data-toggle="modal" data-target="#anh2" alt="" style="width:450px;height: 350px">
						</div>

						<div style="float: left;width:250px;margin-left: 10px">
							<img src="../public/images/advert/<?php echo slide_advert(3)['image'] ?>"  data-toggle="modal" data-target="#anh3"  alt="" style="width:250px;height: 170px">
							<img src="../public/images/advert/<?php echo slide_advert(4)['image'] ?>"  data-toggle="modal" data-target="#anh4" alt="" style="width:250px;height: 170px;margin-top: 10px">
						</div>

						<div style="float: left;margin-left: 10px">
							<img src="../public/images/advert/<?php echo slide_advert(5)['image'] ?>" data-toggle="modal" data-target="#anh5" alt="" style="width:300px;height: 350px">
						</div>
						

					</div>

							


				</div>
				<!--  hết div nội dung -->

			<!--  -->
					<!--  ANH 1 -->
					
						
				
				 <div class="modal fade" id="anh1" role="dialog">
			     <div class="modal-dialog" style="color:black">
	
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			       	<h5 class="modal-title">Cập nhập ảnh bìa</h5>
			        <button type="button" class="close" data-dismiss="modal">X</button>
			
			        </div>
			        <div class="modal-body">
			        <form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data" >
			       <p style="font-weight: bold"> Tiêu đề: <input type="text" value="<?php echo slide_advert(1)['title'] ?>" name="tieude1" class="form-control"></p>	
			        <input type="file" name="anhbia1" >

			        </div>
			        <div class="modal-footer">
			        <button type="submit" class="btn btn-primary">Cập nhập</button>
			        </form>
			        </div>
				    </form>
					</div>
					</div>
					</div>
				 </div>


				<!--  ANH 2-3-4-5 -->
				<?php for ($i = 2; $i <=5 ; $i++) { ?>
					
				
				
				 <div class="modal fade" id="anh<?php echo $i ?>" role="dialog">
			     <div class="modal-dialog" style="color:black">
	
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			       	<h5 class="modal-title">Cập nhập ảnh  <?php echo $i ?></h5>
			        <button type="button" class="close" data-dismiss="modal">X</button>
			
			        </div>
			        <div class="modal-body">
			        <form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data" >
			        <p style="font-weight: bold"> Link: <input type="text" name="linkanh" value="<?php echo slide_advert($i)['link'] ?>" class="form-control"></p>			
			        <input type="file" name="capnhapanh" >
			        <input type="text" name="soanh"  hidden="" value="<?php echo $i ?>">


			        </div>
			        <div class="modal-footer">
			        <button type="submit" class="btn btn-primary">Cập nhập</button>
			        </form>
			        </div>
				    </form>
					</div>
					</div>
					</div>
				 </div>
				<?php  } ?>	
		
				<!-- HẾT ẢNH -->

			

			<!--  -->





				</div>
				
			</div>
			<!--  HẾT DIV BODYAD -->
		</div>




		</div>
	</div>

</body>
</html>