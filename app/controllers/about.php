<?php

class About extends Controller
{

    public function index()
    {
        $email = array(
            'to'      => 'michael.b@530medialab.com',
            'from'    => EMAIL_CUSTOMER_SERVICE,
            'subject' => 'testing subject',
            'body'    => $this->loadModel('email')->generateOrderHtml('2054441972')
        );

        // die('3 -- THOU SHALL NOT PASS --');
        $this->loadModel('email')->send($email);

        // $this->loadView('about');
    }

}