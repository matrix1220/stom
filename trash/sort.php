    <form class="form-inline my-2 my-lg-0">
      <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="sorttype">
        <option value="0" selected>Barchasi</option>
        <option value="1">Kun</option>
        <option value="2">Hafta</option>
        <option value="3">Oy</option>
      </select>
      <input class="form-control mr-sm-2" type="text" name="sortvalue" value="<? echo $_GET['sortvalue']; ?>">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Saralash</button>
    </form>
<!--
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
</div>

$('#myAlert').on('closed.bs.alert', function () {
  // do something…
})
-->
    <script>
      $('[name=sorttype]').val(<? if(isset($_GET['sorttype'])) {echo $_GET['sorttype'];} else {echo 0;} ?>);
      (function(){
        var v=$('[name=sorttype]').val(),inp=$('[name=sortvalue]');
        if(v==1) {inp.attr('type','date');inp.css('display','');}
        else if(v==2) {inp.attr('type','week');inp.css('display','');}
        else if(v==3) {inp.attr('type','month');inp.css('display','');}
        else {inp.css('display','none');}
      })();
      $('[name=sorttype]').change(function(){
        var v=$('[name=sorttype]').val(),inp=$('[name=sortvalue]');
        inp.val('');
        if(v==1) {inp.attr('type','date');inp.css('display','');}
        else if(v==2) {inp.attr('type','week');inp.css('display','');}
        else if(v==3) {inp.attr('type','month');inp.css('display','');}
        else {inp.css('display','none');}
      });
    </script>
<br>
<div class="input-group col-sm-4">
 doctor:
  <span class="input-group-addon" id="basic-addon1">1</span>
  <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
</div>