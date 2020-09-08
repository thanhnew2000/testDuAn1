<?php require_once '../commont/connect.php';session_start(); ?>
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



				


<body>
	<div class="w-100">
		<div class="row " style="width: 100%">
			<!--  MENU -->
 <?php include_once '../_share/admin/menu.php' ?>
 <!-- HẾT MENU -->

		
		<div class="col-md-10" style="background: #ddd;height:670px">
		<!--  HEADER -->
 <?php include_once '../_share/admin/header.php' ?>
 <!-- HẾT HEADER -->
			<div class="bodyad">
				<div class="thanbody">
				<p style="font-size: 20px;width:1000px;height:50px;background: white;line-height: 50px;padding-left: 10px;border-radius: 10px;color: #17a2b8;font-weight: bold">QUẢN LÍ ĐỀ THI - THÊM ĐỀ</p>

				<div class="noidung">


<script>

function tong1() {
  var de = document.getElementById("de").value;
  var tb = document.getElementById("tb").value;
  var kho = document.getElementById("kho").value;
  var de1 = Number(de);
  var tb1 = Number(tb);
  var kho1 = Number(kho);
  var tong=de1+tb1+kho1;
     document.getElementById('gan').value=tong;
}
function tong2() {
  var de = document.getElementById("de").value;
  var tb = document.getElementById("tb").value;
  var kho = document.getElementById("kho").value;
  var de1 = Number(de);
  var tb1 = Number(tb);
  var kho1 = Number(kho);
  var tong=de1+tb1+kho1;
     document.getElementById('gan').value=tong;
}
function tong3() {
  var de = document.getElementById("de").value;
  var tb = document.getElementById("tb").value;
  var kho = document.getElementById("kho").value;
  var de1 = Number(de);
  var tb1 = Number(tb);
  var kho1 = Number(kho);
  var tong=de1+tb1+kho1;
     document.getElementById('gan').value=tong;
}





</script>

<form action="" method="POST" accept-charset="utf-8">
				<div class="row">
				

			
					<div class="col-md-4">
						<p style="font-size:20px;font-weight: bold">Random câu hỏi</p>
				
						<!-- <p style="font-weight: bold">Random câu hỏi:</p> -->
						<div class="row" style="margin-left: -5px;margin-top: -20px">
							<div class="col-md-11">
						
						<p style="font-weight: bold">Môn:
						<select name="idmon" class="form-control">
							<?php foreach ($rowsubcategory as $value){ ?>
							<option value="<?php echo $value['id_subcategory']?>" >
								<?php echo $value['name_subcategory'].' - '.category($value['id_category'])['name_category']; ?>
							 </option>

							<?php } ?>
						</select></p></div></div>
						<div class="row" style="border: 1px solid #ddd;width:280px;margin-left: 10px;box-shadow: 1px 1px 1px gray">
							<div class="col-md-12" style="text-align: center;font-weight: bold;">Loại câu</div>
							<div class="col-md-4"><input id="de"  onkeyup="tong1()" type="number" class="form-control" name="caude"></div>
							<div class="col-md-4"><input id="tb"   onkeyup="tong2()" type="number" class="form-control" name="cautb"></div>
							<div class="col-md-4"><input id="kho"  onkeyup="tong3()" type="number" class="form-control" name="caukho"></div>
							
							<div class="col-md-3 offset-md-1" style="margin-left: 25px;font-weight: bold">Dễ</div>
							<div class="col-md-3" style="font-weight: bold;margin-left: 17px">TB</div>
							<div class="col-md-3" style="font-weight: bold;margin-left: 15px">Khó</div>
							<div class="col-md-8 offset-md-2" style="padding-right: -20px;">
							<input type="text" id="gan" value="" disabled="" class="form-control" name="" style="text-align: center;"></div>
							<div class="col-md-9 offset-md-1" style="text-align: center;margin-left: 35px;font-weight: bold">Tổng số câu</div>
							<p id="gan"></p>
						
						</div>

					

				
						
					<!-- 		<input type="radio" class="radio" name="mucdo" >Dễ
							<input type="radio" class="radio" name="mucdo" >Dễ
							<input type="radio" class="radio" name="mucdo" >Dễ -->
					</div>
					<div class="col-md-7" style="">
						<p style="font-size:20px;font-weight: bold ;text-align: center;">Thông tin đề</p>

					
					<div class="input-group mb-3" style="margin-top: 8px">
			   		<div class="input-group-prepend">
			      	 <span class="input-group-text">Tên đề</span>
			   		 </div>
			    	<input type="text" name="nametestnew" class="form-control">
					 </div>

					<div class="input-group mb-3" style="margin-top: 8px">
				     <div class="input-group-prepend">
			       <span class="input-group-text">Thời gian làm </span>
			    </div>
			    <input type="number" placeholder="Phút" name="timework" class="form-control">
			 </div>
					




			
				
				<button type="submit" class="btn btn-info" style="width:75%;margin-top: 50px;float: left;">Tạo đề</button>
				
				<a href="dethi.php" class="btn btn-danger" style="width:20%;margin-top: 50px;margin-left: 20px">Hủy</a>





				</div>
		</div>
</form>
		
					
				</div>
				</div>
				
			</div>
		</div>




		</div>
	</div>
</body>
</html>	