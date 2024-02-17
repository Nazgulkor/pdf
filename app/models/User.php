<?php

namespace App\Models;

class User
{
    public function __construct()
    {
        global $conn;
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            fullname VARCHAR(60) NOT NULL,
            email VARCHAR(50),
            UNIQUE (email)
        )";
      
        $conn->exec($sql);
    }
    public function all()
    {
        global $conn;
        $sth = $conn->prepare("SELECT fullname, email FROM users");
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }
}
