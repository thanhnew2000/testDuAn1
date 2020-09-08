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
</head>

<?php 
if (isset($_GET['xoaid'])) {
	$idxoa=$_GET['xoaid'];


		$sqlxoagv="DELETE FROM teacher WHERE id_teacher='$idxoa' " ;
		$conn->exec($sqlxoagv);
		header("location: giaovien.php");
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
			<div class="bodyad">
				<div class="thanbody">
				<p style="font-size: 20px;width:1000px;height:50px;background: white;line-height: 50px;padding-left: 10px;border-radius: 10px;color: #17a2b8;font-weight: bold">QUẢN LÍ GIÁO VIÊN</p>

				<div class="noidung">
					<a href="themgiaovien.php" class="btn btn-info">Thêm giáo viên</a>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>ID GV</th>
								<th>HỌ VÀ TÊN</th>
								
								<th>NGÀY SINH</th>
								<th>EMAIL</th>
								<th>SỐ ĐIỆN THOẠI</th>
								<th>MÔN</th>
								<th>HỌC VỊ</th>

				
								<th colspan="3">CHỨC NĂNG</th>
							</tr>
						</thead>
						<tbody>

							<?php foreach ($rowteacher as $value){ ?>
							<tr>
								<td><?php echo $value['id_teacher']; ?></td>
								<td><?php echo $value['name']; ?></td>
								
								<td><?php echo $value['birthday']; ?></td>
								<td><?php echo $value['email']; ?></td>
								<td><?php echo '0'.$value['phone_numbers']; ?></td>
								<td><?php echo $value['specialize']; ?></td>
								<td><?php echo $value['degree']; ?></td>
								
					
						
								<td><a href="chitietgiaovien.php?idteacher=<?php echo $value['id_teacher'];   ?>"  class="btn btn-info">Xem</a>
						
								<a href="giaovien.php?xoaid=<?php echo $value['id_teacher'];  ?>" onclick="return confirm('Bạn có muốn xóa giáo viên này không')"  class="btn btn-danger">Xóa</a>
								</td>
							</tr>
						<?php } ?>
						
						</tbody>
					</table>



					
				</div>
				</div>
				
			</div>
		</div>




		</div>
	</div>
</body>
</html>