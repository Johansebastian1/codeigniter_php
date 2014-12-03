$(document).ready(function(){
	var a = $(window).height();
	var b = $(window).width();
	var c = a - 225;
	var d = a - 509;
	$("#content").css("height", c);
	$("#content2").css("height",d);
	if(a <= 553){
		$("#content2").css("height","150px");
	}
	console.log(a);
	console.log(b);
	console.log(c);
	console.log(d);
});

