function d(){       //当前显示的DOM到DOM顶部的距离大于1px，则显示返回顶部的模块  
        var h=$(window).height();           //获取当前浏览器可视窗口的高度  
        var t =578+$(document).scrollTop(); //当前DOM文件可见的顶部到实际顶部的高度+578px（根据自己的浏览器可以窗口设置，下面的alert可以帮你获取当前浏览器的可视高度h,我的浏览器可视高度为578px）  
        //alert("h="+h+",t="+t);  
       if(t > h){                     //有部分DOM被滚动到不见的上面部分就显示返回图片，否则隐藏  
        $("#gotop").fadeIn();  
        }else{  
        $("#gotop").fadeOut();  
        }  
     } 

   $(document).ready(function(e) {  //单击返回图标返回DOM顶部  
        d();  
        $('#gotop').click(function(){  
        $(document).scrollTop(0);     
    });  
    });  
   $(window).scroll(function(e){  //窗口中时时调用b（）判断是否显示返回顶部模块  
         d();     
   });  
		


