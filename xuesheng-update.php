<?php include("head.php");
  include "conn.php";
  $sql = "SELECT DISTINCT 班号 FROM banji";
  $result = mysqli_query($conn,$sql);
?>
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
    $sqls = "select 学号,班号,姓名,性别,出生日期,联系电话 from student where 学号='{$kid}'";
    $results = mysqli_query($conn,$sqls);

    if (mysqli_num_rows($results) > 0) {
      // 将查询的结果转换成关联数组
      $row = mysqli_fetch_assoc($results);
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
  			<p class="sui-text-xxlarge">学生信息修改</p>
  			<form class="sui-form form-horizontal sui-validate" action="xuesheng-save.php" method="post">
  				<div class="control-group">
    				<label for="sNumber" class="control-label">学号：</label>
    				<div class="controls">
                <!-- 用来区分是新增 还是修改 数据 -->
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="kid">
      					<input type="text" value="<?php echo $row['学号']?>" id="sNumber" name="sNumber" class="input-large input-fat" data-rules='required|minlength=2|maxlength=10' placeholder="请输入学号">
    				</div>
  				</div>
  				<div class="control-group">
    				<label for="bjNumber" class="control-label">班号：</label>
    				<div class="controls">
      					<!-- <input type="text" id="bgCode" class="input-large input-fat" data-rules='required|minlength=2|maxlength=10' placeholder="请输入班级"> -->
                <select name="bjNumber" id="bjNumber">
<?php
if( mysqli_num_rows($result) > 0 ){
  while ( $row2 = mysqli_fetch_assoc($result) ) {
    echo "<option value='{$row2['班号']}'>{$row2['班号']}</option>";
  }
}else{
  echo "<option value=''>请先添加班级信息</option>";
}
?>
                </select>
    				</div>
  				</div>
  				<div class="control-group">
    				<label for="sName" class="control-label">姓名：</label>
    				<div class="controls">
      					<input type="text" value="<?php echo $row['姓名']?>" id="sName" name="sName" class="input-large input-fat" data-rules='required|minlength=2|maxlength=10' placeholder="请输入姓名">
    				</div>
  				</div>
  				<div class="control-group">
    				<label for="sSex" class="control-label">性别：</label>
    				<div class="controls">
      				<label class="radio-pretty inline <?php if( $row['性别']==1) echo 'checked'; ?>">
                <input type="radio" value="1"  name="sSex" <?php if( $row['性别']==1) echo 'checked="checked"'; ?>><span>男</span>
              </label>
              <label class="radio-pretty inline <?php if( $row['性别']==0) echo 'checked'; ?>">
                <input type="radio" value="0"<?php if( $row['性别']==0) echo 'checked="checked"'; ?> name="sSex"><span>女</span>
              </label>
    				</div>
  				</div>
  				<div class="control-group">
    				<label for="sBrithday" class="control-label">出生日期：</label>
    				<div class="controls">
      					<input type="text" value="<?php echo $row['出生日期']?>" id="sBrithday" name="sBrithday" class="input-large input-fat"  data-toggle="datepicker" placeholder="输入出生日期">
    				</div>
  				</div>
  				<div class="control-group">
    				<label for="sPhone" class="control-label">联系电话：</label>
    				<div class="controls">
      					<input type="text" value="<?php echo $row['联系电话']?>" id="sPhone" name="sPhone" class="input-large input-fat" data-rules='required|minlength=11|maxlength=11' placeholder="请输入联系电话">
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