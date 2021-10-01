<?php
use yii\helpers\Url;

?>    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
  <a class="navbar-brand brand-logo" href="<?=Url::to(['/'])?>">HRMS</a>
  <a class="navbar-brand brand-logo-mini" href="<?=Url::to(['/'])?>">HRMS</a>
</div>
<div class="navbar-menu-wrapper d-flex align-items-stretch">
  <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
    <span class="mdi mdi-menu"></span>
  </button>
  <div class="search-field d-none d-md-block">
    <form class="d-flex align-items-center h-100" action="#">
      <div class="input-group">
      </div>
    </form>
  </div>
  <ul class="navbar-nav navbar-nav-right">
    <li class="nav-item nav-profile dropdown">
      <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
        <div class="nav-profile-text">
          <p class="mb-1 text-black"><?=Yii::$app->user->identity->username?></p>
        </div>
      </a>
      <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
        <a class="dropdown-item" href="<?=Url::to(['/site/logout'])?>" data-method="POST">
          <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
      </div>
    </li>
    </ul>
  <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
    <span class="mdi mdi-menu"></span>
  </button>
</div>
</nav>
