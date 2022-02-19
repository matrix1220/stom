<?
if($data['r']=='login.html') {
	if(isset($_POST['login'])) {
		$temp=$data['stom']->login($_POST['login'],md5($_POST['password']));
 		if($temp!==false) {
		 	setcookie('login',$_POST['login']);
			setcookie('password',md5($_POST['password']));
			header('Location: /index.html');
		} else {
			ob_start();
			tempmodule('login',false);
			tempblock('index');
		}
	} else {
		ob_start();
		tempmodule('login');
		tempblock('index');
	}
	return true;
}
return false;
?>