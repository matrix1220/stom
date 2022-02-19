<form>
<? foreach ($temp as $value) {?>
	<input type="radio" name="client" value="<? echo $value[0]; ?>"><? echo $value[1]; ?><br>
<? } ?>
  <button type="submit" class="btn btn-secondary">Saqlash</button>
</form>