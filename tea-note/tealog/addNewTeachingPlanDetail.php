<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if(! isset($_SESSION["username"])){
	header("Location:..//login.php");
	exit();
	}
?>
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
    
    
    
    <div class="tools">
    
    
    </div>
    
    
<div class="tablelist" align='center' border="2" cellspacing='0' cellpadding='8'  bordercolor='#000'>
        	


<?php
error_reporting(0);
//根据具体日期返回是这年的第几周星期几
function getweek($date){
  $str=date('y年m月d日',strtotime($date));
  $stry=date('y年',strtotime($date));
  $weeknum=date('W',strtotime($date));
  $week=date('w',strtotime($date));
  return $str.'是'.$stry.'第'.$weeknum.'周的星期'.$week;
}
////获取年第一周的日期
function get_week($year) {
    $year_start = $year . "-01-01";
    $year_end = $year . "-12-31";
    $startday = strtotime($year_start);
    if (intval(date('N', $startday)) != '1') {
        $startday = strtotime("next monday", strtotime($year_start)); //获取年第一周的日期
    }
    $year_mondy = date("Y-m-d", $startday); //获取年第一周的日期
	return $year_mondy;
}
//根据某年的第几周星期几返回具体日期
function getd($year,$weeknum,$week){
  //$yearstr=$year.'-1-1';
  $yearstr=get_week($year);
  $weeknumstr=$weeknum-1;
  $weekw=date('W',strtotime($yearstr));
  $weekx=date('w',strtotime($yearstr));
  $dnum=0;
  if($weekw!='01'){
    $dnum=7-$weekx;
  }else{
    $dnum=-$weekx;
  }
  $weekstr=$week+$dnum;
  $nowdate=date('Y-m-d',strtotime($yearstr."+$weeknumstr week $weekstr days"));
  //return $year.'年第'.$weeknum.'周星期'.$week.'的日期为：<font color=red>'.$nowdate.'</font>';
  return $nowdate;
}



$tea_name=$_POST['tea_name'];
$tea_class=$_POST['tea_class'];
$tea_cou=$_POST['tea_cou'];
$tea_hour=$_POST['tea_hour'];
$tea_hourweek=$_POST['tea_hourweek'];
$tea_term=$_POST['tea_term'];
//echo "-----------------1--------------<br/>";
//echo $tea_name." ".$tea_class." ".$tea_cou." ".$tea_hour." ".$tea_term."<br/>";


 $term_start=$_POST['term_start'];//开学第一天周一的日期
 //*********************************
 $weeknum=date('W',strtotime($term_start));//开学第一天所在周是全年的第几周
 
 $year=date('Y',strtotime($term_start));
 //echo "-----------------2--------------<br/>";
//echo $weeknum."  ".$year;
//echo "<br/>";
 //**********************************

 $week = $_POST['week'];//课程都是周几上课

 $four = $_POST['four'];//课程周几四节连排


 $week_time=count($week);//就是一周几次课
 //echo "<br/>-----------------3--------------<br/>";
 //print_r($week);
 //echo "<br/>-----------------4--------------<br/>";
 //print_r($four);
 //echo "<br/>-----------------5--------------<br/>";
//echo  $week_time;
//echo "<br/>";
 //要计算出该课程总周数
 //$total_weeks = $tea_hour/2/$week_time;
$total_weeks = $tea_hour/$tea_hourweek;
//echo "<br/>-----------------5--------------<br/>";
 //echo "总周数：".$total_weeks;
 //echo "<br/>-----------------6--------------<br/>";
//**********记录不上课的周序号，如 2,5**************
$noweektemp=$_POST['noweeks'];
$noweeks=explode(',',$noweektemp);
//for($index=0;$index<count($noweeks);$index++){
//  echo $noweeks[$index]."<br/>";
//}

$noweeknum = count($noweeks);
//print_r($noweeks);
//echo  $noweeknum;
//echo 'aaaaaaaaaa'.$noweeks;
//***************************************** 

//连接
include("../conn/db_conn.php");
 $sql_check="select tea_id from tb_teachingInfo where tea_name='$tea_name' and tea_class='$tea_class' and tea_cou='$tea_cou' and tea_term='$tea_term'";
$result = mysql_query($sql_check);
//echo "r=".$result."<br/>";
$num = mysql_num_rows($result);//获取记录条数
if($num==0){//没有录入了
  //执行sql
  $sql="insert into tb_teachingInfo(tea_id,tea_name,tea_class,tea_cou,tea_hour,tea_term) values(null,'$tea_name','$tea_class','$tea_cou',$tea_hour,'$tea_term')";
 //echo $sql."<br/>";
 $result = mysql_query($sql);
 if($result){
   echo "<h1>请输入每次课程的授课内容摘要</h1>";
 }else{
   echo "数据录入失败，请联系管理员";
   return;
 }
}
 $rows=$tea_hour/2;
