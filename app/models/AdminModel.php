<?php

class AdminModel extends Model
{

    public function isAdminLoggedIn()
    {
        return ( isset($_SESSION['admin']) ) ? true : false;
    }


    public function processLogin($data)
    {
        return ( $data['username'] == 'admin' && $data['password'] == '1234' ) ? true : false;
    }

}