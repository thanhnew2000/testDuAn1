<?php require "./commont/connect.php" ;
?>	
<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Trang chủ</title>
	<link rel="stylesheet" href="css.css">
	<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->

	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<script src="public/js/jquery-3.4.1.slim.min.js"></script>
	<script src="public/js/popper.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
<!-- 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 -->

</head>
<script src="jquery-3.4.1.min.js"></script>
<script type='text/javascript'>
$(function(){$(window).scroll
(function(){if($(this).scrollTop()>=1000){$("#noop-top").
fadeIn()}else{$("#noop-top").fadeOut()}});$("#noop-top").
click(function(){$("body,html").animate({scrollTop:0},100);
return false})});</script><a href="http://www.windows2it.com/">
</a><a id='noop-top' style='display: none; position: fixed; 
bottom: 1px; right:1%; cursor:pointer;font:12px arial;'>
<img src='https://2.bp.blogspot.com/-
ExomXm9BGFw/UmFqgFo-rFI/AAAAAAAAAE4/JMc1KSveWco/s1600/Top.png'/></a></script>

<script>
    $('#myModal1').modal('show')
</script>
<body>

	<div class="wrapper">
		<div class="header">
			<div class="headerchild">
			<div class="row">
			<a href="" class="thea"><div class="col-md-2" style="height: 80px;"><img src="image/<?php echo $rowsetting['logo'] ?>" style="width:80px;margin-left: 40px;margin-top: 17px"></div></a>
			<div class="col-md-10">
				<div class="menu"  style="float: left;">
					<ul>
						<a href="" class="thea"><li>Trang chủ</li></a>
						
						<li class="dropdown">
			      		 <a href="danhsach.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Khóa học <span class="caret"></span></a>
			                <ul class="dropdown-menu">
			                	<?php foreach ($rowcategory as $value){ ?>
			                		
			                	
			                  		<li><a href="danhsach.php?idcate=<?php echo $value['id_category'] ?>"><?php echo $value['name_category'] ?></a></li><br>
			             
			         			 <?php  }?>
			                </ul>
             			 </li>



						<a href="giaovien.php" class="thea"><li>Giáo viên</li></a>
						<a href="luyende.php" class="thea"><li>Luyện đề</li></a>
						<a href="chiase.php" class="thea"><li>Chia sẻ</li></a>
					<!-- 	<a href="" class="thea"><li>Hỗ trợ</li></a> -->
					
					</ul>
					<?php if (!isset($_SESSION['account'])){ ?>
						
					
						<a href="dangky.php" class="btn btn-primary" style="float: right;margin-left: 10px;margin-top: -15px">Đăng ký</a> 
					<a href="dangnhap.php" class="btn btn-primary" style="float: right;margin-top: -15px">Đăng nhập</a> 

				<?php }else { ?>

						<div class="btn-group" style="float: right;margin-top: -30px">
						  <button type="button" class="btn btn-info" style="font-size: 14px">	<img src="public/images/user/<?php echo users($_SESSION['account']['id'])['image'] ?>" style="width:40px;height:35px;border-radius: 100px;"> <?php echo users($_SESSION['account']['id'])['name']?></button>
						  <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    <span class="sr-only">Toggle Dropdown</span>
						  </button>
						  <div class="dropdown-menu">
						    <a class="dropdown-item" href="thongtincanhan.php">Thông tin cá nhân</a>
						      <?php if (($_SESSION['account']['role'])=='100') { ?>
						    <a class="dropdown-item" href="admin/danhmuc.php">Trang quản trị</a>
						    <?php } ?>
						    <a class="dropdown-item" href="them.php?do=logout">Đăng xuất</a>
						  </div>
						</div>
					
				<?php } ?>
				</div>
			</div>
			</div>
			</div>
		</div>

	















