<?php include("head.php") ?>
<?php
// 创建连接
$conn = mysqli_connect("localhost","root","");
// 选择要操作的数据库
mysqli_select_db($conn,"student");
// 设置读取数据库的编码，不然显示汉字为乱码
mysqli_query($conn,"set names utf8");

$sNumber = $_POST["sNumber"];
$sName = $_POST["sName"];

// 执行SQL语句
$sql = "select 学号,班号,姓名,性别,出生日期,联系电话 from student where 学号='{$sNumber}' or 姓名='{$sName}';";
$result = mysqli_query($conn,$sql);

// 关闭数据连接
mysqli_close($conn);
?>

	<div class='sui-container'></div>
	<h2>北京网络职业学院学生管理系统 V1.0</h2>
	<div class="sui-layout">
  		<div class="sidebar">
  			<?php include("leftmenu.php") ?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge">学生列表</p>
  			<table class="sui-table table-primary">
  				<tr><th>学号</th><th>班号</th><th>姓名</th><th>性别</th><th>出生日期</th><th>联系电话</th></tr>
<?php
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$xb = $row["性别"]==1?"男":"女";
		echo "<tr>
		<td>{$row['学号']}</td>
		<td>{$row['班号']}</td>
		<td>{$row['姓名']}</td>
		<td>{$xb}</td>
		<td>{$row['出生日期']}</td>
		<td>{$row['联系电话']}</td>
		</tr>";
	}
	echo "</table>";
}else{
	echo "没有记录";
}
?>
  			</table>
  		</div>
	</div>
<?php include("foot.php") ?>