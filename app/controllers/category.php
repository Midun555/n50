<?php

class Category extends Controller
{

    public function index($slug = false)
    {
        if ( !$slug )
            header('Location: /');

        $this->category = $this->loadModel('category')->getNameFromSlug($slug);

        if ( $this->category === false )
        {
            $this->loadView('404');
        }
        else
        {
            $this->products = $this->loadModel('product')->getCollection($this->category);

            $this->loadView('category');
        }
    }

}