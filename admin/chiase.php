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
<?php if (isset($_POST['trangthaishare'])) {
	$idshare=$_GET['chitietshare'];
	$trangthai=$_POST['trangthaishare'];

	$splsuashare="UPDATE share SET status='$trangthai'
	WHERE id_share='$idshare' ";
	$conn->exec($splsuashare);
		header('location: chiase.php');
	
} ?>

<?php if (isset($_GET['xoaid'])) {
	$xoaid=$_GET['xoaid'];
	$sqlxoachiase="DELETE FROM share WHERE id_share='$xoaid' " ;
	$conn->exec($sqlxoachiase);
	header('location: chiase.php');
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
				<p style="font-size: 20px;width:1000px;height:50px;background: white;line-height: 50px;padding-left: 10px;border-radius: 10px;color:#17a2b8;font-weight: bold"><?php if (isset($_GET['chitietshare'])){echo 'CHI TIẾT CHIA SẺ';}else {
					echo 'QUẢN LÍ CHIA SẺ';
				} ?>
					
				</p>

				<div class="noidung">
<?php if (!isset($_GET['chitietshare'])){ ?>
						
				
				<!-- 	<a href="taikhoan.php?role=ok" class="btn btn-info">Chỉnh sửa role </a> -->
					<table class="table table-striped">
						<thead>
							<tr>
								<th>ID CHIA SẺ</th>
								<th>ID user</th>
								<th style="width:350px">Nội dung</th>
								<th>Thời gian</th>
								<th>Trạng thái</th>
					
							
								

							<!-- 	<th>header</th> -->
								<th colspan="3">Chức năng</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($rowshare as $value){?>
								
							
							<tr>
								<td><?php echo $value['id_share']; ?></td>
								<td><?php echo $value['id_user']; ?></td>
								<td style="font-size: 14px"><?php echo $value['content']; ?></td>
								
								<td><?php echo $value['date_time']; ?></td>
								<td><?php if ($value['status']==0) {echo "Chưa duyệt";}
								elseif($value['status']==1){echo 'Duyệt';}
								elseif($value['status']==2){echo 'Hiện trang chủ';}
								 ?></td>
								
						
								<td><a href="chiase.php?chitietshare=<?php echo $value['id_share']; ?> "  class="btn btn-info">Chi tiết</a>	
								<a href="chiase.php?xoaid=<?php  echo $value['id_share'];  ?>" onclick="return confirm('Bạn có muốn xóa CHIA SẺ này')"  class="btn btn-danger">Xóa</a>
								</td>
							</tr>
						<?php } ?>
							
						
						</tbody>
					</table>

<?php }elseif (isset($_GET['chitietshare'])) { $idchiase=$_GET['chitietshare']; ?>
							

							<div class="row">
								<div class="col-md-5">
									<a href="chiase.php"  class="btn btn-info">Quay về</a>	
												
							<div class="input-group mb-3" style="margin-top: 8px">
								    <div class="input-group-prepend">
								    <span class="input-group-text">ID CHIA SẺ</span>
								    </div>
								    <input type="text" name="athem" disabled="" value="<?php echo $idchiase ?>" class="form-control">
							 </div>		
							 	<div class="input-group mb-3" style="margin-top: 8px">
								    <div class="input-group-prepend">
								    <span class="input-group-text">Nội dung</span>
								    </div>
								    <textarea style="font-size: 14px" name=""  disabled="" class="form-control"><?php echo  share($idchiase)['content']; ?></textarea>
							 </div>		

							 	<div class="input-group mb-3" style="margin-top: 8px">
								    <div class="input-group-prepend">
								    <span class="input-group-text">Thời gian</span>
								    </div>
								    <input type="text"  disabled="" value="<?php echo  share($idchiase)['date_time']; ?>" name="athem" class="form-control">
							 </div>		
								

								<div class="row">
									<div class="col-md-5">
										  	<div class="input-group mb-3" style="margin-top: 8px">
								    <div class="input-group-prepend">
								    <span class="input-group-text">ID user</span>
								    </div>
								    <input type="text"  disabled="" value="<?php echo  share($idchiase)['id_user']; ?>" name="athem" class="form-control">
									 </div>		
									</div>
										<div class="col-md-7">
										  	<div class="input-group mb-3" style="margin-top: 8px">
								    <div class="input-group-prepend">
							<form action="" method="POST" accept-charset="utf-8">
								    <span class="input-group-text">Trạng thái</span>
								    </div>
								   
								    	
								    	
								  
										<select name="trangthaishare" class="form-control">
											<option value="0" <?php if(share($idchiase)['status']==0){echo "selected";} ?>>Chưa duyệt</option>
											<option value="1" <?php if(share($idchiase)['status']==1){echo "selected";} ?> >Duyệt</option>
											<option value="2" <?php if(share($idchiase)['status']==2){echo "selected";} ?>>Hiện trang chủ</option>
											
										</select>
									 </div>		
									</div>

									<div class="col-md-12"><button type="submit" style="float: right;" class="btn btn-info">Sửa</button></div>
							  </form>
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