<?php require_once '../commont/connect.php'; ob_start();session_start(); ?>
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
	<script src="../public/js/a076d05399.js"></script>
</head>
<?php  
	
if (isset($_GET['idsuade'])){

	$idsuade=$_GET['idsuade'];

	

		$idcauhoi=test_question($idsuade)['id_question'];

		if (isset($_POST['iddangkymon'])) {
			$iddangkymon=$_POST['iddangkymon'];

		$sqlthemidsub=" UPDATE test SET id_subcategory='$iddangkymon' where id_test='$idsuade'";
		$conn->exec($sqlthemidsub);

		
		$sqlquestion="select * from question where id_subcategory='$iddangkymon' ";
		$queryquestion=$conn->prepare($sqlquestion);
		$queryquestion->execute();
		$rowquestion= $queryquestion->fetchAll(PDO::FETCH_ASSOC);

		}else if ($idcauhoi==0) {
			$chuacocauhoi='ok';
		}else{
		$idmonhoc=question($idcauhoi)['id_subcategory'];
		$sqlquestion="select * from question where id_subcategory='$idmonhoc' ";
		$queryquestion=$conn->prepare($sqlquestion);
		$queryquestion->execute();
		$rowquestion= $queryquestion->fetchAll(PDO::FETCH_ASSOC);
		}

}






if ((isset($_GET['doi']))&&(isset($_GET['sang']))) {
	$doi=$_GET['doi'];
	$sang=$_GET['sang'];

	$sqlkiemtra="select * from test_question where id_test='$idsuade' and id_question='$sang' ";
	$querykiemtra=$conn->prepare($sqlkiemtra);
	$querykiemtra->execute();
	$rowkiemtra= $querykiemtra->fetch(PDO::FETCH_ASSOC);

	if (!isset($rowkiemtra['id_question'])) {
		$spldoi="UPDATE test_question SET id_question='$sang' WHERE id_test='$idsuade' and id_question='$doi' ";
		$conn->exec($spldoi);
		header("location: suade.php?idsuade=$idsuade ");
	}else{ ?>
		<script type="text/javascript">alert("Câu này đã có trong đề thi");
		window.location="suade.php?idsuade=<?php echo $idsuade ?>";
	</script>
	<?php  }
	
}


if (isset($_GET['xoaquestion'])) {
	$idxoa=$_GET['xoaquestion'];
	$sqlxoaquestion="DELETE FROM test_question WHERE id_test='$idsuade' and  id_question='$idxoa'  " ;
		$conn->exec($sqlxoaquestion);
		header("location: suade.php?idsuade=$idsuade ");

	
}


if (isset($_POST['suatende'])) {
	$suatende=$_POST['suatende'];
	$suatimede=$_POST['suatimede'];


	$splcapnhapttde="UPDATE test SET name_test='$suatende' , time_test='$suatimede' WHERE id_test='$idsuade' ";
	$conn->exec($splcapnhapttde);?>
<!-- 		<script type="text/javascript">alert("Sửa thành công");
	</script> -->
	
<?php }

//  CẬP NHẬP THÔNG TIN TÊN VÀ TIME CỦA ĐỀ

 ?>
				

<body>
	<div class="w-100" style="width:100%">
		<div class="row " style="width: 100%">
			<!--  MENU -->
 <?php include_once '../_share/admin/menu.php' ?>
 <!-- HẾT MENU -->

		
		<div class="col-md-10" style="background: #ddd;height:650px;overflow: auto;width: 100%">
		<!--  HEADER -->
 <?php include_once '../_share/admin/header.php' ?>
 <!-- HẾT HEADER -->
			<div class="bodyad" style="width:1100px">
				<div class="thanbody">
				<p style="font-size: 20px;width:1000px;height:50px;background: white;line-height: 50px;padding-left: 10px;border-radius: 10px;font-weight: bold;color:#17a2b8">QUẢN LÍ ĐỀ THI  
					<?php if (isset($_GET['doicauhoi'])){echo '- ĐỔI CÂU HỎI' ;}
					else if (isset($_GET['themcauhoi'])) {echo '- THÊM CÂU HỎI' ;}
					else{echo '- CHI TIẾT ĐỀ' ;}?>
					
				</p>
	
				<div class="noidung">
