<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class IndexController extends Controller {
	//鑾峰緱杞挱鍥剧墖銆�
	public function getLoopImg(){
		$model = D("Loop");
		return $model->select();
	}
	//鑾峰緱姝屽崟鎵�鏈夋瓕鏇层�傜涓�棣栨瓕鐨勫皝闈紝鎾斁娆℃暟銆傞潤鎬併��
	public function getSongList(){
		//娉ㄦ剰杩欓噷棣栧瓧姣嶅ぇ鍐欏叾浣欑殑灏忓啓銆�
		$model = D("Songlist");
		$songModel = D("Song");
		//娉ㄦ剰杩欓噷鐨剋here鏉′欢闄愬埗銆�
		$songList = $model->where("name = '姝屽崟涓�'")->select();
		//鑾峰彇琛ㄥ崟鐨勬墍鏈夌殑姝屾洸銆�
		$viewcourts = 0;
		foreach ($songList as $key => $value) {
			//i灏辨槸涓�涓暟缁勶紵锛燂紵
			 $i =  $songModel->where("id = "+$value["song_id"])->select();
			//鑾峰彇鎬绘挱鏀炬鏁�
			 $viewcourts += $value['viewcourts'];
		}
		//鑾峰彇绗竴棣栨瓕鏇茬殑灏侀潰
		$profile = $i[0]["profile"];
		return array($i,$viewcourts,$profile);
	}
	//姝屽崟鐐瑰嚮鎾斁鏃惰幏鍙栨瓕鍗曠殑鏁版嵁,杩斿洖姝屽崟閲岄潰鐨勬墍鏈夋瓕鏇蹭俊鎭��
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
	//鑾峰緱姝屾洸淇℃伅
	public function songInfo(){
		$get["name"] = $_GET['name'];
		$model = D("song");
		$songinfo = $model->where($get)->find();
		//鑾峰彇姝屾洸鐨勬瓕鍚�
		$songname = $songinfo['name'];
		//鑾峰彇姝屾洸鍦板潃
		$songsrc = $songinfo['src'];
		//鑾峰彇姝屾洸灏侀潰
		$songprofile = $songinfo['profile'];
		//鑾峰彇姝岃瘝锛屽苟瀵规瓕璇嶈繘琛屽鐞�
		//鑾峰彇姝岃瘝鏂囦欢鍚嶇О
		$songpath = $songinfo['lyric'];
		//姝岃瘝鏂囦欢澶勭悊
		//鏂囦欢鐨勮矾寰勪腑涓嶈兘鏈夌┖鏍笺��
		$path= "http://localhost".__ROOT__."/Public/upload/song/lyric/".$songpath;
		//灏唋rc鏂囦欢瑙ｆ瀽涓烘暟缁�
		$songarray = file($path);
		//鑾峰彇姝岃瘝鏁扮粍
		$songlyric = array();
		//鑾峰彇瀵瑰簲鐨勪簨浠跺崟浣嶆绉�.
		$songTime = array();
		foreach ($songarray as $key => $value) {
			// echo trim(mb_substr($value,10))."<br />";
			// echo (int)trim(substr($value,1,2))."<br />";
			// echo (float)trim(substr($value,4,5))."<br />";
			 $m = (int)trim(substr($value,1,2))*60*1000;
			 $s = (float)trim(substr($value,4,5))*1000;
			 $total = $m + $s;
			//瀛樻斁姣忎竴鍙ユ瓕璇嶇殑鏃堕棿銆�
			 array_push($songTime,$total);
			//瀛樻斁澶勭悊鐨勬瓕璇嶃��
			 array_push($songlyric,trim(mb_substr($value,10)));
		}
		return array($songsrc,$songprofile,$songTime,$songlyric,$songname);
	}
	//鑾峰彇姝ｅ湪鎾斁鐨勬瓕鏇茬殑鏃堕棿淇℃伅
	public function ajaxsongTime(){
		$post["name"] = $_GET['name'];
		$model = D("song");
		$songinfo = $model->where($post)->find();
		//鑾峰彇姝岃瘝鏂囦欢鍚嶇О
		$songpath = $songinfo['lyric'];
		//姝岃瘝鏂囦欢澶勭悊
		//鏂囦欢鐨勮矾寰勪腑涓嶈兘鏈夌┖鏍笺��
		$path= "http://localhost".__ROOT__."/Public/upload/song/lyric/".$songpath;
		//灏唋rc鏂囦欢瑙ｆ瀽涓烘暟缁�
		$songarray = file($path);
		$songlyric = array();
		//鑾峰彇瀵瑰簲鐨勬椂闂村崟浣嶆绉�.
		$songTime = array();
		foreach ($songarray as $key => $value) {;
			 $m = (int)trim(substr($value,1,2))*60*1000;
			 $s = (float)trim(substr($value,4,5))*1000;
			 $total = $m + $s;
			//瀛樻斁姣忎竴鍙ユ瓕璇嶇殑鏃堕棿銆�
			 array_push($songTime,$total);
		}
		$songscroll = json_encode($songTime);
		echo $songscroll;
	}
	//鑾峰彇姝屾洸鐨勪俊鎭�
	public function ajaxsongInfo(){
		$get = $_GET['name'];
		$model = D("song");
		$songinfo = $model->where("name ="+$get)->find();
		//鑾峰彇姝屾洸鍦板潃
		$songsrc = $songinfo['src'];
		//鑾峰彇姝屾洸灏侀潰
		$songprofile = $songinfo['profile'];
		//鑾峰彇姝岃瘝锛屽苟瀵规瓕璇嶈繘琛屽鐞�
		//鑾峰彇姝岃瘝鏂囦欢鍚嶇О
		$songpath = $songinfo['lyric'];
		//姝岃瘝鏂囦欢澶勭悊
		//鏂囦欢鐨勮矾寰勪腑涓嶈兘鏈夌┖鏍笺��
		$path= "http://localhost".__ROOT__."/Public/upload/song/lyric/".$songpath;
		//灏唋rc鏂囦欢瑙ｆ瀽涓烘暟缁�
		$songarray = file($path);
		//鑾峰彇姝岃瘝鏁扮粍
		$songlyric = array();
		//鑾峰彇瀵瑰簲鐨勪簨浠跺崟浣嶆绉�.
		$songTime = array();
		foreach ($songarray as $key => $value) {
			// echo trim(mb_substr($value,10))."<br />";
			// echo (int)trim(substr($value,1,2))."<br />";
			// echo (float)trim(substr($value,4,5))."<br />";
			 $m = (int)trim(substr($value,1,2))*60*1000;
			 $s = (float)trim(substr($value,4,5))*1000;
			 $total = $m + $s;
			//瀛樻斁姣忎竴鍙ユ瓕璇嶇殑鏃堕棿銆�
			 array_push($songTime,$total);
			//瀛樻斁澶勭悊鐨勬瓕璇嶃��
			 array_push($songlyric,trim(mb_substr($value,10)));
		}
		return array($songsrc,$songprofile,$songTime,$songlyric,$songname);
	}
	public function Index(){
		// 鑾峰緱杞挱鐨勫浘鐗�
		  $loopImg = $this->getLoopImg();
		// 鑾峰緱琛ㄥ崟鐨勬暟鎹�
		  $songList = $this->getSongList();
		  $songInfo = $this->songInfo();
		  // $songInfo2 = $songInfo[2];
		  // print_r( array_combine($songInfo[2],$songInfo[3]));
		  $this->assign("loopImg",$loopImg);
		  $this->assign("songInfo",$songInfo);
		  $this->assign("songList",$songList);
		  $this->display();
		  }
   public function paihang() {
   $this->display();
   }
   public function singer() {
   $this->display();
   }
}