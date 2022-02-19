<?
if($temp1=='logout.html') {
	setcookie('login','');
	setcookie('password','');
	header('Location: /index.html');
	return true;
}
return false;
?>