//友情链接
window.onload=function(){
        var tu=document.getElementById("tu");//选择盒子里面的整个大图        
            xiabiao=0;//设置第一张图片的下标是0
         
       //设置定时器  每隔1秒调用一次函数play
            // var t=setInterval(play,4000);
            // function play(){
               
            //    xiabiao++; 
            //    if(xiabiao>=num.length){
            //     xiabiao=0;
            //    }
            //    changeimg(xiabiao);
            //   }
         

            //功能：切换图片下标随之改变
             function changeimg(xiabiao){
              //自动调用之前，先清空li上边的css的背景bg
               for (i = 0; i <num.length; i++) {
                num[i].className="";
                alert('123');
                }
               //使用DOM中的style修改图片盒子的距离，让其向上移动,计算移动距离
              tu.style.marginTop=-305 * xiabiao + "px";
              var y=-305 * xiabiao + "px";
              $("#tu").animate({marginTop:y});
               num[xiabiao].className="bg";
              }   
     

             //鼠标指向大图，轮播效果停止，清除定时器
              
               //鼠标离开大图，轮播效果自动播放
               

               //单击数字按钮的时候，切换到相应的大图效
//友情链接
   function okk(){   
    var oDiv=document.getElementById('friendshipImg');
    var oUl=oDiv.getElementsByTagName('ul')[0];
    var aLi=oUl.getElementsByTagName('li');
    var speed=-1;
    oUl.innerHTML+=oUl.innerHTML;
    oUl.style.width=(aLi[0].offsetWidth*aLi.length+400)+'px';
    function move(){
      if((oUl.offsetLeft-25)<-oUl.offsetWidth/2)
      {
        oUl.style.left='0';
      }
      if(oUl.offsetLeft>0)
      {
        oUl.style.left=-oUl.offsetWidth/2+'px';
      
      }
      oUl.style.left=oUl.offsetLeft+(-3)+'px';
    }
    var timer2=setInterval(move, 50);
    
    oDiv.onmouseover=function ()
    {
      clearInterval(timer2);
    };
    
    oDiv.onmouseout=function ()
    {
      timer2=setInterval(move,50);
    };   
  }
  okk();

      }

     