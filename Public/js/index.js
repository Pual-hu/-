$(function(){
	let playlist = new Array();
	let playing = 0;
	let progress = $(".current-progress-after");
	let navlis = $(".nav li");
	let smallNav = $(".nav-small a");
	// 为主导航栏添加点击事件
	navlis.click(function(event) {
		$(this).siblings().css({"background-color":"#ffffff","font-weight":"normal"});
		$(this).css({"background-color":"yellow","font-weight":"bold"});
	});
	//为小菜单添加点击事件
	smallNav.click(function(event){
		$(this).siblings().css("font-weight","normal");
		$(this).siblings().removeClass('old');
		$(this).addClass('old');
		$(this).css("font-weight","bold");
	})
	// 轮播图
	let loopUl = $(".loop-img");
	let arrowRight = $(".arrow-right");
	let arrowLeft = $(".arrow-left");
	let flag =true;
	let circle = $(".loop-circle li");
	let index = 0;
	$(circle[index]).css("background-color","#fff");
		arrowLeft.click(function() {
			if(flag){
				flag = false;
				index++;
				// console.log(index);
				loopUl.animate({"left":"-=1400px"}, 1000,function(){
					flag =true;
					if(index == 5){
						index = 0;
						loopUl.css("left","-1400px");
					}
					circle.css("background-color","rgba(0,0,0,0.3)");
					$(circle[index]).css("background-color","#fff");
				});
			}
		})
		arrowRight.click(function(){
			if(flag){
				flag = false;
				index--;
				// console.log(index);
				loopUl.animate({"left":"+=1400px"}, 1000,function(){
					flag =true;
					if(index == -1){
						index = 4;
						loopUl.css("left","-7000px");
					}
					circle.css("background-color","rgba(0,0,0,0.3)");
					$(circle[index]).css("background-color","#fff");
				});
			}
		});
		// 点击圆圈跳转到指定图片上
		circle.click(function(event){
			let index = $(this).attr("data-index");
			let currentMove = index*-1400+"px";
			circle.css("background-color","rgba(0,0,0,0.3)");
			$(circle[index-1]).css("background-color","#fff");
			loopUl.animate({"left":currentMove},1000,function(){
			});
		})
		//自动轮播
		let fixtime = setInterval(function(){
			arrowLeft.click();
		},3000);
		loopUl.hover(function() {
			clearInterval(fixtime);
		}, function() {
			fixtime = setInterval(function(){
				arrowLeft.click();
			}, 3000);
		});
	//歌单推荐小菜单点击
	let rSmallNav = $(".r-nav li a");
	rSmallNav.click(smallNavClick);
	//点击换颜色的样式。
	function smallNavClick(){
		$(this).addClass("old a-font");
		$(this).parent().siblings().children("a").removeClass("old a-font");
	}
	// hover展示播放图标
	let rPlay = $(".play");
	let rSmallLi = $(".r-img li");
	rSmallLi.hover(function() {
		$(this).children(".play").addClass("icon-1_music94");
	}, function() {
		$(this).children(".play").removeClass("icon-1_music94");
	});
	//歌手推荐的菜单点击样式改变
	let singerNav = $(".singer-nav li a");
	singerNav.click(smallNavClick);
	// 测导航栏的淡入淡出
	let asid = $(".asid");
	let myDocument = $(document);
	let myBody = $("body");
	myDocument.scroll(function(){
		if($(this).scrollTop() >= 580){
			asid.fadeIn();
		}else{
			asid.fadeOut();
		}
	})
	// 底部播放的显示与隐藏
	let bottom = $(".bottom-play");
	let songPlay = $(".song-play");
	let halfCircle = $(".half-circle");
	let suo = $(".half-circle span");
	let isLock = false;
	// 点击锁定播放组件
	halfCircle.click(function(){
		if(isLock === false){
			isLock = true;
			suo.toggleClass("icon-suo icon-kaisuo1");
		}else{
			isLock = false;
			suo.toggleClass("icon-suo icon-kaisuo1");
		}
	});
	bottom.hover(function() {
		if(isLock == false){
			bottom.stop();
			bottom.animate({"bottom":"0px"},400);
		}
	}, function() {
		if(isLock == false){
			bottom.stop();
			bottom.animate({"bottom":"-80px"},400);
		}
	});
	//点击榜单播放歌曲。
	let rSmallPlay = rSmallLi.children(".play");
	rSmallPlay.click(function(event){
		let viewcount = parseInt($(event.target).parent().find(".icon-arrow-right ~ b").text());
		//获取歌单的名称
		let songlist = $(event.target).siblings('.listname').text();
		//请求歌单中的歌曲
		$.ajax({
			url: MODEL+"/Index/ajaxgetPlayList",
			traditional: true,
			data:{
				'name':songlist
			},
			type:"post",
			success: function(result){
				song = JSON.parse(result);
				playlist = song;
				length = song.length;
				//设置播放列表的数量
				$(".icon-yinleliebiao i").text(length);
				//歌曲播放
				musicPlay();
			}
		})
	})
	//点击播放音乐
	let audio = $(".audioplay");
	let bofang = $(".icon-bofang");
	bofang.click(function(){
		if(playlist.length != 0){
			musicPlay();
		}
	});
	//播放音乐
	let firstPlay = true;
	function musicPlay(){
		//获得正在播放歌曲的时间
		if(firstPlay){
			getTime();
		}
		firstPlay = false;
		//播放歌曲
		if(audio[0].paused === true){
			//获得正在播放歌曲的时间
			audio[0].play();
			bofang.toggleClass("icon-bofang icon-zanting");
		}else{
			audio[0].pause();
			bofang.toggleClass("icon-bofang icon-zanting");
		}
		//更改播放的信息
		$(".progress img").prop({src:PUBLIC+'/upload/song/profile/'+playlist[playing]['profile']});
		$(".progress .name").text(playlist[playing]['name']);
	}
	//获取歌曲的时间
	let someTime;
	function getTime(){
		$.ajax({
			url: MODEL+"/Index/ajaxsongTime",
			data:{
				name: playlist[playing]['name'],
			},
			async:false,
			success: function(result){
				songTime = JSON.parse(result);
				//更改时间
				let length = songTime.length;
				//获取时间的总时间
				let min = parseInt(songTime[length-1]/1000/60);
				let sec;
				if(parseInt(songTime[length-1]/1000%60)<10){
					sec = '0'+parseInt(songTime[length-1]/1000%60);
				}else{
					sec = parseInt(songTime[length-1]/1000%60);
				}
				totalTime = min*60+sec*1;
				audio[0].ontimeupdate = function(){
						//时间的更改
						let cmin = Math.floor(audio[0].currentTime/60);
						let csec;
						if(Math.round(audio[0].currentTime%60)< 10){
							csec = '0'+Math.round(audio[0].currentTime%60);
						}else{
							csec = Math.round(audio[0].currentTime%60);
						}
						$('.time').text(cmin+":"+csec+"/"+min+":"+sec);
						//进度条的更改
						let prowidth = (cmin*60+csec*1)/(min*60+sec*1);
						progress.css('width',prowidth*100+'%');
						if(prowidth === 1){
							audio[0].pause();
							bofang.toggleClass("icon-bofang icon-zanting");
							audio[0].currentTime = 0;
						}
				}
			}
		})
	}
	//改变音量
	let volume = $(".volume-progress");
	let volumeProgress = $('.volume-progress-after');
	volume.click(function(event){
		let width = $(this).outerWidth();
		let f1 = $(this).parents('.song-play');
		let f2 = $(this).parents('.bottom-play');
		let outWidth = $(this)[0].offsetLeft+f1[0].offsetLeft+f2[0].offsetLeft;
		let currentWidth = event.clientX;
		audio[0].volume = (currentWidth - outWidth)/width;
		volumeProgress.css("width",Math.round((currentWidth - outWidth)/width*100)+"%");

	})
	let cprogress = $('.current-progress');
	//改变进度条
	let totalTime;
	cprogress.click(function(){
			let width = $(this).outerWidth();
			let f1 = $(this).parents('.song-play');
			let f2 = $(this).parents('.bottom-play');
			let outWidth = $(this)[0].offsetLeft+f1[0].offsetLeft+f2[0].offsetLeft;
			let currentWidth = event.clientX;
			//设置时间
			audio[0].currentTime = (currentWidth - outWidth)/width*totalTime;
			//设置进度条
			console.log(audio[0].currentTime/1000/totalTime*100+"%");
	})
	//点击下一首播放下一首歌曲
	let nextsong = $(".icon-shangyishoushangyige");
	nextsong.click(function(){
		//让播放announce同步
		if(audio[0].paused === false){
		 	bofang.toggleClass("icon-bofang icon-zanting");
		}
		if(++playing > playlist.length-1){
			playing = 0;
		}
		console.log(playing);
		console.log(playlist.length-1)
		//更改播放的信息
		$(".progress img").prop({src:PUBLIC+'/upload/song/profile/'+playlist[playing]['profile']});
		$(".progress .name").text(playlist[playing]['name']);
		audio.prop({src:PUBLIC+'/upload/song/src/'+playlist[playing]['src']});
		//播放音乐
		firstPlay = true;
		musicPlay();
	})
	//点击上一首播放上一首歌曲
	let prevsong = $(".icon-shangyishoushangyige1");
	prevsong.click(function(){
		//让播放announce同步
		if(audio[0].paused === false){
		 	bofang.toggleClass("icon-bofang icon-zanting");
		}
		if(--playing < 0){
			playing = playlist.length-1;
		}
		//更改播放的信息
		$(".progress img").prop({src:PUBLIC+'/upload/song/profile/'+playlist[playing]['profile']});
		$(".progress .name").text(playlist[playing]['name']);
		audio.prop({src:PUBLIC+'/upload/song/src/'+playlist[playing]['src']});
		//播放音乐
		firstPlay = true;
		musicPlay();
	})
	// $.ajax({
	// 	url: MODEL+"/Index/ajaxsongTime",
	// 	traditional: true,
	// 	success: function(result){
	// 		songTime = JSON.parse(result);
	// 		//更改时间
	// 		let length = songTime.length;
	// 		//获取时间的总时间
	// 		let min = parseInt(songTime[length-1]/1000/60);
	// 		let sec;
	// 		if(parseInt(songTime[length-1]/1000%60)<10){
	// 			sec = '0'+parseInt(songTime[length-1]/1000%60);
	// 		}else{
	// 			sec = prseInt(songTime[length-1]/1000%60);
	// 		}
	// 		$('.time').text(12+"/"+min+":"+sec);
	// 	}
	// })
	////////////////////////////////////
	// controls[1].onclick =function onclickPlay(){
	// 		if(play.paused === true){
	// 			play.play();
	// 			this.classList.remove("icon-caret-right");
	// 			this.classList.add("icon-pause");
	// 			move = setInterval(function(){
	// 				//完成时间进度的动画，歌曲播放完毕初始化时间和播放进度。
	// 				var moveNumber = 701 / Math.ceil(play.duration);
	// 				var leftNumber = -1+moveNumber*play.currentTime;
	// 				var left = circle.offsetLeft;
	// 				circle.style.left = Math.ceil(leftNumber)+"px";
	// 				timer.innerHTML = Math.floor(Math.ceil(play.currentTime)/60)+":"+Math.ceil(play.currentTime)%60+"/"+time1+":"+time2;
	// 				if(play.paused === true){
	// 					clearInterval(move);
	// 					timer.innerHTML = 0/time1+":"+time2;
	// 					circle.style.left = -1 + "px";
	// 				}
	// 			},1000);
	// 		}else{
	// 			clearInterval(move);
	// 			play.pause();
	// 			this.classList.remove("icon-pause");
	// 			this.classList.add("icon-caret-right");
	// 		}
	// 	}
})