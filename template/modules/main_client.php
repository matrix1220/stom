<form class="form-inline">
  <div class="form-group mr-sm-2">
    <label for="search" class="sr-only">Qidirish</label>
    <input type="text" class="form-control" id="search" name="search" placeholder="Qidirish...">
  </div>
<? if($data['stom']->type==1) {?>
	<a id=add class="btn btn-secondary" href="add/">Qo'shish</a>
<?}?>
</form><br>
<div id="content"></div>
<script>
	function keyup() {
	  $.get('/search/','s='+$('#search').val()+'&type=0<? if(isset($_GET['selectto'])) echo "&selectto=".$_GET['selectto']; ?>',set);
<? if($data['stom']->type==1) {?>
	  $('#add').attr('href','add/?name='+encodeURI($('#search').val()));
<? } ?>
	}
	function set(data) {
			$('#content').html(data);
	}
	$('#search').keyup(keyup);
	keyup();
</script>