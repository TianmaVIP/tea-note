<?php
session_start();
if(! isset($_SESSION["username"])){
	header("Location:..//login.php");
	exit();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>search</title>
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
    
    <li><a href="#">查找信息</a></li>
    <li><a href="#">数据查询</a></li>
    </ul>
    </div>
    
    <div class="rightinfo">
    
    <div class="tools">
    
    	
        
        
        
    
    </div>
   	<div style="width:100%; height:50px;">
       <span>查找选项可以是<font color="#FF0000">单独查询</font>也可以<font color="#FF0000">详细查询</font></span>
    </div>
	<table class="tablelist" >
    	<thead>
        <tr>
            <form name="searchform" method="get" action="showAllTeachingPlan.php" >
            <td  bordercolor="#00CCFF">教师姓名<input type="text" name="tea_name" size="10"/>
            班级名<input type="text" name="tea_class" size="10"/>
            课程名<input type="text" name="tea_cou" size="10"/>
            学期<input type="text" name="tea_term" size="10"/>(格式2014-2015-1)
            <input type="submit" value="查找" name="searchbt"/></td>
             
            </form>
            
        </tr>
    	</thead>
    </table>
    
        
        
        <div class="tip">
            <div class="tiptop"><span>提示信息</span><a></a></div>
            
          <div class="tipinfo">
            
            <div class="tipright">
            <p>是否确认对信息的修改 ？</p>
            <cite>如果是请点击<font color="#FF0000">确定</font>按钮 ，否则请点<font color="#FF0000">取消</font>。</cite>
            </div>
            </div>
            
            <div class="tipbtn">
            <input name="" type="button"  class="sure" value="确定" />&nbsp;
            <input name="" type="button"  class="cancel" value="取消" />
            </div>
        
        </div>
        
        
        
        
        </div>
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>
</body>
</html>
