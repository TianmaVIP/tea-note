<?php
session_start();
if(! isset($_SESSION["username"])){
	header("Location:..//login.php");
	exit();
	}
?>
 <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'> 
<html>
<head>
<title>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/jscript" src="js/showTeachingPlan.js" ></script>
<style  type="text/css" src="css/showTeachingPlan.css" ></style>

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
function input_treat($tp_content){
	if(gettype($tp_content)=="string"){
		return htmlentities(trim($tp_content),ENT_QUOTES);
	}else if(gettype($tp_content)=="array"){
		$nd="";
		foreach($tp_content as $v){
			$nd .=htmlentities(trim($v),ENT_QUOTES)." ";
		}
		return $nd;
	}else{
		return false;
	}
}

function input_treat($tp_kewai){
	if(gettype($tp_kewai)=="string"){
		return htmlentities(trim($tp_kewai),ENT_QUOTES);
	}else if(gettype($tp_kewai)=="array"){
		$nd="";
		foreach($tp_kewai as $v){
			$nd .=htmlentities(trim($v),ENT_QUOTES)." ";
		}
		return $nd;
	}else{
		return false;
	}
}

</script>

</head>
<body>
    
  <div class="tools">
    
    
    </div>   
    
<div class="tablelist" align='center' border="2" cellspacing='0' cellpadding='8'  bordercolor='#000'>

<?php
//获取到页面输入的数据
error_reporting(0);
$tea_name=$_POST['tea_name'];
$tea_class=$_POST['tea_class'];
$tea_cou=$_POST['tea_cou'];
$tea_term=$_POST['tea_term'];
$year_month=$_POST['month'];
$month=substr($year_month,-2);
$year=substr($year_month,0,4);

//echo "month=".$month."<br/>";
//连接
include("../conn/db_conn.php");
$sql_id="select tea_id from tb_teachinginfo where tea_name='$tea_name' and tea_class='$tea_class' and tea_cou='$tea_cou' and tea_term='$tea_term'";
//echo "sql=".$sql_id."<br/>";

$result = mysql_query($sql_id); 
$tea_id='';
if($row=mysql_fetch_array($result)){
   $tea_id=$row['tea_id'];
}
if($tea_id!=''){
 $sql_plan="select tp_id,tea_id,tp_content,tp_kewai,tp_time from  tb_teachingPlanInfo where tea_id=$tea_id and month(tp_time)='$month' order by tp_time"; 
//echo "sql_plan=".$sql_plan."<br/>";
 $result = mysql_query($sql_plan); 

echo "<form method='post' action='modifyPlanDetailSave.php'>";
 echo "<div id='page1'>";
 echo "<div style='text-align:center;width:550px;border:0px solid red;margin:0 auto;'>";
 echo "<p>北 京 工 业 职 业 技 术 学 院</p>";
echo "<h1>教 师 课 堂 教 学 日 志</h1>";
echo "</div>";


echo "<table  style='border:0px solid #fff; width:700px; text-align:center;'>";
echo "<tr>";
echo "<td style='width:90px;border:0px solid #fff; text-align:left;'><input type='hidden' name='tea_id' value='$tea_id'/>&nbsp;教师Id:$tea_id</td>";
echo "<td style='width:150px;border:0px solid #fff;'><input type='hidden' name='tea_name' value='$tea_name' />&nbsp;教师姓名:$tea_name</td>";
echo "<td style='width:200px;border:0px solid #fff;'><input type='hidden' name='tea_class' value='$tea_class' />任课班级:$tea_class</td>";
echo "<td style='width:200px;border:0px solid #fff;'><input type='hidden' name='tea_cou' value='$tea_cou' />课程名称:$tea_cou</td>";
echo "<td style='width:100px;text-align:right;border:0px solid #fff;'>".$year."年".$month."月&nbsp;</td>";
echo "</tr>";
  
echo "<table align='center' border='1' cellspacing='0' cellpadding='8'  bordercolor='#000'>";
echo "<tr>";
echo "<td style='width:100px;text-align:center;font-weight:bold;'>上课日期</td>";
echo "<td style='width:300px;text-align:center;font-weight:bold;'>教&nbsp;学&nbsp;内&nbsp;容&nbsp;摘&nbsp;要</td>";
echo "<td style='width:200px;text-align:center;font-weight:bold;'>课&nbsp;外&nbsp;作&nbsp;业</td>";
echo "</tr>";
 $rows=0;
 while($row=mysql_fetch_array($result)){
   $rows=$rows+1;
   $tp_id=$row['tp_id'];
   $tea_id=$row['tea_id'];
   $tp_content=$row['tp_content'];
   $tp_kewai=$row['tp_kewai'];
   $tp_time=$row['tp_time'];
    echo "<tr>
	<td style='width:100px;text-align:center;'><input type='text' name='tp_time[]' value='$tp_time' readonly/></td>
	<td  style='width:300px;text-align:center;'><input type='text' name='tp_content[]' value='$tp_content'/></td>
	<td  style='width:200px;text-align:center;'><input type='text' name='tp_kewai[]' value='$tp_kewai'/></td></tr>";
   
 }
 echo "<tr><td style='text-align:center;'>&nbsp;</td><td  style='font-weight:bold;font-size:16px;text-align:center;'>($rows*2=".($rows*2).")</td><td  style='text-align:center;'>&nbsp;</td></tr>";
 while(($rows++)<15){
 echo "<tr><td style='text-align:center;'>&nbsp;</td><td  style='text-align:center;'>&nbsp;</td><td  style='text-align:center;'>&nbsp;</td></tr>";
 }

echo "<tr ><td valign='top' style='width:50px;border:0px solid #fff;text-align:center;'>说明:</td><td colspan=2 style='border:1px solid #fff;'>1、本表必须由任课教师认真填写，学校以此作为计算每月课堂教学工作量的依据。<br/>2、本表必须按教学班及时填写，月底交系(部)汇总。<br/></td></tr>";
echo "<tr><td colspan=3 style='text-align:right;border:1px solid #fff;'>系(部)主任(签字):&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>";
  echo "<tr>";
  echo "<td style='text-align:center;' colspan=3><input type='submit' value='确定'/></td>";
  
  
  echo "</tr>";
 echo "</table>";
 echo "</div>";
 echo "</form>"; 

}


?>


    
    <div class="pagin">
    	
    </div>
    
    
    <div class="tip">
    	
    
    </div>
    
    
    
    
    </div>
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script> 
</body>
</html>
