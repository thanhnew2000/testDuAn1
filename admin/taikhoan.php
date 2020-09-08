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
<?php if (isset($_POST['namerolesua'])) {
	$namerolesua=$_POST['namerolesua'];
	$idrole=$_GET['idrole'];

	$sqlcntk=" UPDATE role SET name_role='$namerolesua' where id_role='$idrole' ";
	$conn->exec($sqlcntk);
	header("location: taikhoan.php?role=ok");
	
	
} ?>

<?php if (isset($_GET['xoaid'])) {
	$xoaid=$_GET['xoaid'];
	$sqlxoatk="DELETE FROM users WHERE id_user='$xoaid' " ;
	$conn->exec($sqlxoatk);
	header('location: taikhoan.php');
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
				<p style="font-size: 20px;width:1000px;height:50px;background: white;line-height: 50px;padding-left: 10px;border-radius: 10px;color:#17a2b8;font-weight: bold"><?php if (isset($_GET['role'])){echo 'ROLE';}else {
					echo 'QUẢN LÍ TÀI KHOẢN';
				} ?>
					
				</p>

				<div class="noidung">
<?php if (!isset($_GET['role'])){ ?>
						
				
					<a href="taikhoan.php?role=ok" class="btn btn-info">Chỉnh sửa role </a>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>id_user</th>
								<th>name</th>
								<th>phone</th>
							<!-- 	<th>thong_tin</th> -->
								<th>email</th>
								<th>birthday</th>
								<th>gender</th>
								<th>status</th>
								<th>role_id</th>
								

							<!-- 	<th>header</th> -->
								<th colspan="3">Chức năng</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($rowtaikhoan as $value){?>
								
							
							<tr>
								<td><?php echo $value['id_user']; ?></td>
								<td><?php echo $value['name']; ?></td>
								<td><?php echo '0'.$value['phone_numbers']; ?></td>
								<td><?php echo $value['email']; ?></td>
								<td><?php echo $value['birthday']; ?></td>
								<td><?php echo $value['gender']; ?></td>
								<td><?php if ($value['status']==1) {	
									echo 'Hoạt động'	;
								}elseif ($value['status']==0) {
									echo 'Khóa'	;
								} ?></td>
								<td><?php echo $value['role_id']; ?></td>
								<td><a href="chitiettaikhoan.php?idtk=<?php echo $value['id_user'];  ?>"  class="btn btn-info">Chi tiết</a>	
								<a href="taikhoan.php?xoaid=<?php echo $value['id_user'];  ?>" onclick="return confirm('Bạn có muốn xóa tài khoản này')"  class="btn btn-danger">Xóa</a>
								</td>
							</tr>
						<?php } ?>
							
						
						</tbody>
					</table>

<?php }elseif (isset($_GET['role'])) { ?>
							
							<div class="row">
								<div class="col-md-5">
									<a href="taikhoan.php"  class="btn btn-info">Quay về</a>	
									<table class="table">
										<thead>
											<tr>
												<th>ID</th>
												<th>Tên quyền</th>
												<th>Chức năng</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($rowrole as $value){ ?>
												
										<form  method="POST" accept-charset="utf-8">
											
											
										
											<tr>
												<td><?php echo $value['id_role'] ?></td>
												<td><input type="" style="margin-top: 10px" class="form-control" 
												<?php if (!isset($_GET['idrole'])){ echo 'disabled';  }
													if ((isset($_GET['idrole']))&&($_GET['idrole']!=$value['id_role'])){ echo 'disabled';  }
													if ((isset($_GET['idrole']))&&($_GET['idrole']==$value['id_role'])) {
														echo "name='namerolesua'";
													}
												?>
												 	
											
												  value="<?php echo $value['name_role'] ?>"></td>

												<td><!-- <button type="button" onclick="suatenrole()" class="btn btn-info">Sửa</button> -->
													<?php if (!isset($_GET['idrole'])){ ?>
														<a href="taikhoan.php?idrole=<?php echo $value['id_role'];  ?>&&role=ok"  class="btn btn-info">Thay đổi</a>	
													<?php }elseif ((isset($_GET['idrole']))&&($_GET['idrole']!=$value['id_role'])) { ?>
														<a href="taikhoan.php?idrole=<?php echo $value['id_role'];  ?>&&role=ok"  class="btn btn-info">Thay đổi</a>	
												<?php  	}elseif (isset($_GET['idrole'])) { ?>
														<button type="submit" class="btn btn-info">Sửa</button>
														<a href="taikhoan.php?role=ok"  class="btn btn-info">Hủy</a>	
													<?php } ?>
													
												</tr>	
										<?php } ?>
										</form>
										</tbody>
									</table>
								</div>
							</div>
<!-- 
<script type="text/javascript">
	function suatenrole(){
		document.getElementById()
	}
</script> -->




							
						<?php } ?>
				</div>
				</div>
				
			</div>
		</div>




		</div>
	</div>
</body>
</html>