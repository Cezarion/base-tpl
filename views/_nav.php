<!-- start of sidebar -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?= Html::home_url( Html::site_name() , array('class' => 'navbar-brand')); ?>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><?= Html::home_url( "Home" ); ?></li>
            <li><?= Html::app_url( 'Page' , 'page' ); ?></li>
          </ul>
        </div>
    </div>
</div>
<!-- end of sidebar -->