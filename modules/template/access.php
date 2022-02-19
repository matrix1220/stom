<?
if($temp1=='index.html') {
	if($data['login']==false) {
		header('Location: /login.html');
		return true;
	}
	header('location: /client/');
	//ob_start();
	//func('modules/template/index.php');
	//tempmodule('index',ob_get_clean());
	return true;
} elseif(is_file('template/files/'.$temp1)) {
	modulefunc('read','template/files/'.$temp1);
 	return true;
}
return false;
?>