<form method="POST">

				<div class="row">
				
		
					<div class="col-md-3" style="margin-left: 20px">
						<p style="font-size:20px;font-weight: bold;margin-right: 20px">Thông tin đề
							<a href="dethi.php" class="btn btn-info">Quay về</a></p>
				
						<p style="font-weight: bold"></p>
						<div class="row">
				<a href="suade.php?idsuade=<?php echo $idsuade  ?>" class="thea"><div class="input-group mb-3" style="margin-top: 8px">
			    <div class="input-group-prepend">
			       <span class="input-group-text">Mã đề</span>
			    </div>
			    <input type="text" disabled="" name="tendsnew" value="<?php echo $idsuade ?>" class="form-control">
				 </div></a>
				
				<div class="input-group mb-3" style="margin-top: 8px">
			    <div class="input-group-prepend">
			       <span class="input-group-text">Tên đề</span>
			    </div>
			    <input type="text" name="suatende" value="<?php echo test($idsuade)['name_test'] ?>" class="form-control">
				 </div>

				 <div class="input-group mb-3" style="margin-top: 8px">
			    <div class="input-group-prepend">
			       <span class="input-group-text">Thời gian (phút)</span>
			    </div>
			    <input type="text" name="suatimede" value="<?php echo test($idsuade)['time_test'] ?>" class="form-control">
				 </div>
		<!--  XEM TỔNG SỐ CÂU HỎI -->
		<?php 
		$sqlsocauhoi ="SELECT COUNT(*) as total FROM test_question WHERE id_test='$idsuade' " ;
		$querysocauhoi=$conn->prepare($sqlsocauhoi);
		$querysocauhoi->execute();
		$rowsocauhoi= $querysocauhoi->fetch(PDO::FETCH_ASSOC);
		 ?>
				  <div class="input-group mb-3" style="margin-top: 8px">
			    <div class="input-group-prepend">
			       <span class="input-group-text">Tổng câu</span>
			    </div>
			    <input type="text" disabled="" value="<?php echo $rowsocauhoi['total'] ?>" class="form-control">
				 </div>
				<button type="submit"  class="btn btn-info" style="width:100%">Sửa thông tin đề  </button>
		<form>	

							
	<!-- 				<div class="abc" style="">
					<p style="font-size:15px;font-weight: bold;">Đổi câu hỏi</p>
					<div class="row" style="width:280px">
						<div class="col-md-6" style="font-weight: bold;">Mã câu cũ</div>
						<div class="col-md-6" style="font-weight: bold;">Mã câu mới</div>
						<div class="col-md-5"><input type="text" name="tendsnew" class="form-control"></div>
						<div class="col-md-1" style="margin-left: -15px;    margin-top: -5px;font-weight: bold"> >> </div>
						<div class="col-md-5" style="margin-left: 10px"><input type="text" name="tendsnew" class="form-control"></div>
						<div class="col-md-7">
					<button type="submit" class="btn btn-info" style="width:100%">Đổi</button></div>
					<div class="col-md-4">
					<a href="" class="btn btn-danger" style="width:100%">Hủy</a></div>
					</div>

						</div> -->
						</div>




				
						
					<!-- 		<input type="radio" class="radio" name="mucdo" >Dễ
							<input type="radio" class="radio" name="mucdo" >Dễ
							<input type="radio" class="radio" name="mucdo" >Dễ -->
					</div>
				
						
				
<div class="col-md-8" style="margin-left: 50px">
			
					

				
							
						
						
<!--  PHẦN THÔNG TIN ĐỀ -->

