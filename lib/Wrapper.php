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

// TEMPLATE CLASS

Class Wrapper {

    var $pageId;
    var $pageDefault = 'home';

    public function __construct()
    {
        $this->pageId = 0;
    }

    public function setPageId()
    {
        if (isset($_GET['p']) && !empty($_GET['p']))
            $this->pageId = $_GET['p'];
        else
            $this->pageId = $this->pageDefault;

        return $this->pageId;
    }

    public function getPageId()
    {
        return $this->setPageId();
    }

    public function get_template()
    {
        include $this->_template_exist();
    }

    public function get_header( $name = null )
    {
           $header = '_header.php';

           $name = (string) $name;

           if ( '' !== $name )
                   $header = "header-{$name}.php";

           include(  VIEWS_PATH . '/' . $header );
    }

    public function get_footer( $name = null )
    {
           $footer = '_footer.php';

           $name = (string) $name;

           if ( '' !== $name )
                   $footer = "footer-{$name}.php";

           include(  VIEWS_PATH . '/' . $footer );
    }

    public function get_nav( $name = null )
    {
           $nav = '_nav.php';

           $name = (string) $name;

           if ( '' !== $name )
                   $nav = "nav-{$name}.php";

           include(  VIEWS_PATH . '/' . $nav );
    }

    private function _template_exist()
    {
        $filename = VIEWS_PATH . $this->setPageId() . '.php';

        if (is_file($filename))
            return $filename;
        else
            return VIEWS_PATH . $this->pageDefault . '.php';
    }

}