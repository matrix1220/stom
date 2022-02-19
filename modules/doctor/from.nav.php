<?
 if($data['stom']->type==0) {
	if($temp=='add/') {
			if(isset($_REQUEST['name'])) {
				$temp=$data['stom']->newDoctor($_REQUEST['name'],$_REQUEST['login'],$_REQUEST['password']);
				header('Location: /doctor/view/'.$temp);
			} else {
				tempmodule('add_doctor');
			}
			return true;
	} else {
		$temp1=explode('/',$temp);
		if($temp1[0]=='edit' and count($temp1)==2 and is_numeric($temp1[1])) {
			$temp1=$data['stom']->doctor($temp1[1]);
			if($temp1) {
				if(isset($_REQUEST['name'])) {
					$data['stom']->editDoctor($temp1['id'],$_REQUEST['name'],$_REQUEST['login'],$_REQUEST['password']);
					header('Location: /doctor/view/'.$temp1['id']);
				} else {
					tempmodule('add_doctor',array($temp1['fullname'],$temp1['login'],$temp1['password']));
				}
				return true;
			}
		} elseif($temp1[0]=='delete' and count($temp1)==2 and is_numeric($temp1[1])) {
			$temp1=$data['stom']->doctor($temp1[1]);
			if($temp1) {
				$data['stom']->deleteDoctor($temp1['id']);
				tempmodule('ok','/doctor/');
				return true;
			}
		}
	}
 }
 	if($temp=='') {
 		tempmodule('main_doctor');
		return true;	
 	} else {
	 	$temp1=explode('/',$temp);
		if($temp1[0]=='view' and count($temp1)==2 and is_numeric($temp1[1])) {
			$temp1=$data['stom']->doctor($temp1[1]);
			if($temp1) {
				$temp2=array(
					array('Parametr','Qiymat'),
					array('Id',$temp1['id']),
					array('Ism Familiya',$temp1['fullname'])
				);
				if($data['stom']->type==0) {
					$temp2[]=array('Login',$temp1['login']);
					$temp2[]=array('Parol',$temp1['password']);
				}
				tempmodule('table',$temp2);
				if($data['stom']->type!=2) {
					tempmodule('button',array('/list/?doctor='.$temp1[1][1],'Ro\'yxatda ko\'rish'));
				}
				if($data['stom']->type==0) {
					tempmodule('button',array('/doctor/edit/'.$temp1['id'],'Taxrirlash'));
					tempmodule('button',array('/doctor/delete/'.$temp1['id'],'O\'chirish'));
				}
				return true;
			}
		}
	}

 return false;
?>