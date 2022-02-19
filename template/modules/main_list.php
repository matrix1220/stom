<form class="form-inline my-2 my-lg-0">
<?
if(isset($data['cookie']->get['filter_doctor'])) {echo '<input type="hidden" name="doctor" value="'.$data['cookie']->get['filter_doctor'].'">';}
if(isset($data['cookie']->get['filter_client'])) {echo '<input type="hidden" name="client" value="'.$data['cookie']->get['filter_client'].'">';}
?>
  <input class="form-control mr-sm-2" type="date" name="from" value="<?
   if(isset($data['cookie']->get['dayfrom'])) {echo $data['cookie']->get['dayfrom'];} else {echo date('Y-m-d');} ?>" onchange="change();">
  <input class="form-control mr-sm-2" type="date" name="to" value="<?
   if(isset($data['cookie']->get['dayto'])) {echo $data['cookie']->get['dayto'];} else {echo date('Y-m-d');} ?>" onchange="change();">
<? if($data['stom']->type!=2) { ?>
  <div class="input-group mr-sm-2">
    <span class="input-group-addon">Doktor</span>
    <span class="input-group-btn">
      <a class="btn btn-secondary" href="<?
      if(isset($data['cookie']->get['filter_doctor'])) {echo"?remove_filter=doctor";} 
      else {echo "/doctor/?selectto=filter";} ?>"><?
      if(isset($data['cookie']->get['filter_doctor'])) {
        $temp=$data['stom']->doctor($data['cookie']->get['filter_doctor']);
        echo $temp['fullname'];
      } else {echo "Barchasi";} ?></a>
    </span>
  </div>
<? } ?>
  <div class="input-group mr-sm-2">
    <span class="input-group-addon">Mijoz</span>
    <span class="input-group-btn">
      <a class="btn btn-secondary" href="<?
      if(isset($data['cookie']->get['filter_client'])) {echo"?remove_filter=client";} 
      else {echo "/client/?selectto=filter";} ?>"><?
      if(isset($data['cookie']->get['filter_client'])) {
        $temp=$data['stom']->client($data['cookie']->get['filter_client']);
        echo $temp['fullname'];
      } else {echo "Barchasi";} ?></a>
    </span>
  </div>
  <? if(in_array($data['stom']->type,[1,2])) {?>
    <a class="btn btn-secondary" href="add/">Qo'shish</a>
  <?}?>
</form><br>
<div id="content"></div>
<script>
function change() {
  var str='dayto='+$('input[name=to]').val()+'&dayfrom='+$('input[name=from]').val()+'&type=2';
  $.get('/search/',str,function(data){
    $('#content').html(data);
  });
}
change();
</script>