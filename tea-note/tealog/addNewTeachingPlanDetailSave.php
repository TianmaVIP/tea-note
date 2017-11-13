<?php
error_reporting(0);
//获取到页面输入的数组数据
$tp_time=$_REQUEST['tp_time'];
$tp_content=$_REQUEST['tp_content'];
$tp_kewai=$_REQUEST['tp_kewai'];
//得到最后插入的记录的编号
//select max(tea_id) from table  
//连接
include("../conn/db_conn.php");

$sql_id="select max(tea_id) as maxid from tb_teachingInfo";
$result = mysql_query($sql_id); 
$tea_id='';
if($row=mysql_fetch_array($result)){
   $tea_id=$row['maxid'];
}

$sql_check = "select tp_id from tb_teachingPlanInfo where tea_id=$tea_id";

$result = mysql_query($sql_check);

$num = mysql_num_rows($result);//获取记录条数
//echo $sql_check." r=".$result."num=".$num."<br/>";
if($num!=0){//没有录入了
	echo"<script>";
	echo "该课程数据已输入</a>";
	echo "location. href=\"showAllTeachingPlan.php\"";
	echo"</script>";
	return;
}

//echo "1111".$tp_time." ".$tp_content."22222".$test;

$num = count($tp_time); 
$sql="insert into tb_teachingPlanInfo(tp_id,tea_id,tp_content,tp_kewai,tp_time) values";
for($i=0;$i<$num;++$i){ 
 
 $sql=$sql."(null,'$tea_id','$tp_content[$i]','$tp_kewai[$i]','$tp_time[$i]'),";
} 
 
$sql=substr($sql,0,strlen($sql)-1);
//echo "sql=".$sql;

echo "<br/>";
 $result = mysql_query($sql);
 if($result){
  echo"<script>";
	echo"alert(\"添加课程成功\");";
	echo"location. href=\"showAllTeachingPlan.php\"";
	echo"</script>";
 }else{
   echo "数据插入失败，请联系管理员";
   return;
 }


?> 
