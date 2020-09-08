<?php require "../commont/connect.php" ;session_start(); ?>	
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


<?php if (isset($_GET['idxoakh'])) {
	$idkhxoa=$_GET['idxoakh'];

		$sqlchuyende="select * from topic where id_course='$idkhxoa' ";
		$qrchuyende=$conn->prepare($sqlchuyende);
		$qrchuyende->execute();
		$rowchuyende= $qrchuyende->fetchAll(PDO::FETCH_ASSOC);

		foreach ($rowchuyende as $value) {
					$idchuyende=$value['id_topic'];
				// $sqlbaigiang="select * from lesson where id_topic='$idchuyende' ";
				// $qrbaigiang=$conn->prepare($sqlbaigiang);
				// $qrbaigiang->execute();
				// $rowbaigiang= $qrbaigiang->fetchAll(PDO::FETCH_ASSOC);
					$sqlxoabaigiang="DELETE FROM lesson WHERE id_topic='$idchuyende' " ;
					$conn->exec($sqlxoabaigiang);
		}
		$sqlxoachuyende="DELETE FROM topic WHERE id_course='$idkhxoa' " ;
		$conn->exec($sqlxoachuyende);

		$sqlkhoahoc="DELETE FROM course WHERE id_course='$idkhxoa' " ;
		$conn->exec($sqlkhoahoc);
		header("location: khoahoc.php");





	
} ?>
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
			<div class="bodyad">
				<div class="thanbody">
				<p style="font-size: 20px;width:1000px;height:50px;background: white;line-height: 50px;padding-left: 10px;border-radius: 10px;font-weight: bold;color: #17a2b8">QUẢN LÍ KHÓA HỌC</p>



	<div style="background:white ;height: 39px;margin-bottom: 10px;border-radius: 5px;line-height: 31px"><a href="chitietkhoahoc.php?themkhoahoc" class="btn btn-info">Thêm khóa học </a>
	</div>

	<?php for ($i = 12; $i >=10; $i--) {

		switch ($i) {
			    case 10:
			        $idlop='4';
			        break;
			    case 11:
			        $idlop='3';
			        break;
			    case 12:
			        $idlop='2';
			        break;
			    }



		?>
		


				<div class="noidung">
					<p style="font-weight: bold;text-align: center;font-size: 20px;height: 20px;color: #17a2b8">Lớp <?php echo $i ?></p>
				
					<table class="table table-striped" style="overflow: auto;height: 300px;margin-top: 39px">
						<thead>
							<tr>
								<th>ID KHÓA HỌC</th>
								<th>TÊN KHÓA HỌC</th>
								<th>ID MÔN</th>
								<th>ID GIÁO VIÊN</th>
							<!-- 	<th>thong_tin</th> -->
							<!-- 	<th>header</th> -->
								<th colspan="3">CHỨC NĂNG</th>
							</tr>
						</thead>
						<tbody>

							<?php
							foreach (subcategory_id($idlop) as $value) {

							$id_sub=$value['id_subcategory'];


							$sql1="select * from course where id_subcategory='$id_sub' order by id_course desc ";
							$query1=$conn->prepare($sql1);
							$query1->execute();
							$row1= $query1->fetchAll(PDO::FETCH_ASSOC);

				 foreach ($row1 as $value){ ?>
							<tr>
								<td><?php echo $value['id_course']; ?></td>
								<td><?php echo $value['name_course']; ?></td>
								<td><?php echo $value['id_subcategory']; ?></td>
								<td><?php echo $value['id_teacher']; ?></td>
								
					
						
								<td><a href="chitietkhoahoc.php?idkhoahoc=<?php echo $value['id_course'];  ?>"  class="btn btn-info">Xem</a>
						
								<a href="khoahoc.php?idxoakh=<?php  echo $value['id_course']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa khóa học này')" class="btn btn-danger">Xóa</a>
								</td>
							</tr>
						<?php }}  ?>
						
						</tbody>
					</table>



					
				</div>

	<?php }?>







				</div>
				
			</div>
		</div>




		</div>
	</div>
</body>
</html>