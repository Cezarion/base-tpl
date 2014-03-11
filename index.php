<?php
/* * ********************************************************************************************************
 *
 * Created on 28 fév. 2012
 *
 * Main conteneur for pages
 *
 * @author Mathias Gorenflot
 * @copyright   © Cezarion
 *
 * @infos : UTF-8
 *
 * ***************************************** */

//Load Config
require_once 'app-config.php';
?>
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
   <!-- Wrap all page content here -->
    <div id="wrap">
        <?php Tpl::nav() ?>

        <div id="main" class="container">

            <?php Tpl::header(); ?>

            <main class="row row-offcanvas row-offcanvas-right">
                <?php Tpl::content(); ?>
            </main>

            <hr>
        </div>
    </div>

    <?php Tpl::footer(); ?>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
    <?php Html::script(); ?>

    <script type="text/javascript">
    jQuery(document).ready(function($)
            {

            });
        </script>
    </body>
</html>