<table class="table table-striped table-hover">
  <thead>
    <tr>
<? foreach ($temp[0] as $value) { ?>
      <th><? echo $value; ?></th>
<? } array_shift($temp) ?>
    </tr>
  </thead>
  <tbody>
<? foreach ($temp as $value) { ?>
    <tr>
<? foreach ($value as $value1) { ?>
      <td><? echo $value1; ?></td>
<? } ?>
    </tr>
<? } ?>
  </tbody>
</table>
<!-- <th scope="row">1</th> -->