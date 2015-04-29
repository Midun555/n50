<?php

class Product extends Controller
{

    public function index($slug = false)
    {
        if ( !$slug )
            header('Location: /');

        $this->product = $this->loadModel('product')->getData($slug);

        if ( $this->product === false )
        {
            $this->loadView('404');
        }
        else
        {
            $this->loadView('product');
        }
    }

}