<?php
session_start();
if(! isset($_SESSION["username"])){
	header("Location:..//login.php");
	exit();
	}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width,user-scalable=yes, initial-scale=0.5"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎使用教师选课系统</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $(".click").click(function(){
  $(".tip").fadeIn(200);
  });
  
  $(".tiptop a").click(function(){
  $(".tip").fadeOut(200);
});

  $(".sure").click(function(){
  $(".tip").fadeOut(100);
});

  $(".cancel").click(function(){
  $(".tip").fadeOut(100);
});

});
</script>

</head>


<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    </ul>
    </div>
    
    <div class="mainindex">
    
    
    <div class="welinfo">
    <span><img src="images/sun.png" alt="天气" /></span>
    <b>您好，欢迎使用教师课堂日志生成系统</b>
    
    </div>
    
    <div class="xline"></div>
    
    <div class="xline"></div>
    <div class="box"></div>
    
    <div class="welinfo">
    <span><img src="images/dp.png" alt="提醒" /></span>
    <b>北工院教师课堂日志生成系统使用指南</b>
    </div>
    
    <ul class="infolist">
    <li ><span>您可以快速<font color="#FF0000">课程查询</font>操作</span><a  href="search.php" class="ibtn">查询课程</a></li>
    <li><span>您可以快速<font color="#FF0000">添加课程</font>操作</span><a  href="addNewTeachingPlan.php" class="ibtn">添加课程</a></li>
	<li><span>您可以快速<font color="#FF0000">修改课程</font>操作</span><a  href="modify.php" class="ibtn">修改课程</a></li>
    <li><span>您可以进行<font color="#FF0000">密码修改</font>操作</span><a  href="../modifypassword.php" class="ibtn">账户管理</a></li>
    </ul>
    
    <div class="xline"></div>
    
    <div class="info"><b>查看网站使用指南，您可以更快的了解到北工院教师课堂日志生成系统相关信息</b></div>
    
    <ul class="umlist">
    
     <li class="click"><a href="#">如何打印日志</a></li></br>
	  <!--
	 <li>北工院其他网站快速入口：</li>
	
	 <ol>
	 <li><a href="http://bgy.org.cn">学校官网</a></li>
	 <li><a href="http://xxgcx.bgy.org.cn">信息中心</a></li>
     <li><a href="http://my.bgy.org.cn">个人中心</a></li>
     <li><a href="#none">慕课平台</a></li>
     <li><a href="http://lib.bgy.org.cn">图书馆</a></li>
	 </ol>
	 -->
	 </ul>
	 
    
    
    
    </div>
	<div class="tip">
    	<div class="tiptop"><span>提示信息</span></div>
        
      <div style=" margin:0 auto;">
        <p>如果想打印课堂日志，请点击左侧查询信息导航栏——选择数据查询
		——输入所查询信息——点击查看——选择打印预览即可实现打印。</p>
		<p></p>
		<p><font color="#FF0000">注意：1、由于打印插件适配问题，故如需打印请使用IE内核浏览器！！！</font></p> 
		<p><font color="#FF0000">      2、首次使用IE浏览器打印日志可能会提示下载安装打印插件和添加可信任站点，请添加后使用！！！</font></p> 
        
        <div class="tipbtn" align="left">
        <input name="" type="button"  class="sure" value="确定" />
        </div>
    
    </div>
	
</body>
</html>
