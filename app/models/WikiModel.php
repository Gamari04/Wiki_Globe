<?php
namespace App\models;

use App\dao\DaoImp;
use PDO;
use PDOException;
use Exception;

class WikiModel extends DaoImp
 {

    public function save($wiki)
    {
        try {
            $query = "INSERT INTO `wiki` (`title`, `content`, `user_id`, `category_id`, `image`, `created_at`,`status`) 
                      VALUES (:title, :content, :user_id, :category_id, :image,CURRENT_TIMESTAMP,:status)";

            $stmt = $this->getConnection()->prepare($query);

            $title = $wiki->getTitle();
            $content = $wiki->getContent();
            $user_id = $wiki->getUserId();
            $category_id = $wiki->getCategoryId();
            $image = $wiki->getImage();
            $status=$wiki->getStatus();


            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':category_id', $category_id);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':status',$status);


            $result = $stmt->execute();

            if ($result) {
                $lastInsertedId = $this->getConnection()->lastInsertId();

                $queryTagWiki = "INSERT INTO `tag_wiki` (`tag_id`, `wiki_id`) VALUES (?, ?)";
                $stmtTagWiki = $this->getConnection()->prepare($queryTagWiki);
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
        $query = "SELECT w.* ,u.firstName AS Fname,u.lastName AS Lname, c.name AS Cname , GROUP_CONCAT(tag.name) As tags  From `wiki` AS w
        INNER JOIN user AS u ON u.id = w.user_id
        INNER JOIN category AS c ON c.id=w.category_id
        INNER JOIN tag_wiki AS tw ON tw.wiki_id =w.id 
        INNER JOIN tag ON tw.tag_id=tag.id
        WHERE w.`id` = :id
        GROUP BY w.id
        ORDER BY id DESC";
        $stmt = $this->getConnection()->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        if ($stmt) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
   

    public function deleteById($id)
    {
        try {
            $deleteTagWikiQuery = "DELETE FROM `tag_wiki` WHERE `wiki_id` = :id";
            $deleteTagWikiStmt = $this->getConnection()->prepare($deleteTagWikiQuery);
            $deleteTagWikiStmt->bindParam(':id', $id);
            $deleteTagWikiStmt->execute();
            if($deleteTagWikiStmt){
            $query = "DELETE FROM `wiki` WHERE `id` = :id";
            $stmt = $this->getConnection()->prepare($query);
            $stmt->bindParam(':id', $id);

            return $stmt->execute();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
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
            $stmt = $this->getConnection() ->prepare($query);
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
            $stmt = $this->getConnection()->prepare($requete);
            $stmt->execute(['query' => '%' . $query . '%']);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function getTotalWiki()
    {
        try {
            $query = "SELECT COUNT(id) as total_Wiki FROM `wiki`";
            $stmt = $this->getConnection()->prepare($query);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row['total_Wiki'];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function lastWiki()
    {
        try {
            $query = "SELECT w.* ,u.firstName AS Fname,u.lastName AS Lname, c.name AS Cname , GROUP_CONCAT(tag.name) As tags  From `wiki` AS w
               INNER JOIN user AS u ON u.id = w.user_id
               INNER JOIN category AS c ON c.id=w.category_id
               INNER JOIN tag_wiki AS tw ON tw.wiki_id =w.id 
               INNER JOIN tag ON tw.tag_id=tag.id
               GROUP BY w.id
               ORDER BY id DESC LIMIT 4";
            $stmt = $this->getConnection()->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }

    }
    public function archiveWiki($wiki)
    {
        $query= "UPDATE `wiki` SET `status`=1";
        $stmt = $this->getConnection()->prepare($query);
        $status=$wiki->getStatus();
        $stmt->bindParam(':status',$status);
        $stmt->execute();
    }
}
