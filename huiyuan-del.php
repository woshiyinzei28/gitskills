<?php
// 创建连接
$conn = mysqli_connect("localhost","root","");
// echo $conn;
if ($conn) {
	echo "连接成功!";
}else{
	die("连接失败".mysqli_connect_error());
}
// 选择要操作的数据库
mysqli_select_db($conn,"student");
// 设置读取数据库的编码，不然显示汉字为乱码
mysqli_query($conn,"set names utf8");

// 执行SQL语句
$sql = "delete from user where id='{$_GET['kid']}'";
$result = mysqli_query($conn,$sql);

if ($result) {
  echo "<script>alert('数据更新成功');</script>";
  header("Refresh:1;url=banji-list.php");
}else{
  echo "数据删除失败".mysqli_error($conn);
}

// 关闭数据连接
mysqli_close($conn);
?>
<?php