<?php

namespace App\Services;

use PDOException;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class RedactService
{
    public function store($request): bool
    {
        global $conn;
        $user_name = $request->data['fullname'];
        $user_email = $request->data['email'];
        $sql = "INSERT INTO users (fullname, email) VALUES ( '$user_name', '$user_email')";
        try {
            $conn->exec($sql);
            return true;
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                return false;
            }
        }
        return false;
    }
    public function send($users)
    {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = ''; //твоя почта
            $mail->Password = ''; //твой пароль для приложений с гугл аккаунт
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;
            $mail->CharSet = "utf-8";


            $mail->setFrom(''); //твоя почта
            $mail->addAttachment(glob($_SERVER['DOCUMENT_ROOT'] . '/assets/pdf/*.pdf')[0]); 
            $mail->isHTML(true);
            $mail->Subject = 'Company';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            foreach ($users as $user) {
                $mail->addAddress($user['email']);
                $mail->send();
            }
    }
}
