<?
 $data['login']=false;
 if(isset($_COOKIE['login'])) {
 	$temp=$data['stom']->login($_COOKIE['login'],$_COOKIE['password']);
 	if($temp!==false) $data['login']=true;
 	//print_r($data['login']);
 }
?>