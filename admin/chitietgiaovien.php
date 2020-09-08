<?php require "../commont/connect.php";session_start();  ?>	
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
	<script src="../public/ckeditor/ckeditor.js"></script>
</head>



<?php 
if (isset($_GET['idteacher'])) {
	$idteacher=$_GET['idteacher'];
}

 if (isset($_POST['workplacesua'])) {
	if ($_FILES['anhsua']['name']!=="") {
		upload('anhsua','../public/images/teacher/');
	}
}


 if (isset($_POST['workplacesua'])) {
 	
 	$ngayinh=$_POST['ngaysinhsua'];
 	$hoten=$_POST['tensua'];
 	$thongtin=$_POST['infosua'];
 	$sdt=$_POST['sdtsua'];
 	$email=$_POST['emailsua'];
 	$diachi=$_POST['diachisua'];
 	$gioitinh=$_POST['gioitinhsua'];
 	$monday=$_POST['mondaysua'];
 	$anhsua=$_FILES['anhsua']['name'];
 	$bangcap=$_POST['degreesua'];
	$workplace=$_POST['workplacesua'];
	$namknsua=$_POST['namknsua'];

if ($anhsua=="") {
	$splgvsua="UPDATE teacher SET name='$hoten',birthday='$ngayinh',infomation='$thongtin',phone_numbers='$sdt',email='$email',address='$diachi',gender='$gioitinh',specialize='$monday',degree='$bangcap',workplace='$workplace',experience_time='$namknsua' WHERE id_teacher='$idteacher' ";
	$conn->exec($splgvsua);
	$ketqua="Sửa thành công";


}else {

	$splgvsua="UPDATE teacher SET name='$hoten',birthday='$ngayinh',infomation='$thongtin',phone_numbers='$sdt',email='$email',address='$diachi',gender='$gioitinh',specialize='$monday',image='$anhsua',degree='$bangcap',workplace='$workplace',experience_time='$namknsua'
	WHERE id_teacher='$idteacher' ";
	$conn->exec($splgvsua);
	$ketqua="Sửa thành công";
}

	


 }


 ?>


<body style="margin:auto">
	<div class="w-100" style="margin:auto"	>
		<div class="row " style="width: 100%;">
	<!--  MENU -->
 <?php include_once '../_share/admin/menu.php' ?>
 <!-- HẾT MENU -->
		
		<div class="col-md-10" style="background: #ddd">
	<!--  HEADER -->
 <?php include_once '../_share/admin/header.php' ?>
 <!-- HẾT HEADER -->
			<div class="bodyad" style="width:1100px">
				<div class="thanbody">
				<p style="font-size: 20px;width:1000px;height:50px;background: white;line-height: 50px;padding-left: 10px;border-radius: 10px;color: #17a2b8;font-weight: bold">QUẢN LÍ GIÁO VIÊN </p>


				<div class="noidung">
					<div class="row">
						<div class="col-md-4">
							<div class="anhgv">
								<img src="../public/images/teacher/<?php echo teacher($idteacher)['image']  ?>" style="width:100px;height:100px;border-radius: 100px;">
								<p style="font-weight: bold"><?php echo teacher($idteacher)['name'] ?></p>
							</div>
							<p style="text-align: center;">
							<?php if (isset($ketqua)) {
								echo $ketqua;
							} ?>
						</p>
						</div>
						<div class="col-md-7">
							<p style="font-weight: bold ;font-size: 18px">Hồ sơ cá nhân
								<a href="giaovien.php"  style="margin-left: 350px" class="btn btn-info">Quay về</a></p>
							<div class="row">
								<div class="col-md-6">
						<form method="POST" accept-charset="utf-8" enctype="multipart/form-data">
									<span style="font-weight: bold">Công tác</span>
									<input type="text" class="form-control" name="workplacesua" value="<?php echo teacher($idteacher)['workplace'] ?>">
								</div>
									<div class="col-md-6">
								<span style="font-weight: bold">	Email</span>
									<input type="Email" class="form-control" name="emailsua"
									value="<?php echo teacher($idteacher)['email'] ?>">
								</div>
							</div>
								<div class="row">
								<div class="col-md-6">
								<span style="font-weight: bold">	Họ tên</span>
									<input type="text" class="form-control" name="tensua" value="<?php echo teacher($idteacher)['name'] ?>">
								</div>
									<div class="col-md-6">
								<span style="font-weight: bold">	SĐT</span>
									<input type="text" class="form-control" name="sdtsua" value="<?php echo '0'.teacher($idteacher)['phone_numbers'] ?>">
								</div>
							</div>


								<div class="row">
								<div class="col-md-6">
										<span style="font-weight: bold">Ngày sinh </span>
								<input type="date" name="ngaysinhsua" value="<?php echo teacher($idteacher)['birthday'] ?>" class="form-control">
								</div>
									<div class="col-md-6">
								<span style="font-weight: bold">Ảnh</span>
									<input type="file"  class="form-control" name="anhsua" value ="">
								</div>
							</div>
						<div class="row">
							<div class="col-md-9">
							<span style="font-weight: bold">Địa chỉ </span>
							<input type="text" name="diachisua" value="<?php echo teacher($idteacher)['address'] ?>" class="form-control">
						</div>
							<div class="col-md-3">
							<span style="font-weight: bold">Năm - KN</span>
							<input type="number" name="namknsua" value="<?php echo teacher($idteacher)['experience_time'] ?>" class="form-control">
						</div>
						</div>

							<div class="row">
								<div class="col-md-4">
								<span style="font-weight: bold">	Giới tính </span>
									<select name="gioitinhsua" class="form-control" >
										<?php if ((teacher($idteacher)['gender'])==1){ ?>
										<option value="1" selected="">Nam</option>
										<option value="2">Nữ</option>
									<?php }else{  ?>
										<option value="1">Nam</option>
										<option value="2" selected="">Nữ</option>
									<?php } ?>
										
									</select>
								</div>
								<div class="col-md-4">
								<span style="font-weight: bold">Môn dạy </span>
									<input type="text" name="mondaysua" class="form-control" value="<?php echo teacher($idteacher)['specialize'] ?>">
								</div>
								<div class="col-md-4">
								<span style="font-weight: bold">	Học vị </span>
									<input type="text" name="degreesua" class="form-control" 
									value="<?php echo teacher($idteacher)['degree'] ?>">
								</div>
							</div>

							<span style="font-weight: bold">Thông tin : </span>
							<textarea    name="infosua" rows="8" class="form-control"> <?php 
							echo teacher($idteacher)['infomation']; ?>
							</textarea>

							<button type="submit" class="btn btn-info" style="margin-left: 250px">Cập nhập thông tin</button>
						</div>

					</div>
</form>
	<script>
           CKEDITOR.replace( 'editor1' );
       </script>

					
				</div>
				</div>
				
			</div>
		</div>




		</div>
	</div>
</body>
</html>