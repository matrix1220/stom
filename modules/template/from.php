<?
	if(empty($temp)) error(500);
	$temp1=opendir('modules');
	while($value=readdir($temp1)) if(file_exists('modules/'.$value.'/template.'.$temp.'.php')) {
		include('modules/'.$value.'/template.'.$temp.'.php');
	}
?>