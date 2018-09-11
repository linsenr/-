window.onload=function(){
var a=document.getElementsByClassName("like");
				for(var i=0;i<a.length;i++)
				(function(i){
					$(a[i]).click(function(){
						$(a[i]).text("你已经顶了").css({'cursor':'help'}).click(alert("物品很棒哦！"));
						})
				})(i)
				var b=document.getElementsByClassName("tel");
				for(var j=0;j<b.length;j++)
				(function(j){
					$(b[j]).click(function(){
						$(b[j]).click(confirm("联系人qq:123456---微信:4651456---手机号:46565"));
						})
				})(j)
			}