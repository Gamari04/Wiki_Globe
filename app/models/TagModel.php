<?php 
namespace App\models;
use App\dao\DaoImp;
use PDOException;
use Exception;
use PDO;
class TagModel extends DaoImp
{
    public function save($tag)
    {
        try {
        
            $query= ("INSERT INTO `tag` (`name`) 
            VALUES (:name)");
    
            $name = $tag->getName();
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
   

    public function deleteById($id)
    {
        try {
            $query = "DELETE FROM `tag` WHERE `id` = :id";
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

    $query = "SELECT * FROM `tag` ";
    $stmt = $this->getConnection()->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
   }
   public function getTotalTag()
   {
       try {
           $query = "SELECT COUNT(id) as total_Tag FROM `tag`";
           $stmt = $this->getConnection()->prepare($query);
           $stmt->execute();
   
           $row = $stmt->fetch(PDO::FETCH_ASSOC);
   
           return $row['total_Tag'];
       } catch (PDOException $e) {
           echo "Error: " . $e->getMessage();
           return false;
       }
   }
  
}

?>