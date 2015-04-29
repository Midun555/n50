<?php

class Admin extends Controller
{

    public function index()
    {
        $this->loadView('404');
    }


    public function upload()
    {
        $this->loadView('upload');
    }


    public function upload_process()
    {
        if ( !isset($_FILES['csv']) )
            header('Location: /admin/upload/');

        $_uploader = $this->loadModel('uploader');

        $validation = $_uploader->validateUpload($_FILES['csv']);

        if ( $validation['error'] == 1 )
            header('Location: /admin/upload/?message=' . $validation['message']);

        $processer = $_uploader->processUpload($_FILES['csv']['tmp_name']);

        if ( $processer['error'] == 1 )
            header('Location: /admin/upload/?message=' . $processer['message']);

        header('Location: /admin/upload/?message=File uploaded successfully');
    }


    public function export()
    {
        $this->loadModel('exporter')->processExport();
    }

}