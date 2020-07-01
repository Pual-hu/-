<?php
	namespace Admin\Controller;
	use Think\Controller;
	/**
	 *
	 */
	class IndexController extends Controller
	{
		public function index(){
			$common = new CommonController();
			$common->checkUser();
			$loopModel = D("loop");
			$loop = $loopModel->select();
			$this->assign("loop",$loop);
			$this->assign("name",$_SESSION['admin_name']);
			$this->display("Index/index");
		}
		public function modification(){
			$loopModel = D("loop");
			$common = new CommonController();
			$common->checkUser();
			if(IS_POST){
				//实例化上传类
				$name ="loop".I('post.id');
				$descrip = I('post.descrip');
				$config = array(
					"maxSize" => 3145728,
					"rootPath" => './Public/upload/options/loop/',
					"savePath" => "",
					"saveName" => "$name",
					"exts" => array('jpg', 'gif', 'png', 'jpeg'),
					"autoSub" => false,
					"hash" =>false,
					"replace" => true,
				);
				$upload = new \Think\Upload($config);
				$info = $upload->upload();
				if(!$info){
					$this->error($upload->getError());
				}else{
					// print_r($info['src']);
					$data['src'] = $info['src']['savename'];
					// echo $data['src'];
					$data['descrip'] = $descrip;
					$loopModel->where("id =".I("post.id"))->save($data);
					$this->success("上传成功","Index/index");
				}
			}
		}
		public function adver(){
			$loopModel = D("adver");
			$common = new CommonController();
			$common->checkUser();
			if(IS_POST){
				//实例化上传类
				$name ="adver".I('post.id');
				$descrip = I('post.descrip');
				$config = array(
					"maxSize" => 3145728,
					"rootPath" => './Public/upload/options/adver/',
					"savePath" => "",
					"saveName" => "$name",
					"exts" => array('jpg', 'gif', 'png', 'jpeg'),
					"autoSub" => false,
					"hash" =>false,
					"replace" => true,
				);
				$upload = new \Think\Upload($config);
				$info = $upload->upload();
				if(!$info){
					$this->error($upload->getError());
				}else{
					// print_r($info['src']);
					$data['src'] = $info['src']['savename'];
					// echo $data['src'];
					$data['descript'] = $descrip;
					$loopModel->where("id =".I("post.id"))->save($data);
					$this->success("上传成功","Index/index");
				}
			}
			$adver = $loopModel->select();
			$this->assign('adver',$adver);
			$this->display();
		}
	}