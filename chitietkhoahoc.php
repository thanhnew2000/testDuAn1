


<?php require "./commont/connect.php" ?>	
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Chi tiết</title>
	<link rel="stylesheet" href="css.css">
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<script src="public/js/jquery-3.4.1.slim.min.js"></script>
	<script src="public/js/popper.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>

</head>
	<!-- div.header2 -->
    <?php include_once '_share/client/header.php' ?>
<!-- hết div.header2 -->
</br>
<?php if (isset($_GET['idkh'])) {

	$idkh=$_GET['idkh'];
	$idgiaovien=course($idkh)['id_teacher'];
	$idsub=course($idkh)['id_subcategory'];


	
} ?>

<body>
	
		<div class="" style="width:1347px;margin: auto">
			<div style="width:1200px;margin:auto">
			<div style="background-image: url(image/5.jpg);width:100%;height:250px;">
				<div style="background-image: url(image/Untitled-1.png);width:100%;height:250px;">
	
				<p style=" color: white;padding-top: 70px;margin-left: 50px;font-size: 21px">
					<?php echo course($idkh)['name_course']; ?>
				</p>
				<p style=" color: white;padding-top: 70px;margin-left: 50px;font-size: 17px">
					Giáo viên : Cô <?php echo teacher($idgiaovien)['name'] ?> <img src="public/images/teacher/<?php echo teacher($idgiaovien)['image'] ?>" style="width: 50px;height:50px;border-radius: 100%">
				</p>
			</div>

			</div>
			<div class="row" style="width:100%;margin:auto">
			<div class="col-md-8">
			</br>

			<?php 

					$sqltopic1="select * from topic where id_course='$idkh' ";
					$querytopic1=$conn->prepare($sqltopic1);
					$querytopic1->execute();
					$rowtopic1= $querytopic1->fetch(PDO::FETCH_ASSOC);
					$idtop=$rowtopic1['id_topic'];

					$sqlbg1="select * from lesson where id_topic='$idtop' ";
					$querybg1=$conn->prepare($sqlbg1);
					$querybg1->execute();
					$rowbg1= $querybg1->fetch(PDO::FETCH_ASSOC);

					
			 ?>
				<iframe width="730" height="390" src="<?php echo $rowbg1['video']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

				<p style="margin-top: 10px;font-weight: bold;border-bottom: 1px solid #007bff;width:200px">Giới thiệu khóa học</p>
				<p>
					<?php echo course($idkh)['infomation'] ?>
				</p>
		
	

				<p style="font-weight: bold;font-size: 17px;margin-top: 10px;border-bottom: 1px solid #007bff;margin-top: 50px">Bài giảng</p>
				<div id="accordion" style="margin-bottom: 50px">

			
			<?php foreach (topic_idcourse($idkh) as  $value){ ?>
				
		
						    <div class="card">
						      <div class="card-header">
						        <a class="card-link" data-toggle="collapse" href="#collapse<?php echo $value['id_topic'] ?>" style="font-weight: bold;color: black">
						          + Chuyên đề : <?php echo $value['name_topic'] ?>
						        </a>
						      </div>
						      <div id="collapse<?php echo $value['id_topic'] ?>" class="collapse" data-parent="#accordion">
						        <div class="card-body">



						      	 <?php foreach (lesson_idtopic($value['id_topic']) as $value){ ?>
						       	
						      
						         <p><a href="baigiang2.php?idlesson=<?php echo $value['id_lesson'] ?>&&idkh=<?php echo $idkh ?>"><img src="image/nut.jpg" style="width:20px;margin-right: 10px;margin-top: -1px">
						         	<?php echo $value['name_lesson'] ?>
						         </a></p>
						   		  <?php } ?>
						        </div>
						      </div>
						    </div>
			<?php } ?>
		
					</div>





		<div style="margin-bottom: 50px;width: 100%;height: 300px;background: #f7f6f6">
					<p style="text-align: center;font-size:20px;font-weight: bold">Giảng viên</p>

					
					<img src="public/images/teacher/<?php echo teacher($idgiaovien)['image'] ?>" style="width:200px;height:220px;border-radius: 100%;margin-left: 10px">
				<div style="width:390px;float: right;margin-right: 50px;margin-top: 20px">
					<?php echo teacher($idgiaovien)['infomation'] ?>
				</div>
					<p style="margin-left: 20px;font-weight: bold">
						<?php if (teacher($idgiaovien)['gender']==1) {
							echo 'Thầy ';
							
						}else {
							echo "Cô ";
						} ?>

					 <?php echo teacher($idgiaovien)['name'] ?></p>
				</div>










			</div>

			<!--  Phải của trang chi tiêt -->
			<div class="col-md-4">
				<div class="dkchitiet" style="margin-bottom: 37px">

					<img src="public/images/course/<?php echo course($idkh)['image'] ?>" style="width:100%;height:250px">
					<p style="text-align: center;font-weight: bold;color: red;font-size: 20px;margin-top: 10px">Miễn phí</p>
					<!-- THẺ A HỌC NGAY -->
					<a href="baigiang2.php?idlesson=<?php $idtopic=topic_idcourse1($idkh)['id_topic'];
								 echo lesson_idtopic1($idtopic)['id_lesson'];
					?>&&idkh=<?php echo $idkh ?>" 
					 class="btn btn-primary" style="margin-left: 130px;margin-top: 10px"> HỌC NGAY</a>
					
					<!--  HẾT HỌC NGAY -->
				</div>
		
				<p style="font-weight: bold;border-bottom: 1px solid #dddddd">Khóa học tương tự</p>
				<!-- Khóa tương tự -->

				<?php 
					$sqlcoursett="select * from course where id_subcategory='$idsub'  ";
					$querycoursett=$conn->prepare($sqlcoursett);
					$querycoursett->execute();
					$rowcoursett= $querycoursett->fetchAll(PDO::FETCH_ASSOC);
				 ?>
				 <?php foreach ($rowcoursett as $value){?>
				 	
			
				<div style="width:100%;height:130px;background: #e4ede4;margin-top: 12px;border-radius: 2%;box-shadow: 2px 2px 3px black">
					<a href="chitietkhoahoc.php?idkh=<?php echo $value['id_course']; ?>"><img src="public/images/course/<?php echo $value['image'] ?>" style="width:150px;height:120px;float: left;margin-left: 10px;margin-top: 5px"></a>
					<a href="chitietkhoahoc.php?idkh=<?php echo $value['id_course']; ?>"><p style="float: left; margin-left: 10px;font-size: 14px;height:80px;width:190px;font-weight: bold;">
						<?php echo $value['name_course']; ?>
					</p></a>
					<p style="color:red;font-size: 14px;padding-left: 10px"><span style="color: black;margin-left: 10px;">Học phí : </span>Miễn phí</p>

				</div>
				 <?php } ?>
		
				<!-- Tương tự -->


			</div>
		</div>
	</div>

	

		





















<!-- div.header2 -->
    <?php include_once '_share/client/footer.php' ?>
<!-- hết div.header2 -->


</body>
</html>