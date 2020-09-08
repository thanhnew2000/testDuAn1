<?php require "../commont/connect.php" ?>	
<?php session_start();
if (isset($_GET['idtk'])) {
 	
 	$idtk=$_GET['idtk'];
 } ?>
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
	<script src="../public/js/bootstrap.min.js"></script>
</head>
<?php if (isset($_GET['idtk'])){
	$idtk=$_GET['idtk'];
} ?>
	

<?php if (isset($_POST['suarole'])) {
	$iduser=$_GET['idtk'];
	$suarole=$_POST['suarole'];
	$suastatus=$_POST['status'];

	$sqlcntk=" UPDATE users SET status='$suastatus',role_id='$suarole' where id_user='$iduser' ";
	$conn->exec($sqlcntk);
	header("location: taikhoan.php");
	
} ?>







<body>
	<div class="w-100">
		<div class="row " style="width: 100%;height:655px">

 <!--  MENU -->
 <?php include_once '../_share/admin/menu.php' ?>
 <!-- HẾT MENU -->
	

		
		<div class="col-md-10" style="background: #ddd">
<!--  HEADER -->
 <?php include_once '../_share/admin/header.php' ?>
 <!-- HẾT HEADER -->
			<div class="bodyad">
				<div class="thanbody">
				<p style="font-size: 20px;width:1000px;height:50px;background: white;line-height: 50px;padding-left: 10px;border-radius: 10px;color:#17a2b8;font-weight: bold">CHI TIẾT TÀI KHOẢN</p>
		<form action="" method="POST" accept-charset="utf-8">
				<div class="noidung">
					<div class="row">
						<div class="col-md-4">
							<div class="anhgv">
								<img src="../public/images/user/<?php echo users($idtk)['image'] ?>" style="width:100px;height:100px;border-radius: 100px;">
								<p style="font-weight: bold"> id: <?php echo $idtk ?></p>
							</div>
						</div>
						<div class="col-md-7">
							<p style="font-weight: bold ;font-size: 18px;color:  #17a2b8">Hồ sơ cá nhân</p>
							<div class="row">


								<div class="col-md-6">
									<span style="font-weight: bold"> Name :</span>
									 <?php echo users($idtk)['name'] ?>
								</div>
									<div class="col-md-6">
								<span style="font-weight: bold">Email:</span>
									 <?php echo users($idtk)['email'] ?>
								</div>
							</div>
								<div class="row">
								<div class="col-md-6">
									<span style="font-weight: bold">Phone :</span>
									 <?php echo '0'.users($idtk)['phone_numbers'] ?>
								</div>
									<div class="col-md-6">
									<span style="font-weight: bold">Ngày sinh:</span>
									 <?php echo users($idtk)['birthday'] ?>
								</div>
							</div>

								<span style="font-weight: bold">Địa chỉ :</span>
								 <?php echo users($idtk)['address'] ?>
							<div class="row">
								<div class="col-md-9">
									<span style="font-weight: bold">Giới tính:</span>
									<?php if (users($idtk)['gender']==1) {
										echo 'Nam';
									}else if (users($idtk)['gender']==2) {
										echo 'Nữ';
									} ?>
								</div>
				
				
					
								<!-- ROLE -->
								<div class="col-md-4">
								<span style="font-weight: bold">Role :</span>
								<select name="suarole" class="form-control" >
							
								<?php foreach ($rowrole as $value){ ?>
										<option value="<?php echo $value['id_role'];  ?>" <?php if (users($idtk)['role_id']=$value['id_role']){echo 'selected';} ?>><?php echo $value['name_role'] ?></option>
									<?php } ?>
								
										
									</select>
								</div>
								<!-- TRẠNG THÁI -->
								<div class="col-md-4">
										<span style="font-weight: bold">Trạng thái :</span>
									<select name="suastatus" class="form-control" >
										<?php if (users($idtk)['status']==1){ ?>
										<option value="1" selected="">Hoạt động</option>
										<option value="0">Khóa</option>
									<?php } elseif (users($idtk)['status']==0) {?>
										<option value="1">Hoạt động</option>
										<option value="0" selected>Khóa</option>
											<?php } ?>
									</select>
								</div>
							</div>

					

							<button type="submit" class="btn btn-info" style="margin-left: 250px">Cập nhập thông tin</button>

						</form>
						</div>

					</div>

					
				</div>
				</div>
				
			</div>
		</div>




		</div>
	</div>
</body>
</html>