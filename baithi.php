<?php require "./commont/connect.php" ?>	
<?php session_start(); 

if (isset($_GET['idde'])){
	$idde=$_GET['idde'];
}
if (!isset($_SESSION['account'])) {
	header("location: dangnhap.php");
}
?>
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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<style type="text/css" media="screen">

.otron{width: 26px;height:25px;border:1px solid #17a2b8;float: left;text-align: center;padding-left: -15px;line-height: 21px}	
</style>
<?php if (isset($_GET['idtest'])) {
	$idtest=$_GET['idtest'];
	$time=test($idtest)['time_test'];

} ?>

<!--  THỜI GIAN LÀM ĐỀ -->


 <script language="javascript">
 function clickFunction() {
  document.getElementById("myCheck").click();
}
//  NẾU HẾT TIME TỰ ĐỘNG SUBMIT KẾT THÚC BÀI
var myVar = setInterval(clickFunction, <?php echo $time*60000 ?>);


            var h = null; // Giờ
            var m = null; // Phút
            var s = null; // Giây
            
            var timeout = null; // Timeout
            var a=0;
            window.onload = function start()
            {
            	
        
         		              /*BƯỚC 1: LẤY GIÁ TRỊ BAN ĐẦU*/
              if (h === null)
              {
                  h = parseInt(document.getElementById('h_val').value);
                  m = parseInt(document.getElementById('m_val').value);
                  s = parseInt(document.getElementById('s_val').value);
              }

              /*BƯỚC 1: CHUYỂN ĐỔI DỮ LIỆU*/
              // Nếu số giây = -1 tức là đã chạy ngược hết số giây, lúc này:
              //  - giảm số phút xuống 1 đơn vị
              //  - thiết lập số giây lại 59
              if (s === -1){
                  m -= 1;
                  s = 59;
              }

              // Nếu số phút = -1 tức là đã chạy ngược hết số phút, lúc này:
              //  - giảm số giờ xuống 1 đơn vị
              //  - thiết lập số phút lại 59
              if (m === -1){
                  h -= 1;
                  m = 59;
              }

              // Nếu số giờ = -1 tức là đã hết giờ, lúc này:
              //  - Dừng chương trình
              if (h == -1){
                  // clearTimeout(timeout);
                  alert('Hết giờ');
                  return false;
              }

              /*BƯỚC 1: HIỂN THỊ ĐỒNG HỒ*/
              document.getElementById('h').innerText = h.toString();
              document.getElementById('m').innerText = m.toString();
              document.getElementById('s').innerText = s.toString();

              /*BƯỚC 1: GIẢM PHÚT XUỐNG 1 GIÂY VÀ GỌI LẠI SAU 1 GIÂY */
              timeout = setTimeout(function(){
                  s--;
                  start();
              }, 1000);
				}
            
     
        </script>




















<body style="background: #ddd">
	<!-- div.header2 -->
    <?php include_once '_share/client/header.php' ?>
<!-- hết div.header2 -->

</br>
<?php 
		$sqltinhsocau="SELECT COUNT(*) as total FROM test_question WHERE id_test='$idtest' " ;
		$querytinhsocau=$conn->prepare($sqltinhsocau);
		$querytinhsocau->execute();
		$rowtongcau= $querytinhsocau->fetch(PDO::FETCH_ASSOC);
 ?>
 		<?php $sodung=0;
 			if (isset($_POST['hoanthanh'])) {
 				$arr=$_POST;
 				// print_r($arr) ;
 				
 					foreach ($arr as $key => $value) {
 						if (is_numeric($key)) {
 					
 						if ($value==question($key)['answer']) {
 							$sodung += 1;
 						
 						}else  {
 							$sodung = $sodung;
 						}
 						
 					}
 				}$diem1cau=10/$rowtongcau['total'];
 			} 

 		 ?>


<?php if (!isset($_POST['hoanthanh'])){ ?>
	

	<div class="row" style="width:1347px;">

	<!--  JAVASCRIPT CHO Ô HIỆN ĐÃ CHỌN HAY CHƯA-->
		<script type="text/javascript">
			function anvao(){
		<?php foreach (test_questionAll($idtest) as $key => $value){ ?>
			var checkbox =document.getElementsByName(<?php echo $value['id_question'] ?>);
			 for (var i = 0; i < checkbox.length; i++){
			if (checkbox[i].checked === true) {
				 document.getElementById("<?php echo $value['id_question'] ?>").style.background  = '#17a2b8';

			}}
			<?php } ?>
		}




		</script>



			<div class="col-md-2 offset-md-1" style="background: white;padding-top: 10px;padding-bottom: 10px;border-radius: 10px;height:500px">
				<!-- <img src="image/dongho.png" style="width:20px;margin-left: 80px;"> <?php echo test($idtest)['time_test'] ?> </br></br> -->
			</br>

			<!--  Ô CHỌN CÂU VÀ XEM CÂU NÀO CHƯA ĐIỀN -->

	

			<script type="text/javascript">
		
			

			$(document).ready(function(){

				<?php  for ($i = 1 ; $i <= $rowtongcau['total']; $i++) { ?>

			$("[name=<?php echo 'caui'.$i ?>]").click(function(){
		
			  	var $s = $('#divsroll');
				var optionTop = $s.find('[id="cau<?php echo $i ?>"]').offset().top;
				var selectTop = $s.offset().top;

				$s.scrollTop($s.scrollTop() + (optionTop - selectTop));

				})
		<?php } ?>
	  });
			</script>
			<?php $socau=0 ?>
				<?php foreach (test_questionAll($idtest) as $value){ $socau+=1; ?>
					
				
				<button class="btn" id="<?php echo $value['id_question'] ?>" name="caui<?php echo $socau ?>" style="float: left;margin-left: 5px; width:40px;border-radius: 100%;color:#c3cfdd;margin-top: 5px;text-align: center;">
					<?php echo $socau ?></button>

				<?php  }?>

				

				
			<form action="" method="POST" accept-charset="utf-8">
				
				
			
				

			<button type="submit" name="hoanthanh" id="myCheck" onclick = "clickFunction()"  class="btn btn-primary btn-sm" style="margin-left:120px;">Nộp bài</button>
			
			</div>
			
			<div class="col-md-6 offset-md-1" style="background: white;border-radius: 10px;float: left;">
			<p style="font-size: 17px;text-align: center;padding-top: 10px;font-weight: bold"><?php echo test($idtest)['name_test'] ?>

			<div id="divsroll" style="overflow: scroll;overflow-x:hidden;height:700px;padding-top: 20px">

				<?php $socau=0 ?>
				<?php foreach (test_questionAll($idtest) as $key => $value){ 
					 $socau+=1;?>
		
					<div class="boxbailam"  id="cau<?php echo $socau ?>">
							<b><?php echo $socau.' . '.question($value['id_question'])['name_question']; ?>

							<!--  Xem câu hỏi này có ảnh hay ko -->
							<?php if (question($value['id_question'])['image']!="") { echo "</br>" ?>

								<img src="public/images/test/<?php echo question($value['id_question'])['image'] ?>" alt="" style="width:500px;text-align: center;">
							 <?php  } ?>
							 <!-- Kết thúc ảnh -->
								
							</b>

							<div style="margin-left: 20px">
							<p><input type="radio" onclick="anvao()" name="<?php echo  $value['id_question'] ?>" value="a"> <?php echo 'A. '.question($value['id_question'])['a'] ?></p>
							<p><input type="radio" onclick="anvao()"  name="<?php echo  $value['id_question'] ?>" value="b"> <?php echo 'B. '.question($value['id_question'])['b'] ?> </p>
							<p><input type="radio" onclick="anvao()" name="<?php echo  $value['id_question'] ?>" value="c"> <?php echo 'C. '.question($value['id_question'])['c'] ?></p>
							<p><input type="radio" onclick="anvao()" name="<?php echo  $value['id_question'] ?>" value="d"> <?php echo 'D. '.question($value['id_question'])['d'] ?></p>
						</div>
					</div>
			<?php } ?>
			</div>
		</div>
		<div class="col-md-1">


			<p style="position: fixed;background: white;padding-right: 10px;padding-bottom: 4px"><img src="image/dongho.png" style="width:20px;margin-left: 10px;"> 
	
		            <span id="h" style="display: none">Giờ</span> 
		            <span id="m">Phút</span> :
		            <span id="s">Giây</span>
				<!-- <?php echo test($idtest)['time_test'].'00:00' ?> -->
    
			</p>


		</div>
			</form>

<!--  ĐÃ HOÀN THÀNH -->

<?php }elseif (isset($_POST['hoanthanh'])) {
		
	?>

<!--  Đã hoàn thành lưu điểm vào đb -->
	







<!--  Hiện kết quả ra màn hinh -->

	
	
		
	
	<form action="luuketquatest.php" method="POST" accept-charset="utf-8">

	<div style="width:500px;height:210px;background: white;margin: auto;margin-top: 10px" >
			<p style="text-align: center;font-weight: bold;padding-top: 10px;font-size: 20px">KẾT QUẢ</p>
			<p style="text-align: center;">Số câu đúng :<?php echo  $sodung.'/'.$rowtongcau['total']; ?></p>
			<p style="text-align: center;">ĐIỂM : <?php echo ROUND($diem1cau*$sodung,1); ?> </p>


				<?php $diem=ROUND($diem1cau*$sodung,1); ?>
			
				
				<input type="hidden" name="diem" value="<?php echo $diem ?>">
				<input type="hidden" name="idtest" value="<?php echo $idtest ?>">
				<input type="hidden" name="iduser"  value="<?php echo $_SESSION['account']['id'] ?>">
			<button type="submit" class="btn btn-primary" style="margin-left: 200px">KẾT THÚC</button>
		<!-- 	<a style="margin-left: 200px" href="index.php" class="btn btn-primary">KẾT THÚC </a> -->
	 	 </form>
	</div>

<?php } ?>



		 <div style="display: none">
       
            <input type="text" id="h_val" placeholder="Giờ" hidden="" value="0"/> <br/>
            <input type="text" id="m_val" placeholder="Phút" hidden=""  value="<?php echo test($idtest)['time_test'] ?>"/> <br/>
            <input type="text" id="s_val" placeholder="Giây" hidden=""  value="00"/>
            <input type="button" onclick="start()" hidden="" value="Start" />
       <!--      <input type="button" value="Stop" onclick="stop()"/>  <br/> <br/> -->
        </div>






<div class="ttcnbody" style="height:100px">
<div class="row"></div>
</div>



<!-- div.header2 -->
    <?php include_once '_share/client/footer.php' ?>
<!-- hết div.header2 -->


	</div>
	
	
</body>
</html>