<?php 
namespace App\models;
use App\dao\DaoInterface;
use App\config\DbConfig;
use PDOException;
use Exception;

class TagModel implements DaoInterface
{
    private $connection;

    public function __construct()
    {
        $dbInstance = DbConfig::getInstance();
        $this->connection = $dbInstance->getConnection();
    }
    public function save($tag)
    {
        try {
        
            $query= ("INSERT INTO `tag` (`name`) 
            VALUES (:name)");
    
            $name = $tag->getName();
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
    public function update($entity)
    {

    }

    public function deleteById($id)
    {
        try {
            $query = "DELETE FROM `tag` WHERE `id` = :id";
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

    $query = "SELECT * FROM `tag` ";
    $stmt = $this->connection->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
   }
}

?>