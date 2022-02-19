<?
 function module($dontuse3,$temp=null,$temp1=null) {
  global $data;
  $data['m']=$dontuse3;
  $dontuse1=end($data['t']);
  array_push($data['t'],$data['m']); /*echo 'modules/'.$r.'/from.'.$temp2.'.php';*/
  if(file_exists('modules/'.$dontuse3.'/from.'.$dontuse1.'.php')) {
    $dontuse2=include('modules/'.$dontuse3.'/from.'.$dontuse1.'.php');
  } else if(file_exists('modules/'.$dontuse3.'/from.php')) {
    $dontuse2=include('modules/'.$dontuse3.'/from.php');
  } else {
    error(500);
  }
  $data['m']=array_pop($data['t']);
  return $dontuse2;
 }
?>