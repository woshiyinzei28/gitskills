<?php include("head.php") ?>
<?php
$kid = empty($_GET["kid"])?"null":$_GET["kid"];
  if ($kid == "null") {
    die ("请选择要修改的记录");
  }else{
    // 创建连接
    $conn = mysqli_connect("localhost","root","");
    // 选择要操作的数据库
    mysqli_select_db($conn,"student");
    // 设置读取数据库的编码，不然显示汉字为乱码
    mysqli_query($conn,"set names utf8");
    // 执行SQL语句
    $sql = "select 课程编号,课程名称,时间 from dasscheng where 课程编号={$kid}";
    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0) {
      // 将查询的结果转换成关联数组
      $row = mysqli_fetch_assoc($result);
    }else{
      echo "找不到该条记录".mysqli_error($conn);
    }
    // 关闭数据连接
    mysqli_close($conn);
  }
?>
	<div class="sui-layout">
  		<div class="sidebar">
  			<?php include("leftmenu.php") ?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge my-padd">课程修改</p>
  			<form class="sui-form form-horizontal sui-validate" action="kecheng-save.php" method="post">
  				<div class="control-group">
    				<label for="kcName" class="control-label">课程名：</label>
    				<div class="controls">
                <!-- 用来区分是新增 还是修改 数据 -->
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="kid" value="<?php echo $row['课程编号']?>">
      					<input type="text" value="<?php echo $row['课程名称'] ?>" id="kcName" name="kcName" class="input-large input-fat" data-rules='required|minlength=2|maxlength=10' placeholder="请输入课程名称">
    				</div>
  				</div>
  				<div class="control-group">
    				<label for="kcTime" class="control-label">课程时间：</label>
    				<div class="controls">
      					<input type="text" value="<?php echo $row['时间'] ?>" id="kcTime" class="input-large input-fat" placeholder="请选择课程时间" name="kcTime" date-toggle="datepicker">
    				</div>
  				</div>
  				<div class="control-group">
  					<label class="control-label"></label>
  					<div class="controls">
  						<input type="submit" value="提交" class="sui-btn btn-large btn-primary">
  					</div>
  				</div>
  			</form>
  		</div>
	</div>
<?php include("foot.php") ?>