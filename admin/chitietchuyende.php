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
<?php if (isset($_GET['idchuyende'])){
 			$idchuyende=$_GET['idchuyende'];
}

if (isset($_GET['idkhoahoc'])){
	$idkhoahoc=$_GET['idkhoahoc'];
}

 ?>

	

<!-- THÊM CHUYÊN ĐỀ -->
<?php if (isset($_POST['tenchuyendethem'])){
	$tenchuyendethem=$_POST['tenchuyendethem'];

			 if (!isset($_GET['idkhoahoc'])){ 
			$idkhoahocthem=$_POST['idkhoahocthem'];
			}else{$idkhoahocthem=$_POST['idkhoahocthems'];}

	$sqlthemchuyende="INSERT INTO topic VALUES ('','$tenchuyendethem','$idkhoahocthem')";
  	$conn->exec($sqlthemchuyende);
  	$last_idchuyende = $conn->lastInsertId();
  	header("location: chitietchuyende.php?idchuyende=$last_idchuyende");


} ?>
	

<?php if (isset($_POST['tenchuyendesua'])) {
	$tenchuyendesua=$_POST['tenchuyendesua'];
	$idkhoahocsua=$_POST['idkhoahocsua'];

	$sqlsuachuyende=" UPDATE topic SET name_topic='$tenchuyendesua', id_course='$idkhoahocsua' where id_topic='$idchuyende' ";
	$conn->exec($sqlsuachuyende);?>
	<script type="text/javascript">alert('Sửa thành công');</script>
	
<?php } ?>
	
