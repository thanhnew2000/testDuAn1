<?php require "../commont/connect.php";session_start();  ?>	
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
	<style type="text/css" media="screen">
	
.phantrang{width:30px;height: 30px;border:1px solid gray;line-height: 30px;background:white;}
.phantrang:hover{color:#17a2b8;border:1px solid #17a2b8}
</style>
</head>
<?php 


    $result="select count(id_topic) as total from topic" ;
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

    $sqltopic="select * from topic limit $start,$limit";
    $qrtopic=$conn->prepare($sqltopic);
    $qrtopic->execute();
    $rowtopic10=$qrtopic->fetchAll(PDO::FETCH_ASSOC);
    

 ?>
<?php 
if (isset($_GET['xoaid'])) {
	$idxoa=$_GET['xoaid'];

		$sqlxoalesson="DELETE FROM lesson WHERE id_topic='$idxoa' " ;
		$conn->exec($sqlxoalesson);

		$sqlxoatopic="DELETE FROM topic WHERE id_topic='$idxoa' " ;
		$conn->exec($sqlxoatopic);
		header("location: chuyende.php");
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
			<div class="bodyad">
				<div class="thanbody">
				<p style="font-size: 20px;width:1000px;height:50px;background: white;line-height: 50px;padding-left: 10px;border-radius: 10px;color: #17a2b8;font-weight: bold">QUẢN LÍ CHUYÊN ĐỀ</p>

				<div class="noidung"><form method="POST">
					<a href="chitietchuyende.php?themchuyende" class="btn btn-info">Thêm chuyên đề </a>
						<input style="height: 37px;margin-left: 570px;margin-right: 5px;padding-left: 5px" required="" placeholder="id chuyên đề" type="text" name="timkiemid"><button type="submit" class="btn btn-info">Tìm</button></form>
<?php if (!isset($_POST['timkiemid'])){ ?>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>ID CHUYÊN ĐỀ</th>
								<th>TÊN CHUYÊN ĐỀ</th>
								<th>ID KHÓA HỌC</th>
							<!-- 	<th>thong_tin</th> -->
							<!-- 	<th>header</th> -->
								<th colspan="3">CHỨC NĂNG</th>
							</tr>
						</thead>
						<tbody>

							<?php foreach ($rowtopic10 as $value){ ?>
							<tr>
								<td><?php echo $value['id_topic']; ?></td>
								<td><?php echo $value['name_topic']; ?></td>
								<td><?php echo $value['id_course']; ?></td>
								
					
						
								<td><a href="chitietchuyende.php?idchuyende=<?php echo $value['id_topic'];  ?>"  class="btn btn-info">Xem</a>
						
								<a href="chuyende.php?xoaid=<?php echo $value['id_topic'];  ?>" onclick="return confirm('Bạn có muốn xóa chuyền đề này không')"  class="btn btn-danger">Xóa</a>
								</td>
							</tr>
						<?php } ?>
						
						</tbody>
					</table>

    <?php if ($current_page > 1 && $total_page > 1){
						           echo '<a href="chuyende.php?page='.($current_page-1).'"><button class="phantrang" type=""> < </button></a>  ';
						               for ($i = 1; $i <= $total_page; $i++){
						        // Nếu là trang hiện tại thì hiển thị thẻ span
						        // ngược lại hiển thị thẻ a
						        if ($i == $current_page){
						            echo '<span><button class="phantrang" type="">'.$i.'</button></span> ';
						        }
						        else{
						            echo '<a href="chuyende.php?page='.$i.'"><button class="phantrang" type="">'.$i.' </button></a> ';
						        }
						    }
						} 
						  if ($current_page < $total_page && $total_page > 1){
						    echo '<a href="chuyende.php?page='.($current_page+1).'"><button class="phantrang"  type=""> > </button> </a> ';
						}?>

					<?php }else if (isset($_POST['timkiemid'])) {
						$idtopictk=$_POST['timkiemid']; ?>


						<table class="table table-striped">
						<thead>
							<tr>
								<th>ID CHUYÊN ĐỀ</th>
								<th>TÊN CHUYÊN ĐỀ</th>
								<th>ID KHÓA HỌC</th>
							<!-- 	<th>thong_tin</th> -->
							<!-- 	<th>header</th> -->
								<th colspan="3">CHỨC NĂNG</th>
							</tr>
						</thead>
						<tbody>

						
							<tr>
								<td><?php echo topic($idtopictk)['id_topic']; ?></td>
								<td><?php echo topic($idtopictk)['name_topic']; ?></td>
								<td><?php echo topic($idtopictk)['id_course']; ?></td>
								
					<?php if (topic($idtopictk)['id_topic']==""){ echo ' id không đúng';}else {  ?>
						
								<td><a href="chitietchuyende.php?idchuyende=<?php echo topic($idtopictk)['id_topic'];  ?>"  class="btn btn-info">Xem</a>
						
								<a href="chuyende.php?xoaid=<?php echo topic($idtopictk)['id_topic'];  ?>" onclick="return confirm('Bạn có muốn xóa chuyền đề này không')"  class="btn btn-danger">Xóa</a>
								<?php } ?>
								</td>
							</tr>
					
						
						</tbody>
					</table>

						<?php  } ?>
				</div>
				</div>
				
			</div>
		</div>




		</div>
	</div>
</body>
</html>