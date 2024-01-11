<?php 
namespace App\models;
use App\entities\Category;
use App\dao\DaoInterface;
use App\config\DbConfig;
use PDOException;
use Exception;


class CategoryModel implements DaoInterface
{
    private $connection;

    public function __construct()
    {
        $dbInstance = DbConfig::getInstance();
        $this->connection = $dbInstance->getConnection();
    }
    public function save($category)
    {
        
        try {
        
            $query= ("INSERT INTO `category` (`name`) 
            VALUES (:name)");
    
            $name = $category->getName();
            $stmt = $this->connection->prepare($query);
    
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
    
    public function findById($id)
    {

    }
    public function update($category)
    {
        try {
        
            $query= ("UPDATE `category` SET `name` = :name WHERE `id` = :id");
    
            $name = $category->getName();
            $id =  $category->getId();
            $stmt = $this->connection->prepare($query);
    
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
            $stmt = $this->connection->prepare($query);
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
    $stmt = $this->connection->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();

   }
}

?>