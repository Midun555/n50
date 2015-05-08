<?php

class Email extends Controller
{

    public function order()
    {
        if ( isset($_POST) )
            $this->loadEmailTemplate('order', $_POST);
    }

}