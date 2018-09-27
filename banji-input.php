<?php include("head.php") ?>
	<div class="sui-layout">
  		<div class="sidebar">
  			<?php include("leftmenu.php") ?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge">班级录入</p>
  			<form class="sui-form form-horizontal sui-validate" action="banji-save.php" method="post">
  				<div class="control-group">
    				<label for="bjCode" class="control-label">班号：</label>
    				<div class="controls">
      					<input type="text" id="bjCode" name="bjCode" class="input-large input-fat" data-rules='required|minlength=5|maxlength=5' placeholder="请输入班号">
    				</div>
  				</div>
  				<div class="control-group">
    				<label for="bjMonitor" class="control-label">班长：</label>
    				<div class="controls">
      					<input type="text" id="bjMonitor" name="bjMonitor" class="input-large input-fat" data-rules='required|minlength=2|maxlength=10' placeholder="请输入班长姓名">
    				</div>
  				</div>
  				<div class="control-group">
    				<label for="bjClassroom" class="control-label">教室名：</label>
    				<div class="controls">
      					<input type="text" id="bjClassroom" name="bjClassroom" class="input-large input-fat" data-rules='required|minlength=2|maxlength=10' placeholder="请输教室名">
    				</div>
  				</div>
  				<div class="control-group">
    				<label for="bjDirector" class="control-label">班主任：</label>
    				<div class="controls">
      					<input type="text" id="bjDirector" name="bjDirector" class="input-large input-fat" data-rules='required|minlength=2|maxlength=10' placeholder="请输入班主任姓名">
    				</div>
  				</div>
  				<div class="control-group">
				    <label for="bjSlogan" class="control-label">班级口号：</label>
				    <div class="controls">
				    	<textarea rows="3" id="bjSlogan" name="bjSlogan" class="input-block-level" data-rules='required|minlength=2|maxlength=50'></textarea>
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