<?php 
namespace App\services;
use App\Repositories\ApiRepository;
use App\models\api;
class ApiService {
    public function __construct(api $api,ApiRepository $repo){
        // $this->model=$api;
        $this->repository=$repo;
    }
  
   public function index(){
      return  $this->repository->getAll();
    }

    public function get($id){
      return  $this->repository->getById($id);
    }

    public function store($data){
      return  $this->repository->create($data);
    }

    public function put($data){
      return  $this->repository->update($data);
    }

    public function delete($id){
      return  $this->repository->delete(api::find($id));
    }
}