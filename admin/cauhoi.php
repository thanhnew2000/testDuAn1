<?php 
require_once '../commont/connect.php';session_start();  ?>
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




<?php 
if ((isset($_POST['locmon']))&&(isset($_POST['idcautk']))) {
	

		if ($_POST['idcautk']=='') {
			$idlocmon=$_POST['locmon'];
			$idcautk=$_POST['idcautk'];
			$chan='ok';

						if ($idlocmon=='all') {
						$sqlcauhoi="select * from question ORDER BY id_question DESC  ";
						$querycauhoi=$conn->prepare($sqlcauhoi);
						$querycauhoi->execute();
						$rowcauhoi= $querycauhoi->fetchAll(PDO::FETCH_ASSOC);	
						}else{
						$sqlcauhoi="select * from question where id_subcategory='$idlocmon' ";
						$querycauhoi=$conn->prepare($sqlcauhoi);
						$querycauhoi->execute();
						$rowcauhoi= $querycauhoi->fetchAll(PDO::FETCH_ASSOC);}	
			}else if ($_POST['idcautk']!='') {
			$idlocmon=$_POST['locmon'];
			$idcautk=$_POST['idcautk'];
			
				$sqlcauhoi1="select * from question where id_question='$idcautk' ";
				$querycauhoi1=$conn->prepare($sqlcauhoi1);
				$querycauhoi1->execute();
				$rowcauhoi1= $querycauhoi1->fetch(PDO::FETCH_ASSOC);
			}	
				
			}
			else {
				$chan='ok';
				$sqlcauhoi="select * from question ORDER BY id_question DESC ";
				$querycauhoi=$conn->prepare($sqlcauhoi);
				$querycauhoi->execute();
				$rowcauhoi= $querycauhoi->fetchAll(PDO::FETCH_ASSOC);	}


