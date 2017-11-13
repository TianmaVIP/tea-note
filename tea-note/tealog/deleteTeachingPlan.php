 <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'> 
<html>
<head>
<title>
</title>
</head>
<body>
<?php
 error_reporting(0);
//连接
include("../conn/db_conn.php");
 
 
$tea_id=$_GET['tea_id']; 
$tea_name=$_GET['tea_name']; 
$tea_term=$_GET['tea_term']; 
$sql="delete from tb_teachingplaninfo where tea_id=".$tea_id;
$result = mysql_query($sql); 
$sql="delete from tb_teachinginfo where tea_id=".$tea_id;
$result = mysql_query($sql); 

echo "<script>";
echo"alert(\"课程删除成功\");";
echo "window.location.href='modify.php?tea_name=$tea_name&tea_term=$tea_term'";
echo "</script>";
 


?>
</body>
</html>

