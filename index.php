<?
/*
  ---------------------------------------------
  ---------------------------------------------
                  Global $Data
  ---------------------------------------------
  Author:        The Matrix
  E-mail:        martix_1220@mail.ru
  ---------------------------------------------
   m-module
   r-redirect url
   u-array url
  ---------------------------------------------
  ---------------------------------------------
*/ 
 $data=array();
 ob_start();
 // include resoures
 foreach(scandir('functions') as $temp) if(is_file('functions/'.$temp)) include('functions/'.$temp);
 // set
 $data['t']=array();
 $data['r']=$_SERVER['REQUEST_URI'];
 $data['r']=substr($data['r'],1);
 $temp=strpos($data['r'],'?');
 if($temp===false) $temp=strlen($data['r']);
 $data['r']=substr($data['r'],0,$temp);
 if($data['r']=='') $data['r']='index.html';
 $data['r']=urldecode($data['r']);
 $data['u']=explode('/',$data['r']);
 $data['stom']=new Stom();
 $data['cookie']=new cookie();
 //$data['b']=['buffer'=>[],'output'=>[],'block'=>[],'index'=>-1];
 // begin
 foreach(arrayread('modules/begin.txt') as $temp) func('modules/'.$temp.'/begin.php');
 // access
 foreach(arrayread('modules/access.txt') as $temp) {
  $data['m']=$temp;
  $data['t'][0]=$data['m'];
  if($temp1=func('modules/'.$temp.'/access.php',$data['u'],$data['r'])) break;
 }
 if(!$temp1) error(404);
 //
 ob_end_flush();
 //print_r($data);
?>