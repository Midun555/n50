<?php

class About extends Controller
{

    public function index()
    {
        $email = array(
            'to'      => 'michael.b@530medialab.com',
            'from'    => EMAIL_CUSTOMER_SERVICE,
            'subject' => 'testing subject',
            'body'    => '<h1>testing body</h1><hr>'
        );

        $this->loadModel('email')->send($email);

        // $this->loadView('about');
    }

}