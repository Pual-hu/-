<?php
	namespace Admin\Controller;
	use Think\Controller;
	/**
	 *
	 */
	class CommonController extends Controller
	{
		public function checkUser(){
			if(!session('?admin_name')){
				$this->error("请登录",U("Login/login"));
			}
		}
	}