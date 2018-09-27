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
		$url = "banji-input.php";
		$sql1 = "insert into banji(班号,班长,教室,班主任,班级口号) value('$bjCode','$bjMonitor','$bjClassroom','$bjDirector','$bjSlogan')";
	}else if ($action == "update") {
		$str1 = "数据更新成功";
		$str2 = "数据更新失败";
		$url = "banji-list.php";
		$kid = $_POST["kid"];
		$sql1 = "update banji set 班号='{$bjCode}',班长='{$bjMonitor}',教室='{$bjClassroom}',班主任='{$bjDirector}',班级口号='{$bjSlogan}' where 班号='{$kid}'";
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