<?php if (isset($_GET['idxoabaigiang'])) {
	$idxoabaigiang=$_GET['idxoabaigiang'];
		$sqlxoabg="DELETE FROM lesson WHERE id_lesson='$idxoabaigiang' " ;
		$conn->exec($sqlxoabg);
		header("location: chitietchuyende.php?idchuyende='$idchuyende' ");
	
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
			<div class="bodyad" style="width:1100px">
				<div class="thanbody">
				<p style="font-size: 20px;width:1000px;height:50px;background: white;line-height: 50px;padding-left: 10px;border-radius: 10px;font-weight: bold;color: #17a2b8">QUẢN LÍ CHUYÊN ĐỀ</p>

				<div class="noidung">
					<!-- <button type="submit" class="btn btn-info">Thêm giáo viên </button> -->

<?php if(!isset($_GET['themchuyende'])){ ?>
					<div class="row">

						<div class="col-md-7" style="background: none">
							<p style="font-weight: bold;font-size: 17px">CHUYÊN ĐỀ</p>
				<form action="" method="POST" accept-charset="utf-8">
					
				
			
				<div class="input-group mb-3" style="margin-top: 8px">
			    <div class="input-group-prepend">
			     <span class="input-group-text">ID chuyên đề</span>
			    </div>
			    <input type="text"  disabled="" value="<?php echo topic($idchuyende)['id_topic'] ?>" class="form-control" >
				 </div>

				<div class="input-group mb-3" style="margin-top: 8px">
			    <div class="input-group-prepend">
			     <span class="input-group-text">Tên chuyên đề</span>
			    </div>
			    <input type="text" name="tenchuyendesua" value="<?php echo topic($idchuyende)['name_topic'] ?>"  class="form-control">
				 </div>

				 	<div class="input-group mb-3" style="margin-top: 8px">
			    <div class="input-group-prepend">
			     <span class="input-group-text">ID khóa học</span>
			    </div>
			    <select name="idkhoahocsua" class="form-control">
			    	<?php foreach ($rowcourse as $value) { ?>
			    		<option value="<?php echo $value['id_course'] ?>" <?php if ($value['id_course']==topic($idchuyende)['id_course']){ echo 'selected' ;} ?>><?php echo $value['name_course'] ?></option>
			   	    <?php	} ?>
			    	
			    
			    </select>
				 </div>

						</div>
						<div class="col-md-4" style="background: none;margin-top: 86px">
							<button type="submit" class="btn btn-info">Cập nhập mới</button>
						</div>
	</form>
				
						<div class="col-md-12" style=""><hr style="color: black">
							<p style="font-weight: bold;font-size: 17px">BÀI GIẢNG CỦA CHUYÊN ĐỀ 
								<a href="chitietbaigiang.php?thembaigiang&&idchuyende=<?php echo $idchuyende ?>" style="float: right;margin-top: 10px;margin-right: 10px" class="btn btn-info">Thêm bài giảng</a></p>
							<table class="table">
								<thead>
<!--  BAI GIANG -->

						<?php 

							$sqllesson="select * from lesson where id_topic='$idchuyende' ";
							$querylesson=$conn->prepare($sqllesson);
							$querylesson->execute();
							$rowlesson= $querylesson->fetchAll(PDO::FETCH_ASSOC);

						 ?>
						
								
							
									<tr>
										<th>ID CÂU HỎI</th>
										<th style="width:700px">TÊN BÀI GIẢNG</th>
										<!-- <th>ID KHÓA HỌC</th> -->
										<th>CHỨC NĂNG</th>
									</tr>
								</thead>
								<tbody>	<?php foreach ($rowlesson as $value){?>
									<tr>
										<td><?php echo $value['id_lesson'] ?></td>
										<td style=""><?php echo $value['name_lesson'] ?></td>
										
										<td><a href="chitietbaigiang.php?idbaigiang=<?php echo $value['id_lesson']; ?>" class="btn btn-info">Xem</a>
											<a href="chitietchuyende.php?idxoabaigiang=<?php echo $value['id_lesson']; ?>" 
											onclick="return confirm('Bạn có muốn xóa bài giảng này?')" class="btn btn-danger" style="margin-left: 10px">Xóa</a></td>

									</tr>
							<?php }  ?>

								</tbody>
							</table>
						</div>
					</div>
<?php } elseif (isset($_GET['themchuyende'])) { ?>
					

					<div class="row">

	
	

				<div class="col-md-7 offset-md-2" style="background: none">
				<p style="font-weight: bold;font-size: 17px;text-align: center;margin-left: 100px">THÊM CHUYÊN ĐỀ</p>
				
		
			<form action="" method="POST" accept-charset="utf-8">
				<div class="input-group mb-3" style="margin-top: 8px;margin-left: 50px">
			    <div class="input-group-prepend">
			     <span class="input-group-text">Tên chuyên đề</span>
			    </div>
			    <input type="text" name="tenchuyendethem" class="form-control">
				 </div>

				 	<div class="input-group mb-3" style="margin-top: 8px;margin-left: 50px">
			    <div class="input-group-prepend">
			    	<?php if (!isset($_GET['idkhoahoc'])) {  ?>
			     <span class="input-group-text">ID khóa học</span>
			     <?php } ?>
			    </div>
			    

				<?php if (!isset($_GET['idkhoahoc'])){ ?>
					
				
			    <select name="idkhoahocthem" class="form-control" >
			    	<?php foreach ($rowcourse as $value){ ?>
			    		<option value="<?php echo $value['id_course'] ?>"><?php echo $value['name_course'] ?></option>
			    	<?php } ?>
			    	
			    </select>
				<?php }elseif (isset($_GET['idkhoahoc'])) {  ?>
					
					<input style="display: none" type="text" name="idkhoahocthems" class="form-control" value="<?php echo course($idkhoahoc)['id_course']; ?>">
					
				<?php } ?>


				 </div>

						</div>
						<div class="col-md-12" style="background: none;margin-top: 10px;text-align: center;">
							<button   style="width:410px" type="submit" class="btn btn-info">Thêm chuyên đề </button>
							<a href="" class="btn btn-info" style="width:150px">Hủy </a>
						</div>
				</form>
				
				
					</div>
						
				<?php	} ?>


					
				</div>
				</div>
				
			</div>
		</div>




		</div>
	</div>
</body>
</html>