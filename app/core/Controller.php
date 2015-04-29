<?php

abstract class Controller
{

    public function loadModel($model)
    {
        $model = ucfirst($model) . 'Model';

        require_once DOCUMENT_ROOT . '/app/models/' . $model . '.php';

        return new $model;
    }


    public function loadView($view)
    {
        $this->page           = ucwords(str_replace('/', ' - ', $view));
        $this->category_links = $this->loadModel('category')->getLinks();
        $this->cart_count     = $this->loadModel('cart')->getCount();

        require_once DOCUMENT_ROOT . '/app/views/includes/header.php';

        if ( file_exists(DOCUMENT_ROOT . '/app/views/' . $view . '.php') )
        {
            require DOCUMENT_ROOT . '/app/views/' . $view . '.php';
        }
        else
        {
            require DOCUMENT_ROOT . '/app/views/404.php';
        }

        require_once DOCUMENT_ROOT . '/app/views/includes/footer.php';
    }

}