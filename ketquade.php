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
	$tencn=$_POST['tencn'];
	$birthcn=$_POST['birthcn'];
	$gendercn=$_POST['gendercn'];
	$addresscn=$_POST['addresscn'];

	$sqlcn=" UPDATE users SET name='$tencn',birthday='$birthcn',gender='$gendercn',address='$addresscn' ";
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
			        <form action="thongtincanhan.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
			        		
			         <input type="file" name="anhusermoi" >

			        </div>
			        <div class="modal-footer">
			           <button type="submit" class="btn btn-primary">Cập nhập</button>
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
<?php if (isset($_GET['ketqua'])){ 
		$iduser=$_SESSION['account']['id'];
		$sqlresulttest="select * from result_test where id_user='$iduser' ";
		$queryresult=$conn->prepare($sqlresulttest);
		$queryresult->execute();
		$rowresult= $queryresult->fetchAll(PDO::FETCH_ASSOC);
		?>
	
	


		

		<div style="background: white;width:700px;height:500px;border-radius: 5%;margin-left: 50px">
			<div class="bodyphaittcn">
				<p style="text-align: center;font-weight: bold">Kết quả  làm đề</p>
				<div>
				<!-- 	<p style="font-size: 14px;font-weight: bold">Cập nhật thông tin cá nhân</p> -->
					<div class="row">
						<table class="table">
							<thead>
								<tr>
									<th>Mã đề</th>
									<th style="width:290px">Tên đề</th>
									<th>Môn - Lớp</th>
									<th>Điểm</th>
							<!-- 		<th>Chức năng</th> -->
								</tr>
							</thead>
							<tbody>
								<?php foreach ($rowresult as $value){ $idresult=$value['id_result']; $idtest=$value['id_test'];
									$idcategory=subcategory(test($idtest)['id_subcategory'])['id_category'];
								 ?>
									
								
								<tr style="font-size: 15px">
									<td><?php echo $idtest ?></td>
									<td><?php echo  test($idtest)['name_test'] ?></td>
									<td><?php echo subcategory(test($idtest)['id_subcategory'])['name_subcategory'] .' - '.category($idcategory)['name_category'] ?></td>
									<td style="color: red;font-weight: bold"><?php echo  $value['point'] ?></td>
									<!-- <td><a href="" class="btn btn-danger">Xóa</a></td> -->
								</tr>
								<?php } ?>
							</tbody>
						</table>


					</div>

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