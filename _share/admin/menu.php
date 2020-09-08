 <?php if (($_SESSION['account']['role'])==1) {
	header("location: ../index.php");
}else if(!isset($_SESSION['account'])){
	header("location: ../dangnhap.php");
}?>

	<div class="col-md-2" style="background: #222d32">
			

			<div style="height:50px;width:220px;background: #198d9f;text-align: center;">
				<img src="../image/<?php echo $rowsetting['logo']; ?>" style="width:70px;">
			</div>
			<div class="ten">
			</br>
				<img src="../public/images/user/<?php echo users($_SESSION['account']['id'])['image']; ?>" style="width:50px;height:50px;border-radius: 100%;margin-left: 5px"> 
				&nbsp;&nbsp;<?php echo users($_SESSION['account']['id'])['name']; ?>
			</div>
			<div style="width: 210px;height:500px;font-size: 14px;color: #b8c7ce">
				<div class="boxmenu">
					<a href="danhmuc.php" class="thea5"><p>Lớp 	</p></a>
				</div>
				
				<div class="boxmenu">
					<a href="khoahoc.php" class="thea5"><p>Khóa học</p></a>
				</div>
				<div class="boxmenu">
					<a href="chuyende.php" class="thea5"><p>Chuyên đề</p></a>
				</div>
				<div class="boxmenu">
					<a href="baigiang.php" class="thea5"><p>Bài giảng</p></a>
				</div>
				<div class="boxmenu">
					<a href="dethi.php" class="thea5"><p>Đề thi</p></a>
				</div>
				<div class="boxmenu">
					<a href="cauhoi.php" class="thea5"><p>Câu hỏi</p></a>
					
				</div>
				<div class="boxmenu">
					<a href="taikhoan.php" class="thea5"><p>Tài khoản</p></a>
				</div>
				<div class="boxmenu">
					<a href="giaovien.php" class="thea5"><p>Giáo viên</p></a>
				</div>
			
				<div class="boxmenu">
					<a href="binhluan.php" class="thea5"><p>Bình luận</p></a>
				</div>
				<div class="boxmenu">
					<a href="chiase.php" class="thea5"><p>Chia sẻ</p></a>
				</div>
					<div class="boxmenu">
					<a href="slide.php" class="thea5"><p>Slide_Quảng cáo</p></a>
				</div>
					<div class="boxmenu">
					<a href="setting.php" class="thea5"><p>Setting</p></a>
				</div>

			
				
			<!-- 	<div class="boxmenu">
					<a href="" class="thea2"><p>Quản lí bình luận</p></a>
				</div> -->

			</div>

			
		</div>