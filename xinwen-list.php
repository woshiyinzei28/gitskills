<?php include("head.php") ?>
<?php
// 创建连接
$conn = mysqli_connect("localhost","root","");
// echo $conn;
// 选择要操作的数据库
mysqli_select_db($conn,"student");
// 设置读取数据库的编码，不然显示汉字为乱码
mysqli_query($conn,"set names utf8");

// 执行SQL语句
$sql = "select id,标题,时间 from xinwen";
$result = mysqli_query($conn,$sql);



// 关闭数据连接
mysqli_close($conn);
?>

	<div class="sui-layout">
  		<div class="sidebar">
  			<?php include("leftmenu.php") ?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge">新闻列表</p>
  			<table class="sui-table table-primary">
  				<tr><th>ID</th><th>标题</th><th>时间</th><th>操作</th></tr>
<?php
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>
		<td>{$row['id']}</td>
		<td>{$row['标题']}</td>
		<td>{$row['时间']}</td>
		<td>
		<a class='sui-btn btn-small btn-warning' href='xinwen-update.php?kid={$row['id']}'>修改</a>
		&nbsp&nbsp
		<a class='sui-btn btn-small btn-danger' href='xinwen-del.php?kid={$row['id']}'>删除</a>
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