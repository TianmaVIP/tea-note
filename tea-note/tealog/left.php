﻿<?php
session_start();
if(! isset($_SESSION["username"])){
	header("Location:..//login.php");
	exit();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>导航栏</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/jquery.js"></script>

<script type="text/javascript">
$(function(){	
	//导航切换
	$(".menuson li").click(function(){
		$(".menuson li.active").removeClass("active")
		$(this).addClass("active");
	});
	
	$('.title').click(function(){
		var $ul = $(this).next('ul');
		$('dd').find('ul').slideUp();
		if($ul.is(':visible')){
			$(this).next('ul').slideUp();
		}else{
			$(this).next('ul').slideDown();
		}
	});
})	
</script>


</head>

<body style="background:#f0f9fd;">
	<div class="lefttop"><span></span><a href="right.php" target="rightFrame">首页</a></div>
    
    <dl class="leftmenu">
        
    <dd>
    <div class="title">
    <span><img src="images/leftico01.png" /></span>查找信息
    </div>
    	<ul class="menuson">
       
        <li class="active"><cite></cite><a href="showAllTeachingPlan.php" target="rightFrame">数据列表</a><i></i></li>
        <li><cite></cite><a href="search.php" target="rightFrame">数据查询</a><i></i></li>
        
        </ul>    
    </dd>
        
    
    <dd>
    <div class="title">
    <span><img src="images/leftico02.png" /></span>添加信息
    </div>
    <ul class="menuson">
        <li><cite></cite><a href="addNewTeachingPlan.php" target="rightFrame">添加课程</a><i></i></li>
        <!--这是一段注释。注释不会在浏览器中显示。
		<li><cite></cite><a href="#">添加用户</a><i></i></li>
		
        <li><cite></cite><a href="#">自定义</a><i></i></li>
		-->
        </ul>     
    </dd> 
    
    
    <dd><div class="title"><span><img src="images/leftico03.png" /></span>修改信息</div>
    <ul class="menuson">
        <li><cite></cite><a href="modify.php" target="rightFrame">修改课程</a><i></i></li>
        <!--<li><cite></cite><a href="#">修改教师信息</a><i></i></li>
        <li><cite></cite><a href="#">自定义</a><i></i></li>
		-->
    </ul>    
    </dd>  
    
    
   
    
    </dl>
</body>
</html>
