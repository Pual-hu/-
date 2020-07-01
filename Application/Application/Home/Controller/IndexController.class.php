<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class IndexController extends Controller {
	//获得轮播图片。
	public function getLoopImg(){
		$model = D("Loop");
		return $model->select();
	}
	//获得歌单所有歌曲。第一首歌的封面，播放次数。静态。
	public function getSongList(){
		//注意这里首字母大写其余的小写。
		$model = D("Songlist");
		$songModel = D("Song");
		//注意这里的where条件限制。
		$songList = $model->where("name = '歌单一'")->select();
		//获取表单的所有的歌曲。
		$viewcourts = 0;
		foreach ($songList as $key => $value) {
			//i就是一个数组？？？
			 $i =  $songModel->where("id = "+$value["song_id"])->select();
			//获取总播放次数
			 $viewcourts += $value['viewcourts'];
		}
		//获取第一首歌曲的封面
		$profile = $i[0]["profile"];
		return array($i,$viewcourts,$profile);
	}
	//歌单点击播放时获取歌单的数据,返回歌单里面的所有歌曲信息。
	public function ajaxgetPlayList(){
		$get = $_GET['name'];
		$model = D("Songlist");
		$songModel = D("Song");
		$songList = $model->where("name ="+$get)->select();
		foreach ($songList as $value) {
			$i = $songModel->where("name ="+$value['name'])->select();
		}
		$song = json_encode($i);
		print_r($song);
	}
	//获得歌曲信息
	public function songInfo(){
		$get["name"] = $_GET['name'];
		$model = D("song");
		$songinfo = $model->where($get)->find();
		//获取歌曲的歌名
		$songname = $songinfo['name'];
		//获取歌曲地址
		$songsrc = $songinfo['src'];
		//获取歌曲封面
		$songprofile = $songinfo['profile'];
		//获取歌词，并对歌词进行处理
		//获取歌词文件名称
		$songpath = $songinfo['lyric'];
		//歌词文件处理
		//文件的路径中不能有空格。
		$path= "http://localhost".__ROOT__."/Public/upload/song/lyric/".$songpath;
		//将lrc文件解析为数组
		$songarray = file($path);
		//获取歌词数组
		$songlyric = array();
		//获取对应的事件单位毫秒.
		$songTime = array();
		foreach ($songarray as $key => $value) {
			// echo trim(mb_substr($value,10))."<br />";
			// echo (int)trim(substr($value,1,2))."<br />";
			// echo (float)trim(substr($value,4,5))."<br />";
			 $m = (int)trim(substr($value,1,2))*60*1000;
			 $s = (float)trim(substr($value,4,5))*1000;
			 $total = $m + $s;
			//存放每一句歌词的时间。
			 array_push($songTime,$total);
			//存放处理的歌词。
			 array_push($songlyric,trim(mb_substr($value,10)));
		}
		return array($songsrc,$songprofile,$songTime,$songlyric,$songname);
	}
	//获取正在播放的歌曲的时间信息
	public function ajaxsongTime(){
		$post["name"] = $_GET['name'];
		$model = D("song");
		$songinfo = $model->where($post)->find();
		//获取歌词文件名称
		$songpath = $songinfo['lyric'];
		//歌词文件处理
		//文件的路径中不能有空格。
		$path= "http://localhost".__ROOT__."/Public/upload/song/lyric/".$songpath;
		//将lrc文件解析为数组
		$songarray = file($path);
		$songlyric = array();
		//获取对应的时间单位毫秒.
		$songTime = array();
		foreach ($songarray as $key => $value) {;
			 $m = (int)trim(substr($value,1,2))*60*1000;
			 $s = (float)trim(substr($value,4,5))*1000;
			 $total = $m + $s;
			//存放每一句歌词的时间。
			 array_push($songTime,$total);
		}
		$songscroll = json_encode($songTime);
		echo $songscroll;
	}
	//获取歌曲的信息
	public function ajaxsongInfo(){
		$get = $_GET['name'];
		$model = D("song");
		$songinfo = $model->where("name ="+$get)->find();
		//获取歌曲地址
		$songsrc = $songinfo['src'];
		//获取歌曲封面
		$songprofile = $songinfo['profile'];
		//获取歌词，并对歌词进行处理
		//获取歌词文件名称
		$songpath = $songinfo['lyric'];
		//歌词文件处理
		//文件的路径中不能有空格。
		$path= "http://localhost".__ROOT__."/Public/upload/song/lyric/".$songpath;
		//将lrc文件解析为数组
		$songarray = file($path);
		//获取歌词数组
		$songlyric = array();
		//获取对应的事件单位毫秒.
		$songTime = array();
		foreach ($songarray as $key => $value) {
			// echo trim(mb_substr($value,10))."<br />";
			// echo (int)trim(substr($value,1,2))."<br />";
			// echo (float)trim(substr($value,4,5))."<br />";
			 $m = (int)trim(substr($value,1,2))*60*1000;
			 $s = (float)trim(substr($value,4,5))*1000;
			 $total = $m + $s;
			//存放每一句歌词的时间。
			 array_push($songTime,$total);
			//存放处理的歌词。
			 array_push($songlyric,trim(mb_substr($value,10)));
		}
		return array($songsrc,$songprofile,$songTime,$songlyric,$songname);
	}
	public function Index(){
		// 获得轮播的图片
		  $loopImg = $this->getLoopImg();
		// 获得表单的数据
		  $songList = $this->getSongList();
		  $songInfo = $this->songInfo();
		  // $songInfo2 = $songInfo[2];
		  // print_r( array_combine($songInfo[2],$songInfo[3]));
		  $this->assign("loopImg",$loopImg);
		  $this->assign("songInfo",$songInfo);
		  $this->assign("songList",$songList);
		  $this->display();
		  }
}