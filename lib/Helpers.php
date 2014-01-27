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



/*
|--------------------------------------------------------------------------
| APP DEBUG
|--------------------------------------------------------------------------
|
*/

if( !function_exists( '_pr') )
{
  function _pr( $what )
  {
      echo PHP_EOL;
      print_r($what);
  }
}

if( !function_exists( '_prd') )
{
  function _prd( $what )
  {
      _pr($what);
      die();
  }
}

if( !function_exists( '_vd') )
{
  function _vd( $what )
  {
      var_dump($what);
  }
}

if( !function_exists( '_vdd') )
{
  function _vdd( $what )
  {
      _vd($what);
      die();
  }
}
