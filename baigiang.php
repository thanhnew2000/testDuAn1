

<?php require "./commont/connect.php" ?>	
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bài giảng</title>
	<link rel="stylesheet" href="css.css">
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<script src="public/js/jquery-3.4.1.slim.min.js"></script>
	<script src="public/js/popper.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
<!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
</head>
<body>
	<?php if (isset($_GET['idlesson'])) {
		$idlesson=$_GET['idlesson'];
		$idkh=$_GET['idkh'];
		
	}  ?>





	<?php if (isset($_POST['binhluan'])) {

		if (isset($_SESSION['account'])) {
			$noidung=$_POST['binhluan'];
			$iduser=$_SESSION['account']['id'];

			$sqlbinhluan="INSERT INTO comment VALUES ('','$idlesson','','$noidung','$iduser')";
  			$conn->exec($sqlbinhluan);
  			header("location: baigiang.php?idlesson=$idlesson&&idkh=$idkh");
			
		}else {
			header("location: dangnhap.php");
		}
		
	} ?>


<style type="text/css" media="screen">
	.a{color:black;}
	.a:hover{text-decoration: none}
</style>

	<div style="width: 100%;background: white;margin: auto">
	<!-- div.header2 -->
    <?php include_once '_share/client/header.php' ?>
<!-- hết div.header2 -->

			<div class="bgbody" style="background: white;">
			<!--  Bên trái -->

					
			<div style="width:870px;background: none;float: left;margin-left: 35px">
				<div style="width:100%;height:70px;background: pink;margin-left: 10px;line-height: 80px;padding-left: 10px;font-weight: bold;color:#007bff;padding-left: 20px"><?php echo lesson($idlesson)['name_lesson'] ?>
				</div>
				<iframe width="850" height="500" src="<?php echo lesson($idlesson)['video'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="margin-left: 10px"></iframe>
		




				<!--  CHuyên đề -->
				<div style="margin-left: 10px;">
						<div id="accordion" style="height:10px;font-size: 13px">

					
					<?php foreach (topic_idcourse($idkh) as  $value){ ?>
						
				
								    <div class="card" style="overflow: auto">
								      <div class="card-header">
								        <a class="card-link" data-toggle="collapse" href="#collapse<?php echo $value['id_topic'] ?>" style="font-weight: bold;color: black">
								          + Chuyên đề : <?php echo $value['name_topic'] ?>
								        </a>
								      </div>
								      <div id="collapse<?php echo $value['id_topic'] ?>" class="collapse" data-parent="#accordion">
								        <div class="card-body">



								      	 <?php foreach (lesson_idtopic($value['id_topic']) as $value){ ?>
								       	
								      
								         <p><a href="baigiang.php?idlesson=<?php echo $value['id_lesson'] ?>&&idkh=<?php echo $idkh ?>"><img src="image/nut.jpg" style="width:20px;margin-right: 10px;margin-top: -1px">
								         	<?php echo $value['name_lesson'] ?>
								         </a></p>
								   		  <?php } ?>
								        </div>
								      </div>
								    </div>
					<?php } ?>
			
						</div>
				</div>





			</div>



			<!--  Bên phải -->
			<div style="width:380px;height:100%;box-shadow:5px 2px 9px 2px #888888;background: white;margin-left: 20px;float: left;padding-left: 10px;padding-top: 10px">
				<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
				  <li class="nav-item">
				    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Bài giảng</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Bình Luận</a>
				  </li>
			<!-- 	  <li class="nav-item">
				    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
				  </li> -->
				</ul>
				<!--  Bài giảng -->
				<div class="tab-content" id="pills-tabContent" >
				  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
					<?php $idtopic=lesson($idlesson)['id_topic']; ?>
					<?php foreach (lesson_idtopic($idtopic) as $value){ ?>
						
					
					<p><a href="baigiang.php?idlesson=<?php echo $value['id_lesson'] ?>&&idkh=<?php echo $idkh ?>" class="a" style="font-size: 14px"><?php echo $value['name_lesson']?></a></p>
						<?php } ?>
				  </div>



				  <div class="tab-pane fade " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
				<!--  hết bài giảng -->
				  	<!-- BÌNH LUẬN -->
					<form action="" method="POST" accept-charset="utf-8">
					
				  	<textarea name="binhluan" cols="38" style="height:35px;font-size: 14px"></textarea>
				  	<button type="submit" class="btn btn-primary" style="margin-top: -29px" >GỬI</button>

				    </form>
				  	<div style="width:360px;height:380px;background:white;float: left;overflow: auto;">
						
						<?php foreach (comment_idlesson($idlesson) as $value){ ?>
							<?php $idnguoidung=$value['id_user'];


							 ?>
						
							<div class="obinhluan">
								<div style="width:60px;background: none;height:60px;float: left;margin-right: 10px;">
									<img src="image/2.jpg" style="width:50px;height:50px;border-radius: 100px;margin-top: 5px;margin-left: 5px">
								</div>
								<div style="width:350px;background: white;height:60px;">
									<p style="font-size: 13px;color:#0070ba;"><?php echo users($idnguoidung)['name'] ?>
									<span style="float: right;margin-right: 5px;font-size: 11px;color:gray;padding-top: 1px">10/4/2019 4:42:19 PM&nbsp;&nbsp;</span>
									</p>
									<p style="font-size: 13px;color: black;margin-top: -15px">
										<?php echo $value['content'] ?>

										<?php if (isset($_SESSION['account'])){
											if ($_SESSION['account']['id']==$idnguoidung) {?>
												 <a href="" style="float: right;margin-right: 5px">Xóa</a></p>
									<?php }
										} ?>
											
										
										
								</div>

								<p style="width:350px;height:1px;background: gray;margin-top: 5px"></p>

							</div>
						<?php } ?>



			<!--  KẾT THÚC BÌNH LUẬN -->




				  </div>
				 <!--  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">.d.a.</div>
				</div> -->


			</div>

			</div>

	</div>
</div>
</div>

</body>
</html>