<form>
<div class="form-group row">
  <label for="name" class="col-2 col-form-label">Doktor Ismi</label>
  <div class="col-10">
    <input class="form-control" type="text" id="name" name="name" value="<? echo $temp[0]; ?>">
  </div>
</div>
<div class="form-group row">
  <label for="login" class="col-2 col-form-label">Login</label>
  <div class="col-10">
    <input class="form-control" type="text" id="login" name="login" value="<? echo $temp[1]; ?>">
  </div>
</div>
<div class="form-group row">
  <label for="password" class="col-2 col-form-label">Parol</label>
  <div class="col-10">
    <input class="form-control" type="text" id="password" name="password" value="<? echo $temp[2]; ?>">
  </div>
</div>
<button type="submit" class="btn btn-secondary">Saqlash</button>
</form>