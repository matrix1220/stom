<?
if(count($temp)<2) return false;
if($data['login']==false) return false;
$temp1=array_shift($temp);
$temp=implode('/', $temp);
ob_start();
$temp2=module($temp1,$temp);
$temp=ob_get_clean();
if($temp2==true) {
	ob_start();
	tempmodule('nav',array_search($temp1,['list','doctor','client']));
	tempmodule('index',ob_get_clean().$temp);
	return true;
}
return false;
?>