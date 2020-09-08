
<?php require "./commont/connect.php";date_default_timezone_set('Asia/Ho_Chi_Minh');
 ?>	
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
</head>

	<?php if (isset($_GET['idkh'])) {
		$idlesson=$_GET['idlesson'];
		$idkh=$_GET['idkh'];
		
		if (isset($_SESSION['account'])) {
				$iduser=$_SESSION['account']['id'];
				$time=date('Y-m-d H:i:s');

				// $last_id = $connhistory->lastInsertId();
				// $idlesson_kiemtra=history($last_id)['id_lesson'];
				// $idlesson_user=history($last_id)['id_user'];


				$sqlhistory="INSERT INTO history VALUES ('','$idlesson','$time','$iduser')";
			  	$conn->exec($sqlhistory);
				
		
				}
			}

 ?>











		<?php 
		// if (isset($_POST['binhluan'])) {

		//if (isset($_SESSION['account'])) {
		//	$time=date('Y-m-d H:i:s');
		//	$noidung=$_POST['binhluan'];
			//$iduser=$_SESSION['account']['id'];

			//$sqlbinhluan="INSERT INTO comment VALUES ('','$idkh','$time','$noidung','$iduser')";
  			//$conn->exec($sqlbinhluan);
  		//	header("location: baigiang2.php?idlesson=$idlesson&&idkh=$idkh");
			
		//}else {
			//header("location: dangnhap.php");
	//	}


		//}
		
	
		// if (isset($_GET['xoaidbl'])) {
		// 	$xoaidbl=$_GET['xoaidbl'];

		// $sqlxoabl="DELETE FROM comment WHERE id_comment='$xoaidbl' " ;
		// $conn->exec($sqlxoabl);

		// }

		// ?>




<style type="text/css" media="screen">

	.scrollbar {
margin-left: 30px;
float: left;
height: 300px;
width: 65px;
background: #fff;
overflow-y: scroll;
margin-bottom: 25px;
}
.force-overflow {
min-height: 450px;
}

