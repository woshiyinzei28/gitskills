</body>
</html>
<script src="http://g.alicdn.com/sj/lib/jquery.min.js"></script>
<script src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
<script>
//使用jquery实现tab切换效果
$(function(){
	$(".box .level1 > a").on("click", function(){
		//console.log("ok");
		//给当前元素添加"current"样式
		$(this).addClass("current") 
		//下一个元素显示
		.next().show()
		//父元素的兄弟元素的子元素<a>
		.parent().siblings().children("a").
		//移除上面找到的所有<a>的current 样式
		removeClass("current")
		//上面所有<a>的下一个元素隐藏
		.next().hide();
		//找到a的父元素<li>,获取其在兄弟元素中的序号，保存到cookie中。跳转到其他页面后，再读取这个cookie，就知道是哪个<li>下面的菜单处于打开状态。
		document.cookie = "menuState="+ $(this).parent().index();

		return false;
	})
	//账号显示在右上角
	//$(".userinfo>span").html(getCookie("usname"));
});
//读取菜单状态cookie
//用正则表达式
var menuState = getCookie("menuState");
$(".box .menu>li").eq(menuState).find("ul").show();
function getCookie(name)
{
	var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
	if(arr=document.cookie.match(reg)){
	return unescape(arr[2]);
	}else{
	return null;}
}
// document.cookie="name=dengbin";
// 	$('#kcTime').datepicker({size:"small"});
// 	// 使用jquery实现tab切换效果
// 	$(function(){
// 		$(".level1 > a").on("click",function(){
// 			// 给当前元素添加"current"样式
// 			$(this).addClass("current")
// 			// 下一个元素显示
// 			.next().show("fast")
// 			// 当前元素的父元素的兄弟元素的子元素<a>
// 			.parent().siblings().children("a")
// 			// 移除上面找到的所有<a>的current样式
// 			.removeClass("current")
// 			// 上面所有<a>的下一个元素隐藏
// 			.next().hide("fast");
// 			console.log($(this).parent().index());
// 			document.cookie="menuNum"+$(this).parent().index()+";";
// 			return false;
// 		})
// 	})
// var menuNum = document.cookie.substr(-1,1);
// console.log(menuNum)
// // 找到对应的序号的li，再查找li中的ul标签，让其显示。
// $(".box .menu>li").eq(menuNum).find("ul").show();
// // 再找对应序号的li，再查找li中的第一个<a>，增加一个样式"current"
</script>