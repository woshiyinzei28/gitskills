<?php include("head.php");
  include "conn.php";
  $sql = "SELECT DISTINCT 班号 FROM banji";
  $result = mysqli_query($conn,$sql);
?>

	<div class="sui-layout">
  		<div class="sidebar">
  			<?php include("leftmenu.php") ?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge">学生录入</p>
  			<form class="sui-form form-horizontal sui-validate" action="xuesheng-save.php" method="post">
  				<div class="control-group">
    				<label for="sNumber" class="control-label">学号：</label>
    				<div class="controls">
      					<input type="text" id="sNumber" name="sNumber" class="input-large input-fat" data-rules='required|minlength=2|maxlength=10' placeholder="请输入学号">
    				</div>
  				</div>
  				<div class="control-group">
    				<label for="bjNumber" class="control-label">班号：</label>
    				<div class="controls">
                <select name="bjNumber" id="bjNumber">
<?php
if( mysqli_num_rows($result) > 0 ){
  while ( $row = mysqli_fetch_assoc($result) ) {
    echo "<option value='{$row['班号']}'>{$row['班号']}</option>";
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
      					<input type="text" id="sName" name="sName" class="input-large input-fat" data-rules='required|minlength=2|maxlength=10' placeholder="请输入姓名">
    				</div>
  				</div>
  				<div class="control-group">
    				<label for="sSex" class="control-label">性别：</label>
    				<div class="controls">
      				<label class="radio-pretty inline checked">
                <input type="radio" value="1" checked="checked" name="sSex"><span>男</span>
              </label>
              <label class="radio-pretty inline">
                <input type="radio" value="0" name="sSex"><span>女</span>
              </label>
    				</div>
  				</div>
  				<div class="control-group">
    				<label for="sBrithday" class="control-label">出生日期：</label>
    				<div class="controls">
      					<input type="text" id="sBrithday" name="sBrithday" class="input-large input-fat"  data-toggle="datepicker" placeholder="输入出生日期">
    				</div>
  				</div>
  				<div class="control-group">
    				<label for="sPhone" class="control-label">联系电话：</label>
    				<div class="controls">
      					<input type="text" id="sPhone" name="sPhone" class="input-large input-fat" data-rules='required|minlength=11|maxlength=11' placeholder="请输入联系电话">
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