//tb_teachingPlanInfo(tp_id,tea_id,tp_content,tp_time)
 echo "<form method='post' action='addNewTeachingPlanDetailSave.php'>";
 echo "<table width=700 border=1>";
 echo "<tr><td>周次</td><td>授课日期</td><td>授课内容摘要</td><td>课外作业</td></tr>";
  //echo "<br/>-----------------7--------------<br/>";
 //echo "weeknum=".$weeknum."<br/>";
 // echo "total_weeks=".$total_weeks."<br/>";
 // echo "noweeknum=".$noweeknum."<br/>";
  
 if(empty($noweektemp)){
	  for($w=$weeknum;$w<($weeknum+$total_weeks+$noweeknum-1);$w++){
   $b=true;//开关
   for($index=0;$index<count($noweeks);$index++){
     //echo $noweek[$index]."<br/>";
     //echo $w." ".$noweeks[$index]." ".($noweeks[$index]+$weeknum-1)."<br/>";
     if($w==$noweeks[$index]+$weeknum-1){
        //表示当前周是无课周
        $b=false;
        break;
     }
   }
   if($b){
     foreach ((array)$week as $v){
       $lianpai=false;
       foreach ((array)$four as $v2){
         //echo $v;//这个就是周几四节连排
		if($v==$v2){
           $lianpai=true;
         }
       }
      //echo $v;//这个就是周几有课
      //echo $year."年 第".$w."周 星期".$v."<br/>";
      
      echo "<tr>";
      echo "<td>".($w-$weeknum+1)."</td>";
 
      $d = getd($year,$w,$v);
      echo "<td><input type='text' name='tp_time[]' value='$d' readonly/></td>";
      echo "<td><input type='text' name='tp_content[]' value=''/></td>";
	  echo "<td><input type='text' name='tp_kewai[]' value=''/></td>";
      //echo "<td><input type='text' /></td>";
  
      echo "</tr>";
      if($lianpai){
      echo "<tr>";
      echo "<td>".($w-$weeknum+1)."</td>";
      
      $d = getd($year,$w,$v);
      echo "<td><input type='text' name='tp_time[]' value='$d' readonly/></td>";
      echo "<td><input type='text' name='tp_content[]' value=''/></td>";
	  echo "<td><input type='text' name='tp_kewai[]' value=''/></td>";
      //echo "<td><input type='text' /></td>";
  
      //echo "</tr>";
      }
     }
   }


 }
 }else{
 
 for($w=$weeknum;$w<=($weeknum+$total_weeks+$noweeknum-1);$w++){
   $b=true;//开关
   for($index=0;$index<count($noweeks);$index++){
     //echo $noweek[$index]."<br/>";
     //echo $w." ".$noweeks[$index]." ".($noweeks[$index]+$weeknum-1)."<br/>";
     if($w==$noweeks[$index]+$weeknum-1){
        //表示当前周是无课周
        $b=false;
        break;
     }
   }
   if($b){
     foreach ((array)$week as $v){
       $lianpai=false;
       foreach ((array)$four as $v2){
         //echo $v;//这个就是周几四节连排
		if($v==$v2){
           $lianpai=true;
         }
       }
      //echo $v;//这个就是周几有课
      //echo $year."年 第".$w."周 星期".$v."<br/>";
      
      echo "<tr>";
      echo "<td>".($w-$weeknum+1)."</td>";
 
      $d = getd($year,$w,$v);
      echo "<td><input type='text' name='tp_time[]' value='$d' readonly/></td>";
      echo "<td><input type='text' name='tp_content[]' value=''/></td>";
	  echo "<td><input type='text' name='tp_kewai[]' value=''/></td>";
      //echo "<td><input type='text' /></td>";
  
      echo "</tr>";
      if($lianpai){
      echo "<tr>";
      echo "<td>".($w-$weeknum+1)."</td>";
      
      $d = getd($year,$w,$v);
      echo "<td><input type='text' name='tp_time[]' value='$d' readonly/></td>";
      echo "<td><input type='text' name='tp_content[]' value=''/></td>";
	  echo "<td><input type='text' name='tp_kewai[]' value=''/></td>";
      //echo "<td><input type='text' /></td>";
  
      //echo "</tr>";
      }
     }
   }


 } 
 }
 
 
  echo "<tr>";
  echo "<td colspan=4><input type='submit' value='保存'/></td>";
  
  
  echo "</tr>";
 echo "</table>";
  echo "</form>";
 



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