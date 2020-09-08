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




 <?php 


		if (isset($_FILES['logosetting'])) {
			upload('logosetting','../image/');
			$logo=$_FILES['logosetting']['name'];
			$sqlsualogo=" UPDATE setting SET logo='$logo'  ";
			$conn->exec($sqlsualogo);
			header("location: setting.php");
		}


		if (isset($_POST['emailsetting'])) {
			$email=$_POST['emailsetting'];
			$sdt=$_POST['sdtsetting'];
			$sqlsuasetting=" UPDATE setting SET email='$email', sdt='$sdt' ";
			$conn->exec($sqlsuasetting);
			header("location: setting.php");
		}




		 ?>
			<div class="bodyad">

				<div class="thanbody">
				<p style="font-size: 20px;width:1000px;height:50px;background: white;line-height: 50px;padding-left: 10px;border-radius: 10px;color:#17a2b8;font-weight: bold">SETTING
					
				</p>

				<div class="noidung">
					
						<p style="font-weight: bold">LOGO</p>
						<img src="../image/<?php echo $rowsetting['logo'] ?>"   data-toggle="modal" data-target="#myModal" style="width:150px;height:150px">
						<div class="row">
							<div class="col-md-5">

			<form method="POST" >
							<div class="input-group mb-3" style="margin-top: 8px">
						     <div class="input-group-prepend">
						       <span class="input-group-text">Email</span>
						    </div>
						    <input type="text" value="<?php echo $rowsetting['email'] ?>" name="emailsetting" class="form-control">
							</div>

							<div class="input-group mb-3" style="margin-top: 8px">
						     <div class="input-group-prepend">
						       <span class="input-group-text">Số điện thoại</span>
						    </div>
						    <input type="text" value="<?php echo $rowsetting['sdt'] ?>" name="sdtsetting" class="form-control">
							</div>
							<button type="submit" class="btn btn-info">Cập nhập</button>
			</form>
					<!-- 		<div class="input-group mb-3" style="margin-top: 8px">
						     <div class="input-group-prepend">
						       <span class="input-group-text">Tên khóa học</span>
						    </div>
						    <input type="text" name="tenkhthem" class="form-control">
							</div> -->
									  <!-- Modal -->
			  <div class="modal fade" id="myModal" role="dialog">
			    <div class="modal-dialog" style="color:black">
	
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			       	<h5 class="modal-title">Cập nhập logo </h5>
			          <button type="button" class="close" data-dismiss="modal">X</button>
			
			        </div>
			        <div class="modal-body">
			        <form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data" >
			        		
			         <input type="file" name="logosetting" >

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
						


				</div>
				</div>
				
			</div>
		</div>




		</div>
	</div>
</body>
</html>