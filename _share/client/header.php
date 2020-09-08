<!-- -->
	<div class="header2">
	<div class="row" style="width:1347px;margin: auto">
	<?php 	if (isset($_GET["url"])) {
			echo $_GET['url'];
		} ?>
		<div class="col-md-4 offset-md-1" style="background: none;">
					<div class="btn-group" style="margin-top: 5px;margin-left: 10px">
						  <button type="button" class="btn btn-info" style="font-size: 14px">	
						  Các khóa học</button>
						  <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    <span class="sr-only">Toggle Dropdown</span>
						  </button>
						  <div class="dropdown-menu">
						  	      	<?php foreach ($rowcategory as $value){ ?>
							  <a class="dropdown-item" href="danhsach.php?idcate=<?php echo $value['id_category'] ?>"><?php echo $value['name_category'] ?></a>
				
						    		 <?php  }?>
			
						  </div>
						</div>	
		</div>
			<div class="col-md-2"><a href="index.php"><img src="image/<?php echo $rowsetting['logo'] ?>" style="width:100px;height:50px;margin-left: 50px"></a>
		</div>
		<div class="col-md-4" style="background: none;">
			<?php if (!isset($_SESSION['account'])){?>
				
			
					<a href="dangky.php" class="btn btn-warning btn-sm" style="float: right;margin-left: 10px;margin-top: 8px">Đăng ký</a>
					<a href="dangnhap.php" class="btn btn-warning btn-sm" style="float: right;margin-top: 8px">Đăng nhập</a>
				<?php } else { ?>
					<div class="btn-group" style="float: right;margin-top: 2px">
						  <button type="button" class="btn btn-info btn-sm" style="font-size: 14px">	
						  	<img src="public/images/user/<?php echo users($_SESSION['account']['id'])['image'] ?>" style="width:40px;height:35px;border-radius: 100px;">
						  	<?php echo users($_SESSION['account']['id'])['name'] ?></button>
						  <button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    <span class="sr-only">Toggle Dropdown</span>
						  </button>
						  <div class="dropdown-menu">
						    <a class="dropdown-item" href="thongtincanhan.php">Thông tin cá nhân</a>
						    <?php if (($_SESSION['account']['role'])=='100') { ?>
						    <a class="dropdown-item" href="admin/danhmuc.php">Trang quản trị</a>
						    <?php } ?>
						    <a class="dropdown-item" href="them.php?do=logout">Đăng xuất</a>

						  </div>
						  
						</div>
					
				<?php } ?>
		</div>
		

	</div>
</div>