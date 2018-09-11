  window.onload=function(){
		function fun1(){
						var liu=document.getElementById("qp").value;
						$("#kua1").html(liu);
					}
					function fun2(){
						var liu=document.getElementById("qp1").value;
						$("#kua2").html(liu);
					}
					function fun3(){
						var liu=document.getElementById("qp2").value;
						$("#kua3").html(liu);
					}
					function fun4(){
						var liu=document.getElementById("qp3").value;
						$("#kua4").html(liu);
					}
					var a=document.getElementsByClassName("h");
					var b=document.getElementsByClassName("nei");
						for(var i=0;i<a.length;i++)
						(function(i){
							$(a[i]).click(function(){
								for(var j=0;j<b.length;j++)
									(function(j){
										if(i==j)
										$(b[i]).toggle();
									})(j)
							})	
						})(i)
						// 留言功能的实现 
					var button=document.getElementsByTagName("button");
							for(var i=0;i<button.length;i++)
								(function(i){
						    	$(button[i]).click(function(){
						    		// alert(i);
						    		if(i==0){
								    $("#kuang").show();}
								    if(i==1){
								    $("#kuang").hide();	
								    }
								    if(i==2){
								    $("#kuang1").show();}
								    if(i==3){
								    $("#kuang1").hide();
								    }
								    if(i==4){
								    $("#kuang2").show();}
								    if(i==5){
								    $("#kuang2").hide();}
								    if(i==6){
								    $("#kuang3").show();}
						    		if(i==7){
								    $("#kuang3").hide();}
								});
								})(i);
							}
