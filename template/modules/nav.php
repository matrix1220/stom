<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false"><span class="navbar-toggler-icon"></span></button>
  <a class="navbar-brand" href="/index.html">Stomatologiya</a>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link<? if($temp==0) echo ' active'; ?>" href="/list/">Ro'yxat</a>
      </li>
      <li class="nav-item">
        <a class="nav-link<? if($temp==1) echo ' active'; ?>" href="/doctor/">Doktorlar</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link<? if($temp==2) echo ' active'; ?>" href="/client/">Mijozlar</a>
      </li> 
	</ul>
    <span class="navbar-text mr-sm-3">
      <? echo $data['stom']->name; ?>
    </span>
  <a href="/logout.html" class="btn btn-secondary" role="button" aria-disabled="true">Chiqish</a>
  </div>
</nav>
<br>