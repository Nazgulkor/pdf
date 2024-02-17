<?php
namespace Database;
use PDO;
class Connect{
    private static $instance = null;
    private $conn;
    private $db_host = 'localhost';
    private $user_name = 'root';
    private $user_password = 'root';
    private $db_name = 'tbg';
    public function __construct(){
        $this->conn = new PDO("mysql:host={$this->db_host};dbname={$this->db_name}", $this->user_name, $this->user_password);
        
    }

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new Connect();
        }
        return self::$instance;
    }
    public function getConnection(){
        return $this->conn;
    }
}