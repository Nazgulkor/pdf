<?php

namespace App\Controllers;


use App\Models\User;
use App\Services\RedactService;
use Framework\Support\Request;



class RedactController extends Controller
{
    public function index()
    {
        $model = new User();
        $users = $model->all();
        include($_SERVER['DOCUMENT_ROOT'] . '/app/views/redact.php');
    }
    public function store(Request $request)
    {
        $result = (new RedactService())->store($request);
        if ($result) {
            $_SESSION['alert'] = ['message' => 'Пользователь создан!', 'status' => true];
        } else {
            $_SESSION['alert'] = ['message' => 'Такая почта уже зарегистрирована!', 'status' => false];
        }

        header("Location:http://localhost:8000/redact");
    }
    public function mail()
    {
        $model = new User();
        $users = $model->all();
        (new RedactService())->send($users);

        $files = glob($_SERVER['DOCUMENT_ROOT'] . '/assets/pdf/*');

        foreach ($files as $file) {
            if (is_file($file))
                unlink($file);
        }
        header("Location:http://localhost:8000/");
    }
};