if (isset($_GET['xoacauhoi'])) {

	$xoacauhoi=$_GET['xoacauhoi'];
	$sqlxoacau="DELETE FROM question WHERE id_question ='$xoacauhoi'";
	$conn->exec($sqlxoacau);

	header("location: cauhoi.php");
}



 // PHÂN TRANG

    $result="select count(id_question) as total from question" ;
    $result2=$conn->prepare($result);
    $result2->execute();
    $rowrs=$result2->fetch(PDO::FETCH_ASSOC);

    
    $total_records =  $rowrs['total'];

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 10;


    $total_page = ceil($total_records / $limit);

    if ($current_page > $total_page){
    $current_page = $total_page;
    }
    else if ($current_page < 1){
        $current_page = 1;
    }


    $start = ($current_page - 1) * $limit;

    $sqlquestion="select * from question limit $start,$limit";
    $qrquestion=$conn->prepare($sqlquestion);
    $qrquestion->execute();
    $rowquestion=$qrquestion->fetchAll(PDO::FETCH_ASSOC);
    

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


			<div class="bodyad" style="width:1100px">
				<div class="thanbody">
				<p style="font-size: 20px;width:1000px;height:50px;background: white;line-height: 50px;padding-left: 10px;border-radius: 10px;font-weight: bold;color:#17a2b8">QUẢN LÍ CÂU HỎI</p>

				<div class="noidung" style="">
				
					<a href="thembaitest.php"  class="btn btn-info">Thêm câu hỏi</a>

					<form method="POST">
					<button style="float: right;" type="submit" class="btn btn-info">Tìm</button>
					<div class="timkiem">
						<input type="text" placeholder="MÃ CÂU" class="form-control" name="idcautk">
					</div>
					<div class="timkiem">
						<select class="form-control" name="locmon">
							<option value="all">TẤT CẢ</option>
							<?php foreach ($rowsubcategory as $value){ ?>
								<option value="<?php echo $value['id_subcategory']  ?>">
									<?php echo $value['name_subcategory'].'-'.category($value['id_category'])['name_category']  ?></option>
							<?php } ?>
						</select>
					</div>
					</form>

					<table class="table table-striped " style="margin-top: 50px; " >
						<thead>
							<tr>
								<th>MÃ CÂU HỎI</th>
								<th style="width:300px">CÂU HỎI</th>
						
								<th>TRẢ LỜI</th>
							
								<th>Đáp án</th>
								<th>Mức độ</th>
								<th>ID_MÔN</th>
								

							<!-- 	<th>thong_tin</th> -->
							<!-- 	<th>header</th> -->
								<th colspan="3">CHỨC NĂNG</th>
							</tr>
						</thead>
						<tbody>
							<?php if (isset($chan)){ ?>
									
							
								
							
							<?php foreach ($rowcauhoi as $value){ ?>
								
							
							<tr>
								<td><?php echo $value['id_question'] ?></td>
								<td><?php echo $value['name_question'] ?></td>
						
								<td>
								
									<input type="text" disabled class="form-control" name="" value="<?php echo 'A. '.$value['a'] ?>">
									<input type="text" disabled class="form-control" name="" value="<?php echo 'B. '.$value['b'] ?>">
									<input type="text" disabled class="form-control" name="" value="<?php echo 'C. '.$value['c'] ?>">
									<input type="text" disabled class="form-control" name="" value="<?php echo 'D. '.$value['d'] ?>">
								

								</td>
					
								<td><?php echo $value['answer'] ?></td>
								<td><?php if ($value['level']==1) {echo "Khó" ;}
								elseif ($value['level']==2) {echo "TB" ;}
								elseif ($value['level']==3) {echo "Dễ" ;}

								?></td>

								<td><?php echo $value['id_subcategory'] ?></td>
								<td>
								<a href="thembaitest.php?suacauhoi=<?php echo $value['id_question'] ?>"  class="btn btn-info">Sửa</a>	
								<a href="cauhoi.php?xoacauhoi=<?php echo $value['id_question'] ?>" onclick="return confirm('Bạn có muốn xóa') " class="btn btn-danger">Xóa</a>
								</td>
							</tr>

								<?php }} else if(!isset($chan)) { ?>

								
									<tr>
								<td><?php echo $rowcauhoi1['id_question'] ?></td>
								<td><?php echo $rowcauhoi1['name_question'] ?></td>
								
								<td>
								
									<input type="text" disabled class="form-control" name="" value="<?php echo 'A. '.$rowcauhoi1['a'] ?>">
									<input type="text" disabled class="form-control" name="" value="<?php echo 'B. '.$rowcauhoi1['b'] ?>">
									<input type="text" disabled class="form-control" name="" value="<?php echo 'C. '.$rowcauhoi1['c'] ?>">
									<input type="text" disabled class="form-control" name="" value="<?php echo 'D. '.$rowcauhoi1['d'] ?>">
								

								</td>
					
								<td><?php echo $rowcauhoi1['answer'] ?></td>
								<td><?php if ($rowcauhoi1['level']==1) {echo "Khó" ;}
								elseif ($rowcauhoi1['level']==2) {echo "TB" ;}
								elseif ($rowcauhoi1['level']==3) {echo "Dễ" ;}

								?></td>
								<td><?php echo $rowcauhoi1['id_subcategory'] ?></td>
								<td>
								<a href="thembaitest.php?suacauhoi=<?php  echo $rowcauhoi1['id_question'] ?>"  class="btn btn-info">Sửa</a>	
								<a href="cauhoi.php?xoacauhoi=<?php echo $rowcauhoi1['id_question'] ?>" onclick="return confirm('Bạn có muốn xóa') "  class="btn btn-danger">Xóa</a>
								</td>
									
								
					<?php  } ?>

						
						</tbody>
					</table>

<div style="margin: auto">

</div>		


				</div>

			<!-- het noi dung -->
	</div>
</div>
				</div>
				
			</div>
		</div>




		</div>
	</div>
</body>
</html>