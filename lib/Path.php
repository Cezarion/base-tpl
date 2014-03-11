<?php

/* * ********************************************************************************************************
 *
 * Created on 6 mars 2012
 *
 * Description of template class
 *
 * @author Cezarion
 * @copyright   © Cezarion
 *
 * @infos : UTF-8
 *
 * ***************************************** */

 // CONFIGURATION

define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'] .'/'. SITE_PATH );
define('BASE_PATH', __ROOT__. '/');

define('VIEWS_PATH', BASE_PATH . 'views/');


define('ASSETS_PATH', 'assets');
define('DATAS_PATH',  'assets');
define('CSS_PATH',    'assets/css');
define('JS_PATH',     'assets/js');
define('LESS_PATH',   'assets/less');
define('IMG_PATH',    'assets/img');
define('FONTS_PATH',  'assets/fonts');

define('ASSETS_URL',  BASE_URL.'assets');
define('DATAS_URL',   BASE_URL.'datas');