<?
 if($data['login']==0) {
	if($temp=='') {
		$ret=array(array('Id','Xizmat','Batafsil'));
		foreach (mysqlquerys('SELECT * FROM methods') as $line) {
			$ret[]=array($line['id'],$line['shortname'],$line['description']);
		}
		tempmodule('table',$ret);
		tempmodule('button',array(array('add/',"Qo'shish")));
		return true;
	} elseif($temp=='add/') {
		return true;
	} elseif($temp=='edit/') {
		return true;
	}
 } elseif($data['login']==1) {
	if($temp=='') {
		$ret=array(array('Id','Xizmat','Batafsil'));
		foreach (mysqlquerys('SELECT * FROM methods') as $line) {
			$ret[]=array($line['id'],$line['shortname'],$line['description']);
		}
		tempmodule('table',$ret);
		tempmodule('button',array(array('add/',"Qo'shish")));
		return true;
	}
 } else {
 	if($temp=='') {
		$ret=array(array('Xizmat','Batafsil'));
		foreach (mysqlquerys('SELECT * FROM methods') as $line) {
			$ret[]=array($line['shortname'],$line['description']);
		}
		tempmodule('table',$ret);
		tempmodule('button',array(array('add/',"Qo'shish")));
		return true;
	}
 }
 return false;
?>