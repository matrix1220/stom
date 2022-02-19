<?
/*
function mysqlquerys($query) {
	Global $data;
	$temp=mysql_query($query,$data['conn']);
	if(gettype($temp)=='boolean'){return false;}
	$ret=array();
	while($temp1=mysql_fetch_array($temp,MYSQL_ASSOC)) {
		array_push($ret,$temp1);
	}
	return $ret;
}
function mysqlquery($query) {
	Global $data;
	$temp=mysql_query($query,$data['conn']);
	if(gettype($temp)=='boolean'){return $temp;}
	return mysql_fetch_array($temp,MYSQL_ASSOC);
}
function mysqlconnect() {
	Global $data;
	$data['conn']=mysql_connect($data['host'],$data['db']['user'],$data['db']['pass']);
	mysql_select_db($data['db']['name']);
}
function mysqlclose() {
	Global $data;
	mysql_close($data['conn']);
}
*/
?>