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
@$id = mysql_connect("localhost","root","root");
//打开
@$db=mysql_select_db("db_tealog",$id);
 
 
$tea_id=$_GET['tea_id']; 
$tea_name=$_GET['tea_name']; 
$tea_term=$_GET['tea_term']; 
$sql="delete from tb_teachingplaninfo where tea_id=".$tea_id;
$result = mysql_query($sql,$id); 
$sql="delete from tb_teachinginfo where tea_id=".$tea_id;
$result = mysql_query($sql,$id); 

echo "<script>";
echo "window.location.href='showAllTeachingPlan.php?tea_name=$tea_name&tea_term=$tea_term'";
echo "</script>";
 


?>
</body>
</html>

