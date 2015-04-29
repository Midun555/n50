<?php

class Contact extends Controller
{

    public function index()
    {
        $this->loadView('contact');
    }


    public function submit()
    {
        if ( !isset($_POST['values']) )
            header('Location: /');

        $this->loadModel('contact')->submitForm($_POST['values']);
    }

}