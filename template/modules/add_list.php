<form class="row">
	<div class="col-sm-10">
<? if($data['stom']->type==1) {?>
		<div class="form-group row">
		  <label class="col-2 col-form-label">Doktor</label>
		  <div class="col-10">
		    <a class="btn btn-secondary" href="/doctor/?selectto=add"><? $temp=$data['stom']->doctor($data['cookie']->get['select_doctor']); echo $temp['fullname']; ?></a>
		  </div>
		</div>
<? } ?>
		<div class="form-group row">
		  <label class="col-2 col-form-label">Mijoz</label>
		  <div class="col-10">
		    <a class="btn btn-secondary" href="/client/?selectto=add"><? $temp=$data['stom']->client($data['cookie']->get['select_client']); echo $temp['fullname']; ?></a>
		  </div>
		</div>
		<div class="form-group row">
		  <label for="money" class="col-2 col-form-label">Xizmat xaqi</label>
		  <div class="col-10">
		    <input class="form-control" type="number" id="money" name="money" value="">
		  </div>
		</div>
		<div class="form-group row">
		  <label for="description" class="col-2 col-form-label">Xizmat turi</label>
		  <div class="col-10">
		    <textarea class="form-control" type="" id="description" name="description" rows="6"></textarea>
		  </div>
		</div>
	 	<button type="submit" class="btn btn-secondary">Tasdiqlash</button>
 	</div>
</form>