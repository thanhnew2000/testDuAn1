<?php require "./commont/connect.php" ?>	
<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cá nhân</title>
		<link rel="stylesheet" href="css.css">
		<link rel="stylesheet" href="public/css/bootstrap.min.css">
		<script src="public/js/jquery-3.4.1.slim.min.js"></script>
		<script src="public/js/popper.min.js"></script>
		<script src="public/js/bootstrap.min.js"></script>
</head>

<?php if (isset($_POST['tencn'])) {
	$iduser=$_SESSION['account']['id'];
	$tencn=$_POST['tencn'];
	$birthcn=$_POST['birthcn'];
	$gendercn=$_POST['gendercn'];
	$addresscn=$_POST['addresscn'];

	$sqlcn=" UPDATE users SET name='$tencn',birthday='$birthcn',gender='$gendercn',address='$addresscn' where id_user='$iduser' ";
	$conn->exec($sqlcn);
	header('location: thongtincanhan.php');

} ?>

<?php if (isset($_POST['mkcu'])) {
	$mkcu=$_POST['mkcu'];
	$mkmoi1=$_POST['mkmoi1'];
	$mkmoi2=$_POST['mkmoi2'];
	if (password_verify($mkcu,$_SESSION['account']['password'])) {
		if ($mkmoi1==$mkmoi2) {
							$iduser=$_SESSION['account']['id'];
							$mahoamk=password_hash($mkmoi1, PASSWORD_DEFAULT);
							$sqldoimk="UPDATE users SET password='$mahoamk' where id_user='$iduser' ";
							$conn->exec($sqldoimk);
							$ketquadoimk = 'ĐỔI MẬT KHẨU THÀNH CÔNG';
			
		}else  {
			$ketquadoimk='Mật khẩu mới không trùng khớp';
			
		}
	}else if (!password_verify($mkcu,$_SESSION['account']['password'])) {
		$ketquadoimk='Mật khẩu cũ không đúng';
		
	}


	
} ?>

<?php if (isset($_FILES['anhusermoi'])){
		upload('anhusermoi','public/images/user/');
	$iduser=$_SESSION['account']['id'];
	 $anhusermoi=$_FILES['anhusermoi']['name'];
	 $sqldoianh="UPDATE users SET image='$anhusermoi' where id_user='$iduser'";
							$conn->exec($sqldoianh);
					header('location: thongtincanhan.php');
	
} ?>





<style type="text/css" media="screen">
	table td:hover{}
	a:hover{text-decoration: none}
</style>


<body style="background: #ddd">
<!-- div.header2 -->
    <?php include_once '_share/client/header.php' ?>
<!-- hết div.header2 -->

<div style="background-image: url(image/5.jpg);width:100%;height:250px;">
				<div style="background-image: url(image/Untitled-1.png);width:100%;height:250px;">
	
				
			<div style=" color: white;padding-top:1px;margin-left: 50px;font-size: 17px">
			<div style="width:150px;height:100px;background: none;margin-top: 140px;margin-left: 100px">

			<img src="public/images/user/<?php echo users($_SESSION['account']['id'])['image']; ?>"  style="width:150px;height:150px">
			<img src="image/mayanh.png"  data-toggle="modal" data-target="#myModal"  style="width:45px;height:30px;position: absolute;margin-left: -150px;margin-top: 120px">
			  <!-- Modal -->
			  <div class="modal fade" id="myModal" role="dialog">
			    <div class="modal-dialog" style="color:black">
	
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			       	<h5 class="modal-title">Cập nhập ảnh </h5>
			          <button type="button" class="close" data-dismiss="modal">X</button>
			
			        </div>
			        <div class="modal-body">
			        <form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
			        		
			         <input type="file" name="anhusermoi" >

			        </div>
			        <div class="modal-footer">
			           <button type="submit"  class="btn btn-primary">Cập nhập</button>
			       </form>
			        </div>
			      </div>
			      
			    </div>
			  </div>

		</div>
				</div>
			</div>

			</div>



