<?
 function error($err=null) {
  global $data;
  if($err==null){$err="Nomalum xalotik";}
  $temp=debug_backtrace();
  if(gettype($err)=='integer') {
   header('HTTP/1.1 '.$err.' Error',true);
   header('Content-Type:text/html',true);
   ob_end_flush();
   include('template/errors/'.$err.'.php');
  } else {echo $err;}
  exit;
 }
 /*
 function error_handler(Exception $e) {
  block_start('html,panel-danger,panel-heading,#a');
  echo $e->getMessage();
  block_end('a');
 }
 set_exception_handler("error_handler");
 error_reporting( E_ALL );
 */
?>