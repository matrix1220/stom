<?
if($temp1=='search/' and in_array($_REQUEST['type'],[0,1,2])) {
	$ret=[];
	if($_REQUEST['type']==0) {$ret=modulefunction('client','search',$_REQUEST['s']);}
	elseif($_REQUEST['type']==1) {$ret=modulefunction('doctor','search',$_REQUEST['s']);}
	else {$ret=modulefunction('list','search',$_REQUEST['s']);}
	//tempmodule('table',$ret);
	return true;
}
return false;
?>