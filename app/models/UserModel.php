<?php
namespace App\models;

use App\dao\DaoInterface;
use App\config\DbConfig;
use PDOException;
use Exception;
use PDO;
session_start();
class UserModel implements DaoInterface
{
    private $connection;

    public function __construct()
    {
        $dbInstance = DbConfig::getInstance();
        $this->connection = $dbInstance->getConnection();
    }
    public function save($User)
    {
        try {
        
        $query= ("INSERT INTO `user` (`firstName`, `lastName`, `email`,`password` , `role` ) 
        VALUES (:firstName, :lastName, :email,:password , :role)");

        $name = $User->getFirstname();
        $lastname = $User->getLastname();
        $email = $User->getEmail();
        $password = $User->getPassword();
        $role = $User->getRole();
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $statement = $this->connection->prepare($query);

        $statement->bindParam(':firstName', $name);
        $statement->bindParam(':lastName', $lastname);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $hashedPassword);
        $statement->bindParam('role', $role);
        $result= $statement->execute();
        if ($result) {
            return true;
        }else {
            throw new Exception("Error inserting user");
        }
    }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
    }
}

public function login($email, $password)
    {
        $sql = "SELECT * FROM `user` WHERE email = :email";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $currentpass = $result["password"];
            $_SESSION["role"] = $result["role"];

            if (password_verify($password, $currentpass)) {
                if ($_SESSION["role"] == 'author') {
                    header("Location:http://localhost/wiki/");
                    exit();

                } else {
                    header("Location:dashboard");
                }
            }
        }
    }
    public function findById($id)
    {

    }
    public function update($entity)
    {

    }

    public function deleteById($id)
    {

    }
    public function findByAll()
    {

    }
}

?>