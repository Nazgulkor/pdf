<?php

namespace App\Controllers;

use App\Services\HomeService;
use Framework\Support\Request;



class HomeController extends Controller
{
    public function index()
    {
        include($_SERVER['DOCUMENT_ROOT'] . '/app/views/index.php');
    }
    public function store(Request $request)
    {
        $result = (new HomeService())->store($request);
        if ($result) {
            $_SESSION['alert'] = ['message' => 'Файл удачно загружен!', 'status' => true];
        } else {
            $_SESSION['alert'] = ['message' => 'Ошибка при загрузки файла!', 'status' => false];
        }
        header("Location:http://localhost:8000/");
    }
};
