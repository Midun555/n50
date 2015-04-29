<?php

class App
{

    protected $controller = 'home';

    protected $method = 'index';

    protected $params = array();


    public function __construct()
    {
        $this->_checkSession();

        $route = $this->_parseUrl();

        if ( file_exists(DOCUMENT_ROOT . '/app/controllers/' . $route[0] . '.php') )
        {
            $this->controller = $route[0];
            unset($route[0]);
        }
        else
        {
            $this->controller = 'error';
        }

        require_once DOCUMENT_ROOT . '/app/controllers/' . $this->controller . '.php';

        $this->controller = new $this->controller;

        if ( isset($route[1]) )
        {
            if ( method_exists($this->controller, $route[1]) )
            {
                $this->method = $route[1];
                unset($route[1]);
            }
        }

        $this->params = ( $route ) ? array_values($route) : array();

        call_user_func_array(array($this->controller, $this->method), $this->params);
    }


    private function _parseUrl()
    {
        if ( isset($_GET['url']) )
        {
            // for GoDaddy subdomain hosting BS
            if ( $_GET['url'] == '.errordocs/403.html' )
                return array('home','index');

            $url = filter_var(rtrim($_GET['url'],'/'), FILTER_SANITIZE_URL);

            return explode('/', $url);
        }
        else
        {
            return array('home','index');
        }
    }


    private function _checkSession()
    {
        session_start();

        if ( !isset( $_SESSION['visitor_id'] ) )
            $_SESSION['visitor_id'] = time() + mt_rand();
    }

}