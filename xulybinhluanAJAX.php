
<?php require "./commont/connect.php";date_default_timezone_set('Asia/Ho_Chi_Minh');?>	
<?php session_start(); 




if (isset($_GET['noidungbl'])) {
	$time=date('Y-m-d H:i:s');
	$id_user=$_SESSION['account']['id'];
	$noidung=$_GET['noidungbl'];
	$idkh=$_GET['idkh'];

	$sqlbinhluan="INSERT INTO comment VALUES ('','$idkh','$time','$noidung','$id_user')";
  	$conn->exec($sqlbinhluan);
	
}

	function comment_idkhoahoc($id){
	  global $conn;
		
		$sql="select * from comment where id_course={$id} ";
		$query=$conn->prepare($sql);
		$query->execute();
		$row= $query->fetchAll(PDO::FETCH_ASSOC);
		
    return $row;
}



if (isset($_GET['xoaidbl'])) {
			$xoaidbl=$_GET['xoaidbl'];

			$sqlxoabl="DELETE FROM comment WHERE id_comment='$xoaidbl' " ;
			$conn->exec($sqlxoabl);

		}




	$idlesson=$_GET['idlesson'];
	$idkh=$_GET['idkh'];



?>
<input type="type" id="idkh" hidden="" value="<?php echo $idkh ?>">
<input type="type" id="idlesson" hidden="" value="<?php echo $idlesson ?>">
<script type="text/javascript">
				 $(document).ready(function(){
								$("#xoabl").click(function(){
									var idbl= $("#idbinhluan").val();
									var idkh= $("#idkh").val();
									var idlesson= $("#idlesson").val();
										$.get("xulybinhluanAJAX.php",{xoaidbl:idbl,idkh:idkh,idlesson:idlesson}, function(data){
												$("#ok").html(data);
										})

								})
							})
</script>

		<?php foreach (comment_idkhoahoc($_GET['idkh']) as $value){ ?>
							<?php $idnguoidung=$value['id_user'];



							 ?>
						
							<div class="obinhluan">
								<div style="width:60px;background: none;height:60px;float: left;margin-right: 10px">
									<img src="public/images/user/<?php echo users($idnguoidung)['image'] ?>" style="width:50px;height:50px;border-radius: 100px;margin-top: 5px;margin-left: 5px;line-height: 60px">
								</div>
								<div style="width:320px;background: white;">
									<p style="font-size: 13px;color:#0070ba;"><?php echo users($idnguoidung)['name'] ?>
									<span style="float: right;margin-right: 5px;font-size: 11px;color:gray;padding-top: 1px"><?php echo $value['date_time'] ?>&nbsp;&nbsp;</span>
									</p>
									<p style="font-size: 13px;color: black;margin-top: -15px">
										<?php echo $value['content'] ?>

										<?php if (isset($_SESSION['account'])){
											if ($_SESSION['account']['id']==$idnguoidung) {?>
									 		

											<input type="text" name="idbinhluan" id="idbinhluan" hidden="" value="<?php echo $value['id_comment'] ?>">
											<button	type="button" id="xoabl" onclick="return confirm('Ban co chắn muốn xóa bình luận này')" style="float: right;margin-right: 5px">Xóa</button>
										</p>
									<?php }
										} ?>
											
										
										
								</div>




								<p style="width:320px;height:1px;background: #888888;margin-top: 20px"></p>

							</div>
	<?php } ?>
