<?php

namespace Framework\Support;

class Request
{
    public $files;
    public $data;
    public function __construct()
    {
        if ($_FILES) {
            foreach ($_FILES as $fileName => $file) {
                if ($file['size']) {
                    $this->files[$fileName] = $file;
                }
            }
        }
        if ($_REQUEST) {
            $this->data['email'] = $_REQUEST['email'];
            $this->data['fullname'] = $_REQUEST['fullname'];
        }
        self::getRequest();
    }
    public function getRequest()
    {


        return ['data' => $this->data, 'files' => $this->files];
    }
}
