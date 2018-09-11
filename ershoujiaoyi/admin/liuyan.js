window.onload=function(){
$(document).ready(function(){
			$("#an2").click(function(){
				$("#li1").hide();
				$("#li2").show();
			})
			$("#an1").click(function(){
				$("#li2").hide();
				$("#li1").show();
			})
		})

		// 改变留言字数
		// function get(d){
	 // 	$r=document.getElementById(d);
	 // 	return $r;
	 // }
	 //跳到ajax1页面，完成统计留言技术功能
	 $(function(){
			$("#huoqu").keyup(function(){
					$.ajax({
						url:"../ajax1.php",
						type:"GET",	
						data:{name:$("#huoqu").val()},					
						error:function(){
							alert('加载失败');
						},
						success:function(data,status){
							if(data>120)
							{
								alert('你输入的字数超过上限！');
								// $("#huoqu").attr({maxlength:"120"});
								exit;
							}
							$("#num").html(data);
						}
					});
				});
		});
	 //回复功能
	    // $(function(){
	    	// $("#huifu1").click(function(){
	    	// 	$("#qi1").toggle();
	    	// })
	    // })
	  //   $(function(){
	  //   	$("huifu1").click(function(){
			// $.ajax({
			// 			url:"ajax5.php",
			// 			type:"GET",
		 // 				data:{name:s,value:$("#write").val(),},						
		 // 				error:function(){
	 	// 				alert('加载失败');
		 // 				},
		 // 				success:function(data,status){
		 // 					alert(data);
	 	// 			}
		 // 			});
			//  	})
			// })
	    
	 //跳到ajax2页面，完成获取qq头像功能
		var li=document.getElementById("li1");
		var b=document.getElementById("haa");
		// alert(b.length);
		var a=li.getElementsByTagName("img");
		for(var i=0;i<b.length;i++)
			(function(i){
				$(b[i]).click(function(){
					for(var j=0;j<a.length;j++)
					{
					if(i==j)
						// alert(a[i]);
					 $(a[i]).css({'opacity':'0.5','border':'2px solid red'});
					 $b=$(a[i]).attr('src');
					 //alert($b);
					 $("#photoj").attr('src',$b);
					}
				});
			})(i)
		   var li=document.getElementById("li1");
		   var b=document.getElementById("haa");
		   var a=li.getElementsByTagName("img");
			for(var x=0;x<a.length;x++){
			(function(x){
				$(a[x]).click(function(){
					if(x==0){
					$b=$(a[x]).attr('src');
					$("#photoj").attr('src',$b);
					 $(b).val("头像1");}
					 if(x==1){
					 $b=$(a[x]).attr('src');
					 $("#photoj").attr('src',$b);
					 $(b).val("头像2");}
					 if(x==2){
					 $b=$(a[x]).attr('src');
					 $("#photoj").attr('src',$b);
					 $(b).val("头像3");}
					 if(x==3){
					 $b=$(a[x]).attr('src');
					 $("#photoj").attr('src',$b);
					 $(b).val("头像4");}
					 if(x==4){
					 $b=$(a[x]).attr('src');
					 $("#photoj").attr('src',$b);
					 $(b).val("头像5");}
					 if(x==5){
					 $b=$(a[x]).attr('src');
					 $("#photoj").attr('src',$b);
					 $(b).val("头像6");}
					 if(x==6){
					 $b=$(a[x]).attr('src');
					 $("#photoj").attr('src',$b);
					 $(b).val("头像7");}
					 if(x==7){
					 $b=$(a[x]).attr('src');
					 $("#photoj").attr('src',$b);
					 $(b).val("头像8");}
					 if(x==8){
					 $b=$(a[x]).attr('src');
					 $("#photoj").attr('src',$b);
					 $(b).val("头像9");}
				});
			})(x)
		}
		// var lii=document.getElementsByName("qq");
		// for(var r=0;r<lii.length;r++)
		// 	(function(r){
		// 		$(b[r]).click(function(){
		// 			 $(".qq").attr('src','image/heart1.gif');
		// 		});
		// 	})(r)
		$(function(){
			$("#photo").keyup(function(){
					$.ajax({
						url:"ajax2.php",
						type:"GET",	
						data:{name:$("#photo").val()},					
						error:function(){
							alert('加载失败');
						},
						success:function(data,status){
							$("#photoj").attr('src',data);
						}
					});
				});
		});
		//点赞
		// $(function(){
			// function zan(i){
			// 	alert(i);
			// 		$.ajax({
			// 			url:"ajax3.php",
			// 			type:"GET",
			// 			data:{name:i},						
			// 			error:function(){
			// 				alert('加载失败');
			// 			},
			// 			success:function(data,status){
			// 				alert(data);
			// 				$("#"+i).html(data);
			// 			}
			// 		});
			// 		}

		var s=document.getElementById("wei");//获取第一条公告的id
		var o=document.getElementById("wei1");//获取第二条公告的id
		var width2=s.offsetWidth;//360px为父盒子宽度
		var width1=o.offsetWidth;//150px
		var left1=o.scrollLeft;//0
		function left(){
			left1=left1+8;
			o.style.left=-left1+"px";
			if(left1==616)
			{
				left1=0;
			}
		}
		var timer=setInterval(left,'100');
		s.onmouseenter=function(){
			clearInterval(timer);
		}
		 s.onmouseleave=function(){
		 	timer=setInterval(left,'100');
		 }
		 //竖向滚动条
		var r=document.getElementById("nei");//获取竖向滚动的id
		var x=document.getElementById("nei1");//获取竖向滚动的id
		var height1=r.offsetHeight;//父盒子高度250px
		var height2=x.offsetHeight;//子盒子高度135px
		var t=x.scrollTop;
		// document.getElementById("nei2").innerHTML=x.innerHTML;
		function move(){
			t=t+5;
			x.style.top=-t+"px";
			if(t==250)
			{
				t=0;
			}
		}
        var time=setInterval(move,'100');
		r.onmouseenter=function(){
			clearInterval(time);
		}
		 r.onmouseleave=function(){
		 	time=setInterval(move,'100');
		 }
		  $(document).ready(function(){
            $("#bia").mouseover(function(){
              $("#biao3").hide()
              $("#biao5").show()
            })
            $("#bia").mouseout(function(){
              $("#biao3").show()
              $("#biao5").hide()
            })
          })
          $(document).ready(function(){
            $("#bia1").mouseover(function(){
              $("#biao4").hide()
              $("#biao6").show()
            })
            $("#bia1").mouseout(function(){
              $("#biao4").show()
              $("#biao6").hide()
            })
          })
          $(document).ready(function(){
            $("#biao7").mouseover(function(){
              $("#biao8").show()
            })
            $("#biao7").mouseout(function(){
              $("#biao8").hide()
            })
          })
      }