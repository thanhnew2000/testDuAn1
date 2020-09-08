<?php require "../commont/connect.php" ?>	
<?php session_start(); 
if (isset($_GET['id_dm'])) {
	$id_dm=$_GET['id_dm'];
	
}
?>
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

<?php if (isset($_POST['tendsnew'])) {
	$tendsnew=$_POST['tendsnew'];
	$anhdsnew=$_POST['anhdsnew'];

 	$sqldanhmuc="INSERT INTO category VALUES ('','$tendsnew','$anhdsnew')";
  	$conn->exec($sqldanhmuc);
  		header("location: danhmuc.php?id_dm=$id_dm ");

	
	
} ?>

<?php if (isset($_POST['subdsnew'])) {
	$subdsnew=$_POST['subdsnew'];

	$sqlsub="INSERT INTO subcategory VALUES ('','$subdsnew','$id_dm')";
  	$conn->exec($sqlsub);
   		header("location: danhmuc.php?id_dm=$id_dm ");
	
} ?>
<!-- <?php if (isset($_GET['xoamon'])) {
		$xoamon=$_GET['xoamon'];
		$sqlxoamon="DELETE FROM subcategory WHERE id_subcategory='$xoamon' " ;
		$conn->exec($sqlxoamon);

} ?> -->



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
				<p style="font-size: 20px;width:1000px;height:50px;background: white;line-height: 50px;padding-left: 10px;border-radius: 10px;color: #17a2b8;font-weight: bold">QUẢN LÍ LỚP</p>

				<div class="noidung">
				<div class="row">
						<div class="col-md-12">
							<div class="row" style="height: 30px">
													
			<div class="col-md-2" style="padding-bottom: 10px">
					<a href="danhmuc.php?themdanhmuc&&id_dm=<?php echo $id_dm ?>" style="margin-left: 8px"  class="btn btn-info">Thêm lớp</a>
			</div>
					<?php if (isset($_GET['themdanhmuc'])){?>
						
					
				<div class="col-md-4">
			<form action="" method="POST" accept-charset="utf-8">
						
					
				
				 <div class="input-group mb-3" style="margin-top: 8px">
			     <div class="input-group-prepend">
			       <span class="input-group-text">Tên lớp</span>
			    </div>
			    <input type="text" name="tendsnew" class="form-control">
				  </div>
				</div>
				<div class="col-md-3">
				 <div class="input-group mb-3"style="margin-top: 8px">
			     <div class="input-group-prepend">
			       <span class="input-group-text">Image</span>
			    </div>
			    <input type="file" name="anhdsnew" class="form-control" >
				  </div>
				</div>
				<div class="col-md-3">
						<button type="submit" class="btn btn-info">Thêm </button>
			</form>
						<a href="danhmuc.php?id_dm=<?php echo $id_dm ?>" class="btn btn-info">Hủy </a>
					</div>
				
			<?php }  ?>
							</div>
						</div>
						<div class="col-md-12">
						<ul class="list-group">
						<div class="row">
							
							<?php foreach ($rowcategory as $value){ ?>
						<div class="col-md-4">
						  <a style="color:<?php if ($value['id_category']==$id_dm){ echo 'white' ;} ?>;line-height: 35px;margin-left: 35px" href="danhmuc.php?id_dm=<?php echo $value['id_category'] ?>"><li class="list-group-item <?php if ($value['id_category']==$id_dm){ echo 'active' ;} ?> btn sm"><?php echo $value['name_category']; ?>
						  <a href="danhmuc2.php?id_dm=<?php echo $value['id_category'] ?>" class="btn btn-warning" style="float: right;">Sửa</a>
						  </li>
						  </a>
						</div>
						<?php } ?>
						</ul>	
						</div>

					
					

				<!-- 	<button type="submit" class="btn btn-info">Thêm </button>
					<button type="submit" class="btn btn-info">Huy </button> -->
				</div>
<?php if (isset($_GET['id_dm'])){ ?>
		

					<div class="row">

					<div class="col-md-12	">
						<p style="background: none;height:35px;margin-left: 10px;font-weight: bold;color:#17a2b8">
							<?php echo category($id_dm)['name_category']; ?>

							<?php if (!isset($_GET['themmon'])){?>
								
						
						 <a href="danhmuc.php?themmon&&id_dm=<?php echo $id_dm ?>" style="margin-left: 8px"  class="btn btn-info">Thêm môn <?php echo category($id_dm)['name_category'] ?> </a>	<?php }  ?>
						</p>
					<?php if (isset($_GET['themmon'])){ ?>
				 <form method="POST">
						<div class="input-group mb-3" style="margin-top: 8px;width:360px; float: right;margin-top: -44px;margin-right: 550px">
					     <div class="input-group-prepend">
					       <span class="input-group-text">Tên môn</span>
					    </div>
					   
					    <input type="text" name="subdsnew" class="form-control">
					    	<button type="submit" class="btn btn-info" style="margin-left: 20px">Thêm </button>

					    	<a href="danhmuc.php?id_dm=<?php echo $id_dm ?>" class="btn btn-info"style="margin-left: 5px">Hủy </a>
						  </div>
						  </form>
			
					<?php  } ?>

					<table class="table table-striped ">
						<thead>
							<tr>
								<th>id_mon</th>
								<th>ten_mon</th>
								

							<!-- 	<th>header</th> -->
								<th colspan="2">Chức năng</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach (subcategory_id($id_dm) as $value){ ?>
								
							
							<tr>
								<td><?php echo $value['id_subcategory']; ?></td>
								<td><?php echo $value['name_subcategory']; ?></td>
							
								<td><a href="danhmuc2.php?id_dm=<?php echo $id_dm ?>&&id_sub=<?php echo $value['id_subcategory']; ?>" class="btn btn-warning">Sửa</a>
									<a href=""  onclick="return confirm('Môn không thể xóa?')" class="btn btn-danger" >Xóa</a></td>
							</tr>
						<?php } ?>
				
						</tbody>
					</table>
				</div>
	<!-- 			<div class="col-md-3">
						<ul class="list-group">
							<?php foreach ($rowcategory as $value){ ?>
						  <a style="color:<?php if ($value['id_category']==$id_dm){ echo 'white' ;} ?>;line-height: 35px;margin-left: 35px" href="danhmuc.php?id_dm=<?php echo $value['id_category'] ?>"><li class="list-group-item <?php if ($value['id_category']==$id_dm){ echo 'active' ;} ?> btn sm"><?php echo $value['name_category']; ?>
						  <a href="danhmuc2.php?id_dm=<?php echo $value['id_category'] ?>" class="btn btn-warning" style="float: right;">Sửa</a>
						  </li>
						  </a>
						<?php } ?>
						</ul>	
				</div> -->
				</div>

					
				</div>
				</div>
				
			</div>
		</div>

	<?php } ?>	


		</div>
	</div>
</body>
</html>