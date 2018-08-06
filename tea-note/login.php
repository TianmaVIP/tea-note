<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1" />

<link href="css/min.css" rel="stylesheet" type="text/css">/*链接min.css样式*/
<title>北京工业职业技术学院教师日志生成系统</title>
</head>
<body onload="focusName()" bgcolor="#edf2f8">
   <div class="main">
      <div class="top"><a href="http://www.bgy.org.cn"><img src="images/logo.jpg" /></a></div>
      <div class="mid" style="background-image:url(images/2.jpg)">
	      <!--<div id="left" onclick="changeViewImg()"><img src="images/2.jpg" width="360" height="250"/></div>
          -->
	      <div class="single_col_panel">
		  <form method="post" action="ChkLogin.php">
	             <div class="row">
		            <input class="input-txt-row" type="text" tabIndex = "1" id="user_name" name="username" placeholder="工号" onFocus="focusUserName()" onblur="leaveUserName()" onKeyDown="enterPassword(event)" onMouseOver="changeBorderColor(this)" onMouseOut="backBorderColor(this)" onChange="showOrHideSmsCode()"/>
		         	<a href="javascript:void(0)" class="i-clear" onclick="resetInput(event)"><i class="fa fa-times-circle"></i></a>
		         </div>
	            <div id="passwd_area" class="row">
		        	<input class="input-txt-row input-txt-pad"  type="password" tabIndex = "2"  id="password" name="userpwd"  placeholder="密码" onFocus="focusPassword()" onblur="leavePassword()" onKeyDown="enterSMSCode(event)" onMouseOver="changeBorderColor(this)" onMouseOut="backBorderColor(this)"/>
					
		            <a href="javascript:void(0)" class="i-clear i-clear-pad" onclick="resetInput(event)"><i class="fa fa-times-circle"></i></a>
		            
		         </div>
                 
                <div class="row-thin">
		         	<label for="select">       
                          <select name="role" size="1">                            
                            <option value="teacher">教师</option>
							
                          </select>
                      </label>
					  <label for="select">       
                          	<a href="modifypassword.php" target='_blank' class="pad-tip">修改密码</a>
                      </label>
		         </div>
		         <div class="row-thin">
		            <span id="msg"></span>
		         </div>
		         <div class="row">
		            <input type="hidden" id="appid" value="portal">
		            <input class="input-btn-row" type="button" id="otp_button" onclick="gotoOTPBind()" value="绑定App" style="display:none;"/>
		            <input type="submit" class="input-btn-row" id="logon_button" onclick="oauthLogon()" name="button" value="登录"/>
		            
		            
		         </div>
				 </form>
	      </div>
	  </div>
      <div class="bottom">
         <div class="lx_info">
            <span>Email:<a href="bgzy@bgy.org.cn">bgzy@bgy.org.cn</a></span>
        	<span>©2017<a href="http://www.bgy.org.cn/">北京工业职业技术学院</a></span>
        </div>
      </div>
   </div>
</body>
</html>