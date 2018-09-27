<?php 
session_start(); 
//检测session是否为空，是则跳转到登录页
if( empty($_SESSION['usname']) ){
	header("Refresh:0;url=login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
	<link rel="stylesheet" href="css/default.css" type="text/css" />
	<style>
		.content{
			/*border-left: 1px solid #28a3cf;*/
			height: 100%;
			padding: 0 0 0 10px;
		}
		.content .myBlue{
			background-color: blue;
		}
		.sui-layout{
			width: 1300px;
			height: 500px;
			margin: 0 auto;
			/*border: 1px solid #28a3cf;*/
		}
		.userinfo{
			position: absolute;
			width: 200px;
			height: 25px;
			line-height: 25px;
			bottom: 0;
			right: 0;
			font-size: 12px;
		}
		.userinfo span{
			color: red;
		}
		.my-head {
		    height: 60px;
		    line-height: 60px;
		    padding-left: 20px;
		    font-size: 22px;
		    font-weight: 400;
		    border-bottom: 1px solid #999;
		    position: relative;
		}
		#code_btn{
			width:100px;
			height: 30px; 
			border: 1px solid black; 
			margin-left:100px;
			 margin-bottom: 10px;
			  font-size: 30px; 
			  color: black;
			  text-align: center;
		}
	</style>
</head>
<body>
	<div class="sui-container">
		<div class="my-head">北京网络职业学院学生管理系统 V2.0
			<div class="userinfo">欢迎<span><?php echo $_SESSION['usname']; ?></span>登录&nbsp;&nbsp;<a href="login-out.php">退出</a></div>
		</div>