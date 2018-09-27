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
    $sql = "select 班号,班长,教室,班主任,班级口号 from banji where 班号='{$kid}'";
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
        <p class="sui-text-xxlarge">班级修改</p>
        <form class="sui-form form-horizontal sui-validate" action="banji-save.php" method="post">
          <div class="control-group">
            <label for="bjCode" class="control-label">班号：</label>
            <div class="controls">
                <!-- 用来区分是新增 还是修改 数据 -->
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="kid" value="<?php echo $row['班号']?>">
                <input type="text" value="<?php echo $row['班号'] ?>" id="bjCode" name="bjCode" class="input-large input-fat" data-rules='required|minlength=2|maxlength=10' placeholder="请输入班号">
            </div>
          </div>
          <div class="control-group">
            <label for="bjMonitor" class="control-label">班长：</label>
            <div class="controls">
                <input type="text" value="<?php echo $row['班长'] ?>" id="bjMonitor" name="bjMonitor" class="input-large input-fat" data-rules='required|minlength=2|maxlength=10' placeholder="请输入班长姓名">
            </div>
          </div>
          <div class="control-group">
            <label for="bjClassroom" class="control-label">教室名：</label>
            <div class="controls">
                <input type="text" value="<?php echo $row['教室'] ?>" id="bjClassroom" name="bjClassroom" class="input-large input-fat" data-rules='required|minlength=2|maxlength=10' placeholder="请输教室名">
            </div>
          </div>
          <div class="control-group">
            <label for="bjDirector" class="control-label">班主任：</label>
            <div class="controls">
                <input type="text" value="<?php echo $row['班主任'] ?>" id="bjDirector" name="bjDirector" class="input-large input-fat" data-rules='required|minlength=2|maxlength=10' placeholder="请输入班主任姓名">
            </div>
          </div>
          <div class="control-group">
            <label for="bjSlogan" class="control-label">班级口号：</label>
            <div class="controls">
              <textarea rows="3" id="bjSlogan" name="bjSlogan" class="input-block-level" data-rules='required|minlength=2|maxlength=50'><?php echo $row['班级口号'] ?></textarea>
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