<!-- Hết đăng nhập -->

		<div class="anhbia" style="background-image: url('public/images/advert/<?php echo slide_advert(1)['image'] ?>');">
				<h1 style="padding-top: 200px;margin-left: 100px " ><?php echo slide_advert(1)['title'] ?></h1>
				<form action="danhsach.php" method="POST" accept-charset="utf-8" style="padding-top: 50px;margin-left: 100px">

						<input type="text" name="tukhoasreach" class="form-control" placeholder="Tên khóa học" style="width:400px;float: left;margin-left: 50px;">
				
		<!--  -->
		<!--  -->

                    <?php
                   
            $sql = "SELECT * FROM category ";
            $result = executeQuery($sql, true);
            ?>
            <?php
            echo "<select name='lopsreach' class='form-control' style='width:250px;float: left;margin-left: 5px;'  onchange=\"showCustomer(this.value)\">";
             echo "<option> Chọn lớp</option>";
            foreach ($result as $value) {
                echo "<option value = '" . $value['id_category'] . "'>";
                echo $value['name_category'];
                echo "</option>";
            }
            echo "</select>";
            ?>
             		

 			      <div id="txtHint" style="width: 100%"></div>
            <script>
                function showCustomer(str) {
                    var xhttp;
                    if (str == "") {
                        document.getElementById("txtHint").innerHTML = "";
                        return;
                    }
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("txtHint").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", "ajax/getcustomer.php?q=" + str, true);
                    xhttp.send();
                }
            </script>
			<!--  -->
			<!--  -->
			
					<button type="submit"  class="btn btn-primary" style="margin-left: 5px;">Xem các khóa học</button>
				</form>

	
	</div>
		<!--  Tiêu đề  -->

		<div class="tieude">
