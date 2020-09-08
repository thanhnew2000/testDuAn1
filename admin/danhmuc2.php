<?php require "../commont/connect.php" ?>	
<?php session_start(); 
if (isset($_GET['id_dm'])) {
	$id_dm=$_GET['id_dm'];
}
if (isset($_GET['id_sub'])) {
	$id_sub=$_GET['id_sub'];
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

<?php if (isset($_POST['tencatesua'])) {
	$tencatesua=$_POST['tencatesua'];
	$imagecatesua=$_POST['imagecatesua'];

	$sqlsuacate=" UPDATE category SET name_category='$tencatesua', image='$imagecatesua' where id_category=$id_dm ";
	$conn->exec($sqlsuacate);
	header("location: danhmuc.php?id_dm=$id_dm ");
}

if (isset($_POST['tensubsua'])) {
	$tensubsua=$_POST['tensubsua'];
	$idcatesubsua=$_POST['idcatesubsua'];

	$sqlsuasub=" UPDATE subcategory SET name_subcategory='$tensubsua' , id_category='$idcatesubsua' where id_subcategory='$id_sub' ";
	$conn->exec($sqlsuasub);
		header("location: danhmuc.php?id_dm=$id_dm ");
	
}
if (isset($_GET['xoacate'])) {

	$sqlxoasub_idcate="DELETE FROM subcategory WHERE id_category='$id_dm' " ;
	$conn->exec($sqlxoasub_idcate);

	$sqlxoacate="DELETE FROM category WHERE id_category='$id_dm' " ;
	$conn->exec($sqlxoacate);

	header("location: danhmuc.php?id_dm=$id_dm ");
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
			<div class="bodyad" style="height:600px">
				<div class="thanbody">
				<p style="font-size: 20px;width:1000px;height:50px;background: white;line-height: 50px;padding-left: 10px;border-radius: 10px">Quản lí danh mục</p>

				<div class="noidung">
		<?php if (!isset($_GET['id_sub'])){ ?>
			
	
				<p style="color:#17a2b8;font-weight: bold">SỬA DANH MỤC</p>

				<div class="col-md-8" >
					<form method="POST">
 				<div class="input-group mb-3" style="margin-top: 10px">
			     <div class="input-group-prepend">
			       <span class="input-group-text" >Tên danh mục</span>
			    </div>
			    <input type="text" name="tencatesua" value="<?php echo category($id_dm)['name_category']; ?>" class="form-control">
				  </div>

				  	<div class="input-group mb-3" style="">
			     <div class="input-group-prepend">
			       <span class="input-group-text" >Image</span>
			    </div>
			    <input type="file" name="imagecatesua" value="<?php echo category($id_dm)['name_category']; ?>" class="form-control">

				  </div>
				  <button type="submit" class="btn btn-info" style="margin-left: 510px">Sửa </button>
				  <a href="danhmuc.php?id_dm=<?php echo $id_dm ?>" class="btn btn-info"style="margin-left: 5px">Hủy </a>
				 <!--    <a href="danhmuc2.php?id_dm=<?php echo $id_dm ?>&&xoacate" onclick="return confirm('Bạn có muốn xóa danh mục này?')"class="btn btn-info"style="margin-left: 5px">Xóa </a> -->
				</div>
			</form>

					<?php  } elseif (isset($_GET['id_sub'])) { ?>

					<p style="color:#17a2b8;font-weight: bold">SỬA MÔN</p>

				<div class="col-md-5" >
				<form method="POST">
 				<div class="input-group mb-3" style="margin-top: 10px">
			     <div class="input-group-prepend">
			       <span class="input-group-text" >Tên môn</span>
			    </div>
			    <input type="text" name="tensubsua" value="<?php echo subcategory($id_sub)['name_subcategory']; ?>" class="form-control">
				  </div>

				  	<div class="input-group mb-3" style="">
			     <div class="input-group-prepend">
			       <span class="input-group-text" >ID danh mục</span>
			    </div>
			    <input type="text" name="idcatesubsua" value="<?php echo subcategory($id_sub)['id_category']; ?>" class="form-control">

				  </div>
				  <button type="submit" class="btn btn-info" style="margin-left: 250px">SỬA </button>
				  <a href="danhmuc.php?id_dm=<?php echo $id_dm ?>" class="btn btn-info"style="margin-left: 5px">Hủy </a>
				</div>
				</form>
						
					<?php  }?>

				</div>
	</div>
</body>
</html>