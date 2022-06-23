<?php 
namespace App\Repositories;
use App\interfaces\ApiRepositoryInterface;
use App\models\api;

class ApiRepository implements ApiRepositoryInterface{
    public function __construct(api $api){
        $this->model=$api;
    }
    public function getAll()
    {
        return $this->model::all();
    }
    public function getById($id)
    {
        return $this->model::find($id);
    }
    public function delete($id)
    {
        return $this->model::destroy($id);
    }
    public function create($data)
    {
        return $this->model::create($data);
    }
    public function update($data)
    {
        return $this->model::update($data);
    }
}