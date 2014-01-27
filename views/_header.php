<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title><?php Html::title() ?></title>

           <?php Html::style(); ?>
    <!--[if lt IE 9]>
    <?php Html::style('ie'); ?>
    <?php Html::script(array('http://html5shim.googlecode.com/svn/trunk' => 'html5' )); ?>
    <![endif]-->
</head>

<body>

    <header id="header">
        <hgroup>
            <h1 class="site_title">
                <?= Html::home_url( Html::site_name() ); ?>
            </h1>
        </hgroup>
    </header> <!-- end of header bar -->