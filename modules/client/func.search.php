<?
	$ret=array(array('Id','Ism Familiya','Tug\'ilgan sana'));
	foreach ($data['stom']->searchClient($_REQUEST['s']) as $line) {
		if($_GET['selectto']=='filter') {$temp='/list/?client='.$line['id'];}
		elseif($_GET['selectto']=='add') {$temp='/list/add/?client='.$line['id'];}
		elseif($_GET['selectto']=='edit') {$temp='/list/edit/'.$data['cookie']->get['edit_id'].'?client='.$line['id'];}
		else {$temp='view/'.$line['id'];}
		$ret[]=array('<a href="'.$temp.'">'.$line['id'].'</a>','<a href="'.$temp.'">'.$line['fullname'].'</a>',$line['birth']);
	}
	tempmodule('table',$ret);
?>