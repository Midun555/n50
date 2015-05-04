<?php

class Newsletter extends Controller
{

    public function signup()
    {
        if ( !isset($_POST) )
            die('Nice try.');

        echo $this->loadModel('newsletter')->saveEmail($_POST['email']);
    }

}