<?php

/* * ********************************************************************************************************
 *
 * Created on 6 mars 2012
 *
 * Description of template class
 *
 * @author inconito
 * @copyright   © Inconito
 *
 * @infos : UTF-8
 *
 * ***************************************** */



 // =========

 define('SITE_PATH','_base-tpl_');

// =========

define('__ROOT__', dirname(__FILE__));
require_once __ROOT__.'/lib/loader.php';

// =========

 $config = array
 (
    'site_name' => 'Template de Base Intégration',
    'site_url' => BASE_URL,
    'style' => array('app'),
    'script' => array('app'),
 );


// =========

// Set template :
$app = new Wrapper();
$app->setPageId();

// =========

// Set template :
$html = new Html( $config );