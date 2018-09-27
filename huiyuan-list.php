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
$sql = "select id,email,name,question from user";
$result = mysqli_query($conn,$sql);



// 关闭数据连接
mysqli_close($conn);
?>

	<div class="sui-layout">
  		<div class="sidebar">
  			<?php include("leftmenu.php") ?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge">会员管理</p>
  			<table class="sui-table table-primary">
  				<tr><th>ID</th><th>邮箱</th><th>名称</th><th>密码提示问题</th><th>操作</th></tr>
<?php
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>
		<td>{$row['id']}</td>
		<td>{$row['email']}</td>
		<td>{$row['name']}</td>
		<td>{$row['question']}</td>
		<td>
		<a class='sui-btn btn-small btn-warning' href='huiyuan-update.php?kid={$row['id']}'>修改</a>
		&nbsp&nbsp
		<a class='sui-btn btn-small btn-danger' href='huiyuan-del.php?kid={$row['id']}'>删除</a>
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