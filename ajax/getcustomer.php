<?php
function executeQuery($sqlQuery, $fetchAll = true){
	$host = "localhost";
	$dbname = "duan1"; // tên database - lesson6
	$dbusername = "root";
	$dbpassword = ""; // mật khẩu truy cập vào mysql - nếu sử dụng xampp trên windows thì để ""

	try{
		$connect = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);	

	}catch(Exception $ex){
		var_dump($ex->getMessage());
		die;
	}
	// nạp câu truy vấn vào kết nối
	$stmt = $connect->prepare($sqlQuery);

	// thực thi câu truy vấn với csdl
	$stmt->execute();
	// thu thập kết quả trả về
	if($fetchAll == true){
		return $stmt->fetchAll();
	}
	return $stmt->fetch();
}

if (isset($_GET["q"])) {
	$get = $_GET["q"];
}


$sql = "SELECT * FROM subcategory WHERE id_category = '$get' ";

$result = executeQuery($sql,true);


echo "<select class='form-control' style='width:250px;float: left;margin-left: 5px;' name=\"monsreach\">";
foreach ($result as $value) {
  echo "<option value='";
  echo $value['id_subcategory'];
  echo "'>";
  echo $value['name_subcategory'];
  echo "</option>";
}
echo "</select>";