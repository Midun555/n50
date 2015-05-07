<?php

class About extends Controller
{

    public function index()
    {
        $email = array(
            'to'      => 'michael.b@530medialab.com',
            'from'    => EMAIL_CUSTOMER_SERVICE,
            'subject' => 'testing subject',
            'body'    => $this->loadModel('email')->generateOrderHtml('3334284843')
        );

        die('2 -- THOU SHALL NOT PASS --');
        $this->loadModel('email')->send($email);

        // $this->loadView('about');
    }

}