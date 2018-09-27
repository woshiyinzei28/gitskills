<?php include("head.php");
  include "conn.php";
  $sql = "SELECT DISTINCT 课程编号 FROM dasscheng";
  $result = mysqli_query($conn,$sql);
?>
	<div class="sui-layout">
  		<div class="sidebar">
  			<?php include("leftmenu.php") ?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge">成绩录入</p>
  			<form class="sui-form form-horizontal sui-validate" action="chengji-save.php" method="post">
          <div class="control-group">
    				<label for="sNumber" class="control-label">学号：</label>
    				<div class="controls">
      					<input type="text" id="sNumber" name="sNumber" class="input-large input-fat" data-rules='required|minlength=6|maxlength=6' placeholder="请输入学号">
    				</div>
  				</div>
  				<div class="control-group">
    				<label for="courseCode" class="control-label">课程编号：</label>
    				<div class="controls">
      					<select name="courseCode" id="courseCode">
<?php
if( mysqli_num_rows($result) > 0 ){
  while ( $row = mysqli_fetch_assoc($result) ) {
    echo "<option value='{$row['课程编号']}'>{$row['课程编号']}</option>";
  }
}else{
  echo "<option value=''>请先添加课程信息</option>";
}
?>
                </select>
    				</div>
  				</div>
  				<div class="control-group">
    				<label for="sResult" class="control-label">成绩：</label>
    				<div class="controls">
      					<input type="text" id="sResult" name="sResult" class="input-large input-fat" data-rules='required|minlength=2|maxlength=10' placeholder="请输入成绩">
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