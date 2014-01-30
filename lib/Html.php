<?php

/* * ********************************************************************************************************
 *
 * Created on 6 mars 2012
 *
 *
 *
 * @author inconito
 * @copyright   © Inconito
 *
 * @infos : UTF-8
 *
 * ***************************************** */

class Html
{
    protected $config = array();
    public static $_css = array();
    public static $_js = array();
    public static $_siteName = '';
    public static $_siteUrl = '';

    /**
     * Create a new HTML builder instance.
     *
     * @param $config
     * @return void
     */
    public function __construct( $config )
    {
        if( $config )
        {
            foreach ($config as $action => $values )
            {
                if( $action === 'style' )
                {
                    self::$_css = self::add_css($values);
                }

                if( $action === 'script' )
                {
                    self::$_js = self::add_js($values);
                }

                if( $action === 'site_name' )
                {
                    self::$_siteName = $values;
                }

                if( $action === 'site_url' )
                {
                    self::$_siteUrl = $values;
                }
            }
        }
    }


    public static function site_url($url = null, $page = true)
    {
        if (is_null($url))
            return self::$_siteUrl;
        else if ($page = true)
            return self::$_siteUrl . 'content/' . $url;
        else
            return self::$_siteUrl . $url;
    }

    public static function home_url( $text = 'Accueil' , $attributes = array() )
    {
        $attributes['href'] = self::site_url( null);
        return self::link ($text , $attributes );
    }

    public static function app_url( $text = 'Accueil' , $page , $attributes = array() )
    {
        $attributes['href'] = self::site_url( $page );
        return self::link ($text , $attributes );
    }

    public static function site_name()
    {
        return self::$_siteName;
    }

    public static function title ( $page_title = false )
    {
        if( !$page_title )
            echo self::$_siteName;
        else
            echo $page_title .' | '.self::$_siteName;
    }

    public static function link ( $text , $attributes )
    {
        if( !is_array($attributes) )
        {
            echo '<a href="'.$attributes.'">'.$text.'</a>';
        }
        else
        {
            $inline_attributes = '';
            foreach ($attributes as $attribute => $value)
            {
                $inline_attributes .= ' '.$attribute.'="'.$value.'"';
            }

            echo '<a'.$inline_attributes.'>'.$text.'</a>';
        }
    }

    public static function is_active( $item , $class = 'active' )
    {
        if( !isset($_GET['p']) && $item == 'home')
        {
            echo $class;
            return;
        }

        if( isset($_GET['p']) && $_GET['p'] == $item )
            echo $class;
    }

    public function add_css( $css )
    {
        return self::$_css = array_merge( (array) $css , self::$_css );
    }

    public function add_js( $js )
    {
        return self::$_js = array_merge( (array) $js , self::$_js );
    }

    public static function style( $css = false  )
    {
        $css = ( $css ) ? $css : self::$_css;
        $string = '<link rel="stylesheet" href="%s/%s.css" type="text/css"/>'.PHP_EOL;
        $path = CSS_PATH;
        self::_print_assets ( $string , $css , $path );
    }

    public static function script( $js = false )
    {
        $js = ( $js ) ? $js : self::$_js;
        $string = '<script src="%s/%s.js" type="text/javascript" charset="utf-8"></script>'.PHP_EOL;
        $path = JS_PATH;
        self::_print_assets ( $string , $js , $path );
    }

    private static function _print_assets( $string , $files , $default_path )
    {
        $path = $default_path;

        if(is_array($files))
        {
            foreach($files as $dir => $filename )
            {
                if( !is_int( $dir ) )
                {
                    if( !strpos($dir, '//') )
                        $dir = ASSETS_PATH.'/'.$dir;

                    printf($string , $dir , $filename);
                }
                else
                {
                    printf($string , $path , $filename);
                }
            }
        }
        elseif(!empty($files))
        {
            if( !is_null( @key($files) ) )
            {
                $dir = ( !strpos($dir, '//') ) ? ASSETS_PATH.'/'.key( $files ) : key( $files );
                printf($string , $dir , $filename);
            }
            else
            {
                printf($string , $path , $files);
            }
        }
        else
        {
            return;
        }
    }
}