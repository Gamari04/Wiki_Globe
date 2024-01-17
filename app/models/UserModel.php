<?php
namespace App\models;

use App\dao\DaoImp;
use PDOException;
use Exception;
use PDO;

class UserModel  extends DaoImp
{

    public function save($User)
    {
        try {
        
        $query= ("INSERT INTO `user` (`firstName`, `lastName`, `email`,`password` , `role` ) 
        VALUES (:firstName, :lastName, :email,:password , :role)");

        $firstname = $User->getFirstname();
        $lastname = $User->getLastname();
        $email = $User->getEmail();
        $password = $User->getPassword();
        $role = $User->getRole();
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $statement = $this->getConnection()->prepare($query);

        $statement->bindParam(':firstName', $firstname);
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
        $statement = $this->getConnection()->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $currentpass = $result["password"];
            $_SESSION["role"] = $result["role"];
            $_SESSION["user_id"] = $result["id"];
            if (password_verify($password, $currentpass)) {
                if ($_SESSION["role"] == 'author') {
                    header("Location: home");
                    exit();

                } else {
                    header("Location:admin");
                }
            }
        }
    }


    public function deleteById($id)
    {
            try {
                $query = "DELETE FROM `user` WHERE `id` = :id";
                $stmt = $this->getConnection()->prepare($query);
                $stmt->bindParam(':id', $id);
        
                return $stmt->execute();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
   }
    
    public function findByAll()
    {
        $query = "SELECT * FROM `user` ";
        $stmt = $this->getConnection()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getTotalUsers()
    {
        try {
            $query = "SELECT COUNT(id) as total_Users FROM `user`";
            $stmt = $this->getConnection()->prepare($query);
            $stmt->execute();
    
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $row['total_Users'];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}

?>