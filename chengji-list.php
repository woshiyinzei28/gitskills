<?php include("head.php") ?>
<?php
// 创建连接
$conn = mysqli_connect("localhost","root","");
// 选择要操作的数据库
mysqli_select_db($conn,"student");
// 设置读取数据库的编码，不然显示汉字为乱码
mysqli_query($conn,"set names utf8");

// 执行SQL语句
// $sql = "select 学号,课程编号,成绩 from xuanxiu";
$sql = "select x.学号,x.课程编号,k.课程名称,x.成绩 from xuanxiu as x 
left join dasscheng as k on k.课程编号 = x.课程编号;";
$result = mysqli_query($conn,$sql);



// 关闭数据连接
mysqli_close($conn);
?>
	<div class="sui-layout">
  		<div class="sidebar">
  			<?php include("leftmenu.php") ?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge">成绩列表</p>
  			<table class="sui-table table-primary">
  				<tr><th>学号</th><th>课程编号</th><th>课程名称</th><th>成绩</th><th>操作</th></tr>
<?php
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>
		<td>{$row['学号']}</td>
		<td>{$row['课程编号']}</td>
		<td>{$row['课程名称']}</td>
		<td>{$row['成绩']}</td>
		<td>
		<a class='sui-btn btn-small btn-warning' href='chengji-update.php?kid={$row['学号']}&&kids={$row['课程编号']}'>修改</a>
		&nbsp&nbsp
		<a class='sui-btn btn-small btn-danger' href='chengji-del.php?kid={$row['学号']}&&kids={$row['课程编号']}'>删除</a>
		</td>
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