<div class="ttcnbody">
	<div class="row">

		<div style="background: white;width:300px;height:300px;text-align: center;border-radius: 5%;float: left;font-size: 14px">
			<table class="table">
			
				<tbody>
			<!--  -->
					<tr>
						<td><a href="thongtincanhan.php">Thông tin cá nhân</a></td>
					</tr>
					<tr>
						<td><a href="thongtincanhan.php?doimatkhau">Đổi mật khẩu</a></td>
					</tr>
					<tr>
						<td><a href="ketquade.php?ketqua">Kết quả làm đề</a></td>
					</tr>
						<tr>
						<td><a href="lichsu.php?ketqua">Lịch sử xem</a></td>
					</tr>
				</tbody>
			</table>
			
		</div>
		<?php if (!isset($_GET['doimatkhau'])){ ?>
			
		

		<div style="background: white;width:700px;height:500px;border-radius: 5%;margin-left: 50px">
			<div class="bodyphaittcn">
				<p style="text-align: center;font-weight: bold">Thông tin cá nhân </p>
				<div>
					<p style="font-size: 14px;font-weight: bold">Cập nhật thông tin cá nhân</p>
					<div class="row">

						<div class="col-md-2" style="background: white">
							<p>Họ và tên</p>
							<p>Ngày sinh</p>
							<p>Giới tính</p>
							<p>SĐT</p>
							<p>Email</p>
							<p style="margin-top: 30px">Địa chỉ</p>
						</div>
						<div class="col-md-8" style="background: white">
					<form method="POST">
							<input  type="text" class="form-control" name="tencn" value="<?php echo users($_SESSION['account']['id'])['name']; ?>">
							<input type="date" class="form-control" name="birthcn" value="<?php echo users($_SESSION['account']['id'])['birthday']; ?>">
							<select name="gendercn" class="form-control" style="margin-top: 5px;">
								<?php $iduser=$_SESSION['account']['id']; ?>
								<?php if ((users($iduser)['gender'])=='1'){ ?>
								<option value="1" selected="">Nam</option>
								<option value="2">Nữ</option>
								<?php }elseif ((users($iduser)['gender'])=='2') {  ?>
								<option value="1">Nam</option>
								<option value="2" selected="">Nữ</option>
								<?php } ?>
							
							</select>
							<input type="number" class="form-control" name="" disabled="" value="<?php echo '0'.users($_SESSION['account']['id'])['phone_numbers']; ?>">
							<input type="email" class="form-control" name="" disabled value="<?php echo users($_SESSION['account']['id'])['email']; ?>">
							<input type="text" class="form-control" name="addresscn"  value="<?php echo users($_SESSION['account']['id'])['address']; ?>">
						</div>
						<button type="submit" class="btn btn-primary" style="margin: auto;margin-top: 10px">Cập nhập thông tin</button>
					</form>
					</div>

				</div>
			</div>
		</div>

	<?php }elseif (isset($_GET['doimatkhau'])) {?>

				<div style="background: white;width:700px;height:350px;border-radius: 5%;margin-left: 50px">
			<div class="bodyphaittcn" style="height:300px">
				<p style="text-align: center;font-weight: bold">Đổi mật khẩu</p>
				<div>
				
					<div class="row">

						<div class="col-md-3" style="background: white">
							<p>Mật khẩu cũ</p>
							<p>Mật khẩu mới</p>
							<p>Nhập lại mật khẩu mới</p>
							
						</div>
						<div class="col-md-8" style="background: white">

					<form action="" method="POST" accept-charset="utf-8">
								
								
							
							<input  type="password" class="form-control" name="mkcu">
							<input  type="password" class="form-control" name="mkmoi1">
							<input  type="password" class="form-control" name="mkmoi2">
							
								
							
						</div>
						<button type="submit" class="btn btn-primary" style="margin: auto;margin-top: 10px">Đổi mật khẩu</button>

						</form>

					</div>
					<?php if (isset($ketquadoimk)){ echo $ketquadoimk;}?>
				</div>
			</div>
		</div>
		
	<?php } ?>


	</div>
</div>


	

<!-- div.header2 -->
    <?php include_once '_share/client/footer.php' ?>
<!-- hết div.header2 -->
	</div>
	
	
</body>
</html>