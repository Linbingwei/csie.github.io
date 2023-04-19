var jsimg=new Array("images/01.jpg","images/02.jpg","images/03.jpg","images/04.jpg","images/05.jpg");
var imgLen=jsimg.length;
var i=0;
setInterval("playimg()",2000);
function playimg(){
	document.getElementById("mydiv").innerHTML="<center><img src= '"+jsimg[i]+"'</center>";
	i++;
	if(i>=imgLen) i=0;
}
function npFunction() {  
	document.getElementById("mydiv").innerHTML="<center><img src='"+jsimg[i]+"' </center>";
	i++;
	if(i>=imgLen) i=0;
}
function lpFunction() {
	i--;
	if(i<0) i=imgLen-1;
	document.getElementById("mydiv").innerHTML="<center><img src='"+jsimg[i]+"' </center>";
}
