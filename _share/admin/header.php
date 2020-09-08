
		<div class="headerad" style="background: #17a2b8;border-radius: none">

						<div class="btn-group" style="float: right;">
						  <button type="button" class="btn btn-info" style="font-size: 14px">	<img src="../public/images/user/<?php echo users($_SESSION['account']['id'])['image']; ?>" style="width:40px;height:35px;border-radius: 100px;"> <?php echo users($_SESSION['account']['id'])['name']; ?> </button>
						  <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    <span class="sr-only">Toggle Dropdown</span>
						  </button>
						  <div class="dropdown-menu">
						    <a class="dropdown-item" href="../">Về trang client</a>
						    <a class="dropdown-item" href="../them.php?do=logout">Đăng xuất</a>
						  <!--   <a class="dropdown-item" href="#">Something else here</a>
						    <div class="dropdown-divider"></div>
						    <a class="dropdown-item" href="#">Separated link</a> -->
						  </div>
						</div>
			</div>