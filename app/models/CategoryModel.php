<?php 
namespace App\models;
use App\dao\DaoImp;
use PDOException;
use Exception;
use PDO;


class CategoryModel  extends DaoImp
{
    public function save($category)
    {
        
        try {
        
            $query= ("INSERT INTO `category` (`name`) 
            VALUES (:name)");
    
            $name = $category->getName();
            $stmt = $this->getConnection()->prepare($query);
    
            $stmt->bindParam(':name', $name);
            $result= $stmt->execute();
            if ($result) {
                return true;
            }else {
                throw new Exception("Error inserting category");
            }
        }catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
        }
    }
    
    
    public function update($category)
    {
        try {
        
            $query= ("UPDATE `category` SET `name` = :name WHERE `id` = :id");
    
            $name = $category->getName();
            $id =  $category->getId();
            $stmt = $this->getConnection()->prepare($query);
    
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':id', $id);
            $result= $stmt->execute();
            if ($result) {
                return true;
            }else {
                throw new Exception("Error updating category");
            }
        }catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
        }
    }

    public function deleteById($id)
    {
        try {
            $query = "DELETE FROM `category` WHERE `id` = :id";
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
   
    $query = "SELECT * FROM `category` ";
    $stmt = $this->getConnection()->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();

   }
   public function getTotalCategory()
   {
       try {
           $query = "SELECT COUNT(id) as total_Category FROM `category`";
           $stmt = $this->getConnection()->prepare($query);
           $stmt->execute();
   
           $row = $stmt->fetch(PDO::FETCH_ASSOC);
   
           return $row['total_Category'];
       } catch (PDOException $e) {
           echo "Error: " . $e->getMessage();
           return false;
       }
   }
}

?>