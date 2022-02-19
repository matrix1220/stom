<?
	$ret=array(array('Id','Ism Familiya'));
	foreach ($data['stom']->searchDoctor($_REQUEST['s']) as $line) {
		if($_GET['selectto']=='filter') {$temp='/list/?doctor='.$line['id'];}
		elseif($_GET['selectto']=='add') {$temp='/list/add/?doctor='.$line['id'];}
		elseif($_GET['selectto']=='edit') {$temp='/list/edit/'.$data['cookie']->get['edit_id'].'?doctor='.$line['id'];}
		else {$temp='view/'.$line['id'];}
		$ret[]=array($line['id'],'<a href="'.$temp.'">'.$line['fullname'].'</a>');
	}
	tempmodule('table',$ret);
?>