<?php if ((!isset($_GET['themcauhoi']))&&(!isset($_GET['doicauhoi']))){?>

				<p style="font-size:20px;font-weight: bold ;text-align: center;">Danh sách câu trong đề <?php echo $idsuade; ?> </p>
					  	<a href="suade.php?themcauhoi=ok&&idsuade=<?php echo test($idsuade)['id_test']; ?>"  class="btn btn-info offset-md-5" >Thêm câu hỏi</a>	

							<form method="POST">
							<div class="row">
								<div class="col-md-4 offset-md-7"><input type="text"  placeholder="mã câu hỏi trong đề" class="form-control" name="timkiem1"></div>
								<button type="submit" name="sreach1"class="btn"  style="border:1px solid gray"><i class='fas fa-search'></i></button>
							</div>
							</form>

				
						<table class="table table-striped " style="margin-top: 5px" >
						<thead>
							<tr>
								<th>MÃ</th>
								<th style="width:300px">CÂU HỎI</th>
								<th>ID_MÔN</th>
								

							<!-- 	<th>thong_tin</th> -->
							<!-- 	<th>header</th> -->
								<th colspan="3">CHỨC NĂNG</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!isset($_POST['sreach1'])){ ?>
								
							
							<?php foreach (test_questionAll($idsuade) as $value){ ?>
								
							
							<tr>
								<td><?php echo $value['id_question'] ?></td>
								<td><?php echo question($value['id_question'])['name_question']  ?></td>
								<td><?php echo question($value['id_question'])['id_subcategory']  ?></td>
								<td>
								<a href="suade.php?doicauhoi=<?php echo $value['id_question'] ?>&&idsuade=<?php echo test($idsuade)['id_test']; ?>&&idmon=<?php echo question($value['id_question'])['id_subcategory']  ?>"  class="btn btn-info">Đổi câu</a>	
								<a href="suade.php?idsuade=<?php echo $idsuade ?>&&xoaquestion=<?php echo $value['id_question']  ?>" onclick="return confirm('Bạn có muốn xóa ')"  class="btn btn-danger">Xóa</a>
								</td>
							</tr>
						<?php }}else if (isset($_POST['sreach1'])) {
								$matk=$_POST['timkiem1'];
								$sqltk1="select * from test_question where id_test='$idsuade' and id_question='$matk' ";
								$querytk=$conn->prepare($sqltk1);
								$querytk->execute();
								$rowtk= $querytk->fetch(PDO::FETCH_ASSOC);

									if (isset($rowtk['id_question'])) {?>
										<tr>
											<td><?php echo question($rowtk['id_question'])['id_question'] ?></td>
											<td><?php echo question($rowtk['id_question'])['name_question'] ?></td>
											<td><?php echo question($rowtk['id_question'])['id_subcategory'] ?></td>
											<td>
								<a href="suade.php?doicauhoi=<?php echo $rowtk['id_question'] ?>&&idsuade=<?php echo $idsuade ?>&&idmon=<?php echo question($rowtk['id_question'])['id_subcategory']  ?>"  class="btn btn-info">Đổi câu</a>	
								<a href="suade.php?idsuade=<?php echo $idsuade ?>&&xoaquestion=<?php echo $rowtk['id_question']  ?>" onclick="return confirm('Bạn có muốn xóa ')"  class="btn btn-danger">Xóa</a>
								</td>
											

										</tr>
									<?php }else{
										echo "ID không có trong danh sách môn";
									}

							} ?>	
								

						
					

						
						
				
								
						
						</tbody>
					</table>

					<!--  THÊM CÂU HỎI -->
