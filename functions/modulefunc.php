<?
function modulefunction($m,$f,$temp=null,$temp1=null) {
	Global $data;
	if(file_exists('modules/'.$m.'/func.'.$f.'.php')) {
			return func('modules/'.$m.'/func.'.$f.'.php',$temp,$temp1);
	} else {return null;}
}
function modulefunc($f,$temp=null,$temp1=null) {
	Global $data;
	$m=$data['m'];
	if(file_exists('modules/'.$m.'/func.'.$f.'.php')) {
			return func('modules/'.$m.'/func.'.$f.'.php',$temp,$temp1);
	} else {return null;}
}
?>