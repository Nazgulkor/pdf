<?php

namespace App\Services;

class HomeService
{
    public function store($request) : bool
    {

        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "//assets/pdf/";
        $file = $request->files['pdf']['name'];
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        if($ext != 'pdf') return false;
        $temp_name = $request->files['pdf']['tmp_name'];
        $path_filename_ext = $target_dir . $filename . "." . $ext;
        $files = glob($_SERVER['DOCUMENT_ROOT'] . '/assets/pdf/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
        move_uploaded_file($temp_name, $path_filename_ext);
        return true;
    }
}
