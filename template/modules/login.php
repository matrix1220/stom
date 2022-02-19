<div class="row align-items-center justify-content-center">
  <div class="col-4">
	<div class="card text-center">
	  <div class="card-block">
	    <h4 class="card-title">Kirish</h4>
      <? if($temp===false) {?>
      <div class="alert alert-danger" role="alert">
        <strong>Login yoki Parol</strong> noto'g'ri kiritildi.
      </div>
      <? } ?>
	    <form method="POST">
	 <div class="form-group row">
      <label for="login" class="col-3 col-form-label">Login</label>
      <div class="col-9">
        <input type="text" class="form-control" id="login" name="login" placeholder="login">
      </div>
    </div>
    <div class="form-group row">
      <label for="password" class="col-3 col-form-label">Parol</label>
      <div class="col-9">
        <input type="password" class="form-control" id="password" name="password" placeholder="Parol">
      </div>
    </div>
 	<div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Kirish</button>
      </div>
    </div>
 </form>
	  </div>
	</div>
  </div>
<script>
	$(window).resize(function(){
		$('div.row.align-items-center.justify-content-center').height($(window).height());
	});
	$('div.row.align-items-center.justify-content-center').height($(window).height());
</script>