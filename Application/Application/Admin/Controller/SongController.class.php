<?php
	namespace Admin\Controller;
	use Think\Controller;
	/**
	 *
	 */
	class SongController extends Controller
	{
		public function index(){
			//实例化歌曲
			$Model = D('Song');
			// 查询满足要求的总记录数
			$count = $Model->count();
			// 实例化分页类，传入总记录数和每页显示的记录数5
			$Page = new \Think\Page($count,5);
			//分页显示输出
			$show = $Page->show();
			//进行分页数据查询，注意limit方法的参数要使用Page类的属性
			$list = $Model->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign('list',$list);
			$this->assign('page',$show);
			$this->display();
		}
		//删除歌曲
		public function remove(){
			$Model = D('Song');
			if(IS_POST){
				$id = I("post.id");
				 $where = array("id" => $id);
				 $remove = $Model->where($where)->delete();
				 if($remove == false){
				 	$this->success("删除成功","index");
				 }else{
				 	echo "删除失败";
				 }
			}
		}
		public function modify(){

		}
	}