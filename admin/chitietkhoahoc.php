<?php require "../commont/connect.php" ;session_start(); ?>	

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="cssadmin.css">
	<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->

	<link rel="stylesheet" href="../public/css/bootstrap.min.css">
	<script src="../public/js/jquery-3.4.1.slim.min.js"></script>
	<script src="../public/js/popper.min.js"></script>
	<script src="../public/js/bootstrap.min.js"></script>
	<script src="../public/ckeditor/ckeditor.js"></script>
</head>

<?php 
if (isset($_GET['idkhoahoc'])) {
	$idkhoahoc=$_GET['idkhoahoc'];
 	
 } 

if (isset($_POST['tenkhsua'])) {
	upload('anhkhsua','../public/images/course/');
	$tenkhsua=$_POST['tenkhsua'];
	$infokhsua=$_POST['infokhsua'];
	$anhkhsua=$_FILES['anhkhsua']['name'];
	// $giakhsua=$_POST['giakhsua'];
	$idmonkhsua=$_POST['idmonkhsua'];
	$idteacherkhsua=$_POST['idteacherkhsua'];
	if ($anhkhsua=="") {

		$spldoi="UPDATE course SET name_course='$tenkhsua',infomation='$infokhsua',id_subcategory='$idmonkhsua',id_teacher='$idteacherkhsua'
	WHERE id_course='$idkhoahoc' ";
	$conn->exec($spldoi);

		
	}else{
	$spldoi="UPDATE course SET name_course='$tenkhsua' ,image='$anhkhsua',infomation='$infokhsua',id_subcategory='$idmonkhsua',id_teacher='$idteacherkhsua'
	WHERE id_course='$idkhoahoc' ";
	$conn->exec($spldoi);
	}

}




if (isset($_GET['xoachuyende'])) {
	$idxoa=$_GET['xoachuyende'];

		$sqlxoalesson="DELETE FROM lesson WHERE id_topic='$idxoa' " ;
		$conn->exec($sqlxoalesson);

		$sqlxoatopic="DELETE FROM topic WHERE id_topic='$idxoa' " ;
		$conn->exec($sqlxoatopic);
		header("location: chitietkhoahoc.php?idkhoahoc=$idkhoahoc ");
}

if (isset($_POST['tenkhthem'])) {

	upload('anhkhthem','../public/images/course/');
	$tenkhthem=$_POST['tenkhthem'];
	$anhkhthem=$_FILES['anhkhthem']['name'];
	$idmonkhthem=$_POST['idmonkhthem'];
	$idteacherkhthem=$_POST['idteacherkhthem'];
	$infokhthem=$_POST['infokhthem'];

	$sqlthemkh = "INSERT INTO course VALUES ('', '$tenkhthem','$anhkhthem','$infokhthem','$idmonkhthem','$idteacherkhthem')";
 	$conn->exec($sqlthemkh);
	$last_idkhoahoc=$conn->lastInsertId();
	header("location: chitietkhoahoc.php?idkhoahoc=$last_idkhoahoc");
	
}

	


 ?>


<body>
	<div style="width:100%;margin:auto">
		<div class="row " style="width:100%">
	<!--  MENU -->
 <?php include_once '../_share/admin/menu.php' ?>
 <!-- HẾT MENU -->


		
		<div class="col-md-10" style="background: #ddd">
				<!--  HEADER -->
 <?php include_once '../_share/admin/header.php' ?>
 <!-- HẾT HEADER -->
			<div class="bodyad" style="width:100%">
				<div class="thanbody">
				<p style="font-size: 20px;width:1000px;height:50px;background: white;line-height: 50px;padding-left: 10px;border-radius: 10px;color:#17a2b8;font-weight: bold">QUẢN LÍ KHÓA HỌC</p>

				<div class="noidung">
					
					
