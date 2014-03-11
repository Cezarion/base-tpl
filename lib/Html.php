<?php
/**
 * @date:   2014-02-26 11:46:47
 *
 * Description
 * -----------
 * utilities for internal site templating
 * like set page title, internal link, menu item states, ...
 *
 * @author              Cezarion <cezarion@cezarion.net>
 * @copyright           © Cezarion
 * @last modified by    Cezarion
 * @last modified time: 2014-02-26 11:46:47
 *
 * ---------------------------------------------------------------------------------------- */


class Html
{
    protected     $config      = array();

    public static $_css        = array();
    public static $_js         = array();
    public static $_body_class = array();
    public static $_siteName   = '';
    public static $_siteUrl    = '';
    public static $_title      = '';

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

                if( $action === 'page' )
                {
                    self::set_title( $values );
                    self::add_body_class( slugify(self::$_title) );
                    self::add_custom_params($values);
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

    public static function set_title( $page_titles )
    {
        if( isset($_GET['p']) && array_key_exists( $_GET['p'] , $page_titles ) )
        {
            self::$_title = $page_titles[ $_GET['p'] ]['title'];
        }

        self::$_title = $page_titles['home']['title'];
    }

    public static function add_custom_params( $attributes )
    {
        $attribute = $attributes['home'];

        if( isset($_GET['p']) && array_key_exists( $_GET['p'] , $attributes ) )
        {
            $attribute = $attributes[$_GET['p']];
        }

        foreach ($attribute as $key => $values)
        {
            if( $key === 'style')
                self::add_css($attribute['style']);

            if( $key === 'script')
                self::add_js($attribute['script']);

            if( $key === 'class')
                self::add_body_class($attribute['class']);
        }
    }

    public static function the_title ()
    {
        return self::$_title;
    }

    public static function title ()
    {
        if( empty(self::$_title) )
            echo self::$_siteName;
        else
            echo self::$_title .' | '.self::$_siteName;
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

    public static function add_body_class( $customClass )
    {
       self::$_body_class = array_merge_recursive( self::$_body_class  , (array) $customClass );
    }

    public static function body_class( $customClass = array() )
    {
       self::add_body_class( $customClass );
       return implode( ' ' , self::$_body_class );
    }

    public static function add_css( $css )
    {
        self::$_css = array_merge_recursive( self::$_css , (array) $css);
        return self::$_css;
    }

    public static function add_js( $js )
    {
        self::$_js = array_merge_recursive( self::$_js , (array) $js);
        return self::$_js;
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

                    if( is_array($filename))
                        foreach ($filename as $file) printf($string , $dir , $file);
                    else
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
