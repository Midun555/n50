<?php

class Error extends Controller
{

    public function index()
    {
        $this->loadView('404');
    }

}