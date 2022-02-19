var L=false;
var url='/';
function loading(p) {
  if(p!==undefined) {if(p.response=='false'||!p.response) {L=false;} else {var t=L;L=true;if(!t)loading();}} else
  if(!L) {
    $("#loading").css('display','none');
  } else {console.log('a');
    $("#loading").css('display','');
    if($("#loading").text()=='Loading...') {$("#loading").text('Loading');} else
    if($("#loading").text()=='Loading') {$("#loading").text('Loading.');} else
    if($("#loading").text()=='Loading.') {$("#loading").text('Loading..');} else
    {$("#loading").text('Loading...');}
    setTimeout(loading,200);
  }
}
loading({reponse:true});
var request=new XMLHttpRequest(),working=false,send=[];

request.onreadystatechange=function(){
 if(request.readyState==4) {
  working=false;
  var temp={
    response:request.responseText,
    request:send[0][1],
    responseHeader:request.getResponseHeader('Blue-Module'),
    requestHeader:send[0][0]
  };
 	eval(temp.responseHeader)(temp);
  send.shift();
  if(send.length>0) {
    working=true;
    request.open('POST','/sync/',true);
    request.setRequestHeader('Blue-Module',send[0][0]);
    request.send(send[0][1]);
  } else {loading({response:false});}
 }
};

function sync(p) {
 send.push([p.substr(0,p.indexOf(' ')),p.substr(p.indexOf(' ')+1)]);
 if(!working && send.length==1){
  working=true; loading({response:true});
 	request.open('POST','/sync/',true);
  request.setRequestHeader('Blue-Module',send[0][0]);
 	request.send(send[0][1]);
 }
}

function error(p) {
	alert(p.response);
}

function ok(p) {console.log(p);
  alert(p.response);
}
$(document).ready(function(){
var w = window.innerWidth
|| document.documentElement.clientWidth
|| document.body.clientWidth;

var h = window.innerHeight
|| document.documentElement.clientHeight
|| document.body.clientHeight;
var  type='type1';
if(w<720) {type='type2';}
document.cookie='type='+type+';';
sync('load '+url);
});