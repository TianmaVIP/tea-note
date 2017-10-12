<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>首页</title>
<link href="css/modifypassword.css" rel="stylesheet" type="text/css">

</head>

<body>
<header>
    <aside><img src="images/logo.PNG" /></aside>

</header>
<div id="content">
	<form method="post" action="changepassword.php">
    <table  align="center" valign="middle" border="0" cellpadding="0" cellspacing="0" >
      
      <tr>
        <td width="69">用户名：</td>
        <td width="142"><label for="textfield"></label>
        <input name="username" type="text" id="textfield" size="15" /></td>
      </tr>
      <tr>
        <td>原密码：</td>
        <td><label for="textfield2"></label>
        <input name="userpwd" type="password" id="textfield2" size="15" /></td>
	  </tr>
	  <tr>
		<td>现密码：</td>
        <td><label for="textfield3"></label>
        <input name="newpwd" type="password" id="textfield3" size="15" /></td>
		
      <tr>
        <td>身份：</td>
        <td><label for="select">
          <select name="role" size="1">
            <option value="student">学生</option>
            <option value="teacher">教师</option>
          </select>
		  <a href='login.php'>返回登陆</a>
        </label></td>
		
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="button" id="button" value="确认" /> &nbsp;&nbsp;         
          <input type="reset" name="button2" id="button2" value="重置" />
		  
        </td>
      </tr>
	  
    </table>
  </form>
    </div>
    <div class="clear"></div>
    <footer>
    	<p>版权所有 北工院2017</p>
    </footer>
</body>
</html>
