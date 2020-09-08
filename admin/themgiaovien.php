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
		<script type="text/javascript" src="../public/ckeditor/ckeditor.js"></script>
</head>

<?php 
if (isset($_POST['tengvthem'])) {
	upload('anhgvthem','../public/images/teacher/');
	$ten=$_POST['tengvthem'];
	$birthday=$_POST['birthdaygvthem'];
	$sdt=$_POST['sdtgvthem'];
	$email=$_POST['emailgvthem'];
	$diachi=$_POST['diachigvthem'];
	$gioitinh=$_POST['gendergvthem'];
	$monday=$_POST['mondaygvthem'];
	$anh=$_FILES['anhgvthem']['name'];
	$bangcap=$_POST['degreegvthem'];
	$workplace=$_POST['workplacegvthem'];
	$thongtin=$_POST['infogvthem'];
	$namknthem=$_POST['namknthem'];

	$sqlthemgiaovien="INSERT INTO teacher VALUES ('','$ten','$birthday','$thongtin','$sdt','$email','$diachi','$gioitinh','$monday','$anh','$bangcap','$workplace','$namknthem')";
  	$conn->exec($sqlthemgiaovien);
  	$last_idgiaovien = $conn->lastInsertId();
  	header("location: chitietgiaovien.php?idteacher=$last_idgiaovien");

}
 ?>


<body>
	<div class="w-100">
		<div class="row " style="width: 100%">
	<!--  MENU -->
 <?php include_once '../_share/admin/menu.php' ?>
 <!-- HẾT MENU -->

		
		<div class="col-md-10" style="background: #ddd">
		<!--  HEADER -->
 <?php include_once '../_share/admin/header.php' ?>
 <!-- HẾT HEADER -->
			<div class="bodyad" style="width:1100px">
				<div class="thanbody">
				<p style="font-size: 20px;width:1000px;height:50px;background: white;line-height: 50px;padding-left: 10px;border-radius: 10px;color: #17a2b8;font-weight: bold">QUẢN LÍ GIÁO VIÊN - THÊM GIÁO VIÊN</p>

				<div class="noidung">
					<div class="row">
					<div class="col-md-5">
			<form method="POST"  accept-charset="utf-8" enctype="multipart/form-data">
						<div class="input-group mb-3" style="margin-top: 8px">
						    <div class="input-group-prepend">
						    <span class="input-group-text">Tên</span>
						    </div>
						    <input type="text" name="tengvthem" class="form-control">
						</div>

						<div class="input-group mb-3" style="margin-top: 8px">
						    <div class="input-group-prepend">
						    <span class="input-group-text">Ngày sinh</span>
						    </div>
						    <input type="date" name="birthdaygvthem" class="form-control">
						</div>

						<div class="input-group mb-3" style="margin-top: 8px">
						    <div class="input-group-prepend">
						    <span class="input-group-text">Số điện thoại</span>
						    </div>
						    <input type="text" name="sdtgvthem" class="form-control">
						</div>

						<div class="input-group mb-3" style="margin-top: 8px">
						    <div class="input-group-prepend">
						    <span class="input-group-text">Email</span>
						    </div>
						    <input type="text" name="emailgvthem" class="form-control">
						</div>


						<div class="input-group mb-3" style="margin-top: 8px">
						    <div class="input-group-prepend">
						    <span class="input-group-text">Địa chỉ</span>
						    </div>
						    <input type="text" name="diachigvthem" class="form-control">
						</div>

						<div class="input-group mb-3" style="margin-top: 8px">
						    <div class="input-group-prepend">
						    <span class="input-group-text">Giới tính</span>
						    </div>
						    <select name="gendergvthem" class="form-control">
						    	<option value="1">Nam</option>
						    	<option value="2">Nữ</option>
						    
						    </select>
						</div>

						<div class="input-group mb-3" style="margin-top: 8px">
						    <div class="input-group-prepend">
						    <span class="input-group-text">Chuyên môn</span>
						    </div>
						    <input type="text" name="mondaygvthem" class="form-control">
						</div>

						<div class="input-group mb-3" style="margin-top: 8px">
						    <div class="input-group-prepend">
						    <span class="input-group-text">Image</span>
						    </div>
						    <input type="file" name="anhgvthem" class="form-control">
						</div>
						
						<div class="input-group mb-3" style="margin-top: 8px">
						    <div class="input-group-prepend">
						    <span class="input-group-text">Bằng cấp</span>
						    </div>
						    <input type="text" name="degreegvthem" class="form-control">
						</div>

						<div class="input-group mb-3" style="margin-top: 8px">
						    <div class="input-group-prepend">
						    <span class="input-group-text">Nơi làm việc</span>
						    </div>
						    <input type="text" name="workplacegvthem" class="form-control">
						</div>
						<div class="input-group mb-3" style="margin-top: 8px">
						    <div class="input-group-prepend">
						    <span class="input-group-text">Năm kinh nghiệm</span>
						    </div>
						    <input type="number" name="namknthem" class="form-control">
						</div>

					</div>
					<div class="col-md-6">
						<div class="input-group mb-3" style="margin-top: 8px">
						    <div class="input-group-prepend">
						    <span class="input-group-text">THÔNG TIN VỀ GIÁO VIÊN</span>
						    </div>
						</div>
						    


							
							<textarea name="infogvthem" rows="10"  class="form-control"></textarea>
							<button type="submit" class="btn btn-info" style="width: 100%" >THÊM GIÁO VIÊN</button>
							<a href="" class="btn btn-info" style="width: 100%" >QUAY VỀ</a>
					</form>
						</div>
						
					</div>


	<script>
 
           CKEDITOR.replace( 'editor1' );
       </script>


					</div>

					
				</div>
				</div>
				
			</div>
		</div>




		</div>
	</div>
</body>
</html>