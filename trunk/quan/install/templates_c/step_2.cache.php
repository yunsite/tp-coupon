<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('step_2.html', '3cb03f93dfe58daba3f7f655785e39e9', 1336493716);?>

<? include($template->getfile('header')); ?>
<div class="header">
		<h1>TP-COUPON 安装向导</h1>
		<span>V1.0.2 简体中文 UTF8 版</span>
		<div class="setup step2">
		<h2>安装数据库</h2>
		<p>正在执行数据库安装</p>
	</div>
	<div class="stepstat">
		<ul>
			<li class="">1</li>
			<li class="current">2</li>
			<li class="unactivated">3</li>
			<li class="unactivated last">4</li>
		</ul>
		<div class="stepstatbg stepstat1"></div>
	</div>
</div>
<div class="main"><form method="post" action="step_3.php">
<table class="tb2">
<input type="hidden" name="step" value="2">
<div class="desc"><b>填写数据库信息</b></div>
<tr><th class="tbopt">&nbsp;数据库服务器:</th>
<td><input type="text" name="dbinfo[dbhost]" value="localhost" size="35" class="txt"></td>
<td>&nbsp;数据库服务器地址, 一般为 localhost</td>
</tr>

<tr><th class="tbopt">&nbsp;数据库名:</th>
<td><input type="text" name="dbinfo[dbname]" value="tp_coupon" size="35" class="txt"></td>
<td>&nbsp;</td>
</tr>

<tr><th class="tbopt">&nbsp;数据库用户名:</th>
<td><input type="text" name="dbinfo[dbuser]" value="root" size="35" class="txt"></td>
<td>&nbsp;</td>
</tr>

<tr><th class="tbopt">&nbsp;数据库密码:</th>
<td><input type="password" name="dbinfo[dbpw]" value="" size="35" class="txt"></td>
<td>&nbsp;</td>
</tr>

<tr><th class="tbopt">&nbsp;数据表前缀:</th>
<td><input type="text" name="dbinfo[tablepre]" value="dbs_" size="35" class="txt"></td>
<td>&nbsp;同一数据库运行多个论坛时，请修改前缀</td>
</tr>
</table><div class="desc"><b>填写管理员信息</b><br>请牢记 TP-COUPON 创始人密码，凭该密码登陆 TP-COUPON。</div><table class="tb2">
<tr><th class="tbopt">&nbsp;创始人密码:</th>
<td><input type="password" name="admininfo[ucfounderpw]" value="" size="35" class="txt"></td>
<td>&nbsp;</td>
</tr>

<tr><th class="tbopt">&nbsp;重复创始人密码:</th>
<td><input type="password" name="admininfo[ucfounderpw2]" value="" size="35" class="txt"></td>
<td>&nbsp;</td>
</tr>

<tr><th class="tbopt">&nbsp;</th>
<td><input type="submit" name="submitname" value="下一步" class="btn">
</td>
<td>&nbsp;</td>
</tr>

</table>
</form>
<? include($template->getfile('footer')); ?>
