<?php
	// 创建连接
	$conn = mysqli_connect("localhost","root","");
	// 选择要操作的数据库
	mysqli_select_db($conn,"student");
	// 设置读取数据库的编码，不然显示汉字为乱码
	mysqli_query($conn,"set names utf8");
?>