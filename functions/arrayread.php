<?
 function arrayread($file) {
  $temp=explode('
',file_get_contents($file)); 
  // foreach($temp as $temp1) {
  //  $temp1=explode(':',$temp1);
  //  $array[$temp1[0]]=$temp1[1];
  // }
  return $temp;
 }
?>