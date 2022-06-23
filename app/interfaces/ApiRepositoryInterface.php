<?php 

namespace App\interfaces;

interface ApiRepositoryInterface{
    public function getAll();
    public function getById($id);
    public function delete($id);
    public function create($data);
    public function update($data);
}