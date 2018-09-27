<?php include("head.php");
  include "conn.php";
  $sql = "SELECT DISTINCT 课程名称 FROM dasscheng";
  $result = mysqli_query($conn,$sql);
?>
	<div class="sui-layout">
  		<div class="sidebar">
  			<?php include("leftmenu.php") ?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge">成绩查询</p>
  			<form class="sui-form form-horizontal sui-validate" action="chengjichaxun-save.php" method="post">
  				<div class="control-group">
    				<label for="sNumber" class="control-label">学号：</label>
    				<div class="controls">
      					<input type="text" id="sNumber" name="sNumber" class="input-large input-fat" data-rules='minlength=0|maxlength=10' placeholder="请输入学号">
    				</div>
  				</div>
  				<div class="control-group">
    				<label for="sName" class="control-label">姓名：</label>
    				<div class="controls">
      					<input type="text" id="sName" name="sName" class="input-large input-fat" data-rules='minlength=0|maxlength=10' placeholder="请输入姓名">
    				</div>
  				</div>
          <div class="control-group">
            <label for="courseCode" class="control-label">课程名称：</label>
            <div class="controls">
                <select name="courseCode" id="courseCode">
<?php
if( mysqli_num_rows($result) > 0 ){
  while ( $row = mysqli_fetch_assoc($result) ) {
    echo "<option value='{$row['课程名称']}'>{$row['课程名称']}</option>";
  }
}else{
  echo "<option value=''>请先添加课程信息</option>";
}
?>
                </select>
            </div>
          </div>
  				<div class="control-group">
  					<label class="control-label"></label>
  					<div class="controls">
  						<input type="submit" value="查询" class="sui-btn btn-large btn-primary">
  					</div>
  				</div>
  			</form>
  		</div>
	</div>
<?php include("foot.php") ?>