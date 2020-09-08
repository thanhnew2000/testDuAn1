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
<!-- 
<?php if (isset($_POST['namerolesua'])) {
	$namerolesua=$_POST['namerolesua'];
	$idrole=$_GET['idrole'];

	$sqlcntk=" UPDATE role SET name_role='$namerolesua' where id_role='$idrole' ";
	$conn->exec($sqlcntk);
	header("location: taikhoan.php?role=ok");
	
	
} ?> -->

<?php if (isset($_GET['xoaid'])) {
	$xoaid=$_GET['xoaid'];
	$sqlxoacomment="DELETE FROM comment WHERE id_comment='$xoaid' " ;
	$conn->exec($sqlxoacomment);
	header('location: binhluan.php');
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
				<p style="font-size: 20px;width:1000px;height:50px;background: white;line-height: 50px;padding-left: 10px;border-radius: 10px;color:#17a2b8;font-weight: bold"><?php if (isset($_GET['chitietbl'])){echo 'CHI TIẾT BÌNH LUẬN';}else {
					echo 'QUẢN LÍ BÌNH LUẬN';
				} ?>
					
				</p>

				<div class="noidung">
<?php if (!isset($_GET['chitietbl'])){ ?>
						
				
				<!-- 	<a href="taikhoan.php?role=ok" class="btn btn-info">Chỉnh sửa role </a> -->
					<table class="table table-striped">
						<thead>
							<tr>
								<th>ID Bình luận</th>
								<th>Nội dung</th>
								<th>ID khóa học</th>
							<!-- 	<th>thong_tin</th> -->
								<th>ID User</th>
								<th>Thời gian</th>
					
							
								

							<!-- 	<th>header</th> -->
								<th colspan="3">Chức năng</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($rowcomment as $value){?>
								
							
							<tr>
								<td><?php echo $value['id_comment']; ?></td>
								<td style="font-size: 14px"><?php echo $value['content']; ?></td>
								<td><?php echo $value['id_course']; ?></td>
								<td><?php echo $value['id_user']; ?></td>
								<td><?php echo $value['date_time']; ?></td>
						
								<td><a href="binhluan.php?chitietbl=<?php echo $value['id_comment']; ?> "  class="btn btn-info">Chi tiết</a>	
								<a href="binhluan.php?xoaid=<?php  echo $value['id_comment'];  ?>" onclick="return confirm('Bạn có muốn xóa bình luận này')"  class="btn btn-danger">Xóa</a>
								</td>
							</tr>
						<?php } ?>
							
						
						</tbody>
					</table>

<?php }elseif (isset($_GET['chitietbl'])) { $idbl=$_GET['chitietbl']; $idkh=comment($idbl)['id_course']; ?>
							

							<div class="row">
								<div class="col-md-5">
									<a href="binhluan.php"  class="btn btn-info">Quay về</a>	
												
							<div class="input-group mb-3" style="margin-top: 8px">
								    <div class="input-group-prepend">
								    <span class="input-group-text">ID Bình luận</span>
								    </div>
								    <input type="text" name="athem" disabled="" value="<?php echo $idbl ?>" class="form-control">
							 </div>		
							 	<div class="input-group mb-3" style="margin-top: 8px">
								    <div class="input-group-prepend">
								    <span class="input-group-text">Nội dung</span>
								    </div>
								    <textarea style="font-size: 14px" name=""  disabled="" class="form-control"><?php echo comment($idbl)['content']; ?></textarea>
							 </div>		

							 	<div class="input-group mb-3" style="margin-top: 8px">
								    <div class="input-group-prepend">
								    <span class="input-group-text">ID Khóa học</span>
								    </div>
								    <input type="text"  disabled="" value="<?php echo comment($idbl)['id_course']; ?>" name="athem" class="form-control">
							 </div>	
							 	<div class="input-group mb-3" style="margin-top: 8px">
								    <div class="input-group-prepend">
								    <span class="input-group-text">Tên bài giảng</span>
								    </div>
								    <input type="text"  disabled="" value="<?php echo course($idkh)['name_course']; ?>" name="" class="form-control">
								    <a href="../chitietkhoahoc.php?idkh=<?php echo $idkh ?>" class="btn btn-info" style="margin-left: 10px">XEM</a>
							 </div>			
								

								<div class="row">
									<div class="col-md-5">
										  	<div class="input-group mb-3" style="margin-top: 8px">
								    <div class="input-group-prepend">
								    <span class="input-group-text">ID user</span>
								    </div>
								    <input type="text"  disabled="" value="<?php echo comment($idbl)['id_user']; ?>" name="athem" class="form-control">
									 </div>		
									</div>
										<div class="col-md-7">
										  	<div class="input-group mb-3" style="margin-top: 8px">
								    <div class="input-group-prepend">
								    <span class="input-group-text">Thời gian</span>
								    </div>
								    <input type="text"   disabled=""  value="<?php echo comment($idbl)['date_time']; ?>"name="athem" class="form-control">
									 </div>		
									</div>
									
								</div>
										
							

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