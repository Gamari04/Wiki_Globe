<?php
namespace App\models;

use App\dao\DaoInterface;
use App\config\DbConfig;
use PDO;
use PDOException;
use Exception;

class WikiModel implements DaoInterface
{

    private $connection;

    public function __construct()
    {
        $dbInstance = DbConfig::getInstance();
        $this->connection = $dbInstance->getConnection();
    }
    public function save($wiki)
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
                $tags = $wiki->getTags();
                foreach ($tags as $tagId) {
                    $resultTag = $stmtTagWiki->execute([$tagId, $lastInsertedId]);
                    if (!$resultTag) {

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
        try {
            $query = "SELECT w.* ,u.firstName AS Fname,u.lastName AS Lname, c.name AS Cname , GROUP_CONCAT(tag.name) As tags  From `wiki` AS w
               INNER JOIN user AS u ON u.id = w.user_id
               INNER JOIN category AS c ON c.id=w.category_id
               INNER JOIN tag_wiki AS tw ON tw.wiki_id =w.id 
               INNER JOIN tag ON tw.tag_id=tag.id
               GROUP BY w.id
               ORDER BY id DESC";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }

    }
    public function search($query)
    {
        try {
            $requete = "SELECT w.* ,c.name AS Cname  FROM wiki AS w
            INNER JOIN category AS c ON c.id=w.category_id
            WHERE w.title LIKE :query OR c.name LIKE :query";
            $stmt = $this->connection->prepare($requete);
            $stmt->execute(['query' => '%' . $query . '%']);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>