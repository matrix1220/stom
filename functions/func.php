<?
function func($dontuse,$temp=null,$temp1=null) {
	Global $data;
	if(file_exists($dontuse)) {return include($dontuse);} else {return null;}
}
?>