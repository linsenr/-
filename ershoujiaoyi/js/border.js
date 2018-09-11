
$(function(){
	//获取新闻盒子的宽和高。
	_pwidth=$('#news').width();
	_pheight=$('#news').height();
$('#border').append("@keyframes clipMe{0%,100%{clip:rect(0,"+1.12*_pwidth+"px,"+0.1*_pheight+"px,0);}25%{clip:rect(0,"+0.1*_pwidth+"px,"+1.2*_pheight+"px,0px);}50%{clip:rect("+1.1*_pheight+"px,"+1.12*_pwidth+"px,"+1.2*_pheight+"px,0);}75%{clip:rect(0,"+1.12*_pwidth+"px,"+1.2*_pheight+"px,"+1.06*_pwidth+"px);}}");

});