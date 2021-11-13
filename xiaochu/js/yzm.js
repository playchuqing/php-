var num;
function yzm(){
	num="";
	var num_Length=4;
	var random=new Array(0,1,2,3,4,5,6,7,8,9);
	for(var i=0;i<num_Length;i++){
		var index=Math.floor(Math.random()*10);
		num+=random[index];
	}
}
function Gyzm(){
	yzm();
	var yzm=document.getElementById('Gyzm').value;
	if(yzm==num){
		document.getElementById('form2').submit();
		return true;
	}else{
		alert("验证码错误");
		document.getElementById("Gyzm").focus();
		return false;
	}
}
