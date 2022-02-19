<?
 if(in_array($data['stom']->type,[1,2])) {
	if($temp=='add/') {
		 if(isset($_GET['client'])) {
		  $data['cookie']->set('select_client',$_GET['client']);
		 }
		 if($data['stom']->type==2) {
		 	$data['cookie']->set('select_doctor',$data['stom']->id);
		 } else {
			if(isset($_GET['doctor'])) {
			 $data['cookie']->set('select_doctor',$_GET['doctor']);
			}
		}
 		if(!isset($data['cookie']->get['select_client'])) {
 			header("Location: /client/?selectto=add");
 		} elseif(!isset($data['cookie']->get['select_doctor'])) {
 			header("Location: /doctor/?selectto=add");
 		} elseif(!isset($_GET['money'])) {
 			tempmodule('add_list');
 		} elseif(empty($_GET['money'])) {
			tempmodule('error','/list/add/');
		} else {
 			$data['stom']->newList($_GET['money'],$data['cookie']->get['select_client'],$data['cookie']->get['select_doctor'],$_GET['description']);
 			$data['cookie']->set('select_doctor',null);
 			$data['cookie']->set('select_client',null);
 			tempmodule('ok','/list/');
 		}
 		return true;
 	} else {
		$temp1=explode('/',$temp);
		if($temp1[0]=='edit' and count($temp1)==2 and is_numeric($temp1[1])) {
			$temp1=$data['stom']->viewList($temp1[1]);
			if($temp1) {
				if(isset($_GET['client'])) {
					$data['cookie']->set('edit_client',$_GET['client']);
				}
				if($data['stom']->type==2) {
					$data['cookie']->set('edit_doctor',$data['stom']->id);
				} else {
					if(isset($_GET['doctor'])) {
						$data['cookie']->set('edit_doctor',$_GET['doctor']);
					}
				}
				if(isset($_REQUEST['money'])) {
					$data['stom']->editList($temp1['id'],$_REQUEST['money'],$data['cookie']->get['edit_client'],$data['cookie']->get['edit_doctor'],$_REQUEST['description']);
					$data['cookie']->set('edit_client',null);
					$data['cookie']->set('edit_doctor',null);
					header('Location: /list/view/'.$temp1['id']);
				} else {
					$data['cookie']->set('edit_id',$temp1['id']);
					if(!isset($data['cookie']->get['edit_client'])) $data['cookie']->set('edit_client',$temp1['clientId']);
					if(!isset($data['cookie']->get['edit_client'])) $data['cookie']->set('edit_doctor',$temp1['doctorId']);
					tempmodule('edit_list',array($temp1['money'],$temp1['description']));
				}
				return true;
			}
		} elseif($temp1[0]=='delete' and count($temp1)==2 and is_numeric($temp1[1])) {
			$temp1=$data['stom']->viewList($temp1[1]);
			if($temp1) {
				$data['stom']->deleteList($temp1['id']);
				tempmodule('ok','/list/');
				return true;
			}
		}
 	}
 }
 if($temp=='') {
 	 if(isset($data['cookie']->get['edit_client'])) $data['cookie']->set('edit_client',null);
 	 if(isset($data['cookie']->get['edit_doctor'])) $data['cookie']->set('edit_doctor',null);
 	 if(isset($data['cookie']->get['select_client'])) $data['cookie']->set('select_client',null);
 	 if(isset($data['cookie']->get['select_doctor'])) $data['cookie']->set('select_doctor',null);
	 if($_GET['remove_filter']=='client') {$data['cookie']->set('filter_client',null);}
	 if($_GET['remove_filter']=='doctor') {$data['cookie']->set('filter_doctor',null);}
	 if(isset($_GET['client'])) {$data['cookie']->set('filter_client',$_GET['client']);}
	 if(isset($_GET['doctor'])) {$data['cookie']->set('filter_doctor',$_GET['doctor']);}
	tempmodule('main_list');
	return true;
 } else {
	 	$temp1=explode('/',$temp);
		if($temp1[0]=='view' and count($temp1)==2 and is_numeric($temp1[1])) {
			$temp1=$data['stom']->viewList($temp1[1]);
			if($temp1) {
				$temp2=array(
					array('Parametr','Qiymat'),
					array('Id',$temp1['id']),
					array('Doktor',$temp1['doctor']),
					array('Mijoz',$temp1['client']),
					array('Xizmat xaqqi',$temp1['money']),
					array('Sana',$temp1['date']),
					array('Registrator',$temp1['from']),
					array('Qo\'shimcha ma\'lumot',$temp1['description'])
				);
				tempmodule('table',$temp2);
				if($data['stom']->type==1 or $data['stom']->type.$data['stom']->id==$temp1['status']) {
					tempmodule('button',array('/list/edit/'.$temp1['id'],'Taxrirlash'));
					tempmodule('button',array('/list/delete/'.$temp1['id'],'O\'chirish'));
				}
				return true;
			}
		}
	}
 return false;
?>