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



				

<?php if (isset($_POST['timework'])) {
	$idmon=$_POST['idmon'];
	$nametestnew=$_POST['nametestnew'];
	$timework=$_POST['timework'];


// BƯỚC 1: KIỂM TRA TÊN TEST CÓ TRONG DB HAY CHƯA
$kiemtra="SELECT * FROM test WHERE name_test='$nametestnew'";
 $kq=$conn->prepare($kiemtra);
 $kq->execute();
 $rowkq=$kq->fetch(PDO::FETCH_ASSOC);
if (isset($rowkq['name_test'])) { ?>
	<script type="text/javascript">alert("Tên đề đã tồn tại hãy nhập tên khác");</script>
<?php  } else{






// BƯỚC 2: SELECT ĐỂ LẤY TỔNG CÁC CÂU DỄ , TB , KHÓ TRONG DB 
		$sqltinh3 ="SELECT COUNT(*) as total FROM question WHERE id_subcategory='$idmon' and level=3 " ;
		$querytinh3=$conn->prepare($sqltinh3);
		$querytinh3->execute();
		$rowtinhde= $querytinh3->fetch(PDO::FETCH_ASSOC);

		$sqltinh2 ="SELECT COUNT(*) as total FROM question WHERE id_subcategory='$idmon' and level=2 " ;
		$querytinh2=$conn->prepare($sqltinh2);
		$querytinh2->execute();
		$rowtinhtb= $querytinh2->fetch(PDO::FETCH_ASSOC);

		$sqltinh1 ="SELECT COUNT(*) as total FROM question WHERE id_subcategory='$idmon' and level=1 " ;
		$querytinh1=$conn->prepare($sqltinh1);
		$querytinh1->execute();
		$rowtinhkho= $querytinh1->fetch(PDO::FETCH_ASSOC);

//  BƯỚC 3: KIỂM TRA NẾU CÁC RADANDOM THEO YÊU CẦU CÓ LƠN HƠN SO TỔNG CÂU CÓ TRONG DB HAY KHÔNG NẾU CÓ THÌ LÀM LẠI
		//  NẾU KHÔNG THÌ SANG B4
		if (($rowtinhde['total']>=$_POST['caude'])&&($rowtinhtb['total']>=$_POST['cautb'])&&($rowtinhkho['total']>=$_POST['caukho']))
		{
			if (($_POST['caude']=="")&&($_POST['cautb']=="")&&($_POST['caukho']=="")) {
			$sqldemoi="INSERT INTO test VALUES ('','$nametestnew','$timework','')";
			$tao=$conn2->exec($sqldemoi);
			}else {
				$id=$idmon;
			$sqldemoi="INSERT INTO test VALUES ('','$nametestnew','$timework','$id')";
			$tao=$conn2->exec($sqldemoi); 
			}

			// $sqldemoi="INSERT INTO test VALUES ('','$nametestnew','$timework','$id')";
			// $tao=$conn2->exec($sqldemoi); 
			?>
				<script type="text/javascript">alert("Tạo thành công");</script> 

			<?php  $idtest=$conn2->lastInsertId();

		
//  BƯỚC 4: KT NẾU CÂU DỄ NGƯỜI DÙNG NHẬP KHÁC 0 THÌ BẮT ĐẦU INSERT CÂU VÀO BẢNG test_question 
			//  NẾU KHÔNG THÌ BỎ QUA COI NHƯ CHỈ TẠO ĐỀ TEST chứ ko có câu hỏi radom của phần dễ
			//  PHẦN TB VÀ KHÓ TƯƠNG TỰ

		//  CÂU DỄ
		if ((!($_POST['caude']==""))){

			$caude=$_POST['caude'];

			$sqlarrcaude ="SELECT * FROM question WHERE id_subcategory='$idmon' and level=3 ORDER BY RAND() LIMIT $caude ";
			$queryarrcaude=$conn->prepare($sqlarrcaude);
			$queryarrcaude->execute();
			$arrayde= $queryarrcaude->fetchAll(PDO::FETCH_ASSOC);

			foreach ($arrayde as $value) {
			$giatri=$value['id_question'];
			$sqladdcaude="INSERT INTO test_question VALUES ('$idtest','$giatri')";
		  	$conn->exec($sqladdcaude);

			}}
		// HẾT CÂU DỄ

		//  CÂU TRUNG BÌNH
		if ((!($_POST['cautb']==""))){

			$cautb=$_POST['cautb'];

			$sqlarrcautb ="SELECT * FROM question WHERE id_subcategory='$idmon' and level=2 ORDER BY RAND() LIMIT $cautb ";
			$queryarrcautb=$conn->prepare($sqlarrcautb);
			$queryarrcautb->execute();
			$arraytb= $queryarrcautb->fetchAll(PDO::FETCH_ASSOC);

			foreach ($arraytb as $value) {
			$giatritb=$value['id_question'];
			$sqladdcautb="INSERT INTO test_question VALUES ('$idtest','$giatritb')";
		  	$conn->exec($sqladdcautb);

			}}
		// HẾT CÂU TRUNG BÌNH

			

			//  CÂU TRUNG BÌNH
		if ((!($_POST['caukho']==""))){

			$caukho=$_POST['caukho'];

			$sqlarrcaukho ="SELECT * FROM question WHERE id_subcategory='$idmon' and level=1 ORDER BY RAND() LIMIT $caukho ";
			$queryarrcaukho=$conn->prepare($sqlarrcaukho);
			$queryarrcaukho->execute();
			$arraykho= $queryarrcaukho->fetchAll(PDO::FETCH_ASSOC);

			foreach ($arraykho as $value) {
			$giatrikho=$value['id_question'];
			$sqladdcaukho="INSERT INTO test_question VALUES ('$idtest','$giatrikho')";
		  	$conn->exec($sqladdcaukho);

			}}
		// HẾT CÂU TRUNG BÌNH


			if (isset($tao)) {
				header("location: suade.php?idsuade=$idtest");
			}


// ELSE CỦA BƯỚC 3 : NẾU LỖI CHỈ RA LÀ TRONG DB CHỈ CÓ TỔNG SỐ CÂU ÍT HƠN SỐ CÂU NGƯỜI DÙNG MUỐN TẠO VÀ YÊU CẦU TẠO LẠI TỪ ĐẦU

		}else{
			if (($rowtinhde['total']<=$_POST['caude'])) { ?>
				<script type="text/javascript">alert("Số câu dễ chỉ có <?php echo $rowtinhde['total']  ?> kho câu hỏi không đủ theo yêu cầu . Hãy tạo lại");</script> 
			<?php } 
			else if (($rowtinhtb['total']<=$_POST['cautb'])) { ?>
				<script type="text/javascript">alert("Số câu dễ chỉ có <?php echo $rowtinhtb['total']  ?> kho câu hỏi không đủ theo yêu cầu . Hãy tạo lại");</script> 
			<?php	}
			else if (($rowtinhkho['total']<=$_POST['caukho'])) { ?>
				<script type="text/javascript">alert("Số câu dễ chỉ có <?php echo $rowtinhkho['total']  ?> kho câu hỏi không đủ theo yêu cầu . Hãy tạo lại");</script> 
		 <?php	}
		}
	}

	} ?>

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