<?php
	$bjCode = $_POST["bjCode"];
	$bjMonitor = $_POST["bjMonitor"];
	$bjClassroom = $_POST["bjClassroom"];
	$bjDirector = $_POST["bjDirector"];
	$bjSlogan = $_POST["bjSlogan"];
	// 如果是录入页面提交，那么$action等于add
	$action = empty($_POST["action"])?"add":$_POST["action"];

	if ($action == "add") {
		$str1 = "数据添加成功";
		$str2 = "数据添加失败";
		$url = "xinwen-input.php";
		$sql1 = "insert into xinwen(标题,肩题,作者,时间,内容) value('$bjCode','$bjMonitor','$bjClassroom','$bjDirector','$bjSlogan')";
	}else if ($action == "update") {
		$str1 = "数据更新成功";
		$str2 = "数据更新失败";
		$url = "xinwen-list.php";
		$kid = $_POST["kid"];
		$sql1 = "update xinwen set 标题='{$bjCode}',肩题='{$bjMonitor}',作者='{$bjClassroom}',时间='{$bjDirector}',内容='{$bjSlogan}' where 标题='{$kid}'";
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