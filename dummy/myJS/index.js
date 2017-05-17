function accounting(type){
	var form=document.getElementsByName("type");
	if(type=1){
		form["0"]["1"].selected=false;
		form["0"]["0"].selected=true;
		location.href="demo.html?ref=prv";
	}
	if(type=2){
		form["0"]["2"].selected=false;
		form["0"]["0"].selected=true;
		location.href="demo.html?ref=bsn";
	}
}
function mylogin(){
	//console.log(user);
	var user=document.getElementById("user").value;
	var pwd =document.getElementById("pwd") .value;
	if(user=="prv")
		location.href="cockpit.html?ref=prv";
	if(user=="bsn")
		location.href="cockpit.html?ref=bsn";
}