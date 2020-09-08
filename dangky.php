<?php require "./commont/connect.php" ?>	
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Đăng ký</title>
		<link rel="stylesheet" href="css.css">
<!-- 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<script src="public/js/jquery-3.4.1.slim.min.js"></script>
	<script src="public/js/popper.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>

</head>
<body>
<!-- div.header2 -->
    <?php include_once '_share/client/header.php' ?>
<!-- hết div.header2 -->
		<div style="background-image: url(image/5.jpg);width:100%;height:200px;">
				<div style="background-image: url(image/Untitled-1.png);width:100%;height:200px;">
	
				<p style=" color: white;line-height:200px;text-align:center;font-size: 25px">
					 Đăng Ký
				</p>
			</div>
		</div>
		<div class="formdn" style="width: 500px;margin: auto;height: 750px;margin-top: 20px"> 
		
								<form action="" method="POST">
								<p style="font-weight: bold">Họ và tên</p>
								<input type="text"  class="form-control" required="" name="name">
								<p style="font-weight: bold">Tài khoản</p>
								<input type="text"  class="form-control" required="" name="user">
								
								<p style="font-weight: bold">Mật khẩu</p>
								<input type="password"  class="form-control" required="" name="pass">
								<p style="font-weight: bold">Nhập lại mật khẩu</p>
								<input type="password"  class="form-control" required="" name="pass2">
							
								<p style="font-weight: bold">Email</p>
								<input type="email"  class="form-control" required="" name="email">
						<p style="font-weight: bold">
								Số điện thoại</p>
								<input type="number"  class="form-control" required="" name="sdt">
								<p style="font-weight: bold">Ngày sinh
								<input type="date"  class="form-control"  name="ngaysinh">
								<p style="font-weight: bold">Giới tính </p>
								<select name="gioitinh" class="form-control" >
									<option value="1">Nam</option>
									<option value="2">Nữ</option>
								</select>
							
							<button type="submit" name="dangky" class="btn btn-primary" style="float: right;margin-top: 20px;margin-right: 5px"> Đăng ký</button>
					</form>
	</div>

				<?php if (isset($_POST['dangky'])){ 
					if ($_POST['pass']==$_POST['pass2']) {
						$namedk=$_POST['name'];
						$usernamedk=$_POST['user'];
						$passworddk=password_hash($_POST['pass'],PASSWORD_DEFAULT);
						$emaildk=$_POST['email'];
						$sdtdk=$_POST['sdt'];
						$birthdaydk=$_POST['ngaysinh'];
						$gioitinhdk=$_POST['gioitinh'];

						$kiemtra="SELECT * FROM users WHERE username='$usernamedk'";
		             	$kq=$conn->prepare($kiemtra);
					    $kq->execute();
					    $rowkq=$kq->fetch(PDO::FETCH_ASSOC);

						$kiemtra2="SELECT * FROM users WHERE email='$emaildk'";
		             	$kq2=$conn->prepare($kiemtra2);
					    $kq2->execute();
					    $rowkq2=$kq2->fetch(PDO::FETCH_ASSOC);



					    if (isset($rowkq['name'])) {  ?>
					    	<script type="text/javascript">alert("Tài khoản đã tồn tại hãy nhập tài khoản khác")</script>
					 <?php  }else if (isset($rowkq2['email'])) { ?>
							<script type="text/javascript">alert("Email đã tồn tại ")</script>
					<?php   } else{

					if ($gioitinhdk==1) {
						 $dk="INSERT INTO users(username,password,name,phone_numbers,email,birthday,gender,image,role_id,status)
             		 values ('$usernamedk','$passworddk','$namedk','$sdtdk','$emaildk','$birthdaydk','$gioitinhdk','1.png',1,1)";
             			$ok=$conn->exec($dk);
							}	else {
									 $dk="INSERT INTO users(username,password,name,phone_numbers,email,birthday,gender,image,role_id,status)
             		 values ('$usernamedk','$passworddk','$namedk','$sdtdk','$emaildk','$birthdaydk','$gioitinhdk','2.jpg',1,1)";
             			$ok=$conn->exec($dk);
							}	
				


             		 if (isset($ok)) {
             	 	 ?> <script type="text/javascript">alert("Đăng ký thành công");</script>  <?php  
             	 	
             	}  
					}
					}else{ ?>
 							<script type="text/javascript">alert("Mật khẩu không trùng khớp");</script> 
				<?php 	}
					
				 } ?>







<!-- div.header2 -->
    <?php include_once '_share/client/footer.php' ?>
<!-- hết div.header2 -->
	</div>
</body>
</html>