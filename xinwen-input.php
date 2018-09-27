<?php include("head.php") ?>
	<div class="sui-layout">
  		<div class="sidebar">
  			<?php include("leftmenu.php") ?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge">新闻发布模块</p>
  			<form class="sui-form form-horizontal sui-validate" action="xinwen-save.php" method="post">
  				<div class="control-group">
    				<label for="bjCode" class="control-label">标题：</label>
    				<div class="controls">
      					<input type="text" id="bjCode" name="bjCode" class="input-large input-fat" data-rules='required|minlength=5|maxlength=50' placeholder="请输入标题">
    				</div>
  				</div>
  				<div class="control-group">
    				<label for="bjMonitor" class="control-label">肩题：</label>
    				<div class="controls">
      					<input type="text" id="bjMonitor" name="bjMonitor" class="input-large input-fat" data-rules='required|minlength=2|maxlength=10' placeholder="请输入肩题">
    				</div>
  				</div>
          <!-- <div class="control-group">
            <label for="xwimage" class="control-label">图片：</label>
            <div class="controls">
                <input type="file" id="xwimage" name="xwimage" class="input-large input-fat" data-rules='required' placeholder="请选择图片">
            </div>
          </div> -->
  				<div class="control-group">
    				<label for="bjClassroom" class="control-label">作者：</label>
    				<div class="controls">
      					<input type="text" id="bjClassroom" name="bjClassroom" class="input-large input-fat" data-rules='required|minlength=2|maxlength=10' placeholder="请输入作者">
    				</div>
  				</div>
  				<div class="control-group">
            <label for="bjDirector" class="control-label">时间：</label>
            <div class="controls">
                <input type="text" id="bjDirector" name="bjDirector" class="input-large input-fat"  data-toggle="datepicker" placeholder="输入时间">
            </div>
          </div>
  				<div class="control-group">
				    <label for="bjSlogan" class="control-label">内容：</label>
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