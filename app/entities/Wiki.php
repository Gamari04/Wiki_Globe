<?php 
namespace App\entities;

class Wiki
{
    private $id;
    private $title;
    private $content;
    private $user_id;
    private $category_id;
    private $image;
    private $created_at;
    private $tags=[];

    public function __construct($id, $title, $content, $user_id, $category_id ,$image, $created_at,$tag)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->user_id = $user_id;
        $this->category_id = $category_id;
        $this->image = $image;
        $this->created_at = $created_at;
       

    }
    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getUserId()
    {
        return $this->user_id;
    }
    public function getCategoryId()
    {
        return $this->category_id;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function getCreatedAt()
    {
        return $this->created_at;
    }
   
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }
    public function settitle($title)
    {
        $this->title = $title;
    }
    public function setContent($content)
    {
        $this->content = $content;
    }
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }
   

}

?>