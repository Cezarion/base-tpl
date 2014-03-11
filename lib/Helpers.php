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

/*
|--------------------------------------------------------------------------
| String
|--------------------------------------------------------------------------
|
*/
if( !function_exists('humanize') )
{
  function humanize($str) {

    $str = trim(strtolower($str));
    $str = preg_replace('/[^a-z0-9\s+]/', ' ', $str);
    $str = preg_replace('/\s+/', ' ', $str);
    $str = explode(' ', $str);

    $str = array_map('ucwords', $str);

    return implode(' ', $str);
  }
}

if( !function_exists('camelcase2human') )
{
  function camelcase2human($str)
  {
    return ucwords( preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]|[0-9]{1,}/', ' $0', $str) );
  }
}

 /**
  * Transforms an under_scored_string to a camelCasedOne
  */
 if( !function_exists('camelize') )
 {
  function camelize($scored)
  {
    return lcfirst(
      implode(
        '',
        array_map(
          'ucfirst',
          array_map(
            'strtolower',
            explode(
              '_', $scored)))));
  }
}
  /**
  * Transforms a camelCasedString to an under_scored_one
  */
  if( !function_exists('underscore') )
  {
    function underscore($cameled)
    {
      return implode(
        '_',
        array_map(
          'strtolower',
          preg_split('/([A-Z]{1}[^A-Z]*)/', $cameled, -1, PREG_SPLIT_DELIM_CAPTURE|PREG_SPLIT_NO_EMPTY)));
    }
  }

if( !function_exists('slugify'))
{
  function slugify($text)
  {
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
    $text = trim($text, '-');
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = strtolower($text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    if (empty($text))
    {
      return 'n-a';
    }
    return $text;
  }
}



/*
|--------------------------------------------------------------------------
| APP DEBUG
|--------------------------------------------------------------------------
|
*/

if( !function_exists( 'pr') )
{
  function pr( $what )
  {
      echo PHP_EOL.'<pre>';
      print_r($what);
      echo PHP_EOL.'<pre>';
  }
}

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

/*
    Seriously, wtf?
    @link : https://gist.github.com/7639026
    @author : aaron fisher
*/
function wtf($var, $arrayOfObjectsToHide=array(), $fontSize=11)
{
    $text = print_r($var, true);
    $text = str_replace('<', '&lt;', $text);
    $text = str_replace('>', '&gt;', $text);

    foreach ($arrayOfObjectsToHide as $objectName) {
        $searchPattern = '#(\W'.$objectName.' Object\n(\s+)\().*?\n\2\)\n#s';
        $replace = "$1<span style=\"color: #FF9900;\">";
        $replace .= "--&gt; HIDDEN - courtesy of wtf() &lt;--</span>)";
        $text = preg_replace($searchPattern, $replace, $text);
    }

    // color code objects
    $text = preg_replace(
        '#(\w+)(\s+Object\s+\()#s',
        '<span style="color: #079700;">$1</span>$2',
        $text
    );
    // color code object properties
    $pattern = '#\[(\w+)\:(public|private|protected)\]#';
    $replace = '[<span style="color: #000099;">$1</span>:';
    $replace .= '<span style="color: #009999;">$2</span>]';
    $text = preg_replace($pattern, $replace, $text);

    echo '<pre style="
        font-size: '.$fontSize.'px;
        line-height: '.$fontSize.'px;
        background-color: #fff; padding: 10px;
        ">'.$text.'</pre>
    ';
}
