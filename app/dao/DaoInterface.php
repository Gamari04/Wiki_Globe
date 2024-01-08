<?php

namespace App\dao;

interface DaoInterface
{
    public function save($entity);
    public function update($entity);
    public function findById($id);
    public function deleteById($id);
    public function findByAll();

}