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
$courseCode = $_POST["courseCode"];

// 执行SQL语句
$sql = "select s.学号,s.姓名,k.课程名称,x.成绩 from xuanxiu as x 
left join dasscheng as k on k.课程编号 = x.课程编号 
left join student as s on x.学号 = s.学号 where s.学号='{$sNumber}' and k.课程名称='{$courseCode}' or s.姓名='{$sName}' and k.课程名称='{$courseCode}';";
$result = mysqli_query($conn,$sql);

// 关闭数据连接
mysqli_close($conn);
?>


	<div class="sui-layout">
  		<div class="sidebar">
  			<?php include("leftmenu.php") ?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge">学生列表</p>
  			<table class="sui-table table-primary">
  				<tr><th>学号</th><th>姓名</th><th>课程名</th><th>成绩</th></tr>
<?php
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>
		<td>{$row['学号']}</td>
		<td>{$row['姓名']}</td>
		<td>{$row['课程名称']}</td>
		<td>{$row['成绩']}</td>
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