<?php }else if ((isset($_GET['themcauhoi']))&&(!isset($_GET['suacauhoi']))){ ?>

					<p style="font-size:20px;font-weight: bold ;text-align: center;">Danh sách câu theo môn </p>
					  
		<!-- 					<form method="POST">
								<div class="row">
								<div class="col-md-4 offset-md-7"><input type="text" placeholder="mã câu hỏi theo môn" class="form-control" name="timkiem2"></div>
								<button type="submit"  name="sreach2" class="btn"  style="border:1px solid gray"><i class='fas fa-search'></i></button>
							</div>
							</form> -->

		
					<?php if (isset($chuacocauhoi)){ ?>
						
					
						<form action="" method="POST">

							<div class="input-group mb-3" style="margin-top: 15px">

						    <div class="input-group-prepend">
						       <span class="input-group-text">Chọn môn cho đề</span>
						    </div>

								<select name="iddangkymon" class="form-control" >
										<?php foreach ($rowsubcategory as $value){ ?>
										<option  value="<?php echo $value['id_subcategory']?>" > 
											<?php echo $value['name_subcategory'].' - '.category($value['id_category'])['name_category']; ?>
										 </option>

										<?php } ?>
								</select>
								
								<button type="submit" class="btn btn-info" style="margin-left: 50px">Chọn</button>
							</form>
							 </div>
							<?php } ?>
			  
				
		

						<?php if (isset($_POST['them'])){
							$mangthem=$_POST['them'];

							//  KIỂM TRA CÓ ID DANH SÁCH HAY CHƯA

							foreach ($mangthem as $value) {

							$sqlkiemtra1="select * from test_question where id_test='$idsuade' and id_question='$value' ";
							$querykiemtra1=$conn->prepare($sqlkiemtra1);
							$querykiemtra1->execute();
							$rowkiemtra1= $querykiemtra1->fetch(PDO::FETCH_ASSOC);

							}

							if (!isset($rowkiemtra1['id_question'])) {
								
					
							foreach ($mangthem as $value) {
								$sqlthem = "INSERT INTO test_question (id_test,id_question) VALUES ('$idsuade','$value')";
					   			$conn->exec($sqlthem);	
					   				header("location: suade.php?idsuade=$idsuade ");
							}


						}else{ ?>
								<script type="text/javascript">alert("Câu id <?php echo $rowkiemtra1['id_question']; ?> đã có trong đề thi hãy chọn lại");
	</script>
					<?php 	}
					} ?>
		



					<?php if (!isset($chuacocauhoi)){ ?>
	

				<form method="post">
				 	<table class="table table-striped " >
						<thead>
							<tr>
								<th>CHON</th>
								<th>MÃ</th>
								<th style="width:300px">CÂU HỎI</th>
								<th>ID_MÔN</th>
								

							<!-- 	<th>thong_tin</th> -->
							<!-- 	<th>header</th> -->
							
							</tr>
						</thead>
						<tbody>
					<?php foreach ($rowquestion as $value){ ?>
							<tr>
								<td><input type="checkbox" name="them[]" value="<?php echo $value['id_question'] ?>"></td>
								<td><?php echo $value['id_question'] ?></td>
								<td><?php echo $value['name_question'] ?></td>
								<td><?php echo $value['id_subcategory'] ?></td>
							
							</tr>
					<?php } ?>
							<button type="submit" class="btn btn-info">Thêm câu hỏi</button>
				</form>
				<?php  }?>
	
	<!--  HẾT THÊM CÂU HỎI -->

	<!-- ĐỔI CÂU HỎI -->

<?php }else if (isset($_GET['doicauhoi'])) { $idmon=$_GET['idmon']; $doicauhoi=$_GET['doicauhoi'];?>
						<p style="font-size:20px;font-weight: bold ;text-align: center;">Danh sách câu theo môn </p>
					  
							<form method="POST">
								<div class="row">
								<div class="col-md-4 offset-md-7"><input type="text" placeholder="mã câu theo môn cần đổi" class="form-control" name="timkiem3"></div>
								<button type="submit" name="sreach3" class="btn"  style="border:1px solid gray"><i class='fas fa-search'></i></button>
							</div>
							</form>


		<!-- 		 <div class="input-group mb-3" style="margin-top: 8px">
			    <div class="input-group-prepend">
			       <span class="input-group-text">Môn</span>
			    </div>
			    <select class="form-control">
			    	<option value="">2</option>
			    
			    </select>
				 </div> -->

				 	<table class="table table-striped " style="margin-top: 10px" >
						<thead>
							<tr>
								<th>MÃ</th>
								<th style="width:300px">CÂU HỎI</th>
								<th>ID_MÔN</th>
								

							<!-- 	<th>thong_tin</th> -->
							<!-- 	<th>header</th> -->
								<th colspan="3">CHỨC NĂNG</th>
							</tr>
						</thead>
					

			<?php if (!isset($_POST['sreach3'])){ ?>
				
			
					<?php 
					$sqlmon="select * from question where id_subcategory='$idmon' ";
					$querymon=$conn->prepare($sqlmon);
					$querymon->execute();
					$rowmon= $querymon->fetchAll(PDO::FETCH_ASSOC);
					 ?>

						<tbody>
						<?php foreach ($rowmon as $value){
							?>
							<tr>
								<td><?php echo $value['id_question'] ?></td>
								<td><?php echo $value['name_question'] ?></td>
								<td><?php echo $value['id_subcategory'] ?></td>
								<td>
								<a href="suade.php?idsuade=<?php echo $idsuade ?>&&doi=<?php echo $doicauhoi ?>&&sang=<?php echo $value['id_question']?>"  class="btn btn-info">Đổi</a>	
							
								</td>
							</tr>


					

				 			
		 <?php }}else if(isset($_POST['sreach3'])){

				 	$idkt3=$_POST['timkiem3'];
					$sqlmon="select * from question where id_subcategory='$idmon' and id_question='$idkt3' ";
					$querymon=$conn->prepare($sqlmon);
					$querymon->execute();
					$rowmon= $querymon->fetch(PDO::FETCH_ASSOC);
					if (isset($rowmon['id_question'])) { ?>
							<tr>
								<td><?php echo $rowmon['id_question'] ?></td>
								<td><?php echo $rowmon['name_question'] ?></td>
								<td><?php echo $rowmon['id_subcategory'] ?></td>
								<td>
								<a href="suade.php?idsuade=<?php echo $idsuade ?>&&doi=<?php echo $doicauhoi ?>&&sang=<?php echo $rowmon['id_question']?>"  class="btn btn-info">Đổi</a>	
							
								</td>
							</tr>
						
					<?php 
					}else{
						echo "ID CÂU KHÔNG CÓ TRONG MÔN";
					}

				 }






				} ?>

						
				
					</div>
				</div>

					
				</div>
				</div>
				
			</div>
		</div>




		</div>
	</div>
	<?php ob_end_flush(); ?>
</body>
</html>	