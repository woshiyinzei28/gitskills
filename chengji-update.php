<?php include("head.php");
  include "conn.php";
  $sql = "SELECT DISTINCT 课程编号 FROM dasscheng";
  $result = mysqli_query($conn,$sql);
?>
<?php
  $kid = empty($_GET["kid"])?"null":$_GET["kid"];
  $kids = empty($_GET["kids"])?"null":$_GET["kids"];
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
    $sqls = "select 学号,课程编号,成绩 from xuanxiu where 学号='{$kid}' and 课程编号='{$kids}';";
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
  			<p class="sui-text-xxlarge">成绩修改</p>
  			<form class="sui-form form-horizontal sui-validate" action="chengji-save.php" method="post">
  				<div class="control-group">
    				<label for="sNumber" class="control-label">学号：</label>
    				<div class="controls">
                <!-- 用来区分是新增 还是修改 数据 -->
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="kid">
                <input type="text" value="<?php echo $row['学号']?>" id="sNumber" name="sNumber" class="input-large input-fat" data-rules='required|minlength=6|maxlength=6' placeholder="请输入学号">
    				</div>
  				</div>
  				<div class="control-group">
    				<label for="courseCode" class="control-label">课程编号：</label>
    				<div class="controls">
                <select name="courseCode" id="courseCode" value="<?php echo $row['课程编号']?>">
<?php
if( mysqli_num_rows($results) > 0 ){
  while ( $row2 = mysqli_fetch_assoc($result) ) {
    echo "<option value='{$row2['课程编号']}'>{$row2['课程编号']}</option>";
  }
}else{
  echo "<option value=''>请先添加课程和学生信息</option>";
}
?>
                </select>
    				</div>
  				</div>
  				<div class="control-group">
    				<label for="sResult" class="control-label">成绩：</label>
            <div class="controls">
                <input type="text" value="<?php echo $row['成绩']?>" id="sResult" name="sResult" class="input-large input-fat" data-rules='required|minlength=1|maxlength=3' placeholder="请输入成绩">
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