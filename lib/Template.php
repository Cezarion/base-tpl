<?php

class Tpl
{
    private static $view_path = VIEWS_PATH;
    private static $block_path;
    public  static $wrapper;

    public static function init()
    {
        self::$wrapper = new Wrapper();
        self::$wrapper->setPageId();

         if( !defined('VIEWS_PATH') )
            throw new Exception("Le dossier des vues n'est pas défini", 1);

        self::$block_path = self::$view_path.'/blocks/';
    }

    public static function header( $name = null )
    {
           $header = '_header.php';

           $name = (string) $name;

           if ( '' !== $name )
                   $header = "header-{$name}.php";

           self::load_block($header);
    }

    public static function footer( $name = null )
    {
           $footer = '_footer.php';

           $name = (string) $name;

           if ( '' !== $name )
                   $footer = "footer-{$name}.php";

           self::load_block($footer);
    }

    public static function nav( $name = null )
    {
           $nav = '_nav.php';

           $name = (string) $name;

           if ( '' !== $name )
                   $nav = "nav-{$name}.php";

           self::load_block($nav);
    }


    public static function load_block( $name = null )
    {
           $name = (string) $name;

           $name = ( strpos( $name , '.php') > 0 ) ? $name : $name .'.php';

           self::_load_template(  self::$block_path . $name );
    }

    public static function load_view( $name = null )
    {
           $name = (string) $name;

           $name = ( strpos( $name , '.php') > 0 ) ? $name : $name .'.php';

           self::_load_template(  self::$view_path . $name );
    }

    public static function content()
    {
           return self::$wrapper->get_template();
    }

    /**
     * Require the template file .
     *
     *
     *
     * @since 1.0.0
     *
     * @param string $_template_file Path to template file.
     * @param bool $require_once Whether to require_once or require. Default true.
     */
  public static function _load_template( $_template_file )
  {
    //global $PAGE, $USER, $app;
    if( is_file( $_template_file ) )
    {
      ob_start();
        $output = extract($GLOBALS, EXTR_REFS);
      ob_end_clean();
      return include( $_template_file );
    }

    return trigger_error("Impossible de charger le fichier {$_template_file}", E_USER_ERROR);

  }
}