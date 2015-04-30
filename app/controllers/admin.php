<?php

class Admin extends Controller
{

    public function index()
    {
        if ( !$this->loadModel('admin')->isAdminLoggedIn() )
            header('Location: /admin/login/');

        $this->loadView('admin/index');
    }


    public function login($has_error = false)
    {
        if ( $this->loadModel('admin')->isAdminLoggedIn() )
            header('Location: /admin/');

        if ( $has_error )
            $this->has_error = true;

        $this->loadView('admin/login');
    }


    public function login_process()
    {
        if ( $this->loadModel('admin')->isAdminLoggedIn() )
            header('Location: /admin/');

        if ( !isset($_POST) )
            header('Location: /admin/login/');

        if ( !$this->loadModel('admin')->processLogin($_POST) )
        {
            header('Location: /admin/login/error/');
        }
        else
        {
            if ( !isset( $_SESSION['admin'] ) )
                $_SESSION['admin'] = 1;

            header('Location: /admin/');
        }
    }


    public function logout()
    {
        if ( !$this->loadModel('admin')->isAdminLoggedIn() )
            header('Location: /admin/login/');

        unset($GLOBALS['_SESSION']['admin']);

        header('Location: /admin/login/');
    }


    public function upload($has_error = false)
    {
        if ( !$this->loadModel('admin')->isAdminLoggedIn() )
            header('Location: /admin/login/');

        if ( $has_error )
            $this->has_error = true;

        $this->loadView('admin/upload');
    }


    public function upload_process()
    {
        if ( !$this->loadModel('admin')->isAdminLoggedIn() )
            header('Location: /admin/login/');

        if ( !isset($_FILES['csv']) )
            header('Location: /admin/upload/');

        $_uploader = $this->loadModel('uploader');

        $validation = $_uploader->validateUpload($_FILES['csv']);

        if ( $validation['error'] == 1 )
            header('Location: /admin/upload/error');

        $processer = $_uploader->processUpload($_FILES['csv']['tmp_name']);

        if ( $processer['error'] == 1 )
            header('Location: /admin/upload/error/');

        header('Location: /admin/');
    }


    public function export()
    {
        if ( !$this->loadModel('admin')->isAdminLoggedIn() )
            header('Location: /admin/login/');

        $this->loadModel('exporter')->processExport();
    }

}