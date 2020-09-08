<?php require "./commont/connect.php" ?>	
<?php session_start();
if (isset($_SESSION['account'])) {
 	$iduser=$_SESSION['account']['id'];
 } ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cá nhân</title>
		<link rel="stylesheet" href="css.css">
		<link rel="stylesheet" href="public/css/bootstrap.min.css">
		<script src="public/js/jquery-3.4.1.slim.min.js"></script>
		<script src="public/js/popper.min.js"></script>
		<script src="public/js/bootstrap.min.js"></script>
</head>
	<style type="text/css" media="screen">
	
.phantrang{width:30px;height: 30px;border:1px solid gray;line-height: 30px;background:white;}
.phantrang:hover{color:#17a2b8;border:1px solid #17a2b8}
</style>




<style type="text/css" media="screen">
	table td:hover{}
	a:hover{text-decoration: none}
</style>


<body style="background: #ddd">
<!-- div.header2 -->
    <?php include_once '_share/client/header.php' ?>
<!-- hết div.header2 -->

<div style="background-image: url(image/5.jpg);width:100%;height:250px;">
				<div style="background-image: url(image/Untitled-1.png);width:100%;height:250px;">
	
				
			<div style=" color: white;padding-top:1px;margin-left: 50px;font-size: 17px">
			<div style="width:150px;height:100px;background: none;margin-top: 140px;margin-left: 100px">

			<img src="public/images/user/<?php echo users($_SESSION['account']['id'])['image']; ?>"  style="width:150px;height:150px">
			<img src="image/mayanh.png"  data-toggle="modal" data-target="#myModal"  style="width:45px;height:30px;position: absolute;margin-left: -150px;margin-top: 120px">
			  <!-- Modal -->
			  <div class="modal fade" id="myModal" role="dialog">
			    <div class="modal-dialog" style="color:black">
	
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			       	<h5 class="modal-title">Cập nhập ảnh </h5>
			          <button type="button" class="close" data-dismiss="modal">X</button>
			
			        </div>
			        <div class="modal-body">
			        <form action="thongtincanhan.php" method="POST" accept-charset="utf-8"  enctype="multipart/form-data">
			        		
			         <input type="file" name="anhusermoi" >

			        </div>
			        <div class="modal-footer">
			           <button type="submit" class="btn btn-primary">Cập nhập</button>
			       </form>
			        </div>
			      </div>
			      
			    </div>
			  </div>

		</div>
				</div>
			</div>

			</div>



<div class="container" style="margin-top: 50px;margin-bottom: 20px">
	<div class="row">

		<div style="background: white;width:300px;height:300px;text-align: center;border-radius: 5%;float: left;font-size: 14px">
			<table class="table">
			
				<tbody>
			<!--  -->
					<tr>
						<td><a href="thongtincanhan.php">Thông tin cá nhân</a></td>
					</tr>
					<tr>
						<td><a href="thongtincanhan.php?doimatkhau">Đổi mật khẩu</a></td>
					</tr>
						<tr>
						<td><a href="ketquade.php?ketqua">Kết quả làm đề</a></td>
					</tr>
					<tr>
						<td><a href="lichsu.php?ketqua">Lịch sử xem</a></td>
					</tr>
				</tbody>
			</table>
			
		</div>

<?php 




		    $result="select count(id_history) as total from history where id_user='$iduser'" ;
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

		    // $sqltopic="select * from history where id_user = limit $start,$limit";
		    // $qrtopic=$conn->prepare($sqltopic);
		    // $qrtopic->execute();
		    // $rowtopic10=$qrtopic->fetchAll(PDO::FETCH_ASSOC);
    


		    


				$sqlhistorytest="select * from history where id_user='$iduser' order by id_history desc limit $start,$limit ";
				$queryhistory=$conn->prepare($sqlhistorytest);
				$queryhistory->execute();
				$rowrhistory= $queryhistory->fetchAll(PDO::FETCH_ASSOC);


		?>
	
	


		

		<div style="background: white;width:800px;border-radius: 5%;margin-left: 30px">
	<!-- 		<div class="bodyphaittcn"> -->
				<p style="text-align: center;font-weight: bold;margin-top: 10px">Lịch sử</p>
				<div>
				<!-- 	<p style="font-size: 14px;font-weight: bold">Cập nhật thông tin cá nhân</p> -->
					<div class="row" style="width:750px;margin-left: 20px;margin-bottom: 20px">
						<table class="table">
							<thead>
								<tr>
								<!-- 	<th>Mã lịch sử</th> -->
								<!-- 	<th>Mã bài giảng</th> -->
									<th style="width:200px">Tên bài giảng</th>
									<th>Tên khóa học</th>
									<th>Thời gian</th>
									<th></th>
							
							<!-- 		<th>Chức năng</th> -->
								</tr>
							</thead>
							<tbody>
								<?php foreach ($rowrhistory as $value)
								{ $idhistory=$value['id_history']; $idlesson=$value['id_lesson'];
								$idchuyende=lesson($idlesson)['id_topic'];
								$idkhoahoc=topic($idchuyende)['id_course']

									// $idcategory=subcategory(test($idtest)['id_subcategory'])['id_category'];
								 ?>
									
								
								<tr style="font-size: 15px">
							<!-- 		<td><?php echo $idhistory ?></td> -->
									<!-- <td><?php echo $idlesson ?></td> -->
									<td><?php echo  lesson($idlesson)['name_lesson']; ?></td>
									<td><?php echo  course($idkhoahoc)['name_course']; ?></td>
									<td><?php echo  $value['date_time']; ?></td>
									<td><a href="baigiang2.php?idlesson=<?php echo $idlesson ?>&&idkh=<?php echo $idkhoahoc ?>">Xem</td>

								
									<!-- <td><a href="" class="btn btn-danger">Xóa</a></td> -->
								</tr>
								<?php } ?>
							</tbody>
						</table>
  			  <?php if ($current_page > 1 && $total_page > 1){
						           echo '<a href="lichsu.php?page='.($current_page-1).'"><button class="phantrang" type=""> < </button></a>  ';
						               for ($i = 1; $i <= $total_page; $i++){
						        // Nếu là trang hiện tại thì hiển thị thẻ span
						        // ngược lại hiển thị thẻ a
						        if ($i == $current_page){
						            echo '<span><button class="phantrang" type="">'.$i.'</button></span> ';
						        }
						        else{
						            echo '<a href="lichsu.php?page='.$i.'"><button class="phantrang" type="">'.$i.' </button></a> ';
						        }
						    }
						} 
						  if ($current_page < $total_page && $total_page > 1){
						    echo '<a href="lichsu.php?page='.($current_page+1).'"><button class="phantrang"  type=""> > </button> </a> ';
						}?>

					</div>

				</div>
			</div>
		</div>




	</div>
</div>


	

<!-- div.header2 -->
    <?php include_once '_share/client/footer.php' ?>
<!-- hết div.header2 -->
	</div>
	
	
</body>
</html>