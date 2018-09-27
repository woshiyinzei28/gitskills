<?php include("head.php") ?>
	<div class="sui-layout">
  		<div class="sidebar">
  			<?php include("leftmenu.php") ?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge">课程录入</p>
  			<form class="sui-form form-horizontal sui-validate" action="kecheng-save.php" method="post">
  				<div class="control-group">
    				<label for="kcName" class="control-label">课程名：</label>
    				<div class="controls">
      					<input type="text" id="kcName" name="kcName" class="input-large input-fat" data-rules='required|minlength=2|maxlength=10' placeholder="请输入课程名称">
    				</div>
  				</div>
  				<div class="control-group">
    				<label for="kcTime" class="control-label">课程时间：</label>
    				<div class="controls">
      					<input type="text" id="kcTime" class="input-large input-fat" placeholder="请选择课程时间" name="kcTime">
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