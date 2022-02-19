<form>
<div class="form-group row">
  <label for="name" class="col-2 col-form-label">Ism Familiya</label>
  <div class="col-10">
    <input class="form-control" type="text" id="name" name="name" value="<? echo $temp[0]; ?>">
  </div>
</div>
<div class="form-group row">
  <label for="birth" class="col-2 col-form-label">Tug'ilgan sana</label>
  <div class="col-10">
    <input class="form-control" type="number" id="birth" name="birth" value="<? echo $temp[1]; ?>">
  </div>
</div>
<div class="form-group row">
  <label for="address" class="col-2 col-form-label">Manzil</label>
  <div class="col-10">
    <input class="form-control" type="text" id="address" name="address" value="<? echo $temp[2]; ?>">
  </div>
</div>
<button type="submit" class="btn btn-secondary">Saqlash</button>
</form>