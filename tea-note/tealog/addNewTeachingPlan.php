<?php
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
<title>网站后台管理系统</title>
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
    <li><a href="#">添加信息</a></li>
    <li><a href="#">添加课程</a></li>
    
    </ul>
    </div>
    
    <div class="rightinfo">
    
    <div class="tools">
    
    
    </div>
    
    
    <div style="margin:0 auto;width:600px; font-family:'华文楷体'"> 
    
 </div>
    
<div class="tablelist" align='center' border="2" cellspacing='0' cellpadding='8'  bordercolor='#000'>
        	

 <div style=" font-size:30px;">教师授课表（授课表编号,教师名，班级名，课程名，总学时，学期）</div><br/>
 
 <br/>
    <form name="form" method="post" action="addNewTeachingPlanDetail.php">
        <table style="border:1px solid #06C">
            <tr>
            <td>教师姓名</td>
            <td align="left"><input type="text" name="tea_name"/></td>
            </tr>
            <tr>
            <td>班级名</td>
            <td align="left"><input type="text" name="tea_class"/>（注意：网络1532和网络技术1532是两个班）</td>
            </tr>
            <tr>
            <td>课程名</td>
            <td align="left"><input type="text" name="tea_cou"/>（如 Java程序设计）</td>
            </tr>
            <tr>
            <td>总学时</td>
            <td align="left"><input type="text" name="tea_hour"/>（如 40）</td>
            </tr>
            <tr>
            <td>周学时</td>
            <td align="left"><input type="text" name="tea_hourweek"/>（如 3）</td>
            </tr>
            <tr>
            <td>学期</td>
            <td align="left"><input type="text" name="tea_term" value="2017-2018-2"/>（格式2014-2015-1）</td>
            </tr>
            <tr>
            <td>开学日期</td>
            <td align="left"><input type="text" name="term_start" value="2017-9-04"/>（开学第一周的周一日期）</td>
            </tr>
            <tr>
            <td>无课周</td>
            <td align="left"><input type="text" name="noweeks"/>（如 4,7）</td>
            </tr>
            <tr>
            <td>上课时间</td>
            <td>
                <input name="week[]" type="checkbox" value="1"/>周一
                <input name="four[]" type="checkbox" value="1"/>四节连排
                <input name="week[]" type="checkbox" value="2"/>周二
                <input name="four[]" type="checkbox" value="2"/>四节连排
                <input name="week[]" type="checkbox" value="3"/>周三
                <input name="four[]" type="checkbox" value="3"/>四节连排
                <input name="week[]" type="checkbox" value="4"/>周四
                <input name="four[]" type="checkbox" value="4"/>四节连排
                <input name="week[]" type="checkbox" value="5"/>周五
                <input name="four[]" type="checkbox" value="5"/>四节连排
            </td>
            </tr>
            <tr>
            <td>&nbsp;</td>
            <td>
            	<input type="submit" class="sure"  value="添加"/>
            </td>
            </tr>
        </table>
        
    
    
    </form>
  
        </aside>
   
    <div class="pagin">
    	
    </div>
    
    
    <div class="tip">
    	<div class="tiptop"><span>提示信息</span><a></a></div>
        
      <div class="tipinfo">
        <span><img src="images/ticon.png" /></span>
        <div class="tipright">
        <p>是否确认对信息的修改 ？</p>
        <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
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
