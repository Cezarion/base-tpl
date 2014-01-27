<?php
/* * ********************************************************************************************************
 *
 * Created on 28 fév. 2012
 *
 * Main conteneur for pages
 *
 * @author Mathias Gorenflot
 * @copyright   © Inconito
 *
 * @infos : UTF-8
 *
 * ***************************************** */

//Load Config
require_once 'app-config.php';
?>

<?php $app->get_header(); ?>

<?php $app->get_nav(); ?>

<section id="main" class="column">
    <?php $app->get_template(); ?>
</section>

<?php $app->get_footer(); ?>