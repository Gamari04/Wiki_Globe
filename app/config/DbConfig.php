<?php

namespace App\config;

use PDO;
use PDOException;

require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

class DbConfig
{
    private static $instance;
    private $username;
    private $password;
    private $dbname;
    private $servername;
    private $db;

    private function __construct()
    {
        $this->username = $_ENV["DB_username"];
        $this->password = $_ENV["DB_password"];
        $this->dbname = $_ENV["DB_dbname"];
        $this->servername = $_ENV["DB_servername"];
    }

 
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        try {
            if ($this->db === null) {
                $this->db = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
                echo "Connection successful";
            }
            return $this->db;
        } catch (PDOException $e) {
            echo $e->getMessage();
            echo "Error connecting to the database";
        }
    }
}


