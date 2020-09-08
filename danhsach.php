<?php require "./commont/connect.php" ?>	
<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Trang chủ</title>
	<link rel="stylesheet" href="css.css">
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<script src="public/js/jquery-3.4.1.slim.min.js"></script>
	<script src="public/js/popper.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
<!-- 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 -->

<style type="text/css" media="screen">
.container ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
}

 .container li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

 .container li a.active {
  background-color:#007bff;
  color: white;
}

.container li a:hover:not(.active) {
  background-color: #555;
  color: white;
}
</style>

</head>
<!-- div.header2 -->
    <?php include_once '_share/client/header.php' ?>
<!-- hết div.header2 -->

</br>



<?php 
if (isset($_GET['idcate'])) {
	$idcate=$_GET['idcate'];
	
}

 ?>
<body>
	
		<div class="container">
			<div class="row">
			<div class="col-md-2">
			<ul>
				<?php foreach ($rowcategory  as  $value){ ?>

			  <li><a class="active" href="#home"><?php echo $value['name_category']; ?></a></li>
			  <?php foreach (subcategory_id($value['id_category']) as $value){ ?>
			  	<li><a href="danhsach.php?idcate=<?php echo $value['id_category']; ?>&&idmon=<?php echo $value['id_subcategory'] ?>"><?php echo $value['name_subcategory'] ?></a></li>
			  <?php }} ?>
			  	
			


	

			</ul>
			</div>

<?php if ((isset($idcate))&&(!isset($_POST['lopsreach']))){?>
		<?php 
				if (isset($_GET['idmon'])) {
					$idmon=$_GET['idmon'];
					
				}else {
						$sql="select * from subcategory where id_category='$idcate' ";
						$query=$conn->prepare($sql);
						$query->execute();
						$row= $query->fetch(PDO::FETCH_ASSOC);
						$idmon=$row['id_subcategory'];
				}

			$sqldanhsach1="select * from course where id_subcategory='$idmon' ";
			$querydanhsach=$conn->prepare($sqldanhsach1);
			$querydanhsach->execute();
			$rowdanhsach1= $querydanhsach->fetchAll(PDO::FETCH_ASSOC);

		
		 ?>
		

	

	<div class="col-md-9"  style="background: none;margin-left: 25px">
			<img src="public/images/category/<?php echo category($idcate)['image'] ?>" style="width:100%;height:200px">
			<!-- Tên tìn kiếm -->
			<div class="hang1a">
				<p style="margin-left: 10px;font-weight: bold;font-size: 17px;border-bottom: 2px solid gold;width:200px">
				 			<?php echo category($idcate)['name_category'].' - '.subcategory($idmon)['name_subcategory'];?>
				</p>
				<!-- <a href=""  style="margin-top:-35px;margin-left:10px;    margin-right: 10px;font-weight: bold; float: right;font-size: 14px">Xem thêm</a> -->
			
			<?php foreach ($rowdanhsach1 as $value){ ?>
				
			

				<div class="box2">
					<div class="boxtren2"><img src="public/images/course/<?php echo $value['image'] ?>" style="height: 150px;width:100%"></div>
					<div class="boxduoi2" style="background:#f5f5f5">
					<a href="" class="thea"><p style="font-weight: bold;color: black;margin-left: 10px;height:27px;font-size: 14px"><?php echo $value['name_course'] ?></p></a>
						<img src="public/images/teacher/<?php echo teacher($value['id_teacher'])['image'] ?>" style="height: 35px;width: 35px;border-radius: 100%;float: left;margin-left: 10px;margin-top: 5px">
						<p style="margin-top: 25px;margin-left: 70px;font-size: 14px"><?php echo teacher($value['id_teacher'])['name'] ?></p>
						<p style="margin-left:5px;float: left;font-weight: bold;color:red;font-size: 14px">Miễn Phí</p>
						<a href="chitietkhoahoc.php?idkh=<?php echo $value['id_course'] ?>" style="float: right;margin-right: 10px;font-size: 14px"> Xem chi tiết </a>
					</div>
				</div>
			<?php } ?>



				
		
			</div>
		</div>
<?php }else if(isset($_POST['lopsreach'])){
			$lopsreach=$_POST['lopsreach'];
			$tukhoasreach=$_POST['tukhoasreach'];
			if (isset($_POST['monsreach'])) {
				$monsreach=$_POST['monsreach'];
				$namemon=subcategory($monsreach)['name_subcategory'];
			}
			

			

			if (($tukhoasreach=="")&&(isset($_POST['monsreach']))) {

			$sqldanhsachsreach="select * from course where id_subcategory='$monsreach' ";
			$querydanhsachsreach=$conn->prepare($sqldanhsachsreach);
			$querydanhsachsreach->execute();
			$rowsreach= $querydanhsachsreach->fetchAll(PDO::FETCH_ASSOC);

				
			}else if (is_string($tukhoasreach)) {
		
			$sqldanhsachsreach="select * from course where name_course like '%$tukhoasreach%' ";
			$querydanhsachsreach=$conn->prepare($sqldanhsachsreach);
			$querydanhsachsreach->execute();
			$rowsreach= $querydanhsachsreach->fetchAll(PDO::FETCH_ASSOC);
			}

	?>


		<div style="margin-left: 30px">
	
			<p style="font-weight: bold">Danh sách tìm kiếm</p>
		

		
	
		<?php foreach ($rowsreach as $value){ ?>
			
	
			<div class="box2" style="margin-left: 10px">
					<div class="boxtren2"><img src="public/images/course/<?php echo $value['image'] ?>" style="height: 150px;width:100%"></div>
					<div class="boxduoi2" style="background:#f5f5f5">
					<a href="" class="thea"><p style="font-weight: bold;color: black;margin-left: 10px;height:27px;font-size: 14px"><?php echo $value['name_course'] ?></p></a>
						<img src="public/images/teacher/<?php echo teacher($value['id_teacher'])['image'] ?>" style="height: 35px;width: 35px;border-radius: 100%;float: left;margin-left: 10px;margin-top: 5px">
						<p style="margin-top: 25px;margin-left: 70px;font-size: 14px"><?php echo teacher($value['id_teacher'])['name'] ?></p>
						<p style="margin-left:5px;float: left;font-weight: bold;color:red;font-size: 14px">Miễn Phí</p>
						<a href="chitietkhoahoc.php?idkh=<?php echo $value['id_course'] ?>" style="float: right;margin-right: 10px;font-size: 14px"> Xem chi tiết </a>
					</div>
				</div>

			<?php  }?>
			

		<?php }  ?>

</div>



	</div>

			<!--  Phải của trang chi tiêt -->
	
			</div>
		</div>

	






<!-- div.header2 -->
    <?php include_once '_share/client/footer.php' ?>
<!-- hết div.header2 -->


</body>
</html>