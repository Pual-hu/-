<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link href="/gitpp/Public/css/gedan.css" type="text/css" rel="stylesheet" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
			
			<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			
			<!-- 鏈�鏂扮殑 Bootstrap 鏍稿績 JavaScript 鏂囦欢 -->
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
			<link rel="shortcut icon" href="/gitpp/Public/favicon.ico">
			<link rel="stylesheet" type="text/css" href="/gitpp/Public/css/index.css">
			<link rel="stylesheet" type="text/css" href="/gitpp/Public/css/base.css">
			<link rel="stylesheet" type="text/css" href="https://at.alicdn.com/t/font_1888217_0v0lo3u8wanq.css">
			<script type="text/javascript" src="/gitpp/Public/js/jquery-3.4.1.js"></script>
			<script type="text/javascript" src="/gitpp/Public/js/index.js"></script>
	</head>
<body>
<div class="register-box-body">
        <p class="login-box-msg">注册一个新用户</p>
        <form action="/gitpp/index.php/Home/Index/zhuce" method="post">
            <div class="form-group has-feedback">
                <input type="text" name="nickname" class="form-control" placeholder="昵称" />
                <span class="glyphicon glyphicon-leaf form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="username" class="form-control" placeholder="用户名" />
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="密码" />
                <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="repassword" class="form-control" placeholder="确认密码" />
                <span class="glyphicon glyphicon-check form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="邮箱" />
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="mobile" class="form-control" placeholder="手机号码" />
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="verify" class="form-control" placeholder="验证码" style="width:200px;" />
                <span class="glyphicon glyphicon-qrcode form-control-feedback" style="right:120px;"></span>
                <img class="verify" src="<?php echo U(verify);?>" alt="验证码" onClick="this.src=this.src+'?'+Math.random()" />
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="agree" value="1"> 我同意 <a href="#">网站安全协议</a>
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">点击注册</button>
                </div><!-- /.col -->
            </div>
        </form>
        <a href="login.html" class="text-center">我已经注册了账户</a>
    </div>

</body>
</html>