<?php 
include "./commont/connect.php" ?>    
<?php session_start(); 

 $taikhoan = isset($_POST['taikhoan']) == true ? $_POST['taikhoan'] : "";
 $matkhau = isset($_POST['matkhau']) == true ? $_POST['matkhau'] : "";

$sql = " select * from users where username = '$taikhoan' ";
$user = executeQuery($sql, false);
// $newPass = password_hash('12345', PASSWORD_DEFAULT);
// var_dump($newPass);

if(password_verify($matkhau,$user['password'])){
	$_SESSION['account'] = [
		'id' => $user['id_user'],
		'name' => $user['name'],
		'username' => $user['username'],
		'password' => $user['password'],
		'gender' => $user['gender'],
		'image' => $user['image'],
		'role'=>$user['role_id'],
		'status'=>$user['status'],
	];
	if (($_SESSION['account']['status']=='0')) {

		 unset($_SESSION['account']);
		   	header("Location: dangnhap.php");
	}else {
		header('location: index.php');
	}
	

}else {
	header('location: dangnhap.php');
}




if (isset($_GET['do']) && $_GET['do']=='logout'){
	if (isset($_SESSION['account'])) {
       

       unset($_SESSION['account']);
       // unset($_SESSION['cart']);
     
      
       	header("Location: dangnhap.php");
	}
}

