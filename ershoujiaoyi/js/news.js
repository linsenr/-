//新闻的滚动js特效
var r=document.getElementsByClassName("scrollbox");//获取竖向滚动的id
          var x=document.getElementById("scrollDiv");//获取竖向滚动的id
          var x1=document.getElementById("scrollDiv1");
          var xx=document.getElementById("scroll");
          var height1=xx.offsetHeight;//父盒子高度620px
          var height2=x.offsetHeight;//子盒子高度280px
          var t=xx.scrollTop;//0px
          // x1.innerHTML=x.innerHTML;
          function move(){
            t=t+5;
            xx.style.top=-t+"px";
            if(t==270)
            {
              t=0;
            }
          }
              var time=setInterval(move,'100');
          xx.onmouseenter=function(){
            clearInterval(time);
          }
           xx.onmouseleave=function(){
            time=setInterval(move,'100');
           }     
$(document).ready(function(){
  $("#scrollDiv").scroll({line:1,speed:500,timer:2000,up:"but_up",down:"but_down"});
  (function(){
    var lineH = $(".test").find("li:first").height();
    var appendTo = function(){
      $(".test").find("li:first").appendTo($(".test"));
      $(".test ul").css("marginTop", 0);
    };
    var animate = function(){
      $(".test ul").eq(0).animate({
        marginTop: -lineH
      },500,appendTo)
    };
    var delayer = setInterval(animate, 2000);
  })()
});
