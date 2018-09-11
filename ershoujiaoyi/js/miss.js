//侧边消失
//
$(document).ready(function(){
     tag=0;
//鼠标点击try触发事件toggle
$("#try").click(function(){
	$("aside").slideToggle(800);
  //对点击事件进行判断，首次关闭，双数打开。
	if(tag==0){
	 $("#try img").attr("src",'image/btn1.jpg');
	 tag=1;
     $(".section").css({'float':'left','margin-left':'200px'});
    
     }else{

      $("#try img").attr("src",'image/btn.jpg');
       $(".section").css({'float':'','margin-left':'-200px'});
      tag=0;
    
     
}

	 
})

});