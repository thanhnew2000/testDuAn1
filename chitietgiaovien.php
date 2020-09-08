<?php require "./commont/connect.php" ?>	
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Chi tiết GV</title>
	<link rel="stylesheet" href="css.css">
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<script src="public/js/jquery-3.4.1.slim.min.js"></script>
	<script src="public/js/popper.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>


</head>
	<!-- div.header2 -->
    <?php include_once '_share/client/header.php' ?>
<!-- hết div.header2 -->


<?php if (isset($_GET['idgiaovien'])) {
	$idgiaovien=$_GET['idgiaovien'];
} ?>


<body style="width:1347px;margin: auto;background: #eef1f2;">

	<div style="width:1347px;height:500px;background: white;font-size: 20px;margin: auto">
		<div class="col-md-3 offset-md-3"  style="width:100%;height:500px;padding-top: 200px;float: left;">
		<p><?php if ((teacher($idgiaovien)['gender'])==2){echo 'CÔ GIÁO';} 
		else {echo 'THẦY GIÁO';	}?>
			
	
		<p class="gachchan" style="width:300px;margin-top: -10px;margin-top: -10px"></p>
		<Br>
			<p style="color: #0067b4;font-weight: bold;"><?php echo teacher($idgiaovien)['name']; ?></p>
			<p class="gachchan" style="width:300px;margin-top: -10px;"></p><br>
			<p>Giáo viên dạy : <?php echo teacher($idgiaovien)['specialize'] ?></p>
		</div>
		<div  class="col-md-2"  style="float: left;"><img src="public/images/teacher/<?php echo teacher($idgiaovien)['image']; ?>" style="width:300px;height:300px;margin-top: 150px"></div>
	</div>

	
		<div style="width:1347px;margin: auto">
				<div style="background-image: url(image/5.jpg);width:100%;height:200px;">
				<div style="background-image: url(image/Untitled-1.png);width:100%;height:200px;">


				<div class="row" style="width:1347px;margin: auto">
			<!-- 	<div class="col-md-3" style="float: left;margin-left: 150px">
				<p style=" color: white;padding-top: 70px;margin-left: 50px;font-size: 25px;text-align: center;font-weight:bold">1.000 +</p>
				<p style="background: gold; height:3px;width:100px;margin-left: 129px;text-align: center;"></p>
				<p style=" color: white;margin-left: 50px;text-align: center;">Học sinh theo dõi</p>
				</div> -->


				<div class="col-md-3 offset-md-3" style="float: left;">
				<p style=" color: white;padding-top: 70px;margin-left: 50px;font-size: 25px;text-align: center;font-weight:bold">
				
				<?php 
				$tong=[];
				$sqlabc1="select * from course where id_teacher='$idgiaovien' ";
				$queryabc1=$conn->prepare($sqlabc1);
				$queryabc1->execute();
				$rowabc1= $queryabc1->fetchAll(PDO::FETCH_ASSOC);

				foreach ($rowabc1 as $value) {
					$id_course=$value['id_course'];
				$sqlabc2="select * from topic where id_course='$id_course' ";
				$queryabc2=$conn->prepare($sqlabc2);
				$queryabc2->execute();
				$rowabc2=$queryabc2->fetchAll(PDO::FETCH_ASSOC);


				foreach ($rowabc2 as $value) {
					$id_topic=$value['id_topic'];
				$sqlabc3="select * from lesson where id_topic='$id_topic' ";
				$queryabc3=$conn->prepare($sqlabc3);
				$queryabc3->execute();
				$rowabc3=$queryabc3->fetchAll(PDO::FETCH_ASSOC);

				foreach ($rowabc3 as $value) {
					array_push($tong,$value['id_lesson']);
				}
				}

				}
			 	$a=count($tong);
			 	echo $a.'+';

				 ?>


			



				</p>
				<p style="background: gold; height:3px;width:100px;margin-left: 129px;text-align: center;"></p>
				<p style=" color: white;margin-left: 50px;text-align: center;">Bài giảng online</p>
				</div>


				<div class="col-md-3" style="float: left;">
				<p style=" color: white;padding-top: 70px;margin-left: 50px;font-size: 25px;text-align: center;font-weight:bold">
				<?php echo teacher($idgiaovien)['experience_time']; ?> +</p>
				<p style="background: gold; height:3px;width:100px;margin-left: 129px;text-align: center;"></p>
				<p style=" color: white;margin-left: 50px;text-align: center;">Năm kinh nghiệm</p>
				</div>


			</div>

		</div>
			</div>
			<div class="row" style="width:1347px;margin: auto">
	   			<div class="hanggv">
	   				<div class="boxctgv">
	   				<div class="row" style="width:1000px;margin:auto">
	   					<!-- box giáo viên -->
	   					<div class="col-md-6" style="background: none">
	   						<img src="public/images/teacher/<?php echo teacher($idgiaovien)['image']; ?>" style="width:100%;height:380px">
	   					</div>
	   					<div class="col-md-6" style="background: white;box-shadow: 1px 5px 8px #888888">
	   						<div class="otieudegv">
	   							<p style="text-align: center;line-height: 60px;color: white;font-size:20px">THÔNG TIN GIÁO VIÊN</p>
	   							<table class="table">
	   						
	   								<tbody>
	   									<tr>
	   										<td colspan="2"><img src="image/people.png" style="height:100&;height:30px;float: left;margin-right: 20px"> 
	   										<div style="width:200px;height:50px;font-size:14px;padding-left: 20px;margin-top: -10px">
	   											<div style="font-weight: bold">
	   												Họ và tên
	   											</div>
	   											<div>
	   												<?php echo teacher($idgiaovien)['name']; ?>
	   											</div>
	   										</div>
	   									</td>

	   									</tr>

	   									<tr>
	   										<td colspan="2"><img src="image/addres.jpg" style="height:100%;height:30px;float: left;margin-right: 20px"> 
	   										<div style="width:200px;height:50px;font-size:14px;padding-left: 20px;margin-top: -10px">
	   											<div style="font-weight: bold">
	   												Nơi công tác
	   											</div>
	   											<div style="width:300px">
	   												<?php echo teacher($idgiaovien)['workplace']; ?>
	   											</div>
	   										</div>
	   									</td>	
	   									</tr>

										<tr>
	   										
	   										<td><img src="image/book.png" style="height:30px;float: left;margin-right: 20px"> 
	   										<div style="width:200px;height:50px;font-size:14px;padding-left: 20px;margin-top: -10px">
	   											<div style="font-weight: bold">
	   											Môn dạy
	   											</div>
	   											<div>
	   												<?php echo teacher($idgiaovien)['specialize']; ?>
	   											</div>
	   										</div>
	   									   </td>	
	   										
	   										
			   										<td><img src="image/mu.png" style="height:100&;height:30px;float: left;margin-right: 20px"> 
			   										<div style="width:200px;height:50px;font-size:14px;padding-left: 20px;margin-top: -10px">
			   											<div style="font-weight: bold">
			   												Học vị
			   											</div>
			   											<div>
			   												<?php echo teacher($idgiaovien)['degree']; ?>
			   											</div>
			   										</div>
	   									   			</td>	
	   									



	   									</tr>

	   									<tr>
	   										
	   										<td colspan="2"><img src="image/email.png" style="height:30px;float: left;margin-right: 20px"> 
	   										<div style="width:200px;height:50px;font-size:14px;padding-left: 20px;margin-top: -10px">
	   											<div style="font-weight: bold">
	   											Email
	   											</div>
	   											<div style="width:250px;font-size: 13px">
	   												<?php echo teacher($idgiaovien)['email']; ?>
	   											</div>
	   										</div>
	   											</td>
	   									



	   									</tr>
	   								</tbody>
	   							</table>
	   						</div>
	   					</div>
	   				</div>

	   				</div>
	   			</div>

	   			<div class="hanggv">
	   			 <div style="width:700px;margin:auto;">
	   				<p style="text-align: center;font-size: 20px">Đôi nét về giáo viên</p>
	   				<div style="text-align: left;font-size: 20px;background: #fef7a4;box-shadow: 1px 1px 8px #888888;">
	   					<div style="width:650px;margin:auto;font-size: 15px;padding-top: 15px;padding-bottom: 15px">
	   						<?php echo teacher($idgiaovien)['infomation']; ?>
	   					</div>
