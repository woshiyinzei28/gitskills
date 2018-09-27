<?php
	$sNumber = $_POST["sNumber"];
	$courseCode = $_POST["courseCode"];
	$sResult = $_POST["sResult"];
	// 如果是录入页面提交，那么$action等于add
	$action = empty($_POST["action"])?"add":$_POST["action"];

	if ($action == "add") {
		$str1 = "数据添加成功";
		$str2 = "数据添加失败";
		$url = "chengji-input.php";
		$sql1 = "insert into xuanxiu(学号,课程编号,成绩) value('$sNumber','$courseCode','$sResult')";
	}else if ($action == "update") {
		$str1 = "数据更新成功";
		$str2 = "数据更新失败";
		$url = "chengji-list.php";
		$sql1 = "update xuanxiu set 学号='{$sNumber}',课程编号='{$courseCode}',成绩='{$sResult}' where 学号='{$sNumber}' and 课程编号='{$courseCode}';";
		echo $sql1;
	}else{
		die("请选择操作方法");
	}

	include("conn.php");

	// 执行SQL语句	
	$result = mysqli_query($conn,$sql1);

	// 输出数据
	// var_dump($result);
	if ($result) {
		echo "<script>alert('{$str1}');</script>";
		header("Refresh:1;url={$url}");
	}else{
		echo $str2.mysqli_error($conn);
	}

	// 关闭数据连接
	mysqli_close($conn);
?>