.scrollbar-primary::-webkit-scrollbar {
width: 12px;
background-color: #F5F5F5; }

.scrollbar-primary::-webkit-scrollbar-thumb {
border-radius: 10px;
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #4285F4; }

.scrollbar-danger::-webkit-scrollbar-track {
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #F5F5F5;
border-radius: 10px; }

.scrollbar-danger::-webkit-scrollbar {
width: 12px;
background-color: #F5F5F5; }

.scrollbar-danger::-webkit-scrollbar-thumb {
border-radius: 10px;
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #ff3547; }

.scrollbar-warning::-webkit-scrollbar-track {
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #F5F5F5;
border-radius: 10px; }

.scrollbar-warning::-webkit-scrollbar {
width: 12px;
background-color: #F5F5F5; }

.scrollbar-warning::-webkit-scrollbar-thumb {
border-radius: 10px;
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #FF8800; }

.scrollbar-success::-webkit-scrollbar-track {
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #F5F5F5;
border-radius: 10px; }

.scrollbar-success::-webkit-scrollbar {
width: 12px;
background-color: #F5F5F5; }

.scrollbar-success::-webkit-scrollbar-thumb {
border-radius: 10px;
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #00C851; }

.scrollbar-info::-webkit-scrollbar-track {
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #F5F5F5;
border-radius: 10px; }

.scrollbar-info::-webkit-scrollbar {
width: 12px;
background-color: #F5F5F5; }

.scrollbar-info::-webkit-scrollbar-thumb {
border-radius: 10px;
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #33b5e5; }

.scrollbar-default::-webkit-scrollbar-track {
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #F5F5F5;
border-radius: 10px; }

.scrollbar-default::-webkit-scrollbar {
width: 12px;
background-color: #F5F5F5; }

.scrollbar-default::-webkit-scrollbar-thumb {
border-radius: 10px;
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #2BBBAD; }

.scrollbar-secondary::-webkit-scrollbar-track {
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #F5F5F5;
border-radius: 10px; }

.scrollbar-secondary::-webkit-scrollbar {
width: 12px;
background-color: #F5F5F5; }

.scrollbar-secondary::-webkit-scrollbar-thumb {
border-radius: 10px;
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #aa66cc; }
	
</style>
	
</style>
<body>
	<?php if (isset($_GET['idkh'])) {

	$idkh=$_GET['idkh'];
	$idgiaovien=course($idkh)['id_teacher'];


	
} ?>

	<!-- div.header2 -->
    <?php include_once '_share/client/header.php' ?>
<!-- hết div.header2 -->
		<div style="background-image: url(image/5.jpg);width:100%;height:200px;">
				<div style="background-image: url(image/Untitled-1.png);width:100%;height:200px;">
	
				<p style=" color: white;padding-top: 70px;margin-left: 50px;font-size: 21px">
					<?php echo course($idkh)['name_course']; ?>		<a href="chitietkhoahoc.php?idkh=<?php echo $idkh ?>" class="btn btn-info">Xem khóa học</a>
				</p>
				<p style=" color: white;padding-top: 20px;margin-left: 50px;font-size: 17px">
					Giáo viên : <?php if ((teacher($idgiaovien)['gender']==1)){echo 'Thầy';}else {
						echo "Cô";
					} ?>
						
				
					<?php echo teacher($idgiaovien)['name'] ?> <img src="public/images/teacher/<?php echo teacher($idgiaovien)['image'] ?>" style="width: 50px;height:50px;border-radius: 100%">
				</p>
			</div>

			</div>


		<div class="row" style="width:1350px">
			<div class="col-md-10 offset-md-1" style="height:50px;line-height: 50px;font-size: 20px;margin-top: 10px;margin-bottom: 5px;background: #007bff;color:white"><?php echo lesson($idlesson)['name_lesson'] ?>
		
			</div>
			<div class="col-md-7 offset-md-1" style="background: none">
					<iframe width="770" height="480" src="<?php echo lesson($idlesson)['video'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style=""></iframe>
			</div>
			<div class="col-md-3" style="background: none">
				


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
				 <div class="scrollbar scrollbar-primary" style="width:100%;margin-left: -2px;height:420px">
				  <div class="force-overflow">
					<?php foreach (topic_idcourse($idkh) as  $value){ ?>
						
				
								    <div>
								      <div style="background: #d8d4d4;font-size: 14px;border-radius: 5px;height: 25px;line-height: 25px;font-family: tahoma">
								    <span style="font-weight: bold;color: #2a2727;padding-left: 10px">
								          Chuyên đề : <?php echo $value['name_topic'] ?></span>
								      
								      </div>
								      <div>
								        <div style="margin-left: 10px;font-size: 14px">



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
			</div>

				  </div>



				  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
				<!--  hết bài giảng -->
	<!-- BÌNH LUẬN -->

		  	<!-- AJAX cho bình luận -->

						<script type="text/javascript">
							
							$(document).ready(function(){
								$("#gui").click(function(){
									var noidungbl= $("#ndbinhluan").val();
									var idkh= $("#idkh").val();
									var idlesson= $("#idlesson").val();
										$.get("xulybinhluanAJAX.php",{noidungbl:noidungbl,idkh:idkh,idlesson:idlesson}, function(data){
												$("#ok").html(data);
										})

								})
							})


					


								$(document).ready(function(){
									var idkh = $("#idkh").val();
									var idlesson= $("#idlesson").val();
										$.get("xulybinhluanAJAX.php",{idkh:idkh,idlesson:idlesson}, function(data){
												$("#ok").html(data);
										})
								})



							// $(document).ready(function(){
							// 	$("#xoabl").click(function(){
							// 		var idbl= $("#idbinhluan").val();
							// 			$.get("xulybinhluanAJAX.php",{xoaidbl:idbl}, function(data){
							// 					$("#ok").html(data);
							// 			})

							// 	})
							// })
						</script>

					<!--  AJAX BÌNH LUẬN KẾT THÚC -->

		<!-- 			<form action="" method="POST" accept-charset="utf-8"> -->
					
				  	<textarea name="binhluan" id="ndbinhluan" cols="38" style="height:38px;font-size: 14px;border-radius: 5px;width:250px;    border: 1px solid #c8c4c4;"></textarea>
				  	<input type="type" id="idkh" hidden="" value="<?php echo $idkh ?>">
				  		<input type="type" id="idlesson" hidden="" value="<?php echo $idlesson ?>">
				
				  	<?php if (isset($_SESSION['account'])){ ?>
				  		<button type="button" class="btn btn-primary" id="gui" style="margin-top: -29px" >GỬI</button>
				  	<?php }else { ?>
				  		<a href="dangnhap.php" class="btn btn-primary"  style="margin-top: -29px" >GỬI</a>
				   	<?php } ?>
				  	

		<!-- 		    </form> -->
			<!-- 	  	<div style="width:360px;height:380px;background:green;float: left;overflow: auto;"> -->
				  <div class="scrollbar scrollbar-primary" style="width:335px;margin-left: -2px;height:380px">

			

				  <div class="force-overflow" id="ok">
			

			

					</div>

			</div>

			</div>


</body>
</html>