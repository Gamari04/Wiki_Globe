<?php
namespace App\models;

use App\dao\WikiDao;
use App\config\DbConfig;
use PDO;
use PDOException;
use Exception;

class WikiModel
{

    private $connection;

    public function __construct()
    {
        $dbInstance = DbConfig::getInstance();
        $this->connection = $dbInstance->getConnection();
    }
    public function save($wiki,$tags)
    {
        try {
            $query = "INSERT INTO `wiki` (`title`, `content`, `user_id`, `category_id`, `image`, `created_at`) 
                      VALUES (:title, :content, :user_id, :category_id, :image,CURRENT_TIMESTAMP)";

            $stmt = $this->connection->prepare($query);

            $title = $wiki->getTitle();
            $content = $wiki->getContent();
            $user_id = $wiki->getUserId();
            $category_id = $wiki->getCategoryId();
            $image = $wiki->getImage();
          

            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':category_id', $category_id);
            $stmt->bindParam(':image', $image);
  

            $result = $stmt->execute();

            if ($result) {
                $lastInsertedId = $this->connection->lastInsertId();

                $queryTagWiki = "INSERT INTO `tag_wiki` (`tag_id`, `wiki_id`) VALUES (?, ?)";
                $stmtTagWiki = $this->connection->prepare($queryTagWiki);

                foreach ($tags as $tagId) {
                    $resultTag = $stmtTagWiki->execute([$tagId, $lastInsertedId]);
                    if (!$resultTag) {
                        // Log or handle tag insertion failure
                        error_log("Tag insertion failed for tag ID: $tagId");
                    }
                }
                return true;
            } else {
                throw new Exception("Error inserting wiki");
            }
        } catch (PDOException $e) {
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