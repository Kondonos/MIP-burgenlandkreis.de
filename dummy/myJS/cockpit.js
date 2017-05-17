class Person{

}

settype=function (){
	var type="prv";
	var pro=window.location.search.substring(1);
	var tmp=pro.split("&");
	var hash=tmp[0].split("=");
	var val=hash[1];
	if(val=="prv"|| val=="bsn"){
		type=val;
	}
	customize(type);
}

customize=function (type) {
	if(type=="prv"){

	}
	if(type=="bsn"){

	}
}