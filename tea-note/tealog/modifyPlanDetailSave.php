 <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'> 
<html>
<head>
<title>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>
<?php
//获取到页面输入的数组数据

$tea_id=$_POST['tea_id'];
$tp_time=$_POST['tp_time'];
$tp_content=$_POST['tp_content'];
$tp_kewai=$_POST['tp_kewai'];
// echo $tp_time[0]."</br>";
// echo $tp_content[0]."</br>";
// echo $tp_kewai[0];


/* foreach($tp_time as $t){	
	//echo "t".$t;
}
foreach($tp_content as $t1){
	$b2=$t1;	
}
foreach($tp_kewai as $t2){
	$b3=$t2;	
} */
@$id = mysql_connect("localhost","root","root");
//打开
@$db=mysql_select_db("db_tealog",$id);




$num = count($tp_time); 

for($p=0;$p<$num;$p++){
$sql="update tb_teachingPlanInfo set tp_content='$tp_content[$p]',tp_kewai='$tp_kewai[$p]' where tp_time='$tp_time[$p]' and tea_id='$tea_id'";
$result = mysql_query($sql,$id);
}

/* for($i=0;$i<$num;++$i){ 
//$sql="update tb_teachingPlanInfo set tp_content='$b2',tp_kewai='$b1' where tp_time='$b1' and tea_id='$tea_id'";

//$sql=$sql."(null,'$tea_id','$tp_content[$i]','$tp_kewai[$i]','$tp_time[$i]'),";
 
}  */


//echo "sql=".$sql;


 if($result){
  echo"<script>";
	echo"alert(\"修改成功\");";
	echo"location. href=\"modify.php\"";
	echo"</script>";
 }else{
   echo "数据修改失败，请联系管理员";
   return;
 } 


?> 
</body>
</html>