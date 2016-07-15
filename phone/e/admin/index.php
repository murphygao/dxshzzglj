<?php
define('EmpireCMSAdmin','1');
define('EmpireCMSAPage','login');
define('EmpireCMSNFPage','1');
require("../class/connect.php");
require("../class/functions.php");

//定西人大设置
require("../../skin/newskin/backend/php/settings.php");
//风格
$loginadminstyleid=EcmsReturnAdminStyle();
//变量处理
$empirecmskey1='';
$empirecmskey2='';
$empirecmskey3='';
$empirecmskey4='';
$empirecmskey5='';
if($_POST['empirecmskey1']&&$_POST['empirecmskey2']&&$_POST['empirecmskey3']&&$_POST['empirecmskey4']&&$_POST['empirecmskey5'])
{
	$empirecmskey1=RepPostVar($_POST['empirecmskey1']);
	$empirecmskey2=RepPostVar($_POST['empirecmskey2']);
	$empirecmskey3=RepPostVar($_POST['empirecmskey3']);
	$empirecmskey4=RepPostVar($_POST['empirecmskey4']);
	$empirecmskey5=RepPostVar($_POST['empirecmskey5']);
	$ecertkeyrndstr=$empirecmskey1.'#!#'.$empirecmskey2.'#!#'.$empirecmskey3.'#!#'.$empirecmskey4.'#!#'.$empirecmskey5;
	esetcookie('ecertkeyrnds',$ecertkeyrndstr,0);
}
elseif(getcvar('ecertkeyrnds'))
{
	$certr=explode('#!#',getcvar('ecertkeyrnds'));
	$empirecmskey1=RepPostVar($certr[0]);
	$empirecmskey2=RepPostVar($certr[1]);
	$empirecmskey3=RepPostVar($certr[2]);
	$empirecmskey4=RepPostVar($certr[3]);
	$empirecmskey5=RepPostVar($certr[4]);
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo backendSiteName?></title>
<link rel="stylesheet" type="text/css" href="../../node_modules/bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../skin/newskin/backend/css/style.css">
<base onmouseover="window.status='帝国网站管理系统(EmpireCMS) － 最安全、最稳定的开源CMS系统';return true">
<script>
if(self!=top)
{
	parent.location.href='index.php';
}
function CheckLogin(obj){
	if(obj.username.value=='')
	{
		alert('请输入用户名');
		obj.username.focus();
		return false;
	}
	if(obj.password.value=='')
	{
		alert('请输入登录密码');
		obj.password.focus();
		return false;
	}
	if(obj.loginauth!=null)
	{
		if(obj.loginauth.value=='')
		{
			alert('请输入认证码');
			obj.loginauth.focus();
			return false;
		}
	}
	if(obj.key!=null)
	{
		if(obj.key.value=='')
		{
			alert('请输入验证码');
			obj.key.focus();
			return false;
		}
	}
	return true;
}
</script>
</head>

<body text="383636" bgcolor="#FFFFFF" onload="document.login.username.focus();">

<div class="login-buuug7">
	<div class="login-header">
		<?php echo backendSiteName?>
	</div>
	<div class="login-body">
		<form name="login" class="form" id="login" method="post" action="ecmsadmin.php" onsubmit="return CheckLogin(document.login);">
			<input type="hidden" name="enews" value="login"></input>
			<div class="form-group">
				<label clss="control-label">用户名</label>
				<input name="username" type="text" class="form-control">
			</div>
			<div class="form-group">
				<label class="control-label">密码</label>
				<input name="password" type="password" class="form-control">
			</div>

			<div class="form-group">
				<label class="control-label">认证码</label>
				<input name="loginauth" type="password" id="loginauth" class="form-control">
			</div>

			<div class="g" style="display: none;">
				<div class="form-group">
				<label class="control-label">提问</label>
				<select name="equestion" id="equestion" class="form-control" onchange="if(this.options[this.selectedIndex].value==0){showanswer.style.display='none';}else{showanswer.style.display='';}">
	                <option value="0">无安全提问</option>
	                <option value="1">母亲的名字</option>
	                <option value="2">爷爷的名字</option>
	                <option value="3">父亲出生的城市</option>
	                <option value="4">您其中一位老师的名字</option>
	                <option value="5">您个人计算机的型号</option>
	                <option value="6">您最喜欢的餐馆名称</option>
	                <option value="7">驾驶执照的最后四位数字</option>
	             </select>
			</div>

			<div class="form-group">
				<label class="control-label">答案</label>
             	<input name="eanswer" type="text" id="eanswer" class="form-control">
			</div>

			<div class="form-group">
				<label class="control-label">窗口</label>
				<label class="radio-inline">
					<input type="radio" name="adminwindow" value="0" checked>正常
				</label>
				<label class="radio-inline">
					<input type="radio" name="adminwindow" value="1">全屏
				</label>
			</div>
			</div>


			<div class="form-group">
				<button name="imageField" type="submit" class="btn btn-primary btn-block">登陆</button>
			</div>
		</form>
	</div>
	<div class="login-footer">
		<p><a href="">甘肃天奇</a> &copy;2006-2016</p>
	</div>
</div>
<script>
if(document.login.equestion.value==0)
{
	showanswer.style.display='none';
}
</script>
</body>
</html>