<!-- 			<h3 style="text-align: center">Với chúng tôi</h3> -->
			<div class="otieude" style="margin-left: 210px">

				<img src="image/1.png" style="width:120px;height:120px;margin-left: 65px;margin-top: 20px">
				<p style="text-align: center;margin-top: 5px;font-size: 20px">Học mọi lúc mọi nơi</p>
				<p style="text-align: center">Chỉ cần có điện thoại máy tính bảng, laptop hoặc TV kết nối Internet</p>
			</div>

				<div class="otieude" style="margin-left: 80px">
				<img src="image/2.png" style="width:120px;height:120px;margin-left: 65px;margin-top: 20px">
				<p style="text-align: center;margin-top: 5px;font-size: 20px">Chất lượng</p>
				<p style="text-align: center">Khóa học chất lượng, cập nhật liên tục, bán sát kỳ thi THPT QG 2020</p>
			</div>
				<div class="otieude" style="margin-left: 80px">
				<img src="image/3.png" style="width:130px;height:120px;margin-left: 65px;margin-top: 20px">
				<p style="text-align: center;margin-top: 5px;font-size: 20px">Học phí phù hợp </p>
				<p style="text-align: center">Học phí rẻ - bất kỳ học sinh nào cũng có thể học</p>
			</div>


		</div>


		<!--  Hết tiêu đề -->


		<div class="body">
			<!--  HÀNG 1 -->
			<div class="hang1">
				<p style="margin-left: 10px;font-weight: bold;font-size: 17px;border-bottom: 2px solid gold;width:200px">Khóa học mới nhất</p>
		<!-- 		<a href=""  style="margin-top:-35px;margin-left:10px;    margin-right: 10px;font-weight: bold; float: right;font-size: 14px">Xem thêm</a> -->
				<?php 

		$sqlcourse="select * from course order by id_course desc limit 4";
		$querycourse=$conn->prepare($sqlcourse);
		$querycourse->execute();
		$rowcourse=$querycourse->fetchAll(PDO::FETCH_ASSOC);

				 ?>

		
			<?php foreach ($rowcourse as $value){ ?>
			
	
				<div class="box">
					<div class="boxtren"><img src="public/images/course/<?php echo $value['image'] ?>" style="height: 170px;width:270px"></div>
					<div class="boxduoi">
					<a href="chitietkhoahoc.php?idkh=<?php echo $value['id_course'] ?>" class="thea"><p style="font-weight: bold;color: black;margin-left: 10px;height:27px">
						<?php echo $value['name_course'] ?>
					</p></a>
						<img src="public/images/teacher/<?php echo teacher($value['id_teacher'])['image'] ?>" style="height: 45px;width: 45px;border-radius: 100%;float: left;margin-left: 10px;margin-top: 5px">
						<p style="margin-top: 25px;margin-left: 100px"><?php echo teacher($value['id_teacher'])['name'] ?></p>
						<p style="margin-left: -45px;margin-top: 10px;float: left;font-weight: bold;color:red">Miễn Phí</p>
						<a href="chitietkhoahoc.php?idkh=<?php echo $value['id_course'] ?>" class="btn btn-primary" style="float: right;margin-right: 10px"> Xem chi tiết </a>
					</div>
				</div>
			<?php  }?>
			
			</div>
				<!-- HẾT HÀNG 1 -->
	
				<div class="hang2" style="margin-top: 35px">
						<p style="margin-left: 10px;font-weight: bold;font-size: 17px;border-bottom: 2px solid gold;width:200px">Khóa học khối 12</p>

				<a href="danhsach.php?idcate=2&&idmon=1" style="margin-top:-35px;margin-left:10px;    margin-right: 10px;font-weight: bold; float: right;font-size: 14px">Xem thêm</a>

				<?php 
						$sqlarraysub="select id_subcategory from subcategory where id_category=2 ";
						$queryarraysub=$conn->prepare($sqlarraysub);
						$queryarraysub->execute();
						$rowsub=$queryarraysub->fetchAll(PDO::FETCH_ASSOC);
					$mang=[];
					foreach ($rowsub as $value) {

						$idsub=$value['id_subcategory'];
				
						$sqlcourse12="select * from course where id_subcategory='$idsub' order by id_course desc limit 1 ";
						$querycourse12=$conn->prepare($sqlcourse12);
						$querycourse12->execute();
						$rowcourse12=$querycourse12->fetchAll(PDO::FETCH_ASSOC);
			
					
							 ?>

				<?php foreach ($rowcourse12 as $value){ ?>
							
						

						<div class="box">
							<div class="boxtren"><img src="public/images/course/<?php echo $value['image'] ?>" style="height: 170px;width:270px"></div>
							<div class="boxduoi">
							<a href="chitietkhoahoc.php?idkh=<?php echo $value['id_course'] ?>" class="thea"><p style="font-weight: bold;color: black;margin-left: 10px;height:27px">
								<?php echo $value['name_course'] ?>
							</p></a>
								<img src="public/images/course/<?php echo $value['image'] ?>" style="height: 45px;width: 45px;border-radius: 100%;float: left;margin-left: 10px;margin-top: 5px">
								<p style="margin-top: 25px;margin-left: 100px"><?php echo teacher($value['id_teacher'])['name'] ?></p>
								<p style="margin-left: -45px;margin-top: 10px;float: left;font-weight: bold;color:red">Miễn Phí</p>
								<a href="chitietkhoahoc.php?idkh=<?php echo $value['id_course'] ?>" class="btn btn-primary" style="float: right;margin-right: 10px"> Xem chi tiết </a>
							</div>
						</div>
				<?php }} ?>		

				
				</div>
				<!--  HẾT HÀNG 2 -->
				<!--  HÀNG 2 LẦN 2 -->
				<div class="hang2">
				<a href="<?php echo slide_advert(2)['link'] ?>"><img src="public/images/advert/<?php echo slide_advert(2)['image'] ?>" alt="" style="height: 350px;width:500px;float: left;border-radius: 10px"></a>
					<div class="advertbig">
						<a href="<?php echo slide_advert(3)['link'] ?>"><img src="public/images/advert/<?php echo slide_advert(3)['image'] ?>" class="advertsmall"></a>
						<a href="<?php echo slide_advert(4)['link'] ?>"><img src="public/images/advert/<?php echo slide_advert(4)['image'] ?>" class="advertsmall" style="margin-top: 10px"></a>

					</div>
					<!--  <div style="float: left;width:200px;height:50px;background: black">Kết nối</div> -->
						<div class="topic">
							<a href="<?php echo slide_advert(5)['link'] ?>"><img src="public/images/advert/<?php echo slide_advert(5)['image'] ?>" style="width:100%;height:350px" ></a>
						</div>
					

				</div>


				<div class="hang3">
					<p style="text-align: center;font-size: 22px;padding-top: 10px;font-weight: bold">Giáo viên </p>

					<?php 
						$sqlteacher2="select * from teacher order by rand() limit 4 ";
						$queryteacher2=$conn->prepare($sqlteacher2);
						$queryteacher2->execute();
						$rowteacher2= $queryteacher2->fetchAll(PDO::FETCH_ASSOC);
					 ?>

					 <?php foreach ($rowteacher2 as $value){ ?>
					 	
					 
					<div class="cotgiaovien">
						<img src="public/images/teacher/<?php echo teacher($value['id_teacher'])['image']; ?>" style="height: 250px;background: gold;width:100%">
						<div class="cotgiaoviendown">
							<a href="chitietgiaovien.php?idgiaovien=<?php echo $value['id_teacher'] ?>" class="thea"><p style="text-align: center;margin-top: 10px;font-weight: bold">
								<?php if ((teacher($value['id_teacher'])['gender'])==2){echo 'Cô';}
							else{echo 'Thầy';} ?>
								<?php echo teacher($value['id_teacher'])['name'] ?></p></a>
							<div style="font-size: 13px;margin-left: 5px;text-align: center;">
							<?php  $thongtin=substr(teacher($value['id_teacher'])['infomation'],0,215) ?>
						<?php echo  $thongtin.'...</br>'; ?>
				
							</div>

						</div>
					</div>

					<?php } ?>
					
			




				</div>




	<a style="display:scroll;position:fixed;bottom:5px;right:5px;" href="#" title="Back to Top"><img src="https://2.bp.blogspot.com/-
