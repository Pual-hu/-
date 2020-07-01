<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>音乐网站后台管理系统</title>
	<script type="text/javascript" src="/gitPhp/Public/js/jquery-3.4.1.js"></script>
	<script type="text/javascript" src="/gitPhp/Public/css/bootstrap/js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="/gitPhp/Public/css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/gitPhp/Public/css/admin/index.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 header">
				<div class="row">
					<div class="col-lg-3 header-nav">
					</div>
					<div class="col-lg-3 header-title">
						<h3>音乐网站后台管理系统</h3>
					</div>
					<div class="col-lg-3 header-search">
						<form class="form-horizontal">
							<div class="form-group">
								<input type="search" name="search" placeholder="搜索" class="form-control" />
							</div>
							<span class="glyphicon glyphicon-search"></span>
						</form>
					</div>
					<div class="col-lg-3 header-user">
						<div class="dropdown">
							<a href="#" class="dropdown-toggle" id="profile" data-toggle="dropdown"></a>
							<span class="user" style="float: right; line-height: 80px; margin-right: 10px;">用户名:<?php echo (session('admin_name')); ?></span>
						    <ul class="dropdown-menu" role="menu" aria-labelledby="user-profile">
						        <li role="presentation">
						            <a href="#"><span class="glyphicon glyphicon-home">&nbsp;&nbsp;主页</a>
						        </li>
						        <li role="presentation">
						            <a href="/gitPhp/index.php/Admin/Login/logout"><span class="glyphicon glyphicon-log-out">&nbsp;&nbsp;退出</a>
						        </li>
						    </ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 nav">
				<div class="row row1">
					<div class="col-lg-2"></div>
					<div class="col-lg-8">
						<ul class="nav nav-pills nav-stacked">
							<li class="active dropdown">
							    <a class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">
							    	<span class="glyphicon glyphicon-cog"></span>
							    	界面管理
							        <span class="caret"></span>
							    </a>
							    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
							        <li role="presentation">
							            <a role="menuitem" tabindex="-1" href="/gitPhp/index.php/Admin/Index/index">轮播图管理</a>
							            <a role="menuitem" tabindex="-1" href="/gitPhp/index.php/Admin/Index/adver">广告管理</a>
							        </li>
							    </ul>
							</li>
							<li class="active dropdown">
							    <a class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">
							    	<span class="glyphicon glyphicon-music"></span>
							    	歌曲管理
							        <span class="caret"></span>
							    </a>
							    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
							        <li role="presentation">
							            <a role="menuitem" tabindex="-1" href="/gitPhp/index.php/Admin/Song/index">添加/修改歌曲</a>
							            <a role="menuitem" tabindex="-1" href="#">删除歌曲</a>
							        </li>
							    </ul>
							</li>
							<li class="active dropdown">
							    <a class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">
							    	<span class="glyphicon glyphicon-user"></span>
							    	歌手管理
							        <span class="caret"></span>
							    </a>
							    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
							        <li role="presentation">
							            <a role="menuitem" tabindex="-1" href="#">添加歌手</a>
							            <a role="menuitem" tabindex="-1" href="#">删除歌手</a>
							            <a role="menuitem" tabindex="-1" href="#">更新信息</a>
							        </li>
							    </ul>
							</li>
							<li><li class="active dropdown">
							    <a class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">
							    	<span class="glyphicon glyphicon-th-list"></span>
							    	歌单管理
							        <span class="caret"></span>
							    </a>
							    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
							        <li role="presentation">
							            <a role="menuitem" tabindex="-1" href="#">歌单</a>
							        </li>
							    </ul>
							</li></li>
							<li class="active dropdown">
							    <a class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">
							    	<span class="glyphicon glyphicon-headphones"></span>
							    	用户管理
							        <span class="caret"></span>
							    </a>
							    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
							        <li role="presentation">
							            <a role="menuitem" tabindex="-1" href="#">用户查询</a>
							            <a role="menuitem" tabindex="-1" href="#">用户冻结</a>
							            <a role="menuitem" tabindex="-1" href="#">用户解冻</a>
							        </li>
							    </ul>
							</li>
						</ul>
					</div> 
					<div class="col-lg-2"></div>
				</div>
			</div>
			<div class="col-lg-9 content">
				
<div class="col-lg-12">
	<table class="table">
	  <caption>广告图片信息</caption>
	  <thead>
	    <tr>
	      <th>图片描述</th>
	      <th>图片地址</th>
	      <th>修改图片</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php
 foreach($adver as $value){ echo "<tr><td>$value[descript]</td><td>$value[src]</td><td>
				<button class='adverbuton' data-id = '$value[id]' data-toggle='modal' data-target='#myModal'>修改图片</button></td></tr>"; } ?>
	  </tbody>
	</table>
<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" action="/gitPhp/index.php/Admin/Index/adver" enctype="multipart/form-data">
			<div class="modal-body form-group" style="height: 300px;">
					<input type="file" name="src" /><br>
					图片描述：<input type="text" class="form-control" name="descrip"><br>
					<input type="hidden" value = "" name="id">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭
				</button>
				<button type="submit" class="btn btn-primary btn-sub">
					提交更改
				</button>
			</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>
<script type="text/javascript">
	$(function(){
		var btn = $(".adverbuton");
		var postId = $(document.getElementsByName("id"));
		btn.click(function(){
			var index = $(this).attr("data-id");
			console.log(index);
			postId.prop({"value":index});
		})
	})
</script>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 footer">
				结束
			</div>
		</div>
	</div>
</body>
</html>