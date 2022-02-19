<?
 $url=$temp;
 $temp=arrayread('types.txt'); //print_r($temp);
 foreach ($temp as $value) {
 	$value=explode(':',$value);
 	$temp2[$value[0]]=$value[1];
 } $temp=$temp2;
 $temp2=explode('.',$url); $temp2=end($temp2);
 if(array_key_exists($temp2,$temp)){$temp2=$temp[$temp2];} else {$temp2=mime_content_type($url);}
 header('Content-Type:'.$temp2,true);
 $temp1=explode('=',$_SERVER['HTTP_RANGE']);
 $range=$temp1[0];
 if($range=='') {$range='bytes';}
 header('Accept-Ranges:'.$range,true);
 $temp1=explode('-',$temp1[1]);
 if(empty($temp1[0])){$temp1[0]=0;}
 if(empty($temp1[1])){$temp1[1]=filesize($url);}
 header('Content-Length:'.filesize($url));
 header('Content-Ranges:'.$range.' '.$temp1[0].'-'.$temp1[1],true);
 $temp2=0;
 $temp=fopen($url,'r');
 while($temp2!==$temp1[0]) {
 	$temp4=1024;
 	if($temp4>$temp1[0]-$temp2){$temp4=$temp1[0]-$temp2;}
 	$temp2+=$temp4;
 	fread($temp,$temp4);
 }
 while($temp2!==$temp1[1]) {
 	$temp4=1024;
 	if($temp4>$temp1[1]-$temp2){$temp4=$temp1[1]-$temp2;}
 	$temp2+=$temp4;
 	echo fread($temp,$temp4);
 }
?>