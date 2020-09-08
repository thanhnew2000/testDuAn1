<?php 
$hostname='localhost';
$username='root';
$password='';
$database='duan1';
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

try
{
  $conn= new PDO("mysql:host=$hostname;dbname=$database",$username,$password,$options);
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $conn2= new PDO("mysql:host=$hostname;dbname=$database",$username,$password,$options);
  $conn2->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $connketqua= new PDO("mysql:host=$hostname;dbname=$database",$username,$password,$options);
  $connketqua->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $connhistory= new PDO("mysql:host=$hostname;dbname=$database",$username,$password,$options);
  $connhistory->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


  		$sqltaikhoan="select * from users ";
		$querytaikhoan=$conn->prepare($sqltaikhoan);
		$querytaikhoan->execute();
		$rowtaikhoan= $querytaikhoan->fetchAll(PDO::FETCH_ASSOC);

		$sqlcategory="select * from category ";
		$querycategory=$conn->prepare($sqlcategory);
		$querycategory->execute();
		$rowcategory= $querycategory->fetchAll(PDO::FETCH_ASSOC);


		$sqlsubcategory="select * from subcategory ";
		$querysubcategory=$conn->prepare($sqlsubcategory);
		$querysubcategory->execute();
		$rowsubcategory= $querysubcategory->fetchAll(PDO::FETCH_ASSOC);

		$sqlcourse ="select * from course ";
		$querycourse =$conn->prepare($sqlcourse);
		$querycourse->execute();
		$rowcourse = $querycourse->fetchAll(PDO::FETCH_ASSOC);

		$sqltest  ="select * from test order by id_test desc ";
		$querytest  =$conn->prepare($sqltest);
		$querytest->execute();
		$rowtest  = $querytest->fetchAll(PDO::FETCH_ASSOC);

		$sqltopic ="select * from topic ";
		$querytopic =$conn->prepare($sqltopic);
		$querytopic->execute();
		$rowtopic = $querytopic->fetchAll(PDO::FETCH_ASSOC);


		$sqllesson ="select * from lesson ";
		$querylesson =$conn->prepare($sqllesson);
		$querylesson->execute();
		$rowlesson = $querylesson->fetchAll(PDO::FETCH_ASSOC);

		$sqlteacher ="select * from teacher ";
		$queryteacher =$conn->prepare($sqlteacher);
		$queryteacher->execute();
		$rowteacher = $queryteacher->fetchAll(PDO::FETCH_ASSOC);

		$sqlrole="select * from role ";
		$queryrole=$conn->prepare($sqlrole);
		$queryrole->execute();
		$rowrole= $queryrole->fetchAll(PDO::FETCH_ASSOC);

		$sqlteacher="select * from teacher ";
		$queryteacher=$conn->prepare($sqlteacher);
		$queryteacher->execute();
		$rowteacher= $queryteacher->fetchAll(PDO::FETCH_ASSOC);


		$sqlcomment="select * from comment  ";
		$querycomment=$conn->prepare($sqlcomment);
		$querycomment->execute();
		$rowcomment= $querycomment->fetchAll(PDO::FETCH_ASSOC);

		$sqlshare="select * from share order by id_share desc ";
		$queryshare=$conn->prepare($sqlshare);
		$queryshare->execute();
		$rowshare= $queryshare->fetchAll(PDO::FETCH_ASSOC);

		 $sqlsetting ="select * from setting ";
		$querysetting =$conn->prepare($sqlsetting);
		$querysetting->execute();
		$rowsetting = $querysetting->fetch(PDO::FETCH_ASSOC);









 function users($id){
	  global $conn;
		
		$sql="select * from users where id_user={$id} ";
		$query=$conn->prepare($sql);
		$query->execute();
		$row= $query->fetch(PDO::FETCH_ASSOC);
		
    return $row;
		}

function test($id){
	  global $conn;
		
		$sql="select * from test where id_test={$id} ";
		$query=$conn->prepare($sql);
		$query->execute();
		$row= $query->fetch(PDO::FETCH_ASSOC);
		
    return $row;
		}

		function test_sub($id){
	  global $conn;
		
		$sql="select * from test where id_subcategory={$id} order by id_test desc limit 3";
		$query=$conn->prepare($sql);
		$query->execute();
		$row= $query->fetchAll(PDO::FETCH_ASSOC);
		
    return $row;
		}

function test_question($idtest){
	  global $conn;
		
		$sql="select * from test_question where id_test={$idtest} ";
		$query=$conn->prepare($sql);
		$query->execute();
		$row= $query->fetch(PDO::FETCH_ASSOC);
		
    return $row;
		}

		
		function test_questionAll($idtest){
	  global $conn;
		
		$sql="select * from test_question where id_test={$idtest} ";
		$query=$conn->prepare($sql);
		$query->execute();
		$row= $query->fetchAll(PDO::FETCH_ASSOC);
		
    return $row;
		}

function question($id){
	  global $conn;
		
		$sql="select * from question where id_question={$id} ";
		$query=$conn->prepare($sql);
		$query->execute();
		$row= $query->fetch(PDO::FETCH_ASSOC);
		
    return $row;
		}

 function category($id){
	  global $conn;
		
		$sql="select * from category where id_category={$id} ";
		$query=$conn->prepare($sql);
		$query->execute();
		$row= $query->fetch(PDO::FETCH_ASSOC);
		
    return $row;
		}


 function subcategory($id){
	  global $conn;
		
		$sql="select * from subcategory where id_subcategory={$id} ";
		$query=$conn->prepare($sql);
		$query->execute();
		$row= $query->fetch(PDO::FETCH_ASSOC);
		
    return $row;
		}



 function subcategory_id($id){
	  global $conn;
		
		$sql="select * from subcategory where id_category={$id}  ";
		$query=$conn->prepare($sql);
		$query->execute();
		$row= $query->fetchAll(PDO::FETCH_ASSOC);
		
    return $row;
		}

 function topic($id){
	  global $conn;
		
		$sql="select * from topic where id_topic={$id} ";
		$query=$conn->prepare($sql);
		$query->execute();
		$row= $query->fetch(PDO::FETCH_ASSOC);
		
    return $row;
		}

		 function topic_idcourse($id){
	  global $conn;
		
		$sql="select * from topic where id_course={$id} ";
		$query=$conn->prepare($sql);
		$query->execute();
		$row= $query->fetchAll(PDO::FETCH_ASSOC);
		
    return $row;
		}
function topic_idcourse1($id){
	  global $conn;
		
		$sql="select * from topic where id_course={$id} ";
		$query=$conn->prepare($sql);
		$query->execute();
		$row= $query->fetch(PDO::FETCH_ASSOC);
		
    return $row;
		}

	function course($id){
	  global $conn;
		
		$sql="select * from course where id_course={$id} ";
		$query=$conn->prepare($sql);
		$query->execute();
		$row= $query->fetch(PDO::FETCH_ASSOC);
		
    return $row;
}

	function lesson($id){
	  global $conn;
		
		$sql="select * from lesson where id_lesson={$id} ";
		$query=$conn->prepare($sql);
		$query->execute();
		$row= $query->fetch(PDO::FETCH_ASSOC);
		
    return $row;
}

	function lesson_idtopic($id){
	  global $conn;
		
		$sql="select * from lesson where id_topic={$id} ";
		$query=$conn->prepare($sql);
		$query->execute();
		$row= $query->fetchAll(PDO::FETCH_ASSOC);
		
    return $row;
}

	function lesson_idtopic1($id){
	  global $conn;
		
		$sql="select * from lesson where id_topic={$id} ";
		$query=$conn->prepare($sql);
		$query->execute();
		$row= $query->fetch(PDO::FETCH_ASSOC);
		
    return $row;
}

	function teacher($id){
	  global $conn;
		
		$sql="select * from teacher where id_teacher={$id} ";
		$query=$conn->prepare($sql);
		$query->execute();
		$row= $query->fetch(PDO::FETCH_ASSOC);
		
    return $row;
}

	function comment($id){
	  global $conn;
		
		$sql="select * from comment where id_comment={$id} ";
		$query=$conn->prepare($sql);
		$query->execute();
		$row= $query->fetch(PDO::FETCH_ASSOC);
		
    return $row;
}

	function comment_idcourse($id){
	  global $conn;
		
		$sql="select * from comment where id_course={$id} ";
		$query=$conn->prepare($sql);
		$query->execute();
		$row= $query->fetchAll(PDO::FETCH_ASSOC);
		
    return $row;
}

	function share($id){
	  global $conn;
		
		$sql="select * from share where id_share={$id} ";
		$query=$conn->prepare($sql);
		$query->execute();
		$row= $query->fetch(PDO::FETCH_ASSOC);
		
    return $row;
}
function slide_advert($id){
	  global $conn;
		
		$sql="select * from slide_advert where id={$id} ";
		$query=$conn->prepare($sql);
		$query->execute();
		$row= $query->fetch(PDO::FETCH_ASSOC);
		
    return $row;
		}



 function result_test($id){
	  global $conn;
		
		$sql="select * from result_test where id_result={$id} ";
		$query=$conn->prepare($sql);
		$query->execute();
		$row= $query->fetch(PDO::FETCH_ASSOC);
		
    return $row;
		}

 function history($id){
	  global $conn;
		
		$sql="select * from history where id_history={$id} ";
		$query=$conn->prepare($sql);
		$query->execute();
		$row= $query->fetch(PDO::FETCH_ASSOC);
		
    return $row;
		}


		

function upload($namee,$duongdan){
$fileType= array("jpg","png");
$fileExt=pathinfo($_FILES["{$namee}"]["name"],PATHINFO_EXTENSION);

if (!in_array($fileExt, $fileType)) {
     $message="Chỉ đc tải ảnh file jpg hoặc png";
}elseif (($_FILES["{$namee}"]['size'])>2000000) {
	$message="Dung lương ko quá 2MB";
	
}else {
	$link="{$duongdan}".basename($_FILES["{$namee}"]['name']);
	if (move_uploaded_file($_FILES["{$namee}"]['tmp_name'],$link)) {
			$message="Tải thành công";
	}else{
		$message="Tải không thành công";
	}
 return $message;
}
}


function executeQuery($sql, $getAll = true){
	global $conn;

	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll();
	if($getAll == true){
		return $result;
	}

	if($result != null){
		return $result[0];
	}
}






  } catch(Exception $e){
	echo $e.getMessage();

}
 ?>
