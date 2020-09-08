<?php 
require_once '../commont/connect.php';session_start(); ?>
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
	<script type="text/javascript" src="../public/ckeditor/ckeditor.js"></script>
</head>

<?php 

if (isset($_GET['suacauhoi'])) {
	$idsuacau=$_GET['suacauhoi'];
	
}

if (isset($_POST['guithem'])) {
	$idmonthem=$_POST['idmonthem'];
	$cauhoithem=$_POST['cauhoithem'];
	$anhthem=$_POST['anhthem'];
	$levelthem=$_POST['levelthem'];
	$athem=$_POST['athem'];
	$bthem=$_POST['bthem'];
	$cthem=$_POST['cthem'];
	$dthem=$_POST['dthem'];
	$dapanthem=$_POST['dapanthem'];



	$sqlthemquestion = "INSERT INTO question VALUES ('','$cauhoithem','$anhthem','$athem','$bthem','$cthem','$dthem','$dapanthem','$levelthem','$idmonthem')";
 	$conn->exec($sqlthemquestion);
	header("location: cauhoi.php");
	
}

if (isset($_POST['guisua'])) {
	upload('anhsua','../public/images/test/');
	$idsuacau=$_GET['suacauhoi'];
	$idmonsua=$_POST['idmonsua'];
	$cauhoisua=$_POST['cauhoisua'];

	$anhsua=$_FILES['anhsua']['name'];
	$levelsua=$_POST['levelsua'];
	$asua=$_POST['asua'];
	$bsua=$_POST['bsua'];
	$csua=$_POST['csua'];
	$dsua=$_POST['dsua'];
	$dapansua=$_POST['dapansua'];

	if ($anhsua=="") {
			$spldoi="UPDATE question SET name_question='$cauhoisua',a='$asua',b='$bsua',c='$csua',d='$dsua',answer='$dapansua',id_subcategory='$idmonsua'
	WHERE id_question='$idsuacau' ";
	$conn->exec($spldoi);
	header("location: cauhoi.php");
	}else {
		$spldoi="UPDATE question SET name_question='$cauhoisua' ,image='$anhsua',a='$asua',b='$bsua',c='$csua',d='$dsua',answer='$dapansua',id_subcategory='$idmonsua'
	WHERE id_question='$idsuacau' ";
	$conn->exec($spldoi);
	header("location: cauhoi.php");
	}
	

	
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



 <script type="text/javascript">
	  function quay_lai(){
          history.back();
      }
</script>

			<div class="bodyad">
				<div class="thanbody">
				<p style="font-size: 20px;width:1000px;height:50px;background: white;line-height: 50px;padding-left: 10px;border-radius: 10px;font-weight: bold;color:#17a2b8"> <?php if (!isset($_GET['suacauhoi'])){
					echo 'THÊM CÂU HỎI';
				}else{
					echo 'SỬA CÂU HỎI - ID :'.$idsuacau;
				} ?>
					
				</p>

				<div class="noidung">
				
					
			
				<div class="row">

<!-- THÊM -->
					<?php if (!isset($_GET['suacauhoi'])){ ?>



					<div class="col-md-4">
						<form method="POST">
						<p style="font-size:20px;font-weight: bold">Nội dung câu hỏi</p>
						<p style="font-weight: bold">Môn:
						<select name="idmonthem" class="form-control">
							<?php foreach ($rowsubcategory as $value){ ?>
							<option value="<?php echo $value['id_subcategory']?>" >
								<?php echo $value['name_subcategory'].' - '.category($value['id_category'])['name_category']; ?>
							 </option>

							<?php } ?>
						</select></p>
								<p style="font-weight: bold">Câu hỏi :
							<textarea name="cauhoithem"   rows="5" class="form-control"></textarea></p>
					
						<div style="font-weight: bold">Image :
						

						  <div class="custom-file mb-3">
						      <input type="file" class="custom-file-input" id="customFile" name="anhthem">
						      <label class="custom-file-label" for="customFile">Choose file</label>
						   </div>
					

						<script>
							
						// Add the following code if you want the name of the file appear on select
						$(".custom-file-input").on("change", function() {
						  var fileName = $(this).val().split("\\").pop();
						  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
						});
						</script>					
					</div>
						<p style="font-weight: bold">Mức độ :
							<select class="form-control" name="levelthem">
								<option value="3">Dễ</option>
								<option value="2">TB</option>
								<option value="1">Khó</option>
								
							</select>
							</p>
					
					<!-- 		<input type="radio" class="radio" name="mucdo" >Dễ
							<input type="radio" class="radio" name="mucdo" >Dễ
							<input type="radio" class="radio" name="mucdo" >Dễ -->
					</div>
					<div class="col-md-5">
						<p style="font-size:20px;font-weight: bold">Danh sách trả lời</p>
				<div class="input-group mb-3" style="margin-top: 8px">
			    <div class="input-group-prepend">
			       <span class="input-group-text">Trả lời a</span>
			    </div>
			    <input type="text" name="athem" class="form-control">
				 </div>

			<div class="input-group mb-3" style="margin-top: 8px">
			     <div class="input-group-prepend">
			       <span class="input-group-text">Trả lời b</span>
			    </div>
			    <input type="text" name="bthem" class="form-control">
			 </div>

			 <div class="input-group mb-3" style="margin-top: 8px">
			     <div class="input-group-prepend">
			       <span class="input-group-text">Trả lời c</span>
			    </div>
			    <input type="text" name="cthem" class="form-control">
			 </div>
			 <div class="input-group mb-3" style="margin-top: 8px">
			     <div class="input-group-prepend">
			       <span class="input-group-text">Trả lời d</span>
			    </div>
			    <input type="text" name="dthem" class="form-control">
			 </div>


			 	 <div class="input-group mb-3" style="margin-top: 8px">
			     <div class="input-group-prepend">
			       <span class="input-group-text">Đáp án</span>
			    </div>
			    <select name="dapanthem" class="form-control" >
			    	<option value="a">A</option>
			    	<option value="b">B</option>
			    	<option value="c">C</option>
			    	<option value="d">D</option>
			    	
			    </select>
			 </div>
				<button type="button" onclick="quay_lai();" class="btn btn-info" style="float: right;margin-left: 10px">Hủy</button>
				<button type="submit" name="guithem" class="btn btn-info" style="float: right;">Thêm câu hỏi</button>



			</form>

				</div>


<!--  THÊM TỪ EXCEL -->
				<div class="col-md-3" style="border-left: 1px solid gray">
				
				<?php if ((isset($_GET['excel']))&&(!isset($_GET['suacauhoi']))){ ?>
					<p>Chọn file excel</p>
					<form action="excel.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">				
					<input type="file"  name="file"  class="form-control">
					<button type="submit" name="guifile" class="btn btn-info" >THÊM</button>
					<a href="thembaitest.php" class="btn btn-info" style="color:white">HỦY</a>
					</form>
				<?php }else{ ?>
					<a href="thembaitest.php?excel" class="btn btn-info" style="color:white">Thêm từ Excel</a>
				<?php } ?>

				</div>
<!--  KẾT THÚC EXCEL -->

					<?php }else if(isset($_GET['suacauhoi'])){ $idcausua=$_GET['suacauhoi'];?>	

				<div class="col-md-4">
						<form method="POST" accept-charset="utf-8" enctype="multipart/form-data">
						<p style="font-size:20px;font-weight: bold">Nội dung câu hỏi Sửa</p>
						<p style="font-weight: bold">Môn:
						<select name="idmonsua" class="form-control">
							<?php foreach ($rowsubcategory as $value){ ?>
							<option value="<?php echo $value['id_subcategory']?>" <?php if ($value['id_subcategory']==question($idcausua)['id_subcategory']) {
								echo 'selected';
								
							} ?> >
								<?php echo $value['name_subcategory'].' - '.category($value['id_category'])['name_category']; ?>
							 </option>

							<?php } ?>
						</select></p>
						<p style="font-weight: bold">Câu hỏi :
							<textarea name="cauhoisua"   rows="5" class="form-control"><?php echo question($idcausua)['name_question'];  ?></textarea></p>
						<div style="font-weight: bold">Image :
						

						  <div class="custom-file mb-3">

						      <input type="file" class="custom-file-input" id="customFile" name="anhsua">
						      <label class="custom-file-label" for="customFile">Choose file</label>
						    </div>

						<?php if (question($idcausua)['image']!="") { ?>
						<img src="../public/images/test/<?php echo question($idcausua)['image'] ?>" alt="" style="width:150px;text-align: center;">
						<?php  } ?>
						<script>
							
						// Add the following code if you want the name of the file appear on select
						$(".custom-file-input").on("change", function() {
						  var fileName = $(this).val().split("\\").pop();
						  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
						});
						</script>					
					</div>
						<p style="font-weight: bold">Mức độ :
							<select class="form-control" name="levelsua">

								<?php if (question($idcausua)['level']==1){ ?>
								<option value="3">Dễ</option>
								<option value="2">TB</option>
								<option value="1" selected="">Khó</option>
								<?php }else if (question($idcausua)['level']==2) { ?>
								<option value="3">Dễ</option>
								<option value="2" selected="">TB</option>
								<option value="1" >Khó</option>
								<?php }else if (question($idcausua)['level']==3) { ?>
									<option value="3" selected="">Dễ</option>
									<option value="2" >TB</option>
									<option value="1" >Khó</option>
							<?php } ?>
							


							</select>
							</p>
					<!-- 		<input type="radio" class="radio" name="mucdo" >Dễ
							<input type="radio" class="radio" name="mucdo" >Dễ
							<input type="radio" class="radio" name="mucdo" >Dễ -->
					</div>
					<div class="col-md-5">
						<p style="font-size:20px;font-weight: bold">Danh sách trả lời</p>
				<div class="input-group mb-3" style="margin-top: 8px">
			    <div class="input-group-prepend">
			       <span class="input-group-text">Trả lời a</span>
			    </div>
			    <input type="text" name="asua" value="<?php echo question($idcausua)['a']; ?>" class="form-control">
				 </div>

			<div class="input-group mb-3" style="margin-top: 8px">
			     <div class="input-group-prepend">
			       <span class="input-group-text">Trả lời b</span>
			    </div>
			    <input type="text" name="bsua" value="<?php echo question($idcausua)['b']; ?>" class="form-control">
			 </div>

			 <div class="input-group mb-3" style="margin-top: 8px">
			     <div class="input-group-prepend">
			       <span class="input-group-text">Trả lời c</span>
			    </div>
			    <input type="text" name="csua" value="<?php echo question($idcausua)['c']; ?>" class="form-control">
			 </div>
			 <div class="input-group mb-3" style="margin-top: 8px">
			     <div class="input-group-prepend">
			       <span class="input-group-text">Trả lời d</span>
			    </div>
			    <input type="text" name="dsua" value="<?php echo question($idcausua)['d']; ?>" class="form-control">
			 </div>


			 	 <div class="input-group mb-3" style="margin-top: 8px">
			     <div class="input-group-prepend">
			       <span class="input-group-text">Đáp án</span>
			    </div>
			    <select name="dapansua" class="form-control" >
			    	<option value="a" <?php if (question($idcausua)['answer']=='a'){echo 'selected';} ?>>A</option>
			    	<option value="b"  <?php if (question($idcausua)['answer']=='b'){echo 'selected';} ?>>B</option>
			    	<option value="c"  <?php if (question($idcausua)['answer']=='c'){echo 'selected';} ?>>C</option>
			    	<option value="d"  <?php if (question($idcausua)['answer']=='d'){echo 'selected';} ?>>D</option>
			    	
			    </select>
			 </div>
				<a href="cauhoi.php"  class="btn btn-info" style="float: right;margin-left: 10px">Hủy</a>
				<button type="submit" name="guisua" class="btn btn-info" style="float: right;">Sửa câu hỏi</button>



			</form>

				</div>

				<?php } ?>
				</div>

					
				</div>
				</div>
				
			</div>
		</div>

	<script>
 
           CKEDITOR.replace( 'editor1' );
       </script>



		</div>
	</div>
</body>
</html>