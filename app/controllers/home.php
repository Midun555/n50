<?php

class Home extends Controller
{

    public function index()
    {
        $this->featured_products = $this->loadModel('product')->getFeaturedCollection();

        $this->loadView('home');
    }

}