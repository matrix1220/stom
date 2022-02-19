<?
	$filters=[];
	if(isset($data['cookie']->get['filter_client'])) {
		$filters['client']=$data['cookie']->get['filter_client'];
	}
	if(isset($data['cookie']->get['filter_doctor'])) {
		$filters['doctor']=$data['cookie']->get['filter_doctor'];
	}
	if(isset($_GET['dayto']) and isset($_GET['dayfrom'])) {
		$data['cookie']->set('dayto',$_GET['dayto']);
		$data['cookie']->set('dayfrom',$_GET['dayfrom']);
		$filters['day']=[intval(strtotime($_GET['dayfrom'])),intval(strtotime($_GET['dayto']))];
	}
	//print_r($filters);
	$ret=array(array('Id','Mijoz','Doktor','Pul','Vaqt'));
	$temp2=0;
	foreach ($data['stom']->listt($filters) as $line) {
		$temp=$data['stom']->client($line['client']);
		$temp1['client']=$temp['fullname'];
		$temp=$data['stom']->doctor($line['doctor']);
		$temp1['doctor']=$temp['fullname'];
		//$temp=$data['stom']->list($line['client']);
		//$temp1['method']=$temp['shortname'];
		$temp2+=$line['money'];
		$ret[]=array('<a href="/list/view/'.$line['id'].'">'.$line['id']."</a>",$temp1['client'],$temp1['doctor'],$line['money'],date('d-m-Y',$line['time']));
	}
	tempmodule('table',$ret);
	if($data['stom']->type==0) {
		echo "Jami:".$temp2."so'm.";
	}
?>