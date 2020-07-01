<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<link href="/test/Public/css/style.css" type="text/css" rel="stylesheet" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
			
			<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			
			<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
			<link rel="shortcut icon" href="/test/Public/favicon.ico">
			<link rel="stylesheet" type="text/css" href="/test/Public/css/index.css">
			<link rel="stylesheet" type="text/css" href="/test/Public/css/base.css">
			<link rel="stylesheet" type="text/css" href="https://at.alicdn.com/t/font_1888217_0v0lo3u8wanq.css">
			<script type="text/javascript" src="/test/Public/js/jquery-3.4.1.js"></script>
			<script type="text/javascript" src="/test/Public/js/index.js"></script>
	</head>
	<body>
		<!-- 导航栏 -->
		<div class="nav" id="nav">
			<nav>
				<a class="logo" href="#"><h3><img src="/test/Public/img/音乐 (1).png" /><b>欣欣音乐</b></h3></a>
				<ul class="clearfix">
					<li><a href="javascript:void(0)">发现音乐</a></li>
					<li><a href="javascript:void(0)">下载客户端</a></li>
					<li><a href="javascript:void(0)">音乐现场</a></li>
					<li><a href="javascript:void(0)">VIP会员</a></li>
					<li><a href="javascript:void(0)">更多</a></li>
				</ul>
				<div class="search">
					<form>
						<input type="text" placeholder="搜索音乐/歌单/歌名" />
						<div class="search-icon"></div>
					</form>
				</div>
				<a class="login" href="javascript:void(0)">登录/注册</a>
			</nav>
		</div>
		<!-- 首页主体 -->
		<div class="content typepage">
			<!-- 小菜单 -->
			<div class="nav-small">
					<a class="old" href="/test/index.php/Home/Index/index">推荐</a>
					<a  href="/test/index.php/Home/Index/paihang">排行榜</a>
					<a  href="/test/index.php/Home/Index/singer">歌手</a>
					<a  href="/test/index.php/Home/Index/gedan">歌单</a>
					<a  href="/test/index.php/Home/Index/mv">MV</a>
			</div>
				<section>
					<div class="container">
						<div class="col-md-2">
							<div class="bulw-small">
								<a class="active">
									官方榜
								</a>
								<a>
									潮流榜
								</a>
								<a>
									场景榜
								</a>
								</div>
							<hr />
							<div>
								<a href="#" class="list-group-item">
									<img src="/test/Public/img/捕获.PNG" />
									<p>飙升榜</p>
									<small>已更新</small>
								</a>
								<a href="#" class="list-group-item">
									<img src="/test/Public/img/2.PNG" />
									<p>新歌榜</p>
									<small>已更新</small>
								</a>
								<a href="#" class="list-group-item">
									<img src="/test/Public/img/3.PNG" />
									<p>热歌榜</p>
								<small>已更新</small></a>
								<a href="#" class="list-group-item">
									<img src="/test/Public/img/4.PNG" />
									<p>畅听榜</p>
								<small>已更新</small></a>
								<a href="#" class="list-group-item">
									<img src="/test/Public/img/5.PNG" />
									<p>摇滚榜</p>
								<small>已更新</small></a>

							</div>
						</div>
						<div class="col-md-10" id="biao2">
							<div class="buo-small">
								<p style="font-size: 30px;font-weight: bold;">飙升榜</p>
								<small>更新时间：2020-06-07</small>
								</div>
								<div style="margin-top: 20px;" >
									<button type="button" class="btn btn-light" style="font-size: 20px; background-color: yellow;">播放全部 <span class="glyphicon glyphicon-headphones"></span></button>
									<button type="button" class="btn btn-light" id="bbtn">喜欢 <span class="glyphicon glyphicon-heart"></span></button> 
									<button type="button" class="btn btn-light" id="bbtn">分享</button>   
									<input type="button" value="..." style="width: 45px;height: 45px;border-radius: 50%;border: none;margin-left: 30px; ">
								</div>
							<table class="table table-hover itaemb">
								<thead>
									<tr>
										<th>序号</th>
										<th>歌曲</th>
										<th>歌手</th>
										<th>专辑</th>
										<th>时长</th>
									</tr>
								</thead>
								<tbody style="color: #000000;">
									<tr>
										<td>1</td>
										<td>像风一样</td>
										<td>薛之谦</td>
										<td>尘</td>
										<td>3：02
										<div class="tubiaol">
														<a class=""><span class="glyphicon glyphicon-play" style="color: #B1B1B1; font-size: 18px;"></span></a>
														<a class=""><span class="glyphicon glyphicon-heart-empty" style="color: #B1B1B1; font-size: 18px;"></span></a>
														<a class=""><span class="glyphicon glyphicon-arrow-down" style="color: #B1B1B1; font-size: 18px;"></span></a>
																		</div></td>
									</tr>
									<tr>
										<td>2</td>
										<td>陀飞轮</td>
										<td>程奕迅</td>
										<td>DUO演唱会</td>
										<td>3：15
										<div class="tubiaol">
															<a class=""><span class="glyphicon glyphicon-play" style="color: #B1B1B1; font-size: 18px;"></span></a>
															<a class=""><span class="glyphicon glyphicon-heart-empty" style="color: #B1B1B1; font-size: 18px;"></span></a>
															<a class=""><span class="glyphicon glyphicon-arrow-down" style="color: #B1B1B1; font-size: 18px;"></span></a>
															</div></td>
									</tr>
									<tr>
										<td>2</td>
										<td>陀飞轮</td>
										<td>程奕迅</td>
										<td>DUO演唱会</td>
										<td>3：15
										<div class="tubiaol">
																		<a class=""><span class="glyphicon glyphicon-play" style="color: #B1B1B1; font-size: 18px;"></span></a>
																		<a class=""><span class="glyphicon glyphicon-heart-empty" style="color: #B1B1B1; font-size: 18px;"></span></a>
																		<a class=""><span class="glyphicon glyphicon-arrow-down" style="color: #B1B1B1; font-size: 18px;"></span></a>
																		</div></td>
									</tr>
									<tr>
										<td>2</td>
										<td>陀飞轮</td>
										<td>程奕迅</td>
										<td>DUO演唱会</td>
										<td>3：15
										<div class="tubiaol">
																		<a class=""><span class="glyphicon glyphicon-play" style="color: #B1B1B1; font-size: 18px;"></span></a>
																		<a class=""><span class="glyphicon glyphicon-heart-empty" style="color: #B1B1B1; font-size: 18px;"></span></a>
																		<a class=""><span class="glyphicon glyphicon-arrow-down" style="color: #B1B1B1; font-size: 18px;"></span></a>
																		</div></td>
									</tr>
									<tr>
										<td>2</td>
										<td>陀飞轮</td>
										<td>程奕迅</td>
										<td>DUO演唱会</td>
										<td>3：15
										<div class="tubiaol">
																		<a class=""><span class="glyphicon glyphicon-play" style="color: #B1B1B1; font-size: 18px;"></span></a>
																		<a class=""><span class="glyphicon glyphicon-heart-empty" style="color: #B1B1B1; font-size: 18px;"></span></a>
																		<a class=""><span class="glyphicon glyphicon-arrow-down" style="color: #B1B1B1; font-size: 18px;"></span></a>
																		</div></td>
									</tr>
									<tr>
										<td>2</td>
										<td>陀飞轮</td>
										<td>程奕迅</td>
										<td>DUO演唱会</td>
										<td>3：15
										<div class="tubiaol">
																		<a class=""><span class="glyphicon glyphicon-play" style="color: #B1B1B1; font-size: 18px;"></span></a>
																		<a class=""><span class="glyphicon glyphicon-heart-empty" style="color: #B1B1B1; font-size: 18px;"></span></a>
																		<a class=""><span class="glyphicon glyphicon-arrow-down" style="color: #B1B1B1; font-size: 18px;"></span></a>
																		</div></td>
									</tr>
								</tbody>
							</table>

						</div>
					</div>
				</section>
	</body>
</html>