</div>
	   			</div>




		</div>
</div>


		
















		<div class="footer" style="border-top: 1px solid #ddd;width:1347px;margin: auto">
				<div class="boxfoter" style="margin-left: 110px;">

				<p style="padding-top: 20px;font-weight: bold">VỀ CHÚNG TÔI</p>
				<a href="" class="thea"><p style="font-size:14px">Giới thiệu</p></a>
				<a href=""  class="thea"><p style="font-size:14px">Các giáo viên</p></a>
				<a href=""  class="thea"><p style="font-size:14px">Điều khoản và chính sách</p></a>
			</div>
			<div class="boxfoter">

				<p style="padding-top: 20px;font-weight: bold">HỖ TRỢ KHÁCH HÀNG</p>
				<a href=""  class="thea"><p style="font-size:14px">Email: hotro@hocmai.vn</p></a>
				<a href=""  class="thea"><p style="font-size:14px">SĐT : 0983298429</p></a>
			</div>
			<div class="boxfoter">
			</br></br>
				<img src="image/dangky.png" style="width:200px;">
				<!-- <p style="font-size:14px;text-align: center">Đơn vị chủ quản: Công ty cổ phần công nghệ giáo dục Zuni
GPKD: 0313282391 cấp ngày 01/06/2015 tại Sở Kế Hoạch và Đầu Tư TP Hồ Chí Minh
Địa chỉ văn phòng: 457 Nguyễn Đình Chiểu, Phường 05, Quận 03, TP Hồ Chí Minh</p> -->
			</div>
			<div class="boxfoters">

				<p style="padding-top: 20px;font-weight: bold">Ủng hộ chúng tôi</p>
				<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FFeeling.wd%2F%3F__tn__%3DkCH-R%26eid%3DARBiqg9lqU0fx6nDx6VRI0aIUGuiXVitcManDeViRh0e64sNh5X96hjvQPjoK7hCLerbiY5dMmQ1cdJA%26hc_ref%3DART3Z04Ke5nI6oXON_J6cunxcXcpiR735d1vA1tRFKx_2blQv6yV2hH2ctGmLS_oBeE%26fref%3Dnf&tabs=300&width=300&height=170&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="300" height="170" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
			</div>
		</div>


</body>
</html>