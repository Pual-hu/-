<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台登录</title>
	<link rel="stylesheet" type="text/css" href="/gitpp/Public/css/admin/login.css">
	<link rel="stylesheet" type="text/css" href="/gitpp/Public/css/base.css">
</head>
<body>
	<div class="login">
		<h3>音乐网站后台管理系统</h3>
		<form method="post" action="index" class="log-in">
			<input type="text" name = "user" placeholder="账号"><br>
			<input type="password" name="pwd" placeholder="密码"><br>
			<button type="submit">登录</button>
		</form>
	</div>
</body>
</html>