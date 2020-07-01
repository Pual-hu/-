<?php
	namespace Admin\Controller;
	use Think\Controller;
	/**
	 * 
	 */
	class LoginController extends Controller
	{
		public function index(){
			if(I('post.user') == C('USER_CONFIG.admin_name')&& I('post.pwd') == C('USER_CONFIG.admin_pwd')){
				session('admin_name',C('USER_CONFIG.admin_name'));
				$this->success('登录成功',U("Index/index"));
			}else{
				$this->error('登录失败，用户名或密码错误',U("Login/login"));
				return;
			}
			$this->display();
		}
		public function logout(){
			session('[destroy]');
			$this->success('退出成功',U('Login/login'));
		}
	}