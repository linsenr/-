$(document).ready(function(){
			$("#jian img").mouseenter(function(){
				$("#jian img").addClass(red).text('123');
			})
			$("#jian img").click(function(){
				$("#jian img").css({"opacity":"0.8"});
				$("#jieshao").fadeToggle(800);
			})
			$("#jian1 img").click(function(){
				$("#jian1 img").css({"opacity":"0.8"});
				$("#jieshao1").fadeToggle(800);
			})
			$("#jian2 img").click(function(){
				$("#jian2 img").css({"opacity":"0.8"});
				$("#jieshao2").fadeToggle(800);
			})
			$("#jian3 img").click(function(){
				$("#jian3 img").css({"opacity":"0.8"});
				$("#jieshao3").fadeToggle(800);
			})
			// 个人爱好栏
			$("#tu1").click(function(){
				$("#tu1 img").css({"opacity":"0.3"});
				$("#wenzi").fadeToggle(800);
			})
			$("#tu2").click(function(){
				$("#tu2 img").css({"opacity":"0.3"});
				$("#wenzi1").fadeToggle(800);
			})
			$("#tu3").click(function(){
				$("#tu3 img").css({"opacity":"0.3"});
				$("#wenzi2").fadeToggle(800);
			})
			$("#tu4").click(function(){
				$("#tu4 img").css({"opacity":"0.3"});
				$("#wenzi3").fadeToggle(800);
			})
		})