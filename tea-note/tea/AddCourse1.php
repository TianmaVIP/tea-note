<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>完成添加课程操作程序</title>
</head>

<body>
<img border='0' src="3.jpg" width='100%' height='100%' style='position: absolute;left:0px;top:0px;z-index: -1'/>
<?php
session_start();
if(! isset($_SESSION["username"])){
	header("Location:index.php");
	exit();
	}else if($_SESSION["role"]<>"teacher"){
	header("Location:student.php");
	exit();
		}
include("../conn/db_conn.php");
include("../conn/db_func.php");

$CouNo=$_POST['CouNo'];
$CouName=$_POST['CouName'];
$Kind=$_POST['Kind'];
$DepartNo=$_POST['DepartNo'];
$Credit=$_POST['Credit'];
$Teacher=$_POST['Teacher'];
$SchoolTime=$_POST['SchoolTime'];
$LimitNum=$_POST['LimitNum'];
/*$CouNo=trim($CouNo);
$CouName=trim($CouName);
$Kind=trim($Kind);
$Teacher=trim($Teacher);
$DepartNo=$_SESSION['departno'];
$SchoolTime=trim($SchoolTime);
$LimitNum=trim($LimitNum);*/
 
$sql = "select * from Course Where CouName ='$CouName'";
if (mysql_num_rows($sql)!= 0)
  {
    mysql_free_result($sql);
    echo "<script type='text/javascript'>";
    echo "alert('您添加的课程已经添加，请重新添加');";
    echo "history.back();";
    echo "</script>";
  }
$AddCourse_SQL="insert into Course values('$CouNo','$CouName','$Kind','$Credit','$Teacher','$DepartNo','$SchoolTime','$LimitNum',0,0)";
$AddCourse_Result=db_query($AddCourse_SQL);


if($AddCourse_Result){
	echo"<script>";
	echo"alert(\"添加课程成功\");";
	echo"location. href=\"ShowCourse.php\"";
	echo"</script>";
	}else{
	echo"<script>";
	echo"alert(\"添加课程失败，请重新添加\");";
	echo"location. href=\"AddCourse.php\"";
	echo"</script>";
		}
?>
</body>
</html>