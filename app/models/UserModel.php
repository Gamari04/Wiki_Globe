<?php
namespace App\models;

use App\dao\DaoInterface;
use App\config\DbConfig;
use PDOException;
use Exception;
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
        $query= ("INSERT INTO `user` (`firstName`, `lastName`, `email`, `password`) 
        VALUES (:firstName, :lastName, :email, :password)");

        $name = $User->getFirstname();
        $lastname = $User->getLastname();
        $email = $User->getEmail();
        $password = $User->getPassword();


        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $statement = $this->connection->prepare($query);

        $statement->bindParam(':firstName', $name);
        $statement->bindParam(':lastName', $lastname);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $hashedPassword);
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