ExomXm9BGFw/UmFqgFo-rFI/AAAAAAAAAE4/JMc1KSveWco/s1600/Top.png"/></a>  


			<div class="hangchiase">
				<p style="font-weight: bold;text-align: center;font-size:22px;padding-top: 10px">Học sinh chia sẻ</p>


				<?php 

		
				$sqlchiase_="select * from share where status='2' order by id_share desc limit 3 ";
				$qrchiase=$conn->prepare($sqlchiase_);
				$qrchiase->execute();
				$rowcs= $qrchiase->fetchAll(PDO::FETCH_ASSOC);
		


				 ?>
				<?php foreach ($rowcs as $value){ 
					$iduserchiase=$value['id_user'];
					?>
					
		
				<div class="boxchiase">
					<div class="chiaseup"><img src="public/images/user/<?php echo users($iduserchiase)['image'] ?>" style="width:120px;height:120px;border-radius: 100%;text-align: center;margin-left: 115px">
					</div>
					<div class="chiasedown">
						<p style="text-align: center;font-size: 17px;font-weight: bold"><?php echo users($iduserchiase)['name']; ?></p>
						<p style="margin-left: 35px;text-align: center;width:280px">
							<span style="font-size: 20px">"</span>
						<?php echo $value['content']; ?>
							<span style="font-size: 20px">"</span>
						</p>
					</div>
				</div>
					
					<?php } ?>



			</div>



		</div>
<!-- div.header2 -->
    <?php include_once '_share/client/footer.php' ?>
<!-- hết div.header2 -->
	</div>
</body>
</html>