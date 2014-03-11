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



 // =========

 define('SITE_PATH','');

// =========

define('__ROOT__', dirname(__FILE__));
require_once __ROOT__.'/lib/loader.php';

// =========

 $config = array
 (
    'site_name'=> 'Template de Base Intégration',
    'site_url' => BASE_URL,
    'style'    => array(
                        'css/vendor' => 'bootstrap.min' ,
                        'app'
                    ),
    'script'   => array(
                        'js/vendor'  => 'bootstrap.min',
                        'plugins',
                        'app'
                     ),
    'page'     => array(
                      'home'      => array(
                          'title'    => 'Accueil',
                          'class'    => 'home style',
                          'script'   => 'my-custom-script',
                        ),
                        'exemple' => array(
                            'title'  => 'Page d\'exemple',
                            'script' => array('js/vendor/bootstrap' => array('button','alert')),
                          ),
                        'test'    => array(
                            'title'  => 'Page de test',
                          )
                      )
 );


// =========

// Set template :
Tpl::init();
$html = new Html( $config );