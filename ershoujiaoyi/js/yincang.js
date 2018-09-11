//获取表格行及单元格
$(document).ready(function(){
  var tu=document.getElementById('tu');
  var tr=tu.getElementsByTagName('tr');
//依次拿到单元格的内容
  for(j=1;j<tr.length;j++){
    var td=tr[j].getElementsByTagName('td');
    for(i=0;i<td.length;i++){
      (function(i){
        // var po=$(td[i]);
        $(td[i]).find(".mask").hide("fast");
        //鼠标放上去触发显示
        td[i].onmouseenter=function(){
          $(this).find(".mask").show();
        }

        $(td[i]).find(".mask img").click(function(){
            $(this).attr("src",'image/heart1.gif');
        });
          //鼠标离开遮罩层消失
         $(td[i]).mouseleave(function(event){
          $(".mask").hide("fast");
         });
      })(i)
    }
  }
   var a=document.getElementsByClassName("zhu");
          var b=document.getElementsByClassName("ren");
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
})