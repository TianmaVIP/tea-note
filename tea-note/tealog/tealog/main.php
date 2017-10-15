
<?php
session_start();
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
	echo "<script>";
    echo "登录成功：".$_SESSION['username'];
	echo "</script>";
}else{
	
    echo "<script>";
	echo "alert(\"您已经安全退出，如果需要请重新登录！\");";
	echo "location.href=\"../login.php\"";
	echo "</script>";
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站后台管理系统</title>
</head>
<frameset rows="88,500,40" cols="*" frameborder="no" border="0" framespacing="0">
  <frame src="top.php" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" />
  <frameset cols="187,*" frameborder="no" border="0" framespacing="0">
    <frame src="left.php" name="leftFrame" scrolling="No" noresize="noresize" id="leftFrame" title="leftFrame" />
    <frame src="right.php" name="rightFrame" id="rightFrame" title="rightFrame" />
  </frameset>
  <frame src="footer.php" name="footerFrame" scrolling="No" noresize="noresize" id="footerFrame" title="footerFrame"  value="版权所有  北工院2017"/>
</frameset>
<noframes>
<body>
</body>
</noframes>
</html>
<?php
session_unset();
session_destroy();
?>