<?php if (!isset($_GET['themkhoahoc'])){ ?>
	

						<div class="row" >
							
							<div class="col-md-2">
						 <span style="font-weight: bold;font-size: 20px">KHÓA HỌC : <?php echo $idkhoahoc ?></span>
								<p style="font-weight: bold;margin-top: 5px"> ID Khóa học : </br>
								Tên khóa học :</br>
								

								Ảnh :</br>
							<!-- 	Giá :</br> -->
								MÔN :</br>
								Giáo viên :</br>
							Thông tin:</br>
							</p>
							</div>
							<div class="col-md-4">
							</br>
						<form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data" style="margin-top: 10px">
								<p><input type="text" class="form-control" name="" disabled="" value="<?php echo course($idkhoahoc)['id_course'] ?>"></p>
								<p><input type="text" class="form-control" name="tenkhsua" value="<?php echo course($idkhoahoc)['name_course'] ?>"></p>
								
								<p><input type="file" class="form-control" name="anhkhsua"></p>
								<!-- <p><input type="text" class="form-control" name="giakhsua" value="800.000 đ"></p> -->
								<p>
									<select name="idmonkhsua" class="form-control">
								 <?php foreach ($rowsubcategory as $value){ ?>
								 	<option value="<?php echo $value['id_subcategory'] ?>" <?php if ($value['id_subcategory']==course($idkhoahoc)['id_subcategory']){echo 'selected';} ?>
								 		
								 	>
								 		<?php echo $value['name_subcategory'].'-',category($value['id_category'])['name_category'] ?></option>
								 <?php } ?>
									
									</select></p>
								<p>
									<?php $idteacher=course($idkhoahoc)['id_teacher']; ?>
										<select name="idteacherkhsua" class="form-control">
									<?php foreach ($rowteacher as $value){ ?>
								
										<option value="<?php echo $value['id_teacher']; ?>" <?php if ($value['id_teacher']==$idteacher) {
											echo 'selected';
										} ?>><?php echo $value['name'].' - '.$value['specialize'] ?></option>
									
								<?php  }?>
										</select>
								</p>



								<p><textarea  type="text" rows="5"  class="form-control" name="infokhsua">
									<?php echo course($idkhoahoc)['infomation'] ?>
								</textarea></p>

							<!-- 	<a  href="khoahoc.html" class="btn btn-info" style="float: right;margin-left: 10px">HỦY</a> -->
								<button type="submit" class="btn btn-info" style="margin:auto;margin-left: 0px;width:200px">CẬP NHẬP</button>
						</form>
							</div>
		<script>
 
           CKEDITOR.replace('editor1');
       </script>
 
							<div class="col-md-5">
					<!-- 	<form action="" method="get" accept-charset="utf-8"> -->
							<p style="font-weight: bold;font-size: 20px;float: left;">CHUYÊN ĐỀ</p>
							<a href="chitietchuyende.php?themchuyende&&idkhoahoc=<?php echo $idkhoahoc ?>" class="btn btn-info" style="float: right;margin-top: 10px">Thêm chuyên đề </a>


					<table class="table" style="overflow: auto;width:100%;height:100px;border:1px solid #dddd">
						
						<thead>
							<tr>
								<th style="width:275px;">Tên chuyên đề</th>
								<th>Chức năng</th>

							</tr>
						</thead>
						<tbody>
							<?php foreach (topic_idcourse($idkhoahoc) as $value){ ?>
								
						
							<tr>
								<td style="font-size: 15px;line-height: 25px"><?php echo $value['name_topic'] ?></td>
								<td><a href="chitietchuyende.php?idchuyende=<?php echo $value['id_topic'] ?>" class="btn btn-info">Xem</a> 
									<a href="chitietkhoahoc.php?idkhoahoc=<?php echo $idkhoahoc ?>&&xoachuyende=<?php echo $value['id_topic']  ?>" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa chuyên đề này ?')">Xóa</a>
								</td>
							</tr>
						<?php } ?>
					


					
						</tbody>
					</table>
						
					<!-- 	</form> -->
							</div>
						</div>
<?php }elseif (isset($_GET['themkhoahoc'])) { ?>
				

						<div class="row" >
						
						<div class="col-md-7 offset-md-1">
						<form method="POST" accept-charset="utf-8" enctype="multipart/form-data" >
						 <div class="input-group mb-3" style="margin-top: 8px">
						     <div class="input-group-prepend">
						       <span class="input-group-text">Tên khóa học</span>
						    </div>
						    <input type="text" name="tenkhthem" class="form-control">
						 </div>

						  <div class="input-group mb-3" style="margin-top: 8px">
						     <div class="input-group-prepend">
						       <span class="input-group-text">Ảnh</span>
						    </div>
						    <input type="file" name="anhkhthem" class="form-control">
						 </div>


						  <div class="input-group mb-3" style="margin-top: 8px">
						     <div class="input-group-prepend">
						       <span class="input-group-text">Lớp</span>
						    </div>
					              <?php
                   
					            $sql = "SELECT * FROM category ";
					            $result = executeQuery($sql, true);
					            ?>
					            <?php
					            echo "<select name='lopkhthem' class='form-control'  onchange=\"showCustomer(this.value)\">";
					             echo "<option> Chọn lớp</option>";
					            foreach ($result as $value) {
					                echo "<option value = '" . $value['id_category'] . "'>";
					                echo $value['name_category'];
					                echo "</option>";
					            }
					            echo "</select>";
					            ?>


					 			      <div id="txtHint" style="width: 100%"></div>
					            <script>
					                function showCustomer(str) {
					                    var xhttp;
					                    if (str == "") {
					                        document.getElementById("txtHint").innerHTML = "";
					                        return;
					                    }
					                    xhttp = new XMLHttpRequest();
					                    xhttp.onreadystatechange = function() {
					                        if (this.readyState == 4 && this.status == 200) {
					                            document.getElementById("txtHint").innerHTML = this.responseText;
					                        }
					                    };
					                    xhttp.open("GET", "getcustomer.php?q=" + str, true);
					                    xhttp.send();
					                }
					            </script>
						 </div>





				<!-- 		   <div class="input-group mb-3" style="margin-top: 8px">
						     <div class="input-group-prepend">
						       <span class="input-group-text">Môn</span>
						    </div>
	

						    <select name="idmonkhthem" class="form-control">
						    <?php foreach ($rowsubcategory as $value){ ?>
						    	<option value="<?php echo $value['id_subcategory']; ?>"><?php echo $value['name_subcategory'].' - '.category($value['id_category'])['name_category'] ?></option>
						    <?php } ?>
						    	
						    	
						    </select>
						 </div>
 -->

						   <div class="input-group mb-3" style="margin-top: 8px">
						     <div class="input-group-prepend">
						       <span class="input-group-text">Giáo viên</span>
						    </div>
						  <!--   <input type="text" name="idteacherkhthem" class="form-control"> -->
						    <select name="idteacherkhthem" class="form-control">
						    	<option value="0">Chọn giáo viên</option>
						    	
						    	<?php foreach ($rowteacher as $value){ ?>
						    	<option value="<?php echo $value['id_teacher'] ?>"><?php echo $value['name'].' - '.$value['specialize']?></option>
						    	<?php } ?>
						    </select>
						 </div>


						 	  <div class="input-group mb-3" style="margin-top: 8px">
						     <div class="input-group-prepend">
						       <span class="input-group-text">Thông tin khóa học</span>
						    </div>
						      <textarea  name="infokhthem" rows="5"  class="form-control"></textarea>
						 </div>
   <script>
 
           CKEDITOR.replace('editor1');
 
    </script> 
						 <button type="submit" style="width:400px" class="btn btn-info">THÊM</button>
						 <a href=""  class="btn btn-info" style="width:180px">Hủy</a>
						</form>
						</div>
						</div>

   

<?php  } ?>			
						
					

					
				</div>
				</div>
				
			</div>
		</div>




		</div>
	</div>
</body>
</html>