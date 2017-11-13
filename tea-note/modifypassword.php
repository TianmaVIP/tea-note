<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站后台管理系统</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>

</head>

<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    
    <li><a href="#">查找信息</a></li>
    <li><a href="#">数据列表</a></li>
    </ul>
    </div>
<div id="content"  align:"center";>
	<form method="post" action="changepassword.php">
    <table  align="center" valign="middle" border="1" cellpadding="0" cellspacing="0" >
      
      <tr>
        <td >用户名：</td>
        <td width="142"><label for="textfield"></label>
        <input name="username" type="text" id="textfield" size="15" /><br/></td>
      </tr>
      <tr>
        <td>原密码：</td>
        <td width="142"><label for="textfield2"></label>
        <input name="userpwd" type="password" id="textfield2" size="15" /><br/></td>
	  </tr>
	  <tr>
		<td>现密码：</td>
        <td width="142"><label for="textfield3"></label>
        <input name="newpwd" type="password" id="textfield3" size="15" /></td>
		
      <tr>
        <td>身份：</td>
        <td><label for="select">
          <select name="role" size="1">
            
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
   
</body>
</html>
