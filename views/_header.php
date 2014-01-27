<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php Html::title() ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <?php Html::style(); ?>

    <!--[if lt IE 9]>
    <?php Html::style('ie'); ?>
    <?php Html::script(array('http://html5shim.googlecode.com/svn/trunk' => 'html5' )); ?>
    <![endif]-->

    <?php Html::script(array('js/vendor' => 'modernizr-2.6.2-respond-1.1.0.min' )); ?>
</head>

<body>
    <header id="header" class="container">
        <hgroup>
            <h1 class="site_title">
                <?= Html::home_url( Html::site_name() ); ?>
            </h1>
        </hgroup>
    </header> <!-- end of header bar -->