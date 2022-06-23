<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateRequest;
use Exception;
use App\Helper\ApiHelper;
use Illuminate\Support\Facades\Validator;
use  App\services\ApiService;
class apiController extends Controller
{
    public function __construct(ApiService $service){
       $this->service=$service;
    }
    #to read data from db
    public function ApiIndex()
    { 
        try { 
            $data=$this->service->index();
            return ApiHelper::onSuccessApi("success", 200,$data);
        } catch (Exception $err) {
            return ApiHelper::onErrorApi("internal server error!",500,);
        }
    }
    #to read data from db by id
    public function ApiIndexId($id)
    { 
            $data=$this->service->get($id);
            if(is_null($data)){
                return ApiHelper::onErrorApi("404 not found", 404,);
            }
                return ApiHelper::onSuccessApi("success", 200,$data);
    }
    #to create data 
    
    public function ApiCreate(CreateRequest $request)
    {
        $data= $this->service->store($request->validated());
        return ApiHelper::onSuccessApi( 'success!',201,$data);  
    }

    #to update data to db
    public function ApiUpdate(CreateRequest $request , $id )
    {
            $this->service->put($request->validated());
            if(is_null($data)){
                #if the data is null then
                return  ApiHelper::onErrorApi("data not found!", 404,);
            }
            return ApiHelper::onSuccessApi("update successfully", 201,null);
    }
    #to delete data to db
    public function ApiDelete($id)
    {
            $data=$this->service->delete($id);
            if(is_null($data)){
                return ApiHelper::onErrorApi("data not found!", 404,);;
            }
            return ApiHelper::onSuccessApi("delete successfully!", 200,);
    }
}
