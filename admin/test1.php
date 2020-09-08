<?php require "../commont/connect.php" ?>	
<?php session_start(); 
$mang=[];

$sqltinh ="SELECT COUNT(*) as total FROM subcategory";
$querytinh=$conn->prepare($sqltinh);
$querytinh->execute();
$rowtinh= $querytinh->fetch(PDO::FETCH_ASSOC);

// if ($rowtinh['total']==2) {
	


$sqltest ="SELECT * FROM subcategory ORDER BY RAND() LIMIT 3;";
$querytest=$conn->prepare($sqltest);
$querytest->execute();
$rowtest= $querytest->fetchAll(PDO::FETCH_ASSOC);

$sqltestcate ="SELECT * FROM category ORDER BY RAND() LIMIT 3;";
$querytestcate=$conn->prepare($sqltestcate);
$querytestcate->execute();
$rowtestcate= $querytestcate->fetchAll(PDO::FETCH_ASSOC);

foreach ($rowtest as $key => $value) {
	array_push($mang,$value['id_subcategory']);
	// echo $key;
	// $sqldanhmuc1="INSERT INTO dethu VALUES ('1','$mang[$key]')";
 //  	$conn->exec($sqldanhmuc1);

}
foreach ($rowtestcate as $key => $value) {
	array_push($mang,$value['id_category']);
	// echo $key;
	// $sqldanhmuc1="INSERT INTO dethu VALUES ('1','$mang[$key]')";
 //  	$conn->exec($sqldanhmuc1);

}

foreach ($mang as $key => $value) {
	

	$sqldanhmuc1="INSERT INTO dethu VALUES ('10','$value')";
  	$conn->exec($sqldanhmuc1);

}
// }else {
// 	echo " Không đủ dữ liệu";

// }

    // echo "<pre>";
    // print_r($mang);
    // echo "<pre>";






?>	
