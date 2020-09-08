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

<?php if (isset($_GET['idbaigiang'])){
	$idbaigiang=$_GET['idbaigiang'];
} ?>

<?php if (isset($_POST['tenbgthem'])) {
	$tenbgthem=$_POST['tenbgthem'];
	$videobgthem=$_POST['videobgthem'];
	$idtopicbgthem=$_POST['idtopicbgthem'];

	$sqlbaigiang="INSERT INTO lesson VALUES ('','$tenbgthem','$videobgthem','$idtopicbgthem')";
  	$conn->exec($sqlbaigiang);

  	$last_idbaigiang = $conn->lastInsertId();
  		header("location: chitietbaigiang.php?idbaigiang=$last_idbaigiang ");

	
} ?>

<?php if (isset($_POST['tenbgsua'])) {
	$tenbgsua=$_POST['tenbgsua'];
	$videobgsua=$_POST['videobgsua'];
	$idtopicbgsua=$_POST['idtopicbgsua'];

	$sqlsuabg=" UPDATE lesson SET name_lesson='$tenbgsua', video='$videobgsua',id_topic='$idtopicbgsua' where id_lesson='$idbaigiang' ";
	$conn->exec($sqlsuabg);?>
	<script type="text/javascript">alert('Sửa thành công');</script>
	
<?php } ?>
	

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
				<p style="font-size: 20px;width:1000px;height:50px;background: white;line-height: 50px;padding-left: 10px;border-radius: 10px;font-weight: bold;color: #17a2b8;">QUẢN LÍ BÀI GIẢNG</p>
	


<script type="text/javascript">
	  function quay_lai(){
          history.back();
      }
</script>			

<?php if (!isset($_GET['thembaigiang'])){ ?>

			
				
			
				<div class="noidung">
					<!-- <button type="submit" class="btn btn-info">Thêm giáo viên </button> -->
					<div class="row">

					<div class="col-md-5 offset-md-1" style="background: none">
							<p style="font-weight: bold;font-size: 17px">CHI TIẾT BÀI GIẢNG ID: <?php echo $idbaigiang ?></p>
				
				<div class="input-group mb-3" style="margin-top: 8px">
			    <div class="input-group-prepend">
			     <span class="input-group-text">ID bài giảng</span>
			    </div>
			    <input type="text"  disabled="" value="<?php echo lesson($idbaigiang)['id_lesson'] ?>" class="form-control" >
				 </div>
		<form method="post">
				<div class="input-group mb-3" style="margin-top: 8px">
			    <div class="input-group-prepend">
			     <span class="input-group-text">Tên bài giảng</span>
			    </div>
			    <input type="text" name="tenbgsua" value="<?php echo lesson($idbaigiang)['name_lesson'] ?>" class="form-control">
				 </div>

				 	<div class="input-group mb-3" style="margin-top: 8px">
			    <div class="input-group-prepend">
			     <span class="input-group-text">Nguồn video</span>
			    </div>
			    <input type="text" name="videobgsua" value="<?php echo lesson($idbaigiang)['video'] ?>" class="form-control">
				 </div>

				  	<div class="input-group mb-3" style="margin-top: 8px">
			    <div class="input-group-prepend">
			     <span class="input-group-text">ID chuyên đề</span>
			    </div>
			     <select name="idtopicbgsua" class="form-control">
			    	<?php foreach ($rowtopic as $value) { ?>
			    		<option value="<?php echo $value['id_topic'] ?>"
			    		 <?php if ($value['id_topic']==lesson($idbaigiang)['id_topic']){ echo 'selected' ;} ?>><?php echo $value['name_topic'] ?></option>
			   	    <?php	} ?>
			    	
			    
			    </select>
				 </div>

						</div>
						<div class="col-md-6 offset-md-1" style="background: none;">
							<button  type="button" onclick="quay_lai()" style="float: right;margin-right: 100px" class="btn btn-info">Hủy</button>
							<button type="submit" style="float: right;margin-right: 10px" class="btn btn-info">Cập nhập mới</button>

						</div>
			</form>
				
					</div>



					
				</div>

<!-- THÊM BÀI GIẢNG -->
<?php }elseif (isset($_GET['thembaigiang'])) {
		$sqltopic="select * from topic ";
		$querytopic=$conn->prepare($sqltopic);
		$querytopic->execute();
		$rowtopic= $querytopic->fetchAll(PDO::FETCH_ASSOC);

 ?>


				
				<div class="noidung">
					<!-- <button type="submit" class="btn btn-info">Thêm giáo viên </button> -->
					<div class="row">

					<div class="col-md-5 offset-md-4" style="background: none;">
							<p style="font-weight: bold;font-size: 17px;text-align: center;">THÊM BÀI GIẢNG</p>
				
			<form method="POST">

				<div class="input-group mb-3" style="margin-top: 8px">
			    <div class="input-group-prepend">
			     <span class="input-group-text">Tên bài giảng</span>
			    </div>
			    <input type="text" name="tenbgthem" class="form-control">
				 </div>

				 	<div class="input-group mb-3" style="margin-top: 8px">
			    <div class="input-group-prepend">
			     <span class="input-group-text">Nguồn video</span>
			    </div>
			    <input type="text" name="videobgthem" class="form-control">
				 </div>

				  	<div class="input-group mb-3" style="margin-top: 8px">
			    <div class="input-group-prepend">
			    <?php if (!isset($_GET['idchuyende'])){ ?>
			     <span class="input-group-text">ID chuyên đề</span>
			 <?php } ?>
			    </div>



			<?php if (!isset($_GET['idchuyende'])){ ?>
				
			    <select name="idtopicbgthem" class="form-control" >
					<?php foreach ($rowtopic as $value){?>
						<option value="<?php echo $value['id_topic']; ?>"><?php echo $value['name_topic']; ?></option>
					<?php } ?>
			    </select>
			<?php }elseif (isset($_GET['idchuyende'])) { $idchuyende=$_GET['idchuyende'];?>
				<input style="display: none" type="text" name="idtopicbgthem" value="<?php echo $idchuyende; ?>" >
			 <?php } ?>


			 

				 </div>

						</div>
						<div class="col-md-6 offset-md-5" style="background: none;">
							<button type="submit" style="margin-right: 10px" class="btn btn-info">Thêm bài giảng</button>
								<button type="button" href="" onclick="quay_lai()"  class="btn btn-info">Hủy</button>
						</div>
				</form>
				
					</div>



					
				</div>

	
			<?php } ?>
				</div>
				
			</div>
		</div>




		</div>
	</div>
</body>
</html>