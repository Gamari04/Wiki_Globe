<?php
namespace App\dao;
use App\dao\DaoInterface;
use App\config\DbConfig;

class DaoImp implements DaoInterface
{
    private $connection;
     
    public function __construct()
    {
        $dbInstance = DbConfig::getInstance();
        $this->connection = $dbInstance->getConnection();
    }
    public function getConnection() {
        return $this->connection;
    }
    
    public function save($entity)
    {

    }
    public function update($entity)
    {

    }
    public function findById($id)
    {

    }
    public function deleteById($id)
    {

    }
    public function findByAll()
    {

    }
}