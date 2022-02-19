<?
 if($data['stom']->type==1) {
	if($temp=='add/') {
		if(isset($_REQUEST['birth'])) {
			if(empty($_REQUEST['name'])) {
				tempmodule('error','/client/add/');
			} else {
				$temp=$data['stom']->newClient($_REQUEST['name'],$_REQUEST['birth'],$_REQUEST['address']);
				header('Location: /client/view/'.$temp);
			}
		} else {
			tempmodule('add_client',[$_REQUEST['name']]);
		}
		return true;
	} else {
		$temp1=explode('/',$temp);
		if($temp1[0]=='edit' and count($temp1)==2 and is_numeric($temp1[1])) {
			$temp1=$data['stom']->client($temp1[1]);
			if($temp1) {
				if(isset($_REQUEST['name'])) {
					$data['stom']->editClient($temp1['id'],$_REQUEST['name'],$_REQUEST['birth'],$_REQUEST['address']);
					header('Location: /client/view/'.$temp1['id']);
				} else {
					tempmodule('add_client',array($temp1['fullname'],$temp1['birth'],$temp1['address']));
				}
				return true;
			}
		} elseif($temp1[0]=='delete' and count($temp1)==2 and is_numeric($temp1[1])) {
			$temp1=$data['stom']->client($temp1[1]);
			if($temp1) {
				$data['stom']->deleteClient($temp1['id']);
				tempmodule('ok','/client/');
				return true;
			}
		}
	}
 }

 	if($temp=='') {
 		tempmodule('main_client');
		return true;
 	} else {
	 	$temp1=explode('/',$temp);
		if($temp1[0]=='view' and count($temp1)==2 and is_numeric($temp1[1])) {
			$temp1=$data['stom']->client($temp1[1]);
			if($temp1) {
				$temp1=array(
					array('Parametr','Qiymat'),
					array('Id',$temp1['id']),
					array('Ism Familiya',$temp1['fullname']),
					array('Tu\'gilgan kun',$temp1['birth']),
					array('Manzil',$temp1['address'])
				);
				tempmodule('table',$temp1);
				tempmodule('button',array('/list/?client='.$temp1[1][1],'Ro\'yxatda ko\'rish'));
				if($data['stom']->type==1) {
					tempmodule('button',array('/client/edit/'.$temp1[1][1],'Taxrirlash'));
					//tempmodule('button',array('/client/delete/'.$temp1[1][1],'O\'chirish'));
					tempmodule('button',array('/list/add/?client='.$temp1[1][1],'Ro\'yxatga olish'));
				}
 	 if(isset($data['cookie']->get['select_client'])) $data['cookie']->set('select_client',null);
 	 if(isset($data['cookie']->get['select_doctor'])) $data['cookie']->set('select_doctor',null);
				return true;
			}
		}